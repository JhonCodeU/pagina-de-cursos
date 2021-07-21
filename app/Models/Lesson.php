<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute(){

        return $this->users->contains(auth()->user());
    }

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

    //Relacion uno a uno polimorfica

    public function resources()
    {
        return $this->morphOne('App\Models\Resource','resourceable');
    }

    //Relacion uno a muchos polimorfica

    public function comments()
    {
        return $this->morphMany('App\Models\Comment','commentable');
    }

    public function FunctionName()
    {
        return $this->morphMany('App\Models\Reaction','reactionable');
    }
}
