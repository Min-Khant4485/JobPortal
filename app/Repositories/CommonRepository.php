<?php

namespace App\Repositories;

use App\Db\Core\Crud;
use App\Models\Common;
use App\Contracts\CommonInterface;

class CommonRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Common();
    }
}
