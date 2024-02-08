<?php

namespace App\Http\Controllers;

use App\Contracts\CountryInterface;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    protected $countryInterface;

    public function __construct(CountryInterface $countryInterface)
    {
        $this->countryInterface = $countryInterface;
    }

    public function index()
    {
        $countries = $this->countryInterface->all();

        return view(
            'admin.country',
            [
                'countries' => $countries
            ]
        );
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(CountryRequest $request)
    {
        $validatedData = $request->validated();
        $country = $this->countryInterface->store('Country', $validatedData);
        if (!$country) {
            return redirect()->back()
                ->with('error', 'Country cannot be stored.');
        } else {
            return redirect()->route('countries.index')
                ->with('success', 'Country is created successfully.');
        }
    }

    public function show(Country $country)
    {
        return view('countries.show', [
            'country' => $country
        ]);
    }

    public function edit(Country $country)
    {
        return view('countries.edit', [
            'country' => $country
        ]);
    }

    public function update(CountryRequest $request, $id)
    {
        $validatedData = $request->validated();
        $country = $this->countryInterface->findByID('Country', $id);

        if (!$country) {
            return redirect()->back()
                ->with('error', 'Country cannot be stored.');
        }
        $this->countryInterface->update('Country', $validatedData, $id);
        return redirect()->route('countries.index')
            ->with('success', 'Country updated successfully.');
    }

    public function destroy(Country $country)
    {
        $this->countryInterface->delete('Country', $country->id);

        return redirect()->route('countries.index')
            ->with('success', 'Country deleted successfully.');
    }
}
