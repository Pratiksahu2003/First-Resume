<?php

use App\Models\General;
use App\Models\KYCDocument;
use App\Models\Notification;




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

    return $prefix . '_' . $timestamp .$name. '.' . $extension;
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
    return Notification::where('user_id',$id)->get();
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


