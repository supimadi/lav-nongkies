<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cafes Routes
|--------------------------------------------------------------------------
|
| Here is where the route for user pages (admin) live.
|
*/


Route::middleware("auth.is_admin")->group(function() {
    Route::prefix("dashboard/user")->group(function() {
        Route::get("", [UserController::class, "index"])->name("users-index");
        Route::get("/create", [UserController::class, "create"])->name("users-create");
        Route::get("/edit/{id}", [UserController::class, "edit"])->name("users-edit");

        Route::post("/store", [UserController::class, "store"])->name("users-store");
        Route::post("/update/{id}", [UserController::class, "update"])->name("users-update");
        Route::post("/destroy/{id}", [UserController::class, "destroy"])->name("users-destroy");
    });
});
