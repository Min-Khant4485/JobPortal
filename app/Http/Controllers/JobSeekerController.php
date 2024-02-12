<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use App\Contracts\JobSeekerInterface;
use App\Http\Requests\JobSeekerRequest;
use App\Models\Academic;
use App\Models\Common;
use App\Models\Experience;
use App\Models\JobApplication;
use App\Models\JobSeeker;
use App\Models\JobseekerSkill;
use App\Models\SkillsSet;
use App\Models\Upload;
use App\Models\User;
use Illuminate\Console\Application;
use Illuminate\Http\Request;

class JobSeekerController extends Controller
{
    protected $jobseekerInterface;
    public function __construct(BaseInterface $jobseekerInterface)
    {
        $this->jobseekerInterface = $jobseekerInterface;
        // $this->middleware('auth');
    }

    public function index()
    {
        $jobseeker = JobSeeker::where('user_id', auth()->user()->id)->first();

        $profile_image = Upload::where('link_id', auth()->user()->id)->where('genre', '=', '1')->latest()->first();

        $profile_cv = Upload::where('link_id', auth()->user()->id)->where('genre', '=', '3')->latest()->first();

        return view('jobseekers.index', [
            'user' => auth()->user(),
            'jobseeker' => $jobseeker,
            'experiences' => Experience::with('jobSeeker')
                ->where('job_seeker_id', $jobseeker->id)->get(),
            'academics' => Academic::with('jobSeeker')
                ->where('job_seeker_id', $jobseeker->id)->get(),
            'acad_types' => Common::getAcadType(),
            'upload' => Upload::select('upload_url')->where('genre', auth()->user()->role)->get(),
            'skills_sets' => SkillsSet::all(),
            'skills' => JobseekerSkill::with('skillsSet', 'jobSeeker')
                ->where('job_seeker_id', $jobseeker->id)->get(),
            'profile_image' => $profile_image,
            'profile_cv' => $profile_cv,
        ]);
    }

    public function create()
    {
        return view('jobseekers.create');
    }

    public function store(JobSeekerRequest $request)
    {
        $validatedData = $request->validated();
        if (!isset(auth()->user()->role)) {

            return redirect()->route('/login')->with('error', 'You have no permission');
        }
        auth()->user()->update($validatedData);
        $data['user_id'] = auth()->user()->id;

        $this->jobseekerInterface->store('JobSeeker', $data);

        return redirect()->route('jobseekers.index')
            ->with('success', 'Your employer account was created!');
    }

    public function show($user_id, $job_post_id)
    {
        $profile_image = Upload::where('link_id', $user_id)->where('genre', '1')->latest()->first();
        $profile_id = User::where('id', $user_id)->first();
        JobApplication::where('user_id', $user_id)
            ->where('job_post_id', $job_post_id)
            ->update(['appl_status' => 36]);

        $jobseeker = JobSeeker::where('user_id', $user_id)->first();
        $academic = Academic::where('job_seeker_id', $jobseeker->id)->first();
        $skills = JobseekerSkill::where('job_seeker_id', $jobseeker->id)->get();
        $experiences = Experience::where('job_seeker_id', $jobseeker->id)->get();

        $user_profile_cv = Upload::where('link_id', $user_id)->where('genre', '3')->latest()->first();

        return view('jobseekers.show', [
            'user' => $profile_id,
            'skills' => $skills,
            'academic' => $academic,
            'experiences' => $experiences,
            'profile_image' => $profile_image,
            'user_profile_cv' => $user_profile_cv
        ]);
    }

    public function edit($id)
    {
        $jobseeker = JobSeeker::findOrFail($id);

        // You may add additional authorization checks here

        return view('jobseekers.edit', [
            'jobseeker' => $jobseeker
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'bio' => 'required|string|max:1000'
        ]);
        $this->jobseekerInterface->update('JobSeeker', $validatedData, $id);

        return redirect()->route('jobseekers.index')
            ->with('success', 'Jobseeker bio updated successfully');
    }

    public function destroy($id)
    {
        // dd("hello");
        //     $skillsSet = $this->skillsSetInterface->findByID('SkillsSet', $id);
        //     if (!$skillsSet) {
        //         return redirect()->back()->with('error', 'SkillsSet is not found');
        //     }
        //     return redirect()->route('skillsets.index')->with('success', 'SkillsSet was deleted successfully');
    }
}
