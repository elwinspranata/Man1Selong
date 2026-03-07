<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Extracurricular extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'excerpt',
        'content',
        'image',
        'schedule',
        'location',
        'is_active',
    ];
}
