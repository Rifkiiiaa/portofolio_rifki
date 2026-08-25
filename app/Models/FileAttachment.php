<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FileAttachment extends Model
{
    protected $fillable = ['name', 'mime_type', 'size', 'content'];

    protected $hidden = ['content'];
}
