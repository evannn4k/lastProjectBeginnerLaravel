<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CostumerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, "index"])->name("login");

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
