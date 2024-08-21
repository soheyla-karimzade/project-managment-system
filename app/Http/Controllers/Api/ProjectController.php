<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Http\Resources\PostResource;
use App\Http\Resources\ProjectResource;
use App\Models\Post;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function list(){
        $posts= Project::all();
        return ProjectResource::class::collection($posts);
    }


}
