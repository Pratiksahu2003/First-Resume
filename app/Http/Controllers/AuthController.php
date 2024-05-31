<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function registration()
    {
        return view('auth.registration');
    }

    public function submit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'm_no' => 'required|numeric|unique:users,m_no',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        $username = "RE" . rand(111111, 999999) . 'SUME';
    
        $user =  new User();

        $user->username = $username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->m_no = $request->m_no;
        $user->password = $request->password;
        $user->role  = "user";
    
        if ($user->save()) {
            $response = [
                'status' => 'success',
                'message' => 'Registration successful',
                'data' => $user->toArray(),
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Registration failed. Please try again.',
            ];
        }
        
            return response()->json($response);
        
    }
    public function auth(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'm_no' => $request->m_no,
            'password' => $request->password,
        ];
        
        
        if (Auth::attempt($credentials)) {
            return redirect('user/home')->with('mes','plz Try Again ');

        } else {
            return redirect()->back()->with('mes','plz Try Again ');
        }

        exit;
    }

   
public function logout()
{
    Auth::logout();

    return redirect('/'); 
}

    
}
