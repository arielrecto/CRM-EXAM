<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);

        return view('user.employee.index', compact(['employees']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $companies = Company::get();

        return view('user.employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone
        ]);



        return back()->with(['message' => 'Employee Added']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);


        return view('user.employee.show', compact(['employee']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);


        $companies = Company::get();


        return view('user.employee.edit', compact(['employee', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeRequest $request, string $id)
    {


        $employee = Employee::find($id);

        $employee->update([
            'last_name' => $request->last_name,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'phone' => $request->phone
        ]);



        return back()->with(['message' => 'Employee Added Success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);


        $employee->delete();



        return back()->with(['message' => 'Employee Deleted!']);
    }
}
