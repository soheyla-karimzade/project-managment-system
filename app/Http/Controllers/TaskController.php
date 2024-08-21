<?php

namespace App\Http\Controllers;

use App\Enums\TaskPriority;
use App\Enums\TaskStatus;
use App\Http\Requests\TaskRequest;
use App\Models\Task;

class TaskController extends Controller
{

   public function store($project_id,TaskRequest $request){
       $validatedData = $request->validated();
       $validatedData['project_id']=$project_id;
       $task = Task::create($validatedData);
       return redirect()->back()->with('success', 'Project Task created successfully.');
   }

   public function show(Task $task){
       $priorities = TaskPriority::getValues();
       $statuses = TaskStatus::getValues();
       return view('projects.task.show',compact('task','priorities','statuses'));

   }

   public function update(Task $task,TaskRequest $request){
       $validatedData = $request->validated();
       $task->update($validatedData);
       return redirect()->back()->with('success', 'Project update successfully.');
   }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->back()->with('success', 'Project delete successfully.');
    }
}
