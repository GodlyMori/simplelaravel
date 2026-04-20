<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
       public function index()
    {
        $employees = Employee::all();
        return view('employees.index', [
            'persons' => $employees
        ]);
    }
     public function store(Request $request)
    {
        Employee::create([
            'firstname' => $request->firstname123,
            'lastname' => $request->lastname123,
            'job' => $request->job123,
            'salary' => $request->salary123,
        ]);

        return redirect('/employees');
    }
}
