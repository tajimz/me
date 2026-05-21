<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //
    function index()
    {
        return Inertia::render('admin/Blogs/Index', [
            'blogs' => Blog::latest()->get()
        ]);
    }
    function create()
    {
        return Inertia::render('admin/Blogs/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'content'     => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'is_featured' => 'boolean',
        ]);

        $slug = Str::slug($validated['title']);

        if (Blog::where('slug', $slug)->exists()) {
            return back()->withErrors(['title' => 'This title already exists. Please choose a different one.']);
        }

        $validated['cover_image'] = $request->file('cover_image')->store('blogs', 'public');
        $validated['slug'] = $slug;
        $validated['excerpt'] = Str::words(strip_tags($validated['content']), 20, '...');
        $validated['views'] = 0;
        $validated['is_featured'] = $request->boolean('is_featured');

        Blog::create($validated);

        return redirect()->route('admin.blogs.index');
    }
    function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index');
    }
}
