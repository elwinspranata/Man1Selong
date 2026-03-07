<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable = [
        'registration_number', 'full_name', 'nisn', 'gender', 
        'birth_place', 'birth_date', 'origin_school', 'phone', 
        'parent_name', 'address', 'status', 'notes'
    ];
}
