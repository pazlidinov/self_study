<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name' ,
        'region_id'       
    ];

     /**
     * Bind brand to branch
     */
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
