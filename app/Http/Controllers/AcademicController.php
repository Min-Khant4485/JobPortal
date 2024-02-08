<?php

namespace App\Http\Controllers;

use App\Contracts\AcademicInterface;
use App\Http\Requests\AcademicRequest;
use App\Models\Academic;
use App\Models\AcademicLevel;
use App\Models\AcadType;
use Illuminate\Http\Request;

class AcademicController extends Controller
{
    private  $academicInterface;
    public function __construct(AcademicInterface $academicInterface)
    {
        $this->academicInterface = $academicInterface;
    }

    public function index()
    {
        $academics = $this->academicInterface->all();
        foreach ($academics as $academic) {
            $acadType = $academic->acad_type;
        }
        return view('academics.index', [
            'academics' => $this->academicInterface->all(),
        ]);
    }

    public function create()
    {
        return view('academics.create', [
            'acad_types' => AcademicLevel::all()->toArray()
        ]);
    }

    public function store(AcademicRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['job_seeker_id'] = auth()->user()->jobSeeker->id;
        $academic = $this->academicInterface->store('Academic', $validatedData);
        if (!$academic) {
            return redirect()->back()
                ->with('error', 'Academic details cannot be stored.');
        }
        return redirect()->route('jobseekers.index')
            ->with('success', 'Profile created successfully.');
    }

    // public function show(int $id)
    // {
    //     $academic = $this->academicInterface->findByID('Academic', $id);

    //     return view('academics.show', [
    //         'academic' => $academic,
    //     ]);
    // }

    public function edit($id)
    {
        $academic = $this->academicInterface->findByID('Academic', $id);
        if (!$academic) {
            return redirect()->route('academics.index')
                ->with('Error');
            //  return "City cannot be stored";
        }
        foreach ($academic as $acad) {
            return view('academics.edit', [
                // 'acad_types' => EduType::all()->toArray(),
                'academic' => $acad,
                'acad_types' => AcadType::all()->toArray(),
                'acad_type' => $acad->acad_type
            ]);
        }
    }

    public function update(AcademicRequest $request, int $id)
    {
        $validatedData = $request->validated();
        $academic = $this->academicInterface->findByID('Academic', $id);

        if (!$academic) {
            return redirect()->back()
                ->with('error', 'Academic details cannot be stored.');
        }
        $this->academicInterface->update('Academic', $validatedData, $id);
        return redirect()->route('jobseekers.index')
            ->with('success', 'Academic updated successfully.');
    }

    public function destroy(Academic $academic, int $id)
    {
        $academic = $this->academicInterface->findByID('Academic', $id);

        $academic = $this->academicInterface->delete('Academic', $academic->id);
        return redirect()->route('academics.index')
            ->with('success', 'Academic details deleted successfully.');
    }
}
