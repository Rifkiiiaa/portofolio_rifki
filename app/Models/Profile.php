<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'role', 'tagline', 'bio', 'photo',
        'cv_path', 'location', 'email', 'phone', 'socials',
    ];

    protected $casts = [
        'socials' => 'array',
    ];
}
