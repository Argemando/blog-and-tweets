<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Entry extends Model
{
    //creamos la relacion de post con usuarios
    //post n - 1User
    public function user(){
        return $this->belongsTo(User::class);
    }

    //mutator esto servira para tener links
    //y si son modificadas reedireccionar a travez de la id
    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    
    public function getUrl(){
        return url("entries/$this->slug-$this->id");
    }
}
