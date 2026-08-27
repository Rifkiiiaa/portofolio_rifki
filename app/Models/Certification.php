<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $table = 'certifications';
    protected $fillable = ['name', 'issuer', 'date', 'credential_id', 'description', 'url', 'image'];
}
