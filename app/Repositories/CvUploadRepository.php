<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\CvUploadInterface;
use App\Models\Upload;

class CvUploadRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Upload();
    }
}
