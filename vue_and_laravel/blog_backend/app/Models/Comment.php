<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'full_name',
        'comment',
        'article_id'
    ];

    /**
     * Bind article to comment
     */
    public function articles()
    {
        return $this->belongsTo(Article::class);
    }
}
