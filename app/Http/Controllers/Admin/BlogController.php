<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BlogController extends Controller
{
    //
    function index()
    {
        return Inertia::render('admin/Blogs', [
            'blogs' => Blog::latest()->get()
        ]);
    }

    
}
