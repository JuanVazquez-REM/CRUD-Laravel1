<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public function comment()
    {
        return $this->hasMany(Comment::class);
    } 
}