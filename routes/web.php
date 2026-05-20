<?php

use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/blogs', function () {
    return Inertia::render('Blogs');
});

Route::get('/projects', [ProjectController::class, 'index']);
