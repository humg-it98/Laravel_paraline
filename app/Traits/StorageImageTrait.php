<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


trait StorageImageTrait
{
    //
    public function storageTraitUpload(Request $request, $fieldName, $folderName)
    {

        if ($request->hasFile($fieldName)) {
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = str_random(12) . '.' . $file->getClientOriginalExtension();

            $filepath = $request->file($fieldName)->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);

            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filepath),
            ];
            return $dataUploadTrait;
        } else
            return null;
    }

    public function storageTraitUploadMultiple($file, $folderName)
    {

        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = str_random(12) . '.' . $file->getClientOriginalExtension();

        $filepath = $file->storeAs('public/' . $folderName . '/' . auth()->id(), $fileNameHash);

        $dataUploadTrait = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filepath),
        ];
        return $dataUploadTrait;
    }
}
