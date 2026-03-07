<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    protected $fillable = ['title', 'slug', 'icon', 'description', 'schedule', 'location', 'image'];
}
