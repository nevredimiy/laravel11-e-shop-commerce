<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource("categories", CategoryController::class);

Route::get("/", [MainController::class, "index"])->name("index");

Route::get("/dashboard", function () {
    return view("dashboard");
})
    ->middleware(["auth", "verified"])
    ->name("dashboard");

Route::get("/dashboard/general-settings", [
    DashboardController::class,
    "create",
])
    ->middleware(["auth", "verified"])
    ->name("dashboard.create");
Route::post("/dashboard/general-settings", [
    DashboardController::class,
    "store",
])
    ->middleware(["auth", "verified"])
    ->name("dashboard.store");

Route::middleware("auth")->group(function () {
    Route::get("/profile", [ProfileController::class, "edit"])->name(
        "profile.edit"
    );
    Route::patch("/profile", [ProfileController::class, "update"])->name(
        "profile.update"
    );
    Route::delete("/profile", [ProfileController::class, "destroy"])->name(
        "profile.destroy"
    );

    Route::get("categories", [CategoryController::class, "index"])->name(
        "categories.index"
    );
    Route::get("categories/create", [
        CategoryController::class,
        "create",
    ])->name("categories.create");
    Route::post("categories", [CategoryController::class, "store"])->name(
        "categories.store"
    );
    Route::get("categories/{id}", [CategoryController::class, "show"])->name(
        "categories.show"
    );
    Route::get("categories/{id}/edit", [
        CategoryController::class,
        "edit",
    ])->name("categories.edit");
    Route::put("categories/{id}", [CategoryController::class, "update"])->name(
        "categories.update"
    );
    Route::delete("categories/{id}", [
        CategoryController::class,
        "destroy",
    ])->name("categories.destroy");

    Route::group(['prefix' => 'products'], function () {
        Route::get("/", [ProductController::class, "index"])->name(
            "products.index"
        );
        Route::get("/create", [ProductController::class, "create"])->name(
            "products.create"
        );
        Route::post("/", [ProductController::class, "store"])->name(
            "products.store"
        );
        Route::get("/{id}", [ProductController::class, "show"])->name(
            "products.show"
        );
        Route::get("/{id}/edit", [ProductController::class, "edit"])->name(
            "products.edit"
        );
        Route::put("/{id}", [ProductController::class, "update"])->name(
            "products.update"
        );
        Route::delete("/{id}", [ProductController::class, "destroy"])->name(
            "products.destroy"
        );
    });

});

 //Cart
 Route::get("cart", [CartController::class, "index"])->name("cart");
 Route::post("cart", [CartController::class, "store"])->name("add-to-cart");
 Route::delete('cart', [CartController::class, "destroy"])->name("cart.destroy");

require __DIR__ . "/auth.php";
