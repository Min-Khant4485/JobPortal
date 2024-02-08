<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\JobSeekerController;
use App\Http\Controllers\JobSeekerSkillController;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\JobHuntController;
use App\Http\Controllers\SkillCategoryController;
use App\Http\Controllers\SkillsSetController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('', fn () => to_route('home.index')); //for main page
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/aboutus', [HomeController::class, 'aboutus'])->name('aboutus');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

Auth::routes();

Route::resource('/home', HomeController::class);
Route::resource('/jobseekers', JobSeekerController::class)->except('show');

Route::get('/jobseekers/{user_id}/{job_post_id}', [JobSeekerController::class, 'show'])
    ->name('jobseekers.show');

// Route::get('/download', [UploadController::class, 'download'])->name('download');



//Admin Dashboard
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/city', [CityController::class, 'index'])->name('admin.city');
Route::get('/admin/country', [CountryController::class, 'index'])->name('admin.country');
Route::get('/admin/common', [CommonController::class, 'index'])->name('admin.common');
Route::get('/admin/industry', [IndustryController::class, 'index'])->name('admin.industry');
Route::get('/admin/jobpost', [JobPostController::class, 'index'])->name('admin.jobpost');


Route::get('/employer/register', 'App\Http\Controllers\Auth\RegisterController@showEmployerRegistrationForm')->name('employer.register');
Route::middleware('auth')->group(function () {
    Route::resource('/myjob_applications', MyJobApplicationController::class);
    Route::resource('/employers', EmployerController::class)
        ->only(['create', 'store']);
});

//Admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::resource('/users', UserController::class);
    Route::resource('/commons', CommonController::class);
    Route::resource('/countries', CountryController::class);
    Route::resource('/cities', CityController::class);
    Route::resource('/industries', IndustryController::class);
    Route::resource('/skillsets', SkillsSetController::class);
    Route::resource('/skill_categories', SkillCategoryController::class);
});

//Employer
Route::middleware(['auth:sanctum', 'employer'])->group(function () {
    Route::resource('/jobposts', JobPostController::class);
    Route::resource('/employers', EmployerController::class);
    Route::resource('job_hunts', JobHuntController::class);
    Route::resource('/job_hunts', JobHuntController::class);
    // Route::post('/cv-download/{$cv_id}', [UploadController::class, 'cvdownload'])->name('cvdownload');
});

// Jobseeker
Route::middleware(['auth:sanctum', 'jobseeker'])->group(function () {
    Route::resource('/job_hunts', JobHuntController::class);
    Route::resource('/jobseeker_skills', JobSeekerSkillController::class);
    Route::resource('/experiences', ExperienceController::class);
    Route::resource('/academics', AcademicController::class);
    Route::resource('/users', UserController::class);
});

Route::post('/cv-download/{cv_id}', [UploadController::class, 'cvdownload'])->name('cvdownload');
Route::put('/cv-update/{cv_id}', [UploadController::class, 'updateCvFile'])->name('updateCvFile');
Route::resource('/upload', UploadController::class);
