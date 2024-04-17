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
        'brand_id',
        'district_id'
    ];

    /**
     * Bind brand to branch
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    /**
     * Bind district to branch
     */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get the branchs for the Brand.
     */
    public function imgs()
    {
        return $this->hasMany(Img::class);
    }
}
