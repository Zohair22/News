<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index() : Response
    {
        $posts = Post::paginate(12);
        return Inertia::render('Welcome', compact('posts'));
    }

    public function view($slug) : Response
    {
        $post = Post::where('slug', $slug)->first();
        return Inertia::render('PostView', compact('post'));
    }
}
