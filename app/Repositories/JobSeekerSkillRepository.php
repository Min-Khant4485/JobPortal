<?php

namespace App\Repositories;

use App\Contracts\JobSeekerSkillInterface;
use App\Db\Core\Crud;
use App\Models\JobseekerSkill;

class JobSeekerSkillRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new JobseekerSkill();
    }
}
