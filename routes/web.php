<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| DRINKY Pages
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', function () {
    return Inertia::render('Home/Home');
})->name('home');

// Menu
Route::get('/menu', function () {
    return Inertia::render('Menu');
})->name('menu');

// Drink Details
Route::get('/menu/{drink}', function ($drink) {
    return Inertia::render('DrinkDetails', [
        'drink' => $drink,
    ]);
})->name('drink.details');

// About
Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

// Contact
Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

// Cart
Route::get('/cart', function () {
    return Inertia::render('Cart');
})->name('cart');

// Checkout
Route::get('/checkout', function () {
    return Inertia::render('Checkout');
})->name('checkout');

// Order Tracking
Route::get('/orders/{order}', function ($order) {
    return Inertia::render('OrderTracking', [
        'order' => $order,
    ]);
})->name('orders.tracking');


/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});


require __DIR__.'/auth.php';