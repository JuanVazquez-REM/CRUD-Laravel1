<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
