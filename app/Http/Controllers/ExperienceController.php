<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use App\Contracts\ExperienceInterface;
use App\Http\Requests\ExperienceRequest;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    private  $experienceInterface;
    public function __construct(BaseInterface $experienceInterface,)
    {
        $this->experienceInterface = $experienceInterface;
    }
    public function index()
    {
        return view('experiences.index', [
            'experiences' => $this->experienceInterface->all()
        ]);
    }

    public function create()
    {
        return view('experiences.create');
    }

    public function store(ExperienceRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['job_seeker_id'] = auth()->user()->jobSeeker->id;
        $experience = $this->experienceInterface->store('Experience', $validatedData);

        if (!$experience) {
            return redirect()->back()->with('error', 'Creating Experience is Failed.');
        }
        return redirect()->route('jobseekers.index')
            ->with('success', 'Experience created successfully.');
    }

    public function edit(Request $request, $id)
    {
        $experience = Experience::find($id);
        return view('experiences.edit', [
            'experience' => $experience
        ]);
    }

    public function update(ExperienceRequest $request, $id)
    {
        $validatedData = $request->validated();
        $experience = $this->experienceInterface->findByID('Experience', $id);

        if (!$experience) {
            return redirect()->back()->with('error', 'Experience Updating is Failed');
        }

        $this->experienceInterface->update('Experience', $validatedData, $id);
        return redirect()->route('jobseekers.index')
            ->with('success', 'Experience updated successfully.');
    }

    public function destroy($id)
    {
        $experience = $this->experienceInterface->findByID('Experience', $id);

        if (!$experience) {
            return redirect()->back()->with('error', 'Experience Deletion was Failed');
        }
        return redirect()->route('jobseekers.index')->with('success', 'Experience was deleted successfully');



        // // $experience = Experience::find($id);
        // Experience::find($id)->delete();

        // return redirect()->route('jobseekers.index')
        //     ->with('success', 'Experience deleted successfully.');
    }
}
