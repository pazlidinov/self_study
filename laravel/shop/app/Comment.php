<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = true;
    protected $fillable = [
        'user_name',
        'product_id',
        'comment'
    ];

    /**
     * Bind comments for product
     */
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
