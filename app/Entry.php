<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    //creamos la relacion de post con usuarios
    //post n - 1User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
