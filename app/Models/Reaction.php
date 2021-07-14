<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    const LIKED = 1;
    const DISLIKED = 2;


    public function reactionable()
    {
        return $this->morphsTo();
    }

    //relacion uno a uno inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
