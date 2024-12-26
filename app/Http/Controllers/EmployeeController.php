<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employees=Employee::all();
        // dd($employees);
        $departments=Department::all();
        $jobtitles=JobTitle::all();
        return Inertia::render('Employee/Index',[
            'departments'=>$departments,
            'jobtitles'=>$jobtitles
        ]);
    }
    public function saveEmployee(Request $request){
        
        Employee::create($request->all());
        
    }
}
