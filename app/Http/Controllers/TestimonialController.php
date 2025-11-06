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
        // TODO : Enable authorization
        //$this->authorize('viewAny', Testimonial::class);

        $testimonials = Testimonial::all();

        if ($testimonials->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Testimonials in JSON format
        return response()->json(TestimonialResource::collection($testimonials), 200);
    }

    public function store(TestimonialRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Testimonial::class);

        // Create a new Testimonial using the validated data from the request
        $newTestimonial = Testimonial::create($request->validated());

        // Return the newly created Testimonial in JSON format with 201 status code
        return response()->json(TestimonialResource::make($newTestimonial), 201);
    }

    public function show(Testimonial $testimonial)
    {
        //$this->authorize('view', $testimonial);

        return response()->json(TestimonialResource::make($testimonial), 200);
    }

    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        //$this->authorize('update', $testimonial);

        $status = $testimonial->update($request->validated());

        return response()->json(TestimonialResource::make($testimonial), $status ? 200 : 201);
    }

    public function destroy(Testimonial $testimonial)
    {
        //$this->authorize('delete', $testimonial);

        $testimonial->delete();

        return response()->json([], 200);
    }
}
