<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use App\Contracts\IndustryInterface;
use App\Http\Requests\IndustryRequest;
use Illuminate\Http\Request;

class IndustryController extends Controller
{
    private $industryInterface;
    public function __construct(BaseInterface $industryInterface)
    {
        $this->industryInterface = $industryInterface;
    }

    public function index()
    {
        $industries = $this->industryInterface->all('Industry');

        return view(
            'admin.industry',
            [
                'industries' => $industries
            ]
        );
    }

    public function create()
    {
        // return view('industries.create');
    }

    public function store(IndustryRequest $request)
    {
        // // dd('Hello');
        // $validatedData = $request->validate([
        //     'industry_name' => 'required|string|max:100',
        // ]);
        // // dd($validatedData);
        // Industry::create($validatedData);

        // return redirect()->route('industries.index')
        //     ->with('success', 'Industry created successfully.');

        $validatedData = $request->validated();
        $industry = $this->industryInterface->store('Industry', $validatedData);
        if (!$industry) {
            return redirect()->back()
                ->with('error', 'Industry cannot be stored.');
        } else {
            return redirect()->route('countries.index')
                ->with('success', 'Industry is created successfully.');
        }
    }

    public function show($id)
    {
        return view('industries.show', [
            // 'industry' => Industry::findOrFail($id),
            'industry' => $this->industryInterface->findByID('Industry', $id)
        ]);
    }

    public function edit($id)
    {
        $industry = $this->industryInterface->findByID('Industry', $id);
        foreach ($industry as $indust) {
            return view('industries.edit', [
                'industry' => $indust
            ]);
        }
    }

    public function update(IndustryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $industry = $this->industryInterface->findByID('Industry', $id);
        if (!$industry) {
            return redirect()->back()
                ->with('error', 'Industry cannot be updated.');
        }
        $this->industryInterface->update('Industry', $validatedData, $id);
        return redirect()->route('industries.index')
            ->with('success', 'Industry updated successfully.');
    }


    public function destroy($id)
    {
        // $industry = Industry::findOrFail($id);
        // Industry::findOrFail($id)->delete();

        $industry_id = $this->industryInterface->findByID('Industry', $id);

        if (!$industry_id) {
            return redirect()->back()
                ->with('error', 'Industry cannot be deleted.');
        }
        $this->industryInterface->delete('Industry', $id);
        return redirect()->route('industries.index')
            ->with('success', 'Industry is deleted successfully.');
    }
}
