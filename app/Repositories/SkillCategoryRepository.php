<?php

namespace App\Repositories;

use App\Contracts\SkillCategoryInterface;
use App\Db\Core\Crud;
use App\Models\SkillCategory;

class SkillCategoryRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new SkillCategory();
    }
}
