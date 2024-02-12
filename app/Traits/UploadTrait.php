<?php

namespace App\Traits;

use App\Models\Upload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{
    public function storeImage($request, $linkId, $profile_genre, $interface): bool
    {
        if ($request->hasFile('upload_url')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $profile_genre;
            $images = $request->file('upload_url');
            $imageCount = is_array($images) ? count($images) : 1;

            if ($imageCount == 1) {
                $uploadedImage = $request->file('upload_url');
                // dd("hello");
                $image_data['upload_url'] = $uploadedImage->store('public/profile');
                
                return $interface->store('Upload', $image_data) ? true : false;
            }

            foreach ($images as $image) {
                $image_data['upload_url'] = $image;
                $interface->store('Upload', $image_data);
            }
            return true;
        }
    }



    public function updateImage($request, $linkId, $genre, $interface, $id): Model
    {
        if ($request->hasFile('upload_url')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $genre;
            $image_data['upload_url'] = $request->upload_url;
            return $interface->update('Upload', $image_data, $id);
            // $images = $request->file('upload_url');
            // $imageCount = is_array($images) ? count($images) : 1;
            // if ($imageCount == 1) {
            //     $image_data['upload_url'] = $request->upload_url;
            //     return $interface->update('Image', $image_data, $id);
            // }
            // foreach ($images as $image) {
            //     $image_data['upload_url'] = $image;
            //     $interface->update('Image', $image_data, $id);
            // }
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

    public function storeCV($request, $linkId, $cv_genre, $interface): bool
    {
        if ($request->hasFile('upload_cv')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $cv_genre;
            $images = $request->file('upload_cv');
            $imageCount = is_array($images) ? count($images) : 1;

            if ($imageCount == 1) {
                $uploadedImage = $request->file('upload_cv');
                $originalFileName = $uploadedImage->getClientOriginalName();
                $image_data['upload_url'] = $uploadedImage->storeAs('public/cv', $originalFileName);
                return $interface->store('Upload', $image_data) ? true : false;
            }

            return true;
        }
    }
    public function uploadCV($request, $linkId, $cv_genre, $interface, $id): bool
    {
        if ($request->hasFile('upload_cv')) {

            $file_data = [];
            $file_data['link_id'] = $linkId;
            $file_data['genre'] = $cv_genre;
            $file = $request->file('upload_cv');


            $originalFileName = $file->getClientOriginalName();
            $file_data['upload_url'] = $file->storeAs('public/cv', $originalFileName);

            // dd($image_data);
            return $interface->update('Upload', $file_data, $id) ? true : false;


            // dd('hello');
            return true;
        }
    }

    public function storeAlbums($request, $linkId, $album_genre, $interface): bool
    {
        if ($request->hasFile('upload_url')) {
            $image_data = [];
            $image_data['link_id'] = $linkId;
            $image_data['genre'] = $album_genre;
            $images = $request->file('upload_url');
            $imageCount = is_array($images) ? count($images) : 1;

            if ($imageCount == 1) {
                $uploadedImage = is_array($images) ? $images[0] : $images;
                $image_data['upload_url'] = $uploadedImage->store('public/album');
                return $interface->store('Upload', $image_data) ? true : false;
            }

            foreach ($images as $image) {
                $image_data['upload_url'] = $image->store('public/album');
                $interface->store('Upload', $image_data);
            }
            return true;
        }
    }
}
