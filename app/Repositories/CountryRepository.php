<?php

namespace App\Repositories;

use App\Models\Country;

class CountryRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Country();
    }
}
