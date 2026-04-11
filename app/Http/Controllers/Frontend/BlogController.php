<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_published', true)->with('category')->latest()->paginate(9);
        return view('frontend.blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->where('is_published', true)->firstOrFail();
        $recentPosts = Post::where('id', '!=', $post->id)->where('is_published', true)->latest()->limit(3)->get();
        
        return view('frontend.blog.show', compact('post', 'recentPosts'));
    }
}
