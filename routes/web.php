<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::get('/employee',[EmployeeController::class,'index'])->name('employee');
    Route::post('/create/employee',[EmployeeController::class,'saveEmployee'])->name('save.employee');
    Route::get('/employee/create',[EmployeeController::class,'storeEmployee'])->name('employee.create');
    Route::get('/employee/edit/{id}',[EmployeeController::class,'editEmployee'])->name('employee.edit');
    Route::put('/employee/update',[EmployeeController::class,'updateEmployee'])->name('update.employee');
    Route::delete('/employee/delete/{id}',[EmployeeController::class,'deleteEmployee'])->name('employee.delete');
    Route::get('/projects',[ProjectController::class,'index'])->name('projects');
    Route::post('/project/store',[ProjectController::class,'store'])->name('project.store');
});


