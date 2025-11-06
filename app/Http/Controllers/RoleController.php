<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class RoleController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Role::class);

        $roles = Role::all();

        if ($roles->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Roles in JSON format
        return response()->json(RoleResource::collection($roles), 200);
    }

    public function store(RoleRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Role::class);

        // Create a new Role using the validated data from the request
        $newRole = Role::create($request->validated());

        // Return the newly created Role in JSON format with 201 status code
        return response()->json(RoleResource::make($newRole), 201);
    }

    public function show(Role $role)
    {
        //$this->authorize('view', $role);

        return response()->json(RoleResource::make($role), 200);
    }

    public function update(RoleRequest $request, Role $role)
    {
        //$this->authorize('update', $role);

        $status = $role->update($request->validated());

        return response()->json(RoleResource::make($role), $status ? 200 : 201);
    }

    public function destroy(Role $role)
    {
        //$this->authorize('delete', $role);

        $role->delete();

        return response()->json([], 200);
    }
}
