<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;

class EmployeeController extends Controller
{
    public function index(){
        $employees=Employee::latest()->with('jobtitle')->get();
        $departments=Department::all();
        $jobtitles=JobTitle::all();
        return Inertia::render('Employee/Index',[
            'employees'=>$employees,
            'departments'=>$departments,
            'jobtitles'=>$jobtitles
        ]);
    }
    public function saveEmployee(StoreEmployeeRequest $request){
        $validated=$request->validated();
        Employee::create($validated);
    }
}
