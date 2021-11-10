<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    //
    public function index(Request $request)
    {
        $countries = Country::all();
        if ($request->has('search')) {
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('country_code', 'like', "%{$request->search}")->get();
        }
        return response()->view('countries.index', ['countries' => $countries]);
    }
    public function create()
    {
        return response()->view('countries.create');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'country_code' => 'required|max:3',
            'name' => 'required|string',
        ]);
        Country::create([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);
        return redirect()->route('countries.index')->with('message', 'Country Created Successfully');
    }
    public function edit(Country $country)
    {
        return response()->view('countries.edit', compact('country'));
    }
    public function update(Request $request, Country $country)
    {

        $this->validate($request, [
            'country_code' => 'required|max:3',
            'name' => 'required|string',
        ]);
        $country->update([
            'country_code' => $request->country_code,
            'name' => $request->name
        ]);
        return redirect()->route('countries.index')->with('message', 'Updated Country');
    }
    public function destroy(Country $country)
    {

        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Deleted Country');
    }
}
