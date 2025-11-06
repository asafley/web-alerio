<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Http\Resources\ServiceResource;
use App\Models\Service;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ServiceController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Service::class);

        $services = Service::all();

        if ($services->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Services in JSON format
        return response()->json(ServiceResource::collection($services), 200);
    }

    public function store(ServiceRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Service::class);

        // Create a new Service using the validated data from the request
        $newService = Service::create($request->validated());

        // Return the newly created Service in JSON format with 201 status code
        return response()->json(ServiceResource::make($newService), 201);
    }

    public function show(Service $service)
    {
        //$this->authorize('view', $service);

        return response()->json(ServiceResource::make($service), 200);
    }

    public function update(ServiceRequest $request, Service $service)
    {
        //$this->authorize('update', $service);

        $status = $service->update($request->validated());

        return response()->json(ServiceResource::make($service), $status ? 200 : 201);
    }

    public function destroy(Service $service)
    {
        //$this->authorize('delete', $service);

        $service->delete();

        return response()->json([], 200);
    }
}
