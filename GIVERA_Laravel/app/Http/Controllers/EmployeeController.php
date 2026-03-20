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
        Employee::create([
            'firstname' => $request->input('firstname123'),
            'lastname' => $request->input('lastname123'),
            'job' => $request->input('job123'),
            'salary'=> $request->input('salary123'),
        ]);
        return redirect('/employee');
    }
}
