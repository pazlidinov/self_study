<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'name',
    ];

    /**
     * Get the articles for the categroy.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
