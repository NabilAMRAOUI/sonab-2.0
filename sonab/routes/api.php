<?php

use App\Http\Controllers\Api\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
    return $request->user();
    });


    /** Routes pour les fonction + et - de mon panier */
    Route::get('products/increase/{id}', [CartController::class, 'increase']);
    Route::get('products/decrease/{id}', [CartController::class, 'decrease']);
    /** Routes pour le count du panier */
    Route::get('products/count', [CartController::class, 'count'])
        ->name('products.count');
    /** Routes pour le composant addtocart */    
    Route::apiResource('products', CartController::class);
});