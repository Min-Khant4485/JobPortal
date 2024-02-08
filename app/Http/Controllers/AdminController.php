<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\JobSeeker;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        // $this->authorize([User::class, Employer::class, JobApplication::class, JobPost::class, JobSeeker::class, Payment::class]);        
    }

    public function index()
    {
        return view('admin.index');
    }

    // public function show(User $user)
    // {
    //     $user = User::where('role', '=', 'Employer')->get();
    //     dd
    //     return view('components.table', ['user' => $user]);
    // }
}
