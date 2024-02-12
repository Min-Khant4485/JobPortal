<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Contracts\AcademicInterface;
use App\Models\Academic;

class AcademicRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Academic();
    }
}
