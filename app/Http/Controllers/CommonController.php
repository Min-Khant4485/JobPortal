<?php

namespace App\Http\Controllers;

use App\Contracts\CommonInterface;
use App\Http\Requests\CommonRequest;
use App\Models\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    private  $commonInterface;
    public function __construct(CommonInterface $commonInterface,)
    {
        $this->commonInterface = $commonInterface;
    }

    public function index()
    {
        $commons = $this->commonInterface->all();

        return view(
            'admin.common',
            [
                'commons' => $commons
            ]
        );
    }

    public function create()
    {
        return view('commons.create');
    }

    public function store(CommonRequest $request)
    {
        $validatedData = $request->validated();
        $common = $this->commonInterface->store('Common', $validatedData);
        if (!$common) {
            return "Common cannot be stored";
        }
        return redirect()->route('commons.index')
            ->with('success', 'Common item created successfully.');
    }

    public function show(Common $common)
    {
        return view('commons.show', [
            'common' => $common
        ]);
    }

    public function edit(Common $common)
    {
        return view('commons.edit', [
            'common' => $common
        ]);
    }

    public function update(CommonRequest $request, $id)
    {
        $validatedData = $request->validated();
        $common = $this->commonInterface->findByID('Common', $validatedData, $id);

        if (!$common) {
            return "Common cannot be updated";
        }

        return redirect()->route('commons.index')
            ->with('success', 'Common item updated successfully.');
    }

    public function destroy(Common $common)
    {
        $common->delete();

        return redirect()->route('commons.index')
            ->with('success', 'Common item deleted successfully.');
    }

    // public function getCommonData()
    // {
    //     return [
    //         'currency' => Common::all()->whereIn('id', [18, 24, 25]),
    //         'acad_type' => Common::all()->whereIn('id', [41, 42, 43, 44, 45, 46, 47]),
    //         'job_type' => Common::all()->whereIn('id', [56,57,58,59,60])
    //     ];
    // }
}
