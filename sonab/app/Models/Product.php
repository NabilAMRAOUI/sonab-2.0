<?php

namespace App\Models;

use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    public function orders(): BelongsToMany
    {
        /** le produit a plusieurs orders */
        return $this->belongsToMany(Order::class)
        /** avec une table pivot  */
            ->withPivot('total_quantity', 'total_price');
    }

    // public function price(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($value) => str_replace('.',',', $value / 100) . '€'
    //     );
    // }
    public function getFormattedPriceAttribute() 
    {
        /** formatter le prix */
        return str_replace('.',',', $this->price / 100) . '€';
    }
}
