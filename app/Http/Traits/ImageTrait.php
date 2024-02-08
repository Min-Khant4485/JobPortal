<?php

namespace App\Traits;

use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

trait ImageTrait
{
    public function storeImage($request, $linkId, $genre, $interface)
    {
        if ($request->hasFile('upload_url')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $genre;
            $images = $request->file('upload_url');
            $imageCount = is_array($images) ? count($images) : 1;
            if ($imageCount == 1) {
                $image_data['upload_url'] = $request->upload_url;
                return $interface->store('Upload', $image_data);
            }

            foreach ($images as $image) {
                $image_data['upload_url'] = $image;
                $interface->store('Upload', $image_data);
            }
        }
    }

    public function updateImage($request, $linkId, $genre, $interface, $id)
    {
        if ($request->hasFile('upload_url')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $genre;
            $images = $request->file('upload_url');
            $imageCount = is_array($images) ? count($images) : 1;
            if ($imageCount == 1) {
                $image_data['upload_url'] = $request->upload_url;
                return $interface->update('Upload', $image_data, $id);
            }
            foreach ($images as $image) {
                $image_data['upload_url'] = $image;
                $interface->update('Upload', $image_data, $id);
            }
        }
    }

    public function deleteImage($imageId)
    {
        $image = Upload::find($imageId);
        if (!$image) {
            return 'unsuccess';
        }
        Storage::delete($image->upload_url);
        return $image->delete() ? 'success' : 'unsuccess';
    }
}
