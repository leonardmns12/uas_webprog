<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function retrieveImage($filePath) {
        $realpath = '/images/'.$filePath;
        if (!Storage::disk('local')->exists($filePath)){
            abort('404'); 
        } 
        return response()->file(storage_path('app'.DIRECTORY_SEPARATOR.($filePath)));
    }
}
