<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\CvUploadInterface;
use App\Models\Upload;

class CvUploadRepository implements CvUploadInterface
{
    public function all()
    {
        return Upload::paginate(10);
    }
    public function findByID(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return $model::where('id', $id)->get();
    }

    public function store(string $modelName, array $data)
    {
        $model = app("App\\Models\\{$modelName}");
        if (get_class($model) !== 'App\Models\Upload') {
            return (new Crud($model, $data, null, false, false))->execute();
        }
        $crud = new Crud($model, $data, null, false, false);
        $crud->setImageDirectory('public/cv/', 'App\Models\Upload');
        $data['upload_cv'] = $data['upload_url'];
        return $crud->execute();
    }



    public function update(string $modelName, array $data, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        if (get_class($model) !== 'App\Models\Upload') {
            return (new Crud($model, $data, $id, true, false))->execute();
        }
        $crud = new Crud($model, $data, $id, true, false);
        $crud->setImageDirectory('public/cv/', 'App\Models\Upload');
        return $crud->execute();
    }

    public function delete(string $modelName, int $id)
    {
        $model = app("App\\Models\\{$modelName}");
        return (new Crud($model, null, $id, false, true))->execute();
    }
}
