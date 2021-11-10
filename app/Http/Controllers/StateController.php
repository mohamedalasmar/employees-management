<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::all();
        return response()->view('states.index', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $countries = Country::all();
        return response()->view('states.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'country_id' => 'string|required|exists:countries,id',
            'name' => 'string|required',
        ]);

        State::create([
            'country_id' => $request->country_id,
            'name' => $request->name,
        ]);

        return redirect()->route('states.index')->with('message', 'State Saved Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $state = State::findOrFail($id);
        $countries = Country::all();
        return response()->view('states.edit', compact('state','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $states  = State::findOrFail($id);
        $this->validate($request,[
            'country_id'=>'string|required|exists:countries,id',
            'name'=>'string|required',
        ]);

        $states->update([
            'country_id'=>$request->country_id,
            'name'=>$request->name,
        ]);

        return redirect()->route('states.index')->with('message','Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $states = State::findOrFail($id);
        $states->delete();
        return redirect()->route('states.index')->with('message', 'Deleted Successfully');
    }
}
