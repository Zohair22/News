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
        $posts = Post::paginate(9);
        return Inertia::render('Welcome', compact('posts'));
    }
}
