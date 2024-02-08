<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Employer;
use App\Models\JobPost;
use App\Policies\EmployerPolicy;
use App\Policies\JobPostPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Employer::class => EmployerPolicy::class,
        // JobPost::class => JobPostPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
