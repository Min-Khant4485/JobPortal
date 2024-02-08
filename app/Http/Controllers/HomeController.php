<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Common;
use App\Models\Industry;
use App\Models\JobApplication;
use App\Models\JobPost;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $jobApplication = $user ? JobApplication::where('user_id', $user->id)->where('appl_status', '34')->latest()->first() : null;

        $job_close = $user ? JobApplication::where('user_id', $user->id)->where('appl_status', '39')->latest()->first() : null;

        return view('home', [
            'sliders' => Slider::all(),
            'cities' => City::all(),
            'industries' => Industry::all(),
            'currency' => Common::getCurrency(),
            'jobposts' => JobPost::latest()->take(4)->get(),
            'jobApplication' => $jobApplication,
            'job_close' => $job_close

        ]);
    }

    public function team()
    {
        return view('team');
    }
    public function aboutus()
    {
        return view('aboutus');
    }

    public function dashboard()
    {
        return view('admin.index');
    }
}
