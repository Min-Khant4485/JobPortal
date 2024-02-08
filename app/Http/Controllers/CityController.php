<?php

namespace App\Http\Controllers;

use App\Contracts\BaseInterface;
use App\Contracts\CityInterface;
use App\Contracts\CountryInterface;
use App\Http\Requests\CityRequest;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CityController extends Controller
{
    private  $cityInterface;
    private  $countryInterface;
    public function __construct(BaseInterface $cityInterface, $countryInterface)
    {
        $this->cityInterface = $cityInterface;
        $this->countryInterface = $countryInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = $this->cityInterface->all('City');

        return view(
            'admin.city',
            [
                'cities' => $cities
            ]
        );
    }

    public function create()
    {
        return view('cities.create', [
            'cities' => $this->cityInterface->all('City')
        ]);
    }

    public function store(CityRequest $request)
    {
        $validatedData = $request->validated();
        $city = $this->cityInterface->store('City', $validatedData);
        if (!$city) {
            return redirect()->route('admin.index')
                ->with('Error');
            //  return "City cannot be stored";
        }
        return redirect()->route('cities.index')
            ->with('success', 'City created successfully.');
    }

    public function edit($id)
    {
        $city = $this->cityInterface->findByID('City', $id);
        if (!$city) {
            return redirect()->route('cities.index')
                ->with('Error');
            //  return "City cannot be stored";
        }
        foreach ($city as $c) {
            return view('cities.edit', [
                'city' => $c,
                'countries' => $this->countryInterface->all('City'),
                'country' => $c['country']
            ]);
        }
    }

    public function update(CityRequest $request, $id)
    {
        $validatedData = $request->validated();
        $city = $this->cityInterface->findByID('City', $validatedData, $id);

        if (!$city) {
            return redirect()->back()
                ->with('error', 'City cannot be stored.');
        }
        $this->cityInterface->update('City', $validatedData, $id);

        return redirect()->route('cities.index')
            ->with('success', 'City updated successfully.');
    }

    public function show(City $city)
    {
        // $city = $this->cityInterface->all();
        //     return view('admin.city', [
        //         'city' => $city
        //     ]);
    }

    public function destroy($id)
    {
        $city_id = $this->cityInterface->findByID('City', $id);
        if (!$city_id) {
            return redirect()->back()
                ->with('error', 'City cannot be destroyed.');
        }
        $this->cityInterface->delete('City', $id);
        return redirect()->route('cities.index')
            ->with('success', 'City was deleted successfully.');
    }
}
