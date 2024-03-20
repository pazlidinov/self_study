<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'name',
        'title',
        'img',
        'count',
        'price',
        'discount',
        'descriptions',
        'size',
        'category_id'
    ];

    /**
     * Bind category to product
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the images of product.
     */
    public function images()
    {
        return $this->hasMany(Image::class);
    }
    /**
     * Get the comments of product.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the cart_product of product.
     */
    public function cart_products()
    {
        return $this->hasMany(CartProduct::class);
    }

    /**
     * Get average the discount price of product.
     */
    public function getDiscountPriceAttribute()
    {
        return ($this->price) * ((100 - $this->discount) / 100);
    }
}
