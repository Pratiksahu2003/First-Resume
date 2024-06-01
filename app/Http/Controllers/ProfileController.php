<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.profile');
    }

    public function view()
    {
        return view('user.profileView');
    }

  

    public function setting()
    {
        return view('user.password');
    }


  
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confirmPassword' => 'required|same:newPassword',
        ]);

        $user = Auth::user();

        if (!password_verify($request->currentPassword, $user->password)) {
            return back()->with('del', 'The current password is incorrect.');
        }

        $user->password = Hash::make($request->newPassword);
        $user->save();

      
        return redirect()->back()->with('mes', 'Your profile was updated successfully.');
    }

   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $user = User::findOrFail(Auth::user()->id);
    
        $request->validate([
            'name' => 'required|string|max:255',
            'm_no' => 'required|string|max:15',
            'gender' => 'required|string|max:10',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string',
            'profile_photo' => 'nullable|file|image|max:2048',
        ]);
    
        $previousProfilePhotoPath = $user->profile;
    
        if ($request->hasFile('profile_photo')) {
            $profilePhotoName = generateFileName($request->file('profile_photo'), 'Profile');
    
            $profilePhotoMoved = moveFile($request->file('profile_photo'), public_path('front/img/'), $profilePhotoName);
    
            if ($profilePhotoMoved) {
                $user->profile = $profilePhotoName;
    
                if (is_file(public_path($previousProfilePhotoPath))) {
                    unlink(public_path($previousProfilePhotoPath));
                }
            } else {
                return redirect()->back()->with('del', "Error moving profile photo.");
            }
        }
    
        $user->name = $request->name;
        $user->m_no = $request->m_no;
        $user->gender = $request->gender;
        $user->email = $request->email;
        $user->bio = $request->bio;
        $user->save();
    
        return redirect()->back()->with('mes', 'Your Password was updated successfully.');
    }
    


    


   
}
