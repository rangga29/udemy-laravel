<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function feedPosts()
    {
        return $this->hasManyThrough(Post::class, Follow::class, 'user_id', 'user_id', 'id', 'followeduser');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id');
    }

    public function followers()
    {
        return $this->hasMany(Follow::class, 'followeduser');
    }

    public function followingTheseUsers()
    {
        return $this->hasMany(Follow::class, 'user_id');
    }

    protected function avatar(): Attribute
    {
        return Attribute::make(get: function ($value) {
            return $value ? '/storage/avatars/' . $value : '/storage/avatars/fallback-avatar.jpg';
        });
    }
}