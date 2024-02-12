<?php

namespace App\Repositories;

use App\Models\Country;
use App\Models\Industry;

class CountryRepository implements BaseRepository
{

    protected function getModelInstance(string $modelName)
    {
        return new Country();
    }
}
