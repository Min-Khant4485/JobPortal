<?php

namespace App\Models;

use App\DB\Core\IntegerField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobseekerSkill extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_seeker_id',
        'skills_set_id'
    ];

    public function saveableFields(): array
    {
        return [
            'job_seeker_id' => IntegerField::new(),
            'skills_set_id' => IntegerField::new(),
        ];
    }

    public function jobSeeker(): BelongsTo
    {
        return $this->belongsTo(JobSeeker::class);
    }

    public function skillsSet(): BelongsTo
    {
        return $this->belongsTo(SkillsSet::class);
    }
}
