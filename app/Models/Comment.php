<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function commentable()
    {
        return $this->morphsTo();
    }

    //Relacion uno a mucho polimorfica
    public function comments()
    {
       return $this->morphMany('App\'Models\Comment','commentable');
    }

    public function reactions()
    {
       return $this->morphMany('App\'Models\Reaction','reactionable');
    }

    //relacion uno a uno inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
