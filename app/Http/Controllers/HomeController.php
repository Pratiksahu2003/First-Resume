<?php

namespace App\Http\Controllers;

use App\Models\KYCVerification;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('user/home')->with('mes','Login Sucessfull');
    }

    public function admin_home()
    {
       $data['title'] = "Dashboard";
        $data['user']  = User::Where('status',1)->where('role','user')->count();
        $data['kpd']  = KYCVerification::Where('status','pending')->count();
        $data['kcm']  = KYCVerification::Where('status','active')->count();


        return view('admin.home',$data);

    } 

    public function notifications($id)
    {
        $notifications = Notification::find($id);
    
        if (!$notifications) {
            return response()->json(['error' => 'Notifications not found'], 404);
        }
        if($notifications->read == 0)
        {
        $notifications->markAsRead(); // Mark as read
        $notifications->refresh();
        }


        return response()->json($notifications);
    }

}
