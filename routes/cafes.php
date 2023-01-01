<?php

use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Cafes Routes
|--------------------------------------------------------------------------
|
| Here is where the route for cafe pages live.
|
*/


Route::middleware("auth")->group(function() {
    Route::prefix("dashboard/cafe")->group(function() {

        Route::get("", [CafeController::class, "index"])->name("cafe-index");
        Route::get("/create", [CafeController::class, "create"])->name("cafe-create");

        Route::post("/store", [CafeController::class, "store"])->name("cafe-store");

    });
});
