<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostFollows extends Model
{
    protected $guarded = [];
    
    public function post() {
        return $this->belongsTo(Post::class);
    }

}