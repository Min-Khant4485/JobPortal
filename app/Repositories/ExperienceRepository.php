<?php

namespace App\Repositories;

use App\Models\Experience;

class ExperienceRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new Experience();
    }
}
