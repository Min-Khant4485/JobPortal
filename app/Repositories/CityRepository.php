<?php

namespace App\Repositories;

use App\Models\City;

class CityRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new City();
    }
}
