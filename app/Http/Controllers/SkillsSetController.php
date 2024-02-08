<?php

namespace App\Http\Controllers;

use App\Contracts\SkillCategoryInterface;
use App\Contracts\SkillsSetInterface;
use App\Http\Requests\SkillsSetRequest;
use Illuminate\Http\Request;

class SkillsSetController extends Controller
{
    private  $skillsSetInterface;
    private $skillCategoryInterface;

    public function __construct(
        SkillsSetInterface $skillsSetInterface,
        SkillCategoryInterface $skillCategoryInterface
    ) {
        $this->skillsSetInterface = $skillsSetInterface;
        $this->skillCategoryInterface = $skillCategoryInterface;
    }

    public function index()
    {
        $skillSets = $this->skillsSetInterface->all();

        return view(
            'jobseekers.index',
            [
                'skillsets' => $skillSets
            ]
        );
    }

    public function create()
    {
        // $this->authorize('create', JobPost::class);
        return view('skillsets.create', [
            'skillsets' => $this->skillCategoryInterface->all()
        ]);
    }

    public function store(SkillsSetRequest $request)

    {
        // $this->authorize('create', JobPost::class);
        $validatedData = $request->validated();
        // dd($validatedData);
        $skillsSet = $this->skillsSetInterface->store('SkillsSet', $validatedData);

        if (!$skillsSet) {
            return redirect()->back()->with('error', 'SkillsSet cannot be created!');
        }
        return redirect()->route('skillsets.index')
            ->with('success', 'SkillsSet created successfully.');
    }

    public function edit($id)
    {
        $skillsSet = $this->skillsSetInterface->findByID('SkillsSet', $id);

        if (!$skillsSet) {
            return redirect()->route('skillsets.index')->with('error', 'SkillsSet not found');
        }

        return view('skillsets.edit', [
            'skillSet' => $skillsSet,
            'skillCategories' => $this->skillCategoryInterface->all(),
            'skillCategory' => $skillsSet->skillCategory, // Assuming skillCategory is a relationship
        ]);
    }


    public function update(SkillsSetRequest $request, $id)
    {
        $validatedData = $request->validated();
        $skillsSet = $this->skillsSetInterface->findByID('SkillsSet', $id);
        if (!$skillsSet) {
            return redirect()->back()->with('error', 'Skills cannot be updated!');
        }
        $this->skillsSetInterface->update('SkillsSet', $validatedData, $id);
        return redirect()->route('skillsets.index')->with('success', "SkillsSet was updated");
    }
    public function destroy($id)
    {
        $skillsSet = $this->skillsSetInterface->findByID('SkillsSet', $id);
        if (!$skillsSet) {
            return redirect()->back()->with('error', 'SkillsSet is not found');
        }
        return redirect()->route('skillsets.index')->with('success', 'SkillsSet was deleted successfully');
    }

    // public function destroy(SkillsSet $skillsSet)
    // {
    //     // dd($jobPost);
    //     $skillsSet->delete();
    //     return redirect()->route('skillsets.index')
    //         ->with('success', 'SkillsSet deleted.');
    // }
}
