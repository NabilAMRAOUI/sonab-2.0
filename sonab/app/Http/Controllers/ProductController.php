<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        /** Produits rangés dans l'ordre aléatoire  */
        $products = Product::inRandomOrder()
            /** Qui sont actifs  */
            ->whereActive(true)
            /** j'en récupere 16  */
            ->take(16)
            ->get();

        /** on retoure  la vue products et on envoie les produits */
        return view('products.index', compact('products'));
    }
}
