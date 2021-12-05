<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Http\Resources\EmployeeSingleResource;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return  response()->view('employees.index');
        $employees = Employee::all();
        return EmployeeResource::collection($employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'department_id' => ['required'],
            'birth_date' => ['required'],
            'date_hired' => ['required'],
            'zip_code' => ['required'],
        ]);
        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
            'birth_date' => $request->birth_date,
            'date_hired' => $request->date_hired,
            'zip_code' => $request->zip_code,

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return new EmployeeSingleResource($employee);

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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        $this->validate($request, [
            'first_name' => ['required'],
            'last_name' => ['required'],
            'middle_name' => ['required'],
            'address' => ['required'],
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'department_id' => ['required'],
            'birth_date' => ['required'],
            'date_hired' => ['required'],
            'zip_code' => ['required'],
        ]);
        $employee->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_name' => $request->middle_name,
            'address' => $request->address,
            'country_id' => $request->country_id,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'department_id' => $request->department_id,
            'birth_date' => $request->birth_date,
            'date_hired' => $request->date_hired,
            'zip_code' => $request->zip_code,
        ]);
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
        $employee = Employee::findOrFail($id);
        $employee->delete();
        return response()->json('Deleted');
    }
}
