<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'branch_id',    
        'img'
    ];

    /**
     * Bind branch to img
     */
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
}
