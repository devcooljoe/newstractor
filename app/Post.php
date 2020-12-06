<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comment() {
        return $this->hasMany(Comment::class);
    }

    public function like() {
        return $this->hasMany(Like::class);
    }

    public function post_follows() {
        return $this->hasMany(PostFollows::class);
    }

    public function view() {
        return $this->hasMany(View::class);
    }

    protected static function boot() {
        parent::boot();
        static::created(function($post){
            $post->post_follows()->create([
                'user_id' => auth()->user()->id,
            ]);
        });
    }
    
}