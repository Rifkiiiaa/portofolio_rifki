<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title', 'summary', 'stack', 'url', 'year'];

    protected $casts = [
        'stack' => 'array',
    ];
}
