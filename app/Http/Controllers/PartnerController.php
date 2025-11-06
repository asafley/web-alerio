<?php

namespace App\Http\Controllers;

use App\Http\Requests\PartnerRequest;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PartnerController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Partner::class);

        $partners = Partner::all();

        if ($partners->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Partners in JSON format
        return response()->json(PartnerResource::collection($partners), 200);
    }

    public function store(PartnerRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Partner::class);

        // Create a new Partner using the validated data from the request
        $newPartner = Partner::create($request->validated());

        // Return the newly created Partner in JSON format with 201 status code
        return response()->json(PartnerResource::make($newPartner), 201);
    }

    public function show(Partner $partner)
    {
        //$this->authorize('view', $partner);

        return response()->json(PartnerResource::make($partner), 200);
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        //$this->authorize('update', $partner);

        $status = $partner->update($request->validated());

        return response()->json(PartnerResource::make($partner), $status ? 200 : 201);
    }

    public function destroy(Partner $partner)
    {
        //$this->authorize('delete', $partner);

        $partner->delete();

        return response()->json([], 200);
    }
}
