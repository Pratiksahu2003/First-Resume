<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KYCVerification extends Model
{
    use HasFactory;
    protected $table = 'k_y_c_verifications';
    protected $fillable = [
        'userid',
        'full_name',
        'father_name',
        'gender',
        'marital_status',
        'dob',
        'address',
        'country',
        'state',
        'district',
        'doc_front',
        'doc_back',
        'agree',
    ];
    

}
