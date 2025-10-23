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
        $this->authorize('viewAny', Partner::class);

        return PartnerResource::collection(Partner::all());
    }

    public function store(PartnerRequest $request)
    {
        $this->authorize('create', Partner::class);

        return new PartnerResource(Partner::create($request->validated()));
    }

    public function show(Partner $partner)
    {
        $this->authorize('view', $partner);

        return new PartnerResource($partner);
    }

    public function update(PartnerRequest $request, Partner $partner)
    {
        $this->authorize('update', $partner);

        $partner->update($request->validated());

        return new PartnerResource($partner);
    }

    public function destroy(Partner $partner)
    {
        $this->authorize('delete', $partner);

        $partner->delete();

        return response()->json();
    }
}
