<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // relacion uno a muchos inversa
    public function teacher()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // relacion muchos a muchos inversa
    public function students()
    {
        return $this->belongsToMany(User::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price()
    {
        return $this->belongsTo(Price::class);
    }

    // relacion uno a muchos
    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function requirements(){
        $this->hasMany(Requirement::class);
    }

    public function goals(){
        $this->hasMany(Goal::class);
    }

    public function audiences(){
        $this->hasMany(Audience::class);
    }

    public function sections(){
        $this->hasMany(Section::class);
    }
}
