<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use Inertia\Response;

class AdminController extends Controller
{
    public function index() : Response
    {
        $posts = Post::latest()
            ->filter(request(['search', 'category']))
            ->paginate(12)
            ->withQueryString();
        $filters = \Illuminate\Support\Facades\Request::all(['search', 'category']);
        $categories = Category::all();
        return Inertia::render('Admin', compact('posts', 'filters', 'categories'));
    }

    public function create() : Response
    {
        return Inertia::render('Admin/Auth/Login');
    }

    public function store(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $Admin = Admin::where('email', $credentials['email'])->first();
        if (isset($Admin)
            && Hash::check(
                $credentials['password'],
                $Admin->password
            )
        ) {
            auth('admin')->login($Admin);
            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function signup(Request $request) : RedirectResponse
    {
        $credentials = $request->validate([
            'name' => ['string', 'required', 'max:255', 'min:5'],
            'email' => ['email', 'required', 'max:255', Rule::unique('Admins','email')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $credentials['password'] = Hash::make($credentials['password']);
        $Admin = Admin::create($credentials);

        auth('admin')->login($Admin);

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        auth('admin')->logout();
        return redirect('/signIn');
    }
}
