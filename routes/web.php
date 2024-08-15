<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\TaskManager;
use App\Livewire\CategoryManager;

Route::get('/', function () {
    return view('home');
});

Route::get('/tasks', TaskManager::class)->name('tasks.index');
Route::get('/categories', CategoryManager::class)->name('categories.index');