<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    public function products(): BelongsToMany
    {
        /** une commande a plusieurs produits */
        return $this->belongsToMany(Product::class)
            ->withPivot('total_quantity', 'total_price');
    }
}
