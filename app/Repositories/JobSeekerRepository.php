<?php

namespace App\Repositories;

use App\Models\JobSeeker;

class JobSeekerRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new JobSeeker();
    }
}
