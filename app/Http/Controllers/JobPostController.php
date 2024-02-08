<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;

use App\Http\Requests\JobPostRequest;
use App\Models\City;
use App\Models\Common;
use App\Models\Country;
use App\Models\Employer;
use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Support\Facades\Auth;

class JobPostController extends Controller
{
    private  $jobpostInterface;
    public function __construct(BaseInterface $jobpostInterface)
    {
        $this->jobpostInterface = $jobpostInterface;
    }

    public function index()
    {

        $employer_id = Employer::where('user_id', auth()->user()->id)->value('id');

        $jobposts = JobPost::where('employer_id', $employer_id)->get();


        return view('jobposts.index', [
            'jobposts' => $jobposts,
        ]);
    }

    public function show(JobPost $jobpost)
    {
        return view(
            'jobposts.show',
            [
                'jobpost' => $jobpost->load('employer.jobposts')
            ]
        );
    }

    public function create()
    {
        $job_statuses = Common::getJobPostStatus()->whereIn('id', [33]);

        return view('jobposts.create', [
            'currencies' => Common::getCurrency(),
            'countries' => Country::all(),
            'cities' => City::all(),
            'job_types' => Common::getJobType(),
            'job_statuses' => $job_statuses
        ]);
    }

    public function store(JobPostRequest $request)
    {
        $validatedData = $request->validated();
        $employer = Employer::where('user_id', auth()->user()->id)->first();

        $validatedData['employer_id'] = $employer->id;
        // dd($validatedData);
        $jobPost = $this->jobpostInterface->store('JobPost', $validatedData);
        if (!$jobPost) {
            return redirect()->route('jobposts.index')
                ->with('Error');
            return "JobPost cannot be stored";
        }
        return redirect()->route('jobposts.index')
            ->with('success', 'Job created successfully.');
    }

    public function edit($id)
    {
        $job_statuses = Common::getJobPostStatus()->whereIn('id', [33, 32]);
        $jobPost = JobPost::find($id);
        // $this->authorize('update', $jobPost);
        return view('jobposts.edit', [
            'jobpost' => $jobPost,
            'currencies' => Common::getCurrency(),
            'countries' => Country::all(),
            'cities' => City::all(),
            'job_types' => Common::getJobType(),
            'job_statuses' => $job_statuses,
            'currency' => $jobPost->currency,
            'city' => $jobPost->city_id,
            'job_type' => $jobPost->job_type,
            'job_status' => $jobPost->job_status
        ]);
    }

    public function update(JobPostRequest $request, $id)
    {
        // dd($request->all());
        $jobPost = $this->jobpostInterface->findByID('JobPost', $id);
        if (!$jobPost) {
            return redirect()->route('jobposts.index')
                ->with('error', 'Job post not found.');
        }
        $validatedData = $request->validated();
        $this->jobpostInterface->update('JobPost', $validatedData, $id);

        return redirect()->route('jobposts.index')
            ->with('success', 'Job Updated Successfully.');
    }

    public function destroy($id)
    {
        $jobpost = $this->jobpostInterface->findByID('JobPost', $id);
        if (!$jobpost) {
            return redirect()->route('jobposts.index')
                ->with('error', 'Job post not found.');
        }
        $this->jobpostInterface->delete('JobPost', $id);
        return redirect()->route('jobposts.index')
            ->with('success', 'Job post deleted successfully.');
    }
}
