<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Usercontroller extends Controller
{
    public function home()
    {
        $data['title'] = "Home";
        return view('user.home',$data);
    }
    
}
