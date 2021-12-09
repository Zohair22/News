<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index() : Response
    {
        $posts = Post::latest()
            ->filter(request(['search', 'category']))
            ->paginate(12)
            ->withQueryString();
//        ddd($posts);
        $filters = Request::all(['search', 'category']);
        $categories = Category::all();
        return Inertia::render('Welcome', compact('posts', 'filters', 'categories'));
    }

    public function view($slug) : Response
    {
        $post = Post::where('slug', $slug)->first();
        return Inertia::render('PostView', compact('post'));
    }
}
