<?php

namespace App\Http\Controllers;

use App\Http\Requests\MediaRequest;
use App\Http\Resources\MediaResource;
use App\Models\Media;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MediaController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Media::class);

        $medias = Media::all();

        if ($medias->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Medias in JSON format
        return response()->json(MediaResource::collection($medias), 200);
    }

    public function store(MediaRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Media::class);

        // Create a new Media using the validated data from the request
        $newMedia = Media::create($request->validated());

        // Return the newly created Media in JSON format with 201 status code
        return response()->json(MediaResource::make($newMedia), 201);
    }

    public function show(Media $media)
    {
        //$this->authorize('view', $media);

        return response()->json(MediaResource::make($media), 200);
    }

    public function update(MediaRequest $request, Media $media)
    {
        //$this->authorize('update', $media);

        $status = $media->update($request->validated());

        return response()->json(MediaResource::make($media), $status ? 200 : 201);
    }

    public function destroy(Media $media)
    {
        //$this->authorize('delete', $media);

        $media->delete();

        return response()->json([], 200);
    }
}
