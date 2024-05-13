<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplayComments extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'comments_id',
        'replaycomment'
    ];
    /**
     * Bind user to replaycomments.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    /**
     * Bind comments to replaycomments.
     */
    public function comments()
    {
        return $this->belongsTo(Comments::class);
    }
}
