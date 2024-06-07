<?php

use App\Livewire\PostPanel;
use App\Livewire\AdminPanel;
use App\Livewire\PostTemplate1;
use App\Livewire\PostTemplate2;
use App\Livewire\PostTemplate3;
use App\Livewire\Show;


use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index',])
    ->name('dashboard')
    ->middleware(CheckRole::class);
    Route::get('/navigation-menu', function () {
        return view('navigation-menu');
    })->name('navigation-menu')->middleware(CheckRole::class);

    Route::get('/admin-panel', AdminPanel::class)->name('admin-panel')->middleware(CheckRole::class);;
    
    Route::get('/PostPanel', PostPanel::class)->name('PostPanel')->middleware(CheckRole::class);

    Route::get('/template1', PostTemplate1::class)->name('post-template1')->middleware(CheckRole::class);;
    Route::get('/template2', PostTemplate2::class)->name('post-template2')->middleware(CheckRole::class);;
    Route::get('/template3', PostTemplate3::class)->name('post-template3')->middleware(CheckRole::class);;

    Route::get('/show/{post}', Show::class)->name('show')->middleware(CheckRole::class);
});