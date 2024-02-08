<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Blade;

class SkillsSet extends Model
{
    use HasFactory;

    protected $fillable = ['skill_cagtegory_id', 'skill_name'];

    public function saveableFields(): array
    {
        return [
            'skill_category_id' => IntegerField::new(),
            'skill_name' => StringField::new(),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobseekers(): HasMany
    {
        return $this->hasMany(JobSeeker::class);
    }

    public function skillCategory(): BelongsTo
    {
        return $this->belongsTo(SkillCategory::class);
    }

    public function jobseekerSkills(): HasMany
    {
        return $this->hasMany(JobseekerSkill::class);
    }
}
