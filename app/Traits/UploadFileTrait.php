<?php


namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Str;
trait UploadFileTrait
{
    public function uploadFileTrait($request, $fieldName, $folderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $fileHash = Str::random(12) . '_feature.' . $extension;
            $filePath = $request->file($fieldName)->storeAs(
                'public/' . $folderName . '/' . auth()->user()->id, $fileHash
            );
            return $data = [
                'file_name' => $filename,
                'file_path' => Storage::url($filePath),
            ];
        }
        return null;

    }

    public function uploadFileTraitMultiple($file, $folderName)
    {
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $fileHash = Str::random(12) . '_detail.' . $extension;
        $filePath = $file->storeAs(
            'public/' . $folderName . '/' . auth()->user()->id, $fileHash
        );
        return $data = [
            'file_name' => $filename,
            'file_path' => Storage::url($filePath),
        ];


    }

}
