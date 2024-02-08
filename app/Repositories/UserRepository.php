<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\UserInterface;
use App\Models\User;
use App\Models\Upload;

class UserRepository implements UserInterface
{
    public function all()
    {
        return User::paginate(10);
    }
    public function findByID(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return $model::where('id', $id)->get();
    }

    public function store(string $modelName, array $data)
    {
        $model = app("App\\Models\\{$modelName}");
        if (get_class($model) !== 'Upload') {
            return (new Crud($model, $data, null, false, false))->execute();
        }
        $crud = new Crud($model, $data, null, false, false);
        $crud->setImageDirectory('public/profile/', 'uploads');
        return $crud->execute();
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
