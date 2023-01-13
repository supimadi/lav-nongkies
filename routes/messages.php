<?php

use App\Http\Controllers\CafeController;
use App\Http\Controllers\MessageController;
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
    Route::prefix("dashboard/messages")->group(function() {
        Route::get("", [MessageController::class, "index"])->name("messages.index");
        Route::get("/show/{id}", [MessageController::class, "show"])->name("messages.show");

        Route::get("/destroy/{id}", [MessageController::class, "destroy"])->name("message.destroy");
    });
});

Route::post("/store", [MessageController::class, "store"])->name("messages.create");
