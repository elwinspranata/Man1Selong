<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentStatistic extends Model
{
    protected $fillable = [
        'academic_year',
        'grade_level',
        'male_count',
        'female_count',
    ];

    public function getTotalCountAttribute()
    {
        return $this->male_count + $this->female_count;
    }
}
