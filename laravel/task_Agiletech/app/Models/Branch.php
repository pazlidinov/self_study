<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
        'brand_id'
    ];

    /**
     * Bind brand to branch
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the branchs for the Brand.
     */
    public function imgs()
    {
        return $this->hasMany(Img::class);
    }
}
