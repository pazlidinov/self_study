<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'article_id',
        'comment'
    ];

    /**
     * Bind user to comments.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Bind article to comments.
     */
    public function article()
    {
        return $this->belongsTo(Article::class);
    }
    /**
     * Get the replay comments for the comments.
     */
    public function replay_comments()
    {
        return $this->hasMany(ReplayComments::class);
    }
}
