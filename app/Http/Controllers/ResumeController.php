<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalDetail; // Ensure you have created this model
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class ResumeController extends Controller
{
  public function  ResumePersonalDeaitals()
  {
    $data['kyc'] = PersonalDetail::where('userid', Auth::user()->id)->first();

    return view('user.resume.personal',$data);
  }
  public function ResumePersonalDeaitalsSave(Request $request)
  {

    $data = $request->validate([
      'full_name' => 'required|string|max:255',
      'father_name' => 'required|string|max:255',
      'gender' => 'required|string|in:male,female,other',
      'marital_status' => 'required|string|in:single,married,divorced,widowed',
      'dob' => 'required|date|before:today',
      'country' => 'required|string|max:255',
      'state' => 'required|string|max:255',
      'district' => 'required|string|max:255',
      'address' => 'required|string|max:1000',
  ]);

      if($request->id)
      {
        $personalDetail =  PersonalDetail::find($request->id);

      }else
      {
      $personalDetail = new PersonalDetail();
      }
      $personalDetail->userid = Auth::user()->id;

      $personalDetail->full_name = $request->input('full_name');
      $personalDetail->father_name = $request->input('father_name');
      $personalDetail->gender = $request->input('gender');
      $personalDetail->marital_status = $request->input('marital_status');
      $personalDetail->dob = $request->input('dob');
      $personalDetail->country = $request->input('country');
      $personalDetail->state = $request->input('state');
      $personalDetail->district = $request->input('district');
      $personalDetail->address = $request->input('address');
      
      // Save the record to the database
      $personalDetail->save();

      // Return a success response
      return redirect()->back()->with('mes', ' data saved  SuccessFull');
  }

}