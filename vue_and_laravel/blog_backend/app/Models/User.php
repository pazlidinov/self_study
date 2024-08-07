<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'full_name',
        'phone_number',
        'password',
        'img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'phone_number_verified_at' => 'datetime',
    ];

    /**
     * Get the articles for the user.
     */
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    /**
     * Get the comments for the user.
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }
    /**
     * Get the replaycomments for the user.
     */
    public function replaycomments()
    {
        return $this->hasMany(ReplayComments::class);
    }
}
