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
        //$this->authorize('viewAny', Post::class);

        $posts = Post::all();

        if ($posts->isEmpty()) {
            // Return an empty JSON array with 200 status code
            return response()->json([], 200);
        }

        // Return collection of Posts in JSON format
        return PostResource::collection($posts);
    }

    public function store(PostRequest $request)
    {
        //$this->authorize('create', Post::class);

        //return new PostResource(Post::create($request->validated()));

        // Return not implemented exception
        return response()->json(['message' => 'Not implemented', 'data' => $request->validated()], 501);
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        //return new PostResource($post);

        // Return not implemented exception
        return response()->json(['message' => 'Not implemented'], 501);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('update', $post);

        //$post->update($request->validated());

        //return new PostResource($post);

        // Return not implemented exception
        return response()->json(['message' => 'Not implemented'], 501);
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);

        //$post->delete();

        //return response()->json();

        // Return not implemented exception
        return response()->json(['message' => 'Not implemented'], 501);
    }
}
