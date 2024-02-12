<?php

namespace App\Repositories;

use App\Models\Upload;

class UploadRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Upload();
    }
    // public function store(string $modelName, array $data)
    // {
    //     $model = $this->getModelInstance($modelName);
    //     $this->handleImageLogic($model, $data);
    //     dd("ehllo");
    //     return parent::store($modelName, $data);
    // }

    // public function update(string $modelName, array $data, int $id)
    // {
    //     $model = $this->getModelInstance($modelName);
    //     $this->handleImageLogic($model, $data);
    //     return parent::update($modelName, $data, $id);
    //}
}
