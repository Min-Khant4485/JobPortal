<?php

namespace App\Repositories;


use App\Models\JobseekerSkill;

class JobSeekerSkillRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new JobseekerSkill();
    }
}
