<?php

namespace App\Http\Controllers;
use App\Entry;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    //
    public function index(){
        //recuerda que es para ver que aparece que estas ahi como un print
        //dd('GuestController');
        //mandamos las entradas de los articulos publicados
        //paginate es para solicitar las entradas 10 en 10
        
        //ese with sirve para no hacer consulta por cada una de las diez si no solo por una asi que e simportante
        $entries = Entry::with('user')
        //para ordenar por id
        ->orderByDesc('id')
        //para ordenar por fecha
        ->orderByDesc('created_at')
        // para ordenar cada 10
        ->paginate(10);
        //las mandamos ha welcome
        return view('welcome', compact('entries'));
    }   
    
    public function show(Entry $entry){
        return view('entries.show',compact('entry'));
    }
}
