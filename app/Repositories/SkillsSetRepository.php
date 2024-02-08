<?php

namespace App\Repositories;

use App\Contracts\SkillsSetInterface;
use App\Db\Core\Crud;
use App\Models\Experience;
use App\Models\SkillsSet;

class SkillsSetRepository implements SkillsSetInterface
{
    public function all()
    {
        return SkillsSet::paginate(10);
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
