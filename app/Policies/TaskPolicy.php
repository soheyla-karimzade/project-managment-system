<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;

class TaskPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }


    public function update(Project $project, Task $task)
    {
        return $project->id === $task->project_id;
    }



    public function index(Project $project, Task $task)
    {
        return $project->id === $task->project_id;
    }
}
