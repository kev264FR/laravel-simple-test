<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addPost(Request $request): RedirectResponse
    {
        $request->validate([
            'title'=>'required|max:20',
            'article'=>'required|max:500'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->article = $request->input('article');
        $post->user_id = Auth::id();

        $post->save();

        return redirect()->route('home');
    }

    public function editPost(Request $request, Post $post): RedirectResponse
    {
        if (Auth::user() === $post->user())
        {
            $request->validate([
                'title'=>'required|max:20',
                'article'=>'required|max:500'
            ]);

            $post->title = $request->input('title');
            $post->article = $request->input('article');

            $post->save();

            return redirect()->route('home');
        }
        return redirect()->home()->with('error', 'Cannot do this');
    }
}
