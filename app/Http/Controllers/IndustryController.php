<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndustryRequest;
use App\Http\Resources\IndustryResource;
use App\Models\Industry;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class IndustryController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Industry::class);

        $industries = Industry::all();

        if ($industries->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Industries in JSON format
        return response()->json(IndustryResource::collection($industries), 200);
    }

    public function store(IndustryRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Industry::class);

        // Create a new Industry using the validated data from the request
        $newIndustry = Industry::create($request->validated());

        // Return the newly created Industry in JSON format with 201 status code
        return response()->json(IndustryResource::make($newIndustry), 201);
    }

    public function show(Industry $industry)
    {
        //$this->authorize('view', $industry);

        return response()->json(IndustryResource::make($industry), 200);
    }

    public function update(IndustryRequest $request, Industry $industry)
    {
        //$this->authorize('update', $industry);

        $status = $industry->update($request->validated());

        return response()->json(IndustryResource::make($industry), $status ? 200 : 201);
    }

    public function destroy(Industry $industry)
    {
        //$this->authorize('delete', $industry);

        $industry->delete();

        return response()->json([], 200);
    }
}
