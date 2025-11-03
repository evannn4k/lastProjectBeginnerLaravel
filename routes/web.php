<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, "index"])->name("login");

Route::get('/dashboard', [PageController::class, "dashboard"])->name("dashboard");