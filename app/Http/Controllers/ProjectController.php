<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Project;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Enums\ProjectPriority;
use App\Models\ProjectCategory;
use App\Enums\ProjectNotification;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storeProjectRequest;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = ProjectCategory::all();    
        $projectNotifications=ProjectNotification::cases();
        $projectpriorities=ProjectPriority::cases();
        $leaders=Employee::where('is_leader','=',true)->get();
        return Inertia::render('Project/Index',[
            'projectCategories' => $category,
            'projectNotifications' => $projectNotifications,
            'leaders' => $leaders,
            'projectpriorities'=>$projectpriorities
        ]);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(storeProjectRequest $request)
    {
        $validated=$request->validated();
            // dd($request);

            if($request->hasFile('project_image')){
                $validated['project_image']=Storage::disk('public')->put('projects',$request->project_image);
            }
        Project::create($validated);
        return to_route('projects');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
