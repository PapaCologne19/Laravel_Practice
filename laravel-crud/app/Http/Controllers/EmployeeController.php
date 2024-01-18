<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::all();
        return view('employee.index', ['employees' => $employees]);
    }

    public function create(){
        return view('employee.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'employee_name' => ['required', 'string'],
            'division' => ['required', 'string'],
            'department' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'company_address' => ['required', 'string'],
        ]);
        $newEmployee = Employee::create($data);
        return redirect(route('employee.index'))->with('success', 'Employee Added Successfully');

    }

    public function edit(Employee $employee){
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request){
        $data = $request->validate([
            'employee_name' => ['required', 'string'],
            'division' => ['required', 'string'],
            'department' => ['required', 'string'],
            'company_name' => ['required', 'string'],
            'company_address' => ['required', 'string'],
        ]);
        $employee->update($data); 
        return redirect(route('employee.index'))->with('success', 'Employee Updated Successfully');
    }

    public function delete(Employee $employee){
        $employee->delete();
        return redirect(route('employee.index'))->with('success', 'Employee Deleted Successfully');
    }
}
