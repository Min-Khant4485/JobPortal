<?php

namespace App\Http\Controllers;

use App\Contracts\JobSeekerSkill_Interface;
use App\Contracts\JobSeekerSkillInterface;
use App\Contracts\SkillsSetInterface;
use App\Http\Requests\JobSeekerRequest;
use App\Http\Requests\JobSeekerSkillRequest;
use App\Models\JobseekerSkill;
use App\Models\SkillsSet;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobSeekerSkillController extends Controller
{
    private  $jobSeekerSkillInterface;
    private $skillsSetInterface;
    public function __construct(
        JobSeekerSkillInterface $jobSeekerSkillInterface,
        SkillsSetInterface $skillsSetInterface
    ) {
        $this->jobSeekerSkillInterface = $jobSeekerSkillInterface;
        $this->skillsSetInterface = $skillsSetInterface;
    }

    // public function create()
    // {
    //     return view('academics.create', [
    //         'skills_sets' => $this->skillsSetInterface->all()
    //     ]);
    // }

    public function store(JobSeekerSkillRequest $request)
    {
        // dd("hello");
        $validatedData = $request->validated();
        $validatedData['job_seeker_id'] = auth()->user()->jobSeeker->id;
        $jobSeekerSkill = $this->jobSeekerSkillInterface->store('JobseekerSkill', $validatedData);
        if (!$jobSeekerSkill) {
            return redirect()->route('jobseekers.index')
                ->with('Error');
        }
        // JobseekerSkill::create($validatedData);
        return redirect()->route('jobseekers.index')
            ->with('success', 'JobSeekerSkill created successfully.');
    }

    // public function show($id)
    // {
    //     return view('jobseeker_skills.show', compact('jobSeekerSkill'));
    // }

    // public function edit($id)
    // {
    //     return view('jobseekers.edit', compact('jobSeekerSkill'));
    // }

    public function update(JobSeekerSkillRequest $request, $id)
    {
        $validatedData = $request->validated();
        $jobSeekerSkill = $this->jobSeekerSkillInterface->findByID('JobseekerSkill', $id);
        if (!$jobSeekerSkill) {
            return redirect()->back()
                ->with('error', 'JobseekerSkill cannot be stored.');
        }
        $this->jobSeekerSkillInterface->update('JobseekerSkill', $validatedData, $id);

        return redirect()->route('jobseekers.index')
            ->with('success', 'JobSeekerSkill updated successfully');
    }

    public function destroy($id)
    {

        $this->jobSeekerSkillInterface->delete('JobseekerSkill', $id);
        return redirect()->route('jobseekers.index')
            ->with('success', 'JobSeekerSkill deleted successfully');
    }


    // // dd($id);
    // $id->delete();
    // // JobseekerSkill::findOrFail($id)->delete();

    // return redirect()->route('jobseeker_skills.index')
    //     ->with('success', 'JobSeekerSkill deleted successfully');

}
