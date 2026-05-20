<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', [HomeController::class, 'index']);

Route::get('/blogs', function () {
    return Inertia::render('Blogs');
});

Route::get('/projects', [ProjectController::class, 'index']);
