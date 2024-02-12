<?php

namespace App\Repositories;


use App\Models\User;


class UserRepository implements BaseRepository
{
    protected function getModelInstance(string $modelName)
    {
        return new User();
    }
}
