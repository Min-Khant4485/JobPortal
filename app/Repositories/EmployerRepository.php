<?php

namespace App\Repositories;

use App\Models\Employer;

class EmployerRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Employer();
    }
}

