<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'product_id',
        'img'
    ];

    /**
     * Bind photo for product
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
