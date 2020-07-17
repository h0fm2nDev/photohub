<?php

namespace App;

use App\Ad;
use App\Town;
use App\Portfolio;
use App\Comment;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Overtrue\LaravelFollow\Followable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    
    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function portfolio() 
    {
        return $this->hasMany(Portfolio::class, 'user_id', 'id');
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function town() 
    {
        return $this->belongsTo(Town::class, 'id');
    }

    public function ads()
    {
        return $this->hasMany(Ad::class, 'user_id', 'id');
    }
}
