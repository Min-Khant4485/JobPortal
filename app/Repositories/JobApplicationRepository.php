<?php

namespace App\Repositories;

use App\Models\JobApplication;

class JobPostRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new JobApplication();
    }
}
