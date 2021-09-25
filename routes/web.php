<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['guest:web'])->group(function () {
    Route::post("/login", [App\Http\Controllers\Auth\LoginController::class, "login"])->name("login.attempt");
    Route::post("/register", [App\Http\Controllers\Auth\RegisterController::class, "register"])->name("register.attempt");
});

Route::middleware(['auth'])->group(function () {
    Route::get("/create-new-store", [App\Http\Controllers\Store\DashboardController::class, "create"])->name("store.create");
    Route::post("/insert/new-store", [App\Http\Controllers\Store\DashboardController::class, "insert"])->name("store.insert");
    Route::get("/store/dashboard", [App\Http\Controllers\Store\DashboardController::class, "index"])->name("store.index");
    Route::get("/my-dashboard", [App\Http\Controllers\Store\DashboardController::class, "my_dashboard"])->name("store.dashboard");
    Route::get("/product/create", [App\Http\Controllers\Store\ProductController::class, "create"])->name("product.create");

    Route::get("/category/create", [App\Http\Controllers\Store\CategoryController::class, "index"])->name("category.create");
    Route::post("/category/store", [App\Http\Controllers\Store\CategoryController::class, "store"])->name("category.store");
});

Route::get("/get-indoregion", [App\Http\Controllers\Ajax\IndoRegionController::class, "provinces"])->name("indoregion.provinces");
Route::get("/get-indoregion-districts", [App\Http\Controllers\Ajax\IndoRegionController::class, "districts"])->name("indoregion.districts");
