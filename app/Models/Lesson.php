<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    //relacion uno a uno
    public function description()
    {
        return $this->hasOne(description::class);
    }

    //relacion uno a muchos inversa
    public function section()
    {
        return $this->belongsTo(Section::class);
    }

    public function platform()
    {
        return $this->belongsTo(Plaform::class);
    }

    //relacion muchos a muchos
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
