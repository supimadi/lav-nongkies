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


Route::middleware("auth.is_admin")->group(function() {
    Route::prefix("dashboard/cafe")->group(function() {
        Route::get("", [CafeController::class, "index"])->name("cafe-index");
        Route::get("/create", [CafeController::class, "create"])->name("cafe-create");
        Route::get("/edit/{id}", [CafeController::class, "edit"])->name("cafe-edit");

        Route::post("/store", [CafeController::class, "store"])->name("cafe-store");
        Route::post("/update/{id}", [CafeController::class, "edit"])->name("cafe-update");
        Route::post("/destroy/{id}", [CafeController::class, "destroy"])->name("cafe-destroy");
    });
});
