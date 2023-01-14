<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name("home");

Route::get("/", [HomePageController::class, "home"])->name("home");
Route::get("/search-cafe", [HomePageController::class, "searchCafe"])->name("search.cafes");

Route::middleware('auth.is_admin')->group(function () {
    // Profile Route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix("/dashboard")->group(function() {
        Route::get('', [DashboardController::class, 'index'])->name('dashboard');
        Route::get("/get-user/{id?}", [ReviewController::class, "searchUser"])->name("search.user");
        Route::get("/get-cafe/{id?}", [ReviewController::class, "searchCafe"])->name("search.cafe");
    });
});

require __DIR__.'/auth.php';
require __DIR__.'/cafes.php';
require __DIR__.'/reviews.php';
require __DIR__.'/users.php';
require __DIR__.'/messages.php';
