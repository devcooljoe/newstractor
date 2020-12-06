<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot() {
        parent::boot();
        static::created(function($user){
            $user->profile()->create([]);
            $user->attribute()->create(['admin'=>'false', 'subscribed'=>'false']);
        });
    }


    
    public function admin() {
        if ($this->attribute()->firstOrFail()->admin == 'true' || $this->attribute()->firstOrFail()->admin == 'super') {
            return true;
        }else{
            return false;
        }
    }
    public function superadmin() {
        return $this->attribute()->firstOrFail()->admin == 'super';
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function post() {
        return $this->hasMany(Post::class)->orderBy('id', 'DESC');
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function like() {
        return $this->hasMany(Like::class);
    }

    public function follow() {
        return $this->hasMany(Follow::class);
    }

    public function attribute() {
        
        return $this->hasOne(Attribute::class);
    }

    public function subscribed() {
        return $this->attribute()->firstOrFail()->subscribed == 'true';
    }

    public function notification() {
        return $this->hasMany(Notification::class);
    }

}