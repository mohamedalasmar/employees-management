<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\State;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cities = City::all();
        if ($request->has('search')) {
            $cities = City::where('name', 'like', "%{$request->search}%")->get();
        }
        return response()->view('cities.index',compact('cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all();
        return response()->view('cities.create',compact('states'));
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
        $this->validate($request,[
            'state_id'=>'required|string',
            'name'=>'required|string'
        ]);

        City::create([
            'state_id'=>$request->state_id,
            'name'=>$request->name
        ]);
        return redirect()->route('cities.index')->with('message','Saved Succussfully');
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
        $city = City::findOrFail($id);
        $states = State::all();
        return response()->view('cities.edit',compact('city','states'));
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
        $cities = City::findOrFail($id);
        $this->validate($request, [
            'state_id' => 'required|string|exists:states,id',
            'name' => 'required|string'
        ]);
        $cities->update([
            'state_id'=>$request->state_id,
            'name'=>$request->name,
        ]);
        return redirect()->route('cities.index')->with('message', 'Updated Succussfully');

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
        $cities = City::findOrFail($id);
        $cities->delete();
        return redirect()->route('cities.index')->with('message', 'Deleted Succussfully');

    }
}
