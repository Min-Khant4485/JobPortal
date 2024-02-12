<?php

namespace App\Repositories;

use App\Contracts\SkillsSetInterface;
use App\Db\Core\Crud;
use App\Models\Experience;
use App\Models\SkillsSet;

class SkillsSetRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new SkillsSet();
    }
}
