<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = [
        'full_name',
        'father_name',
        'gender',
        'marital_status',
        'dob',
        'country',
        'state',
        'district',
        'address',
    ];
}
