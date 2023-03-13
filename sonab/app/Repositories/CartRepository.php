<?php
namespace App\Repositories;

use App\Models\product;
use Illuminate\Support\Collection;

class CartRepository
{
    public function add (Product $product)
    {
        /** fonction add de darryldecode  */
        \Cart::session(auth()->user()->id)->add(array(
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $product
        ));

        return $this->count();
    }

    public function content ()
    {
        /** fonction content de darryldecode pour récupérer le contenu  */
        return \Cart::session(auth()->user()->id)
        ->getContent();
    }

    public function increase($id)
    {
        /** Pour le bouton + du panier  */
        \Cart::session(auth()->user()->id)
        ->update($id, [
            'quantity' => +1
        ]);
    } 
    public function decrease($id)
    {
        /** Pour le bouton -  du panier  */
        $item = \Cart::session(auth()->user()->id)->get($id);

        if ($item->quantity === 1) {
            $this->remove($id);
            return ;
        }

        \Cart::session(auth()->user()->id)
        ->update($id, [
            'quantity' => -1
        ]);
    } 

    public function remove($id) 
    {
        /** Pour suprimer du panier  */
        \Cart::session(auth()->user()->id)->remove($id);
    }

    public function total()
    {
        /** Pour total du panier  */
       return \Cart::session(auth()->user()->id)->getTotal();
    }

    public function jsonOrderItems()
    {
        $this
        ->content()
        ->map(function($item) {
            return [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'price' => $item->price
            ];
        })
        ->toJson();
    }

    public function count ()
    {
        /** fonction count de darryldecode pour récupérer le count  */
        return $this->content()
           ->sum('quantity');
    }


}




