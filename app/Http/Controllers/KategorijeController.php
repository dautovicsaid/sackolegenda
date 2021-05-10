<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorije;

class KategorijeController extends Controller
{
    public function index(){
        $kategorije= Kategorije::all(); 
        return view('kategorije.index', ['kategorije'=>$kategorije]);
    }
    public function create(){
        return view('kategorije.create');
    }
    public function store(Request $request){
        
    
        $kategorije = new Kategorije();
        $kategorije->Naziv = $request->input('Naziv');

        


        $kategorije->Opis = $request->input('Opis');
        $kategorije->save();
        return redirect('/settingsKategorije');
    }
    public function edit($id){
        $kategorije = Kategorije::find($id);
        return view('kategorije.edit', compact('kategorije'));

    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $kategorije = Kategorije::find($id);
        $kategorije->Naziv = $input['Naziv'];
        
        $kategorije->Opis = $input['Opis'];
        $kategorije->save();
        return redirect('/settingsKategorije');


    }

    
        public function delete($id){
            $kategorije = Kategorije::find($id)->delete();
        
            return redirect('/settingsKategorije');
    }  
}

