<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use App\Models\Common;
use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\Request;

class MyJobApplicationController extends Controller
{

    private $jobapplicationInterface, $jobpostInterface;
    public function __construct(BaseInterface $jobapplicationInterface, $jobpostInterface)
    {
        $this->jobapplicationInterface = $jobapplicationInterface;
        $this->jobpostInterface = $jobpostInterface;
    }

    public function index()
    {
        $jobApplications = $this->jobapplicationInterface->all('JobApplication');
        $jobPosts = $this->jobpostInterface->all('JobPost');

        return view(
            'myjob_applications.index',
            [
                'applications' => $jobApplications,
                'jobposts' =>   $jobPosts,
            ]
        );
    }

    public function show($id)
    {
        $jobpost = JobPost::where('id', $id)->select('job_title')->first();
        $applied_jobs = JobApplication::where('job_post_id', $id)
            ->with('user')
            ->get();
        return view('myjob_applications.show', [
            'applied_jobs' => $applied_jobs,
            'job_title'  => $jobpost->job_title
        ]);
    }
    public function edit($id)
    {
        $job_statuses = Common::getJobPostStatus()->whereIn('id', [32, 35, 37, 38, 39]);
        $applied_job = JobApplication::find($id);
        $jobpost = JobPost::where('id', $applied_job->job_post_id)->select('job_title')->first();
        return view('myjob_applications.edit', [
            'applied_job' => $applied_job,
            'job_statuses' => $job_statuses,
            'job_status' => $applied_job->appl_status,
            'job_title' => $jobpost->job_title

        ]);
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'appl_status'  => 'required|integer',
        ]);
        $jobApplication  = JobApplication::where('id', $id)->first();
        $validatedData['job_post_id'] = $jobApplication->job_post_id;
        $validatedData['user_id'] = $jobApplication->user_id;
        $this->jobapplicationInterface->update('JobApplication', $validatedData, $id);
        return redirect()->route('myjob_applications.show', $jobApplication->job_post_id)->with('success', 'Job status is successfully updated!');
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'appl_status'  => 'required|integer',
    //     ]);

    //     $jobApplication  = JobApplication::where('id', $id)->first();
    //     $validatedData['job_post_id'] = $jobApplication->job_post_id;
    //     $validatedData['user_id'] = $jobApplication->user_id;

    //     $this->jobapplicationInterface->update('JobApplication', $validatedData, $id);

    //     Mail::to($jobApplication->user->email)->send(new JobApplicationStatusUpdated());

    //     return redirect()->route('myjob_applications.show', $jobApplication->job_post_id)
    //         ->with('success', 'Job status is successfully updated! Email sent.');
    // }
}
