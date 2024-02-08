<?php

namespace App\Models;

use App\DB\Core\DateTimeField;
use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class JobSeeker extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'position',
        'bio',
        'percentage'
    ];

    public function saveableFields(): array
    {
        return [
            'user_id' => IntegerField::new(),
            'position' => StringField::new(),
            'bio' => StringField::new(),
            'percentage' => StringField::new(),
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function experiences(): HasMany
    {
        return $this->hasMany(Experience::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function academics(): HasMany
    {
        return $this->hasMany(Academic::class);
    }

    public function jobseekerSkills(): HasMany
    {
        return $this->hasMany(JobseekerSkill::class);
    }
}
