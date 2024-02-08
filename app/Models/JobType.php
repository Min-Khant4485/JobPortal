<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Blade;

class JobType extends Model
{
    use HasFactory;

    // protected $table = 'job_types';

    // public function jobPosts(): HasMany
    // {
    //     return $this->hasMany(JobPost::class);
    // }

    // protected static function getJobType($jobposts)
    // {
    //     //pluck() is used to retrieve a single column's value
    //     $jobType = $jobposts->pluck('job_type')->unique();
    //     $jobTypes = JobType::whereIn('id', $jobType)->get();

    //     return $jobTypes;
    // }

}
