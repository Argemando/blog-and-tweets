<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

class EntryController extends Controller
{
    //creamos un constructor para que aqui solo funcione si esta autentificado osea es un iddleware
    public function __construct(){
        $this->middleware('auth');
    }
    //manda la vista par aver las creacion
    public function create(){
        return view('entries.create');
    }

    public function store(Request $request){
        //dd sirve para mostrar que si se haga el post
        //dd($request->all());

        //para agregar reglas de validacion
        $validatedData = $request->validate([
            'title' =>'required|min:7|max:255|unique:entries',
            'content' => 'required|min:15|max:3000'
        ]);

        //agregamos la informacion validada
        $entry = new Entry();
        $entry->title = $validatedData['title'];
        $entry->content=$validatedData['content'];
        $entry->user_id = auth()->id();
        $entry->save();//aqui se hace el insert

        $status="Your entry has been published successfully";
        return back()->with(compact('status'));
    }

    public function edit(Entry $entry){
        $this->authorize('update', $entry);
        return view('entries.edit',compact('entry'));
    }

    public function update(Request $request, Entry $entry){
        $this->authorize('update', $entry);
        $validatedData = $request->validate([
            'title' =>'required|min:7|max:255|unique:entries,id,'.$entry->id,
            'content' => 'required|min:15|max:3000'
        ]);

        //agregamos la informacion validada
        
        $entry->title = $validatedData['title'];
        $entry->content=$validatedData['content'];
        $entry->save();//aqui se hace el insert

        $status="Your entry has been update successfully";
        return back()->with(compact('status'));
    }
}
