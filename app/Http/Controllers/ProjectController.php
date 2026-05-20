<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Inertia\Inertia;

class ProjectController extends Controller
{
    //
    function index()
    {
        return Inertia::render('Projects', [
            'projects' => Project::latest()->get()
        ]);
    }
}
