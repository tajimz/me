<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class ProjectController extends Controller
{
    function index()
    {
        return Inertia::render('admin/Projects/Index', [
            'projects' => Project::latest()->get()
        ]);
    }

    function create()
    {
        return Inertia::render('admin/Projects/Create');
    }
    function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:app,web',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'download_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'tags' => 'required|string',

        ]);
        $validated['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        Project::create($validated);
        return redirect()->route('admin.projects.index');
    }

    function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index');
    }

    function edit(Project $project)
    {
        return Inertia::render('admin/Projects/Edit', [
            'project' => $project
        ]);
    }

    function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:app,web',
            'github_url' => 'nullable|url',
            'live_url' => 'nullable|url',
            'download_url' => 'nullable|url',
            'is_featured' => 'boolean',
            'tags' => 'required|string',
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($project->cover_image);

            $validated['cover_image'] = $request->file('cover_image')->store('projects', 'public');
        } else {
            $validated['cover_image'] = $project->cover_image;
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Project updated successfully.');
    }
}
