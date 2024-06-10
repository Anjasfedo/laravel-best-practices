<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class UploadService
{
    public function handleUploadedFile(?UploadedFile $file, $directory = 'temp', $disk = 'public'): ?string
    {
        if (is_null($file)) {
            return null; // No file uploaded
        }

        // Generate a unique filename
        $filename = uniqid() . '.' . $file->getClientOriginalExtension();

        // Store the file in the specified directory within the specified disk
        $storedPath = $file->storeAs($directory, $filename, $disk);

        // Return the relative path to the stored file
        return $storedPath;
    }
}
