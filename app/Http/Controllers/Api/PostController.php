<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'List data posts',
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $post = Post::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Post berhasil dibuat',
            'data' => $post
        ], 200);
    }

    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post tidak ada atau tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Detail post berhasil dimunculkan',
            'data' => $post
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post tidak ada atau tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string'
        ]);

        $post->update($validated);
        return response()->json([
            'status' => true,
            'message' => 'post berhasil diupdate',
            'data' => $post
        ], 200);
    }

    public function destroy($id)
    {

        $post = Post::find($id);
        if (!$post) {
            return response()->json([
                'status' => false,
                'message' => 'Post tidak ada atau tidak ditemukan',
            ], 404);
        }
        $post->delete();

        return response()->json([
            'status' => true,
            'message' => 'post berhasil dihapus',
        ], 200);
    }
}
