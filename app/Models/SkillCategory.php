<?php

namespace App\Models;

use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SkillCategory extends Model
{
    use HasFactory;

    public function saveableFields(): array
    {
        return [
            'category_name' => StringField::new(),
        ];
    }

    public function skillsSets(): HasMany
    {
        return $this->hasMany(SkillsSet::class);
    }
}
