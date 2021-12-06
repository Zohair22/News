<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Request $request) : RedirectResponse
    {
        $attributes = $request->validate([
            'body' => 'required',
            'user_id' => 'required',
            'post_id' => 'required',
        ]);
        $attributes['user_id'] = auth()->id();
        Comment::create($attributes);
        return back();
    }
}
