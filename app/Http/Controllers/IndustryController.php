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
        $this->authorize('viewAny', Industry::class);

        return IndustryResource::collection(Industry::all());
    }

    public function store(IndustryRequest $request)
    {
        $this->authorize('create', Industry::class);

        return new IndustryResource(Industry::create($request->validated()));
    }

    public function show(Industry $industry)
    {
        $this->authorize('view', $industry);

        return new IndustryResource($industry);
    }

    public function update(IndustryRequest $request, Industry $industry)
    {
        $this->authorize('update', $industry);

        $industry->update($request->validated());

        return new IndustryResource($industry);
    }

    public function destroy(Industry $industry)
    {
        $this->authorize('delete', $industry);

        $industry->delete();

        return response()->json();
    }
}
