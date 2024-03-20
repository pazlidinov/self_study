<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'phone_number',
        'total_price'
    ];

    /**
     * Get the cart_products for the order.
     */
    public function cart_products()
    {
        return $this->hasMany(CartProduct::class);
    }
}
