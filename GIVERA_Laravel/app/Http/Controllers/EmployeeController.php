<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // DISPLAY ALL EMPLOYEE
    public function index()
    {
        $employees = Employee::all();
        
        return view('employee.index', ["workers" => $employees
        ]); //employees reference and hold the data
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'firstname123' => 'required|string|max:255',
            'lastname123' => 'required|string|max:255',
            'job123' => 'required|string|max:255',
            'salary123' => 'required|numeric|min:0',
        ]);

        Employee::create([
            'firstname' => $validated['firstname123'],
            'lastname' => $validated['lastname123'],
            'job' => $validated['job123'],
            'salary'=> $validated['salary123'],
        ]);
        return redirect('/employee');
    }

    public function edit(Employee $employee)
    {
        return view('employee.edit', ['employee' => $employee]);
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $request->validate([
            'firstname123' => 'required|string|max:255',
            'lastname123' => 'required|string|max:255',
            'job123' => 'required|string|max:255',
            'salary123' => 'required|numeric|min:0',
        ]);

        $employee->update([
            'firstname' => $validated['firstname123'],
            'lastname' => $validated['lastname123'],
            'job' => $validated['job123'],
            'salary'=> $validated['salary123'],
        ]);

        return redirect('/employee');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect('/employee');
    }
}
