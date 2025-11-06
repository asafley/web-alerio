<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectRequest;
use App\Http\Resources\ProjectResource;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProjectController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Project::class);

        $projects = Project::all();

        if ($projects->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Projects in JSON format
        return response()->json(ProjectResource::collection($projects), 200);
    }

    public function store(ProjectRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Project::class);

        // Create a new Project using the validated data from the request
        $newProject = Project::create($request->validated());

        // Return the newly created Project in JSON format with 201 status code
        return response()->json(ProjectResource::make($newProject), 201);
    }

    public function show(Project $project)
    {
        //$this->authorize('view', $project);

        return response()->json(ProjectResource::make($project), 200);
    }

    public function update(ProjectRequest $request, Project $project)
    {
        //$this->authorize('update', $project);

        $status = $project->update($request->validated());

        return response()->json(ProjectResource::make($project), $status ? 200 : 201);
    }

    public function destroy(Project $project)
    {
        //$this->authorize('delete', $project);

        $project->delete();

        return response()->json([], 200);
    }
}
