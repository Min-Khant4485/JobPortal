<?php

namespace App\Providers;

use App\Contracts\CityInterface;
use App\Repositories\CityRepository;
use Illuminate\Support\ServiceProvider;

class RepositoriesServicesProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    // $this->app->bind(
    //     'App\Contracts\CityInterface',
    //     'App\Repositories\CityRepository',
    // );

    public function register(): void
    {
        // $this->app->bind(CityInterface::class, CityRepository::class);
        // $this->app->bind(
        //     'App\Contracts\CountryInterface',
        //     'App\Repositories\CountryRepository',
        // );
        // $this->app->bind(
        //     'App\Contracts\CityInterface',
        //     'App\Repositories\CityRepository',
        // );
        $this->app->bind(
            'App\Contracts\ExperienceInterface',
            'App\Repositories\ExperienceRepository',
        );
        // $this->app->bind(
        //     'App\Contracts\AcademicInterface',
        //     'App\Repositories\AcademicRepository',
        // );
        $this->app->bind(
            'App\Contracts\SkillCategoryInterface',
            'App\Repositories\SkillCategoryRepository',
        );
        $this->app->bind(
            'App\Contracts\CommonInterface',
            'App\Repositories\CommonRepository',
        );
        $this->app->bind(
            'App\Contracts\SkillsSetInterface',
            'App\Repositories\SkillsSetRepository',
        );
        $this->app->bind(
            'App\Contracts\JobSeekerSkillInterface',
            'App\Repositories\JobSeekerSkillRepository',
        );
        $this->app->bind(
            'App\Contracts\IndustryInterface',
            'App\Repositories\IndustryRepository',
        );
        $this->app->bind(
            'App\Contracts\EmployerInterface',
            'App\Repositories\EmployerRepository',
        );
        $this->app->bind(
            'App\Contracts\JobPostInterface',
            'App\Repositories\JobPostRepository',
        );
        $this->app->bind(
            'App\Contracts\UserInterface',
            'App\Repositories\UserRepository',
        );
        // $this->app->bind(
        //     'App\Contracts\UploadInterface',
        //     'App\Repositories\UploadRepository',
        // );
        $this->app->bind(
            'App\Contracts\JobApplicationInterface',
            'App\Repositories\JobApplicationRepository',
        );
        $this->app->bind(
            'App\Contracts\JobSeekerInterface',
            'App\Repositories\JobSeekerRepository',
        );
        $this->app->bind(
            'App\Contracts\CvUploadInterface',
            'App\Repositories\CvUploadRepository',
        );
        $this->app->bind(
            'App\Contracts\BaseInterface',
            'App\Repositories\BaseRepository',
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
