<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Models\Common;
use App\Contracts\CommonInterface;

class CommonRepository implements CommonInterface
{
    public function all()
    {
        return Common::paginate(10);
    }
    public function findByID(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return $model::where('id', $id)->get();
    }

    public function store(string $modelName, array $data)
    {
        $model = app("App\\Models\\{$modelName}");
        return (new Crud($model, $data, null, false, false))->execute();
    }

    public function update(string $modelName, array $data, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return (new Crud($model, $data, $id, true, false))->execute();
    }

    public function delete(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return (new Crud($model, null, $id, false, true))->execute();
    }
}
