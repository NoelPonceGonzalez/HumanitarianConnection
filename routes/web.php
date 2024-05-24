<?php

use App\Livewire\AddPost;
use App\Livewire\AdminPanel;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard')->middleware(CheckRole::class);
    Route::get('/navigation-menu', function () {
        return view('navigation-menu');
    })->name('navigation-menu')->middleware(CheckRole::class);

    Route::get('/admin-panel', AdminPanel::class)->name('admin-panel')->middleware(CheckRole::class);;
    
    Route::get('/add-post', AddPost::class)->name('add-post')->middleware(CheckRole::class);
});