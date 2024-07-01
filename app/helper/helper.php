<?php

use App\Models\General;
use App\Models\KYCDocument;
use App\Models\Notification;
use App\Models\Skill;
use App\Models\User;

use Illuminate\Support\Facades\Auth;

function skill($id)
{
    $skill = Skill::findOrFail($id);
    return $skill->name ?: ''; // Return the name or an empty string if the name is null
}


function doc_type($id)
{
    $name = KYCDocument::where('id',$id)->first();
    return $name->doc_type;
}

function general()
{
    return General::First();
}

function generateFileName($file,$name)
{
    $extension = $file->getClientOriginalExtension();
    $timestamp = time();
    $prefix = 'FR';

    return Auth::id().$prefix . '_' . $timestamp .$name. '.' . $extension;
}

function moveFile($file, $destinationDirectory, $fileName)
{
    if ($file->isValid()) {
        $file->move($destinationDirectory, $fileName);
        return true; 
    }
    
    return false; 
}

function notify($id)
{
    return Notification::where('user_id',$id)->where('read',0)->count();
}

function getnotify($id)
{
    $notifications = Notification::where('user_id', $id)
    ->orderBy('created_at', 'desc') // Assuming 'created_at' is the column indicating when the notification was created
    ->get();
    return $notifications;
}

function gettime($datetime) {
    $currentDatetime = new DateTime(); // Current date and time
    $givenDatetime = new DateTime($datetime); // Given date and time
    
    $interval = $currentDatetime->diff($givenDatetime);
    
    if ($interval->days > 0) {
        return $interval->days . " day" . ($interval->days > 1 ? "s" : "") . " ago";
    }
    
    if ($interval->h > 0) {
        return $interval->h . " hour" . ($interval->h > 1 ? "s" : "") . " ago";
    }
    
    if ($interval->i > 0) {
        return $interval->i . " minute" . ($interval->i > 1 ? "s" : "") . " ago";
    }
    
    return "just now";
}


 function getUserName()
{

  return  User::where('id', auth()->id())->pluck('username')->first();

    
}