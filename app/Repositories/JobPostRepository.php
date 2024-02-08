<?php

namespace App\Repositories;

use App\Models\JobPost;

class JobPostRepository extends BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new JobPost();
    }
}
