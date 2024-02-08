<?php

namespace App\Http\Controllers;

use App\Contracts\SkillCategoryInterface;
use App\Http\Requests\SkillCategoryRequest;
use Illuminate\Http\Request;

class SkillCategoryController extends Controller
{
    private $skillCategoryInterface;
    public function __construct(SkillCategoryInterface $skillCategoryInterface)
    {
        $this->skillCategoryInterface = $skillCategoryInterface;
    }

    public function index()
    {
        return view('skill_categories.index', [
            'skillCategories' => $this->skillCategoryInterface->all()
        ]);
    }

    public function create()
    {
        return view('skill_categories.create');
    }

    public function store(SkillCategoryRequest $request)
    {
        $validatedData = $request->validated();
        $skillCategory = $this->skillCategoryInterface->store('SkillCategory', $validatedData);
        if (!$skillCategory) {
            return redirect()->back()
                ->with('error', 'SkillCategory cannot be stored.');
        } else {
            return redirect()->route('skill_categories.index')
                ->with('success', 'SkillCategory is created successfully.');
        }
    }

    public function show($id)
    {
        return view('industries.show', [
            // 'industry' => Industry::findOrFail($id),
            'industry' => $this->skillCategoryInterface->findByID('SkillCategory', $id)
        ]);
    }

    public function edit($id)
    {
        $skillCategory = $this->skillCategoryInterface->findByID('SkillCategory', $id);
        foreach ($skillCategory as $category) {
            return view('skill_categories.edit', [
                'skillCategory' => $category
            ]);
        }
    }

    public function update(SkillCategoryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $skillCategory = $this->skillCategoryInterface->findByID('SkillCategory', $id);
        // dd($skillCategory);
        if (!$skillCategory) {
            return redirect()->back()
                ->with('error', 'SkillCategory cannot be updated.');
        }
        $this->skillCategoryInterface->update('SkillCategory', $validatedData, $id);
        return redirect()->route('skill_categories.index')
            ->with('success', 'SkillCategory updated successfully.');
    }


    public function destroy($id)
    {
        // $industry = Industry::findOrFail($id);
        // Industry::findOrFail($id)->delete();

        $skillCategoryId = $this->skillCategoryInterface->findByID('SkillCategory', $id);

        if (!$skillCategoryId) {
            return redirect()->back()
                ->with('error', 'SkillCategory cannot be deleted.');
        }
        $this->skillCategoryInterface->delete('SkillCategory', $id);
        return redirect()->route('skill_categories.index')
            ->with('success', 'SkillCategory is deleted successfully.');
    }
}
