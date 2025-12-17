<?php

namespace App\Traits;


trait UploadTrait
{
    public function uploadImage($image, $directory)
    {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(storage_path('app/public/' . $directory), $imageName);
        return $directory . '/' . $imageName;
    }

    public function deleteImage($imagePath)
    {
        if (!$imagePath) {
            return;
        }
        $fullPath = storage_path('app/public/' . $imagePath);
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public function updateImage($newImage, $oldImagePath, $directory)
    {
        $this->deleteImage($oldImagePath);
        return $this->uploadImage($newImage, $directory);
    }
}
