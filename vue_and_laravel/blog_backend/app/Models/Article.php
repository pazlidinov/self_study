<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'title',
        'img',
        'body',
        'user_id',
        'category_id'        
    ];

    /**
     * Bind user to branch
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Bind category to branch
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the comments for the article.
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
}
