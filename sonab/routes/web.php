<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RealisationController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\StripeCheckoutController;
use App\Http\Controllers\SuccessController;

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
/** Route pour la page d'acceuil  */
Route::get('/', function () {
    return view('home', [
        
    ]);
})->name('home');


/** Routes nécessaires a stripe api */
Route::get('/checkout',[StripeCheckoutController::class,'create']);
Route::post('/paymentIntent',[StripeCheckoutController::class,'paymentIntent']);
Route::get('/thankyou',[SuccessController::class,'create']);

Route::post('/saveOrder', OrderController::class)
->name('orders.save');

/** Route pour le panier */
Route::get('/shoppingCart',ShoppingCartController::class)
->name('cart.index');

/** Route pour la page produit */
Route::get('/products', [ProductController::class,'index'])->name('products.index');
/** Route pour la page a-propos */
Route::get('/A-propos',[AboutController::class,'index'])->name('A-propos.index');
/** Route pour la page contact */
Route::get('/contact',[ContactController::class,'index'])->name('contact.index');
/** Route pour la page realisation */
Route::get('/realisations',[RealisationController::class,'index'])->name('realisation.index');

/** Groupe pour les routes avec besoins d'authentifications */
Route::middleware('auth')->group(function () {
    /** Routes profil utlisateur */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    /** Routes administrateurs */
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
    Route::get('/new',[AdminController::class,'create'])->name('new.create');
    Route::get('/modify',[AdminController::class,'update'])->name('modify.update');
    Route::get('/delete',[AdminController::class,'destroy'])->name('delete.destroy');
});

require __DIR__.'/auth.php';
