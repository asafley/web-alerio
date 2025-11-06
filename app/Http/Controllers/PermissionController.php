<?php

namespace App\Http\Controllers;

use App\Http\Requests\PermissionRequest;
use App\Http\Resources\PermissionResource;
use App\Models\Permission;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PermissionController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Permission::class);

        $permissions = Permission::all();

        if ($permissions->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Permissions in JSON format
        return response()->json(PermissionResource::collection($permissions), 200);
    }

    public function store(PermissionRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Permission::class);

        // Create a new Permission using the validated data from the request
        $newPermission = Permission::create($request->validated());

        // Return the newly created Permission in JSON format with 201 status code
        return response()->json(PermissionResource::make($newPermission), 201);
    }

    public function show(Permission $permission)
    {
        //$this->authorize('view', $permission);

        return response()->json(PermissionResource::make($permission), 200);
    }

    public function update(PermissionRequest $request, Permission $permission)
    {
        //$this->authorize('update', $permission);

        $status = $permission->update($request->validated());

        return response()->json(PermissionResource::make($permission), $status ? 200 : 201);
    }

    public function destroy(Permission $permission)
    {
        //$this->authorize('delete', $permission);

        $permission->delete();

        return response()->json([], 200);
    }
}
