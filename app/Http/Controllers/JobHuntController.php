<?php

namespace App\Http\Controllers;

use App\Models\Common;
use App\Models\Currency;
use App\Models\JobPost;
use Illuminate\Http\Request;
use App\Http\Requests\JobApplicationRequest;
use Illuminate\Validation\Rule;
use App\Contracts\JobApplicationInterface;
use App\Contracts\BaseInterface;
use App\Models\JobApplication;

class JobHuntController extends Controller
{
    private $jobapplicationInterface;
    public function __construct(BaseInterface $jobapplicationInterface)
    {
        $this->jobapplicationInterface = $jobapplicationInterface;
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $jobapplications = JobApplication::where('user_id', $userId)->get();
        $jobposts = JobPost::with('employer')->get();
        return view('job_hunts.index', [
            'jobapplications' => $jobapplications,
            'jobposts' => $jobposts,
        ]);
    }

    public function create($id)
    {
        $jobpost = JobPost::find($id);
        return view('job_hunts.create', [
            'jobpost' => $jobpost,
            'currency' => Common::getCurrency(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = [
            'user_id' => auth()->user()->id,
            'job_post_id' => $request->input('job_post_id'),
        ];
        $jobApplication = $this->jobapplicationInterface->store('JobApplication', $validatedData);
        if (!$jobApplication) {
            return redirect()->route('job_hunts.index')->with('error', 'Job application cannot be submitted');
        }
        return redirect()->route('job_hunts.index')->with('success', 'Job application submitted.');
    }

    public function destroy($id)
    {
        $jobapplication = $this->jobapplicationInterface->findByID('JobApplication', $id);
        if (!$jobapplication) {
            return redirect()->route('job_hunts.index')
                ->with('error', 'Job application not found.');
        }
        $this->jobapplicationInterface->delete('JobApplication', $id);
        return redirect()->route('job_hunts.index')
            ->with('success', 'Job application deleted successfully.');
    }
}
