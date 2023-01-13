<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cafes Routes
|--------------------------------------------------------------------------
|
| Here is where the route for cafe pages live.
|
*/


Route::middleware("auth.is_admin")->group(function() {
    Route::prefix("dashboard/cafe")->group(function() {
        Route::get("", [CafeController::class, "index"])->name("cafe-index");
        Route::get("/create", [CafeController::class, "create"])->name("cafe-create");
        Route::get("/edit/{id}", [CafeController::class, "edit"])->name("cafe-edit");

        Route::post("/store", [CafeController::class, "store"])->name("cafe-store");
        Route::post("/update/{id}", [CafeController::class, "update"])->name("cafe-update");
        Route::post("/destroy/{id}", [CafeController::class, "destroy"])->name("cafe-destroy");
    });
});

Route::prefix("cafe")->group(function() {
    Route::get("/{cafe_id}", [HomePageController::class, "showCafe"])->name("home.show.cafe");
});
