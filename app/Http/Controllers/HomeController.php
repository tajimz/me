<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    //
    function index()
    {
        return Inertia::render('Home', [
            'featured_projects' => Project::where('is_featured', true)->latest()->get()
        ]);
    }
}
