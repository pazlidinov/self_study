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
        'photo',
        'body',
        'user_id',
        'category_id'
    ];

    /**
     * Bind user to article
     */
    public function users()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Bind category to article
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }


     /**
     * Get the comments for the article.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
