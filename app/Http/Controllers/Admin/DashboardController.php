<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return Inertia::render('admin/Dashboard', [
            'stats' => [
                'projects_count' => Project::count(),
                'posts_count' => Blog::count(),
                'total_post_views' => Blog::sum('views'),
            ]
        ]);
    }
}
