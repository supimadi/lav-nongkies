<?php

use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Review Routes
|--------------------------------------------------------------------------
|
| Here is where the route for review pages live.
|
*/


Route::middleware("auth.is_admin")->group(function() {
    Route::prefix("dashboard/review")->group(function() {
        Route::get("/create", [ReviewController::class, "create"])->name("review.create");
        Route::get("/show/{id}", [ReviewController::class, "show"])->name("review.show");
        Route::get("/edit/{review_id}/{cafe_id}", [ReviewController::class, "edit"])->name("review.edit");
        Route::get("/destroy/{id}", [ReviewController::class, "destroy"])->name("review.destroy");

        Route::post("/store", [ReviewController::class, "store"])->name("review.store");
        Route::post("/update/{id}", [ReviewController::class, "update"])->name("review.update");
    });
});
