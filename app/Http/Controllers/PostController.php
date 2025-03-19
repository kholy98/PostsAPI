<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return PostResource::collection(Post::paginate(10));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = $request->user()->posts()->create($request->all());

        return new PostResource($post);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'error' => 'Post not found',
                'message' => 'No post found with the given ID'
            ], 404);
        }

        return new PostResource($post);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'error' => 'Post not found',
                'message' => 'No post found with the given ID'
            ], 404);
        }

        if ($request->user()->id !== $post->user_id) {
            return response()->json(['error' => 'You can edit only your own posts'], 403);
        }

        $request->validate([
            'title' => 'sometimes|string|max:255',
            'content' => 'sometimes|string',
        ]);

        $post->update($request->all());

        return new PostResource($post);
    }

    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'error' => 'Post not found',
                'message' => 'No post found with the given ID'
            ], 404);
        }

        if ($request->user()->id !== $post->user_id) {
            return response()->json(['error' => 'You can delete only your own posts'], 403);
        }

        $post->delete();

        return response()->json(['message' => 'Post deleted']);
    }
}
