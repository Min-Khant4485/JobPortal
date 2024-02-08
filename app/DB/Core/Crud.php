<?php

namespace App\DB\Core;

use illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class Crud
{
    public function __construct(
        private Model $model,
        private ?array $data,
        private ?int $id,
        private $editMode,
        private $deleteMode,
    ) {
        $this->model = $model;
        $this->data = $data;
        $this->id = $id;
        $this->editMode = $editMode;
        $this->deleteMode = $deleteMode;
        self::$tableName = $model->getTable();
    }

    public static string $imageDirectory = '';
    public static string $tableName = '';
    private ?Model $record = null;

    public function setImageDirectory(string $directoryPath, string $tablename)
    {
        self::$imageDirectory = $directoryPath;
        self::$tableName = $tablename;
    }

    public function getData(string $model, string $id)
    {
        $modelInstance = new $model;
        return $modelInstance->findOrFail($id);
    }

    public function execute(): mixed
    {
        // dd("helo");
        try {

            if ($this->editMode) {
                return $this->handleEditMode();
            } elseif ($this->deleteMode) {
                return $this->handleDeleteMode();
            } else {
                return $this->handleStoreMode();
            }
        } catch (QueryException $e) {
            return response($e->getMessage());
        }
    }

    protected function iterateData(array $data, ?Model $record = null): Model
    {
        $target = $record ?? $this->model;
        foreach ($data as $column => $value) {
            $target->{$column} = $this->savableField($column)->setValue($value)->execute();
        }
        return $target;
    }

    protected function handleStoreMode(): Model
    {
        if ($this->data) {
            $model = $this->iterateData($this->data, null);
            return $model->save() ? $this->model : response(status: 500);
        }
    }

    protected function handleEditMode(): Model
    {
        $this->record = $this->model->findOrFail($this->id);
        if ($this->model->getTable() == 'uploads') {
            $this->deleteImage();
        }
        if ($this->data) {
            return $this->iterateData($this->data, $this->record)->save() ? $this->record : response(status: 500);
        }
    }

    protected function handleDeleteMode()
    {
        $this->record = $this->model->findOrFail($this->id);
        return $this->record->delete() ? true : false;
    }

    public function savableField($column)
    {
        return $this->model->saveableFields()[$column]; //new instance fil
    }

    public function deleteImage()
    {
        $old_image = $this->record->upload_url;
        Storage::delete($old_image);
    }

    public static function storeImage($value, $imageDirectory, $imageName)
    {
        $value->storeAs($imageDirectory, $imageName);
    }
}
