<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StripeCheckoutController;

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
    return view('home', [
        
    ]);
})->name('home');

Route::get('/checkout',[StripeCheckoutController::class,'create']);
Route::post('/paymentIntent',[StripeCheckoutController::class,'paymentIntent']);

Route::get('/shoppingCart',ShoppingCartController::class)
->name('cart.index');

Route::get('/products', [ProductController::class,'index'])->name('products.index');
Route::get('/A-propos',[AboutController::class,'index'])->name('A-propos.index');
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
Route::get('/realisations',[RealisationController::class,'index'])->name('realisation.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
