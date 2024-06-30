<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalDetail extends Model
{
    use HasFactory;

 protected $table = 'additional_details';
    protected $fillable = ['user_id','objective', 'about_us'];
}
