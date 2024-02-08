<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\BaseInterface;

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
}
