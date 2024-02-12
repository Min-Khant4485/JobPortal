<?php

namespace App\Repositories;

use App\Models\Industry;

class IndustryRepository implements BaseRepository
{

    protected function getModelInstance(string $modelName)
    {
        return new Industry();
    }
}
