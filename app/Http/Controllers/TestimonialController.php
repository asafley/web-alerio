<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonialRequest;
use App\Http\Resources\TestimonialResource;
use App\Models\Testimonial;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class TestimonialController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        $this->authorize('viewAny', Testimonial::class);

        return TestimonialResource::collection(Testimonial::all());
    }

    public function store(TestimonialRequest $request)
    {
        $this->authorize('create', Testimonial::class);

        return new TestimonialResource(Testimonial::create($request->validated()));
    }

    public function show(Testimonial $testimonial)
    {
        $this->authorize('view', $testimonial);

        return new TestimonialResource($testimonial);
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        $this->authorize('update', $testimonial);

        $testimonial->update($request->validated());

        return new TestimonialResource($testimonial);
    }

    public function destroy(Testimonial $testimonial)
    {
        $this->authorize('delete', $testimonial);

        $testimonial->delete();

        return response()->json();
    }
}
