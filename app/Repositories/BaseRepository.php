<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\BaseInterface;
use App\Models\Upload;

class BaseRepository implements BaseInterface
{
    public function all(string $modelName = null)
    {
        $modelInstance = $this->getModelInstance($modelName);
        return $modelInstance->paginate(10);
    }

    public function findByID(string $modelName, int $id)
    {
        return $this->getModelInstance($modelName)->findOrFail($id);
    }

    public function store(string $modelName, array $data)
    {
        // dd("hello");
        // dd($modelName, $data);
        return (new Crud($this->getModelInstance($modelName), $data, null, false, false))->execute();
    }

    public function update(string $modelName, array $data, int $id)
    {
        return (new Crud($this->getModelInstance($modelName), $data, $id, true, false))->execute();
    }

    public function delete(string $modelName, int $id)
    {
        return (new Crud($this->getModelInstance($modelName), null, $id, false, true))->execute();
    }

    protected function getModelInstance(string $modelName)
    {
        return app("App\\Models\\{$modelName}");
    }
    // protected function handleImageLogic($model, array &$data)
    // {
    //     if ($model instanceof Upload) {
    //         dd('ehllo');
    //         // Handle image-related logic here
    //         $data['upload_url'] = $data['upload_url']; // Adjust as needed
    //     }
    // }
}
