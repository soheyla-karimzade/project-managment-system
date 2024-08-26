<?php

namespace App\Http\Controllers;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        $projects= Project::where('user_id',Auth::id())->with('user')->paginate(10);
        return view('projects.index',compact('projects'));
    }

    public function show( $project_id,Request $request){
        $project=  Project::findOrFail($project_id);
        $this->authorize('index', $project);
        $priorities = TaskPriority::getValues();
        $statuses = TaskStatus::getValues();
        $query=Project::query()->where('projects.id','=',$project_id)->join('tasks','tasks.project_id','=','projects.id');
        if ($request->filled('status')) {
            $query->where('tasks.status', $request->input('status'));
        }

        if ($request->filled('due_date')) {
            $query->whereDate('tasks.due_date', $request->input('due_date'));
        }

        if ($request->filled('sort_by')) {
            $query->orderBy('tasks.priority', $request->input('sort_by'));
        }
        $result = $query->paginate(10);
        return view('projects.show',compact('project','result','priorities','statuses'));
    }

    public function create(){
        return view('projects.create');
    }

    public  function store(ProjectRequest $request){
        $validatedData = $request->validated();
        $validatedData['user_id']=Auth::id();
        $project = Project::create($validatedData);
        return redirect()->route('projects.list')->with('success', 'Project created successfully.');

    }
    public  function update(Project $project,ProjectRequest $request){

        $this->authorize('update', $project);
        $validatedData = $request->validated();
        $project->update($validatedData);
        return redirect()->back()->with('success', 'Project update successfully.');
    }

    public function destroy(Project $project){
        $this->authorize('index', $project);
        $project->delete();
        return redirect()->route('projects.list')->with('success', 'Project delete successfully.');
    }
}
