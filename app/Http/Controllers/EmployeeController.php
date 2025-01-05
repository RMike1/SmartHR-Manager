<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Employee;
use App\Models\JobTitle;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // dd($request);
        $validated=$request->validated();
        if($request->hasFile('employee_image')){
            $validated['employee_image']=Storage::disk('public')->put('employees', $request->employee_image);
        }
        Employee::create($validated);
    }
    public function updateEmployee(StoreEmployeeRequest $request){
        $validated=$request->validated();
        $id=$request['id'];
        // dd($request);
        if($request->file('employee_image')){
            $request->file('employee_image')->store('employees');
            
        }
        Employee::findOrFail($id)->update($validated);
    }
    public function storeEmployee(){
        // $validated=$request->validated();
        // Employee::create($validated);
        return inertia()->modal('Modals/StoreEmployeeModal',[
            'showModal' => true,
        ])
            ->baseRoute('employee');
    }
    public function editEmployee(Employee $id){
        return Inertia::render('Employee/Index',[
            'selectedEmployee'=>$id,
        ]);
    }
    public function deleteEmployee($id){
        Employee::find($id)->delete();
        return to_route('employee');
    }
}
