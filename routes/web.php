<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CostumerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware("guest")->group(function () {
    Route::get('/', [AuthController::class, "login"])->name("login");
    Route::get('/register', [AuthController::class, "register"])->name("register");
});

Route::post('/logout', [AuthController::class, "logout"])->name("logout");
Route::post('/auth', [AuthController::class, "auth"])->name("auth");
Route::post('/register-process', [AuthController::class, "registerProcess"])->name("register.process");

Route::middleware("auth")->group(function () {
    Route::controller(PageController::class)
        ->group(function () {
            Route::get('/dashboard', "dashboard")->name("dashboard");
            Route::get('/costumer', "costumer")->name("costumer");
            Route::get('/admin', "admin")->name("admin");
            Route::get('/product', "product")->name("product");
            Route::get('/category', "category")->name("category");
            Route::get('/order', "order")->name("order");
            Route::get('/history', "history")->name("history");
        });

    Route::controller(ProductController::class)
        ->prefix("/product")
        ->as("product.")
        ->group(function () {
            Route::post("/create", "create")->name("create");
            Route::post("/update/{id}", "update")->name("update");
            Route::get("/delete/{id}", "delete")->name("delete");
        });

    Route::controller(CategoryController::class)
        ->prefix("/category")
        ->as("category.")
        ->group(callback: function () {
            Route::post("/create", "create")->name("create");
            Route::post("/update/{id}", "update")->name("update");
            Route::get("/delete/{id}", "delete")->name("delete");
        });

    Route::controller(CostumerController::class)
        ->prefix("/costumer")
        ->as("costumer.")
        ->group(function () {
            Route::post("/create", "create")->name("create");
            Route::post("/update/{id}", "update")->name("update");
            Route::get("/delete{id}", "delete")->name("delete");
        });
});
