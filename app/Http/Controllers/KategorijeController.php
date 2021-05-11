<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategorije;
use Image;

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
    //file

        /*$request->validate([
            'file' => 'required|mimes:png,jpg,svg|max:2048'
        ]);
    
            
        $fileName = time().'_'.$request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
    
        $kategorije->Naziv = time().'_'.$request->file->getClientOriginalName();
        $kategorije->Ikonica = '/storage/' . $filePath;*/
            
    //endoffile



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

