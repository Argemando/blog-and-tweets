<?php

namespace App\Http\Controllers;
use App\User;
use App\Entry;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //pasamos las vistas para que otro usuaario pueda ver las entradas de otro usuario
    public function show(User $user){
        
        $entries = Entry::where('user_id', $user->id)->get();
        return view('users.show',compact('user','entries'));
    }
}
