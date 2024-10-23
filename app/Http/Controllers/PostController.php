<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->get();
        return Inertia::render('Principal', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|string',
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'users_id' => Auth::id(),
            'relevance' => 0
        ]);

        return redirect()->route('posts.index');
    }

    public function incrementRelevance(Post $post)
    {
        $post->increment('relevance');
        return response()->json(['message' => 'Relevância atualizada com sucesso!', 'relevance' => $post->relevance]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        $post->load('user');
        return response()->json($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json(['message' => 'Post excluído com sucesso!']);
    }

}
