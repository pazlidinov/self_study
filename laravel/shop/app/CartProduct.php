<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'order_id',
        'quantity',
        'price'
    ];

    /**
     * Bind product for cartproduct
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Bind order for cartproduct
     */
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
