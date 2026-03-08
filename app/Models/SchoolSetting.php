<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolSetting extends Model
{
    protected $fillable = [
        'school_name', 'school_alias', 'logo',
        'principal_name', 'principal_photo', 'welcome_message', 
        'vision', 'mission', 'phone', 'email', 'address', 'map_url',
        'hero_title', 'hero_subtitle', 'hero_image',
        'history',
        'profile_image',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'tiktok_url',
        'ppdb_url',
        'ppdb_info',
        'ppdb_year',
        'ppdb_flow',
        'ppdb_requirements',
        'ppdb_status',
        'pengumuman_status',
    ];

    protected $casts = [
        'ppdb_flow' => 'array',
        'ppdb_requirements' => 'array',
        'pengumuman_status' => 'boolean',
    ];
}
