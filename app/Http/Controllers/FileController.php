<?php

namespace App\Http\Controllers;

use App\Models\FileAttachment;
use Illuminate\Http\Response;

class FileController extends Controller
{
    public function show(FileAttachment $file)
    {
        return response(base64_decode($file->content), 200, [
            'Content-Type'  => $file->mime_type,
            'Content-Length' => $file->size,
        ]);
    }
}
