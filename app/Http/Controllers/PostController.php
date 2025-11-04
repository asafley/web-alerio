<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PostController extends Controller
{
    use AuthorizesRequests;

    public function index()
    {
        // TODO : Enable authorization
        //$this->authorize('viewAny', Post::class);

        $posts = Post::all();

        if ($posts->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([
                "data" => [],
            ], 200);
        }

        // Return collection of Posts in JSON format
        return response()->json(PostResource::collection($posts), 200);
    }

    public function store(PostRequest $request)
    {
        // TODO : Enable authorization
        //$this->authorize('create', Post::class);

        // Create a new Post using the validated data from the request
        $newPost = Post::create($request->validated());

        // Return the newly created Post in JSON format with 201 status code
        return response()->json(PostResource::make($newPost), 201);
    }

    public function show(Post $post)
    {
        //$this->authorize('view', $post);

        return response()->json(PostResource::make($post), 200);
    }

    public function update(PostRequest $request, Post $post)
    {
        //$this->authorize('update', $post);

        $status = $post->update($request->validated());

        return response()->json(PostResource::make($post), $status ? 200 : 201);
    }

    public function destroy(Post $post)
    {
        //$this->authorize('delete', $post);

        $post->delete();

        return response()->json([], 200);
    }
}
