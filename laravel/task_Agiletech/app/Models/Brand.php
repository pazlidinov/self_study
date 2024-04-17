<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name'        
    ];

    /**
     * Get the branchs for the Brand.
     */
    public function branchs()
    {
        return $this->hasMany(Branch::class);
    }
}
