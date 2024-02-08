<?php

namespace App\Models;

use App\DB\Core\DateTimeField;
use App\DB\Core\IntegerField;
use App\DB\Core\StringField;
use DateTime;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\BelongsToManyRelationship;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder as QueryBuilder;

class JobPost extends Model
{
    use HasFactory;

    // protected $table = 'job_posts';
    // public static $jobstatus = ['Opened', 'Closed'];

    protected $fillable = [
        'job_title',
        'description',
        'requirement',
        'currency',
        'salary',
        'job_type',
        'closing_date',
        'job_status',
        'city_id',
        // 'skills_set_id',
        'employer_id'
    ];

    public function saveableFields(): array
    {
        return [
            'job_title' => StringField::new(),
            'description' => StringField::new(),
            'requirement' => StringField::new(),
            'currency' => IntegerField::new(),
            'salary' => StringField::new(),
            'job_type' => IntegerField::new(),
            'closing_date' => DateTimeField::new(),
            'job_status' => StringField::new(),
            'city_id' => IntegerField::new(),
            // 'skills_set_id' => IntegerField::new(),
            'employer_id' => IntegerField::new(),
        ];
    }

    // public function employer()
    // {
    //     return $this->belongsTo(Employer::class, 'employer_id');
    // }


    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function jobApplications(): HasMany
    {
        return $this->hasMany(JobApplication::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function common(): BelongsTo
    {
        return $this->belongsTo(Common::class);
    }

    // public static function getCurrency($jobpost)
    // {
    //     $currency = Currency::where('id', $jobpost->currency)->first();
    //     return $currency->details;
    // }

    // public static function getJobType($jobpost)
    // {
    //     $job_type = JobType::where('id', $jobpost->job_type)->first();
    //     return $job_type->details;
    // }

    public function scopeFilter(Builder | QueryBuilder $query, array $filters): Builder | QueryBuilder
    {
        return $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where('job_title', 'like', '%' . $search . '%')
                ->orWhereHas('employer.user', function ($query) use ($search) {
                    $query->where('company_name', 'like', '%' . $search . '%');
                });
        })->when($filters['industry_id'] ?? null, function ($query, $industry) {
            $query->whereHas('employer.industry', function ($query) use ($industry) {
                $query->where('industry_id', $industry);
            });
        })->when($filters['city_id'] ?? null, function ($query, $city) {
            $query->whereHas('employer.jobPosts.city', function ($query) use ($city) {
                $query->where('city_id', $city);
            });
        });
    }

    public function hasUserApplied(Authenticatable|User|int $user): bool
    {
        // dd($user->jobApplications);
        return $this->where('id', $this->id)
            ->whereHas(
                'jobApplications',
                fn ($query) => $query->where('user_id', '=', $user->id ?? $user)
            )->exists();
    }
}
