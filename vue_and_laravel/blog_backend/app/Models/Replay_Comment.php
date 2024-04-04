<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Replay_Comment extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $fillable = [
        'full_name',
        'replay_comment',
        'comment_id'
    ];

    /**
     * Bind article to comment
     */
    public function comments()
    {
        return $this->belongsTo(Comment::class);
    }
}
