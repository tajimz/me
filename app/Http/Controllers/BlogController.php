<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    //
    function index()
    {
        return Inertia::render('Blogs', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    public function show(Blog $blog)
    {
        $blog->increment('views');

        return Inertia::render('Blog', [
            'blog' => $blog
        ]);
    }
}
