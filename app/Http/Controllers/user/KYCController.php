<?php

namespace App\Http\Controllers\user;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use App\Models\KYCDocument;
use Illuminate\Http\Request;

use App\Models\KYCVerification;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;


class KYCController extends Controller
{
    public function index()
    {
        $data['title'] = " KYC ";
        $data['doc'] = KYCDocument::get();
        $data['kyc']  = KYCVerification::where('userid', Auth::user()->id)->first();


        if($data['kyc'])
        {
        if ($data['kyc']->status == 'pending') {
            return view('user.kyc.index', $data);

        } 
        elseif ($data['kyc']->status == 'active') {

        return view('user.kyc.verify', $data)->with('mes', 'KYC Completed');

        }
    }else
    {
        return view('user.kyc.index',$data);

    }
    }

 



    public function submit(Request $request)
    {


        $data = $request->validate([
            'full_name' => 'required|string',
            'father_name' => 'required|string',
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'dob' => 'required|date',
            'address' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'district' => 'required|string',
            'doc_no' => [
                'required',
                'string',
                Rule::unique('k_y_c_verifications')->ignore(Auth::user()->id, 'userid')
            ],

            'doc_type' => 'required',
            'doc_front' => 'image|max:2048',
            'doc_back' => 'image|max:2048',
            'agree' => 'required',
        ]);



        if (isset($request->id)) {

            $verification = KYCVerification::where('id', $request->id)->first();
        } else {
            $verification = new KYCVerification();
        }


        $previousDocFrontPath = $verification->doc_front ?? null;
        $previousDocBackPath = $verification->doc_back ?? null;

        if ($request->hasFile('doc_front') || $request->hasFile('doc_back')) {
            $docFrontPath = $previousDocFrontPath;
            $docBackPath = $previousDocBackPath;
        
            // Handling Front Document
            if ($request->hasFile('doc_front')) {
                $docFrontName = generateFileName($request->file('doc_front'), 'front');
                $docFrontMoved = moveFile($request->file('doc_front'), public_path('documents'), $docFrontName);
                if ($docFrontMoved) {
                    $docFrontPath = 'documents/' . $docFrontName;
                    if (is_file(public_path($previousDocFrontPath))) {
                        unlink(public_path($previousDocFrontPath));
                    }
                } else {
                
        return redirect()->back()->with('del', "Error moving front document.");

                }
            }
        
            // Handling Back Document
            if ($request->hasFile('doc_back')) {
                $docBackName = generateFileName($request->file('doc_back'), 'back');
                $docBackMoved = moveFile($request->file('doc_back'), public_path('documents'), $docBackName);
                if ($docBackMoved) {
                    $docBackPath = 'documents/' . $docBackName;
                    if (is_file(public_path($previousDocBackPath))) {
                        unlink(public_path($previousDocBackPath));
                    }
                } else {
        return redirect()->back()->with('del', "Error moving front document.");

                }
            }
        }
        

        $verification->userid = Auth::user()->id;
        $verification->full_name = $data['full_name'];
        $verification->father_name = $data['father_name'];
        $verification->gender = $data['gender'];
        $verification->marital_status = $data['marital_status'];
        $verification->dob = $data['dob'];
        $verification->address = $data['address'];
        $verification->country = $data['country'];
        $verification->state = $data['state'];
        $verification->district = $data['district'];
        $verification->doc_no = $data['doc_no'];
        $verification->doc_type = $data['doc_type'];
        $verification->doc_back = $docBackPath ?? $previousDocFrontPath;
        $verification->doc_front = $docFrontPath ?? $previousDocBackPath;
        $verification->agree = $request->agree;
        $verification->status = 'pending';

        $save =  $verification->save();
        if ($save) {
            return redirect()->back()->with('mes', ' You Kyc data Send SuccessFull');
        }
        return redirect()->back()->with('del', 'Server Busy Try Again Later');
    }

    // Admin Logic 

public function kyc_complete()
{
    $data['title'] = " KYC Completed";
    $data['kcm'] =KYCVerification::where('status', 'active')->orderBy('created_at', 'desc')->get();
    return  view('admin.kyc.complete',$data);
} 

public function kyc_pending()
{
    $data['title'] = " KYC Completed";
    $data['kcm'] =KYCVerification::where('status', 'pending')->orderBy('created_at', 'desc')->get();
    return  view('admin.kyc.pending',$data);
} 



public function kyc_show($id, $status)
{
    $id = decrypt($id);
    $status = decrypt($status);
    $data['title'] = 'User Kyc Deatials';
$data['kyc']  = KYCVerification::where('id',$id)->where('status',$status)->first();
if(!empty($data['kyc']))
{
return view('admin.kyc.index',$data);
}
else
{
    return redirect()->back()->with('del', 'No User Found !');

}
}
public function kyc_update($id, $status)
{
    try {
        $id = decrypt($id);
        $status = decrypt($status);

        $kyc = KYCVerification::find($id);

        if (!$kyc || $kyc->status != $status) {
            return Redirect::back()->with('del', 'KYC record not found');
        }

        $newStatus = ($status == 'active') ? 'pending' : 'active';
        $kyc->status = $newStatus;
        $saved = $kyc->save();

        if ($saved) {
            $notification = new Notification();
            $notification->user_id = $kyc->userid;

            if ($newStatus == 'pending') {
                $notification->title = "Your KYC Rejected";
                $notification->body = "We regret to inform you that your recent KYC submission has been rejected. After careful review, we found that certain information provided did not meet our requirements or did not match the documentation provided.";
                $notification->save();
                return Redirect::route('kyc.pending')->with('mes', 'KYC status updated successfully');
            } else {
                $notification->title = "Your KYC Accepted";
                $notification->body = "We are pleased to inform you that your recent KYC submission has been accepted. After thorough review, we have verified the information provided and found it to be complete and accurate.";
                $notification->save();
                return Redirect::route('kyc.complete')->with('mes', 'KYC status updated successfully');
            }
        } else {
            return Redirect::back()->with('del', 'Failed to update KYC status');
        }
    } catch (\Exception $e) {
        return Redirect::back()->with('del', 'An error occurred: ' . $e->getMessage());
    }
}

}