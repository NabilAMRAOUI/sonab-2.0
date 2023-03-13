<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CartRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $cartContent = (new CartRepository())->content();
       $cartCount = (new CartRepository())->count();

       return response()->json([
        'cartContent' => $cartContent,
        'cartCount' => $cartCount
    
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** recuperer l'id du produit  */
        $product = Product::where('id', $request->productId)->first();
        /** nouvelle instace de cartrepository qui nous renvoi le count */
        $count = (new CartRepository())->add($product);
        /** on retourne la reponse au format json en incluant le count */
        return response()->json([
            'count' => $count
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        (new CartRepository())->remove($id);
    }

    public function increase($id) 
    {
       (new CartRepository())->increase($id);
    }

    public function decrease($id) 
    {
       (new CartRepository())->decrease($id);
    }

    public function count() 
    {
        /** récuperer le count en faisant une nouvelle instance de cartrepository */
        $count = (new CartRepository())->count();

        return response()->json([
            'count' => $count
        ]);
    }
}

?>