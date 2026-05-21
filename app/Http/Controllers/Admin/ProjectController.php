<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //
    function index()
    {
        return Inertia::render('admin/Projects', [
            'projects' => Project::latest()->get()
        ]);
    }
}
