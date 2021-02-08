<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    //relacion uno a muchos inversa
    public function course(){
        $this->belongsTo(Course::class);
    }
}
