<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name'        
    ];

    /**
     * Get the districts for the Region.
     */
    public function districts()
    {
        return $this->hasMany(District::class);
    }
}
