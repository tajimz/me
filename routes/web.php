<?php

use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('/blogs', [BlogController::class, 'index']);
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show']);
Route::get('/projects', [ProjectController::class, 'index']);
Route::prefix('admin')->name('admin.')->group(function () {

    // Dashboard: The root of /admin
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('blogs', AdminBlogController::class);
    Route::resource('projects', AdminProjectController::class);
});
