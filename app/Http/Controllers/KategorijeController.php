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
        $kategorije->naziv = $request->input('naziv');
        $kategorije->save();
        return redirect('/settingsKategorije');
    }
    public function edit($id){
        $kategorije = Kategorije::find($id);
        return view('kategorije.edit', compact('kategorije'));
    /*
    $povez =Povez::all();
    foreach($povez as $p) {
        if($p->id==$id) {
            $p->update();
            return redirect('/settingsPovez');

        }
        */
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $kategorije = Kategorije::find($id);
        $kategorije->naziv = $input['naziv'];
        $kategorije->ikonica = $input['ikonica'];
        $kategorije->opis = $input['opis'];
        $kategorije->save();
        return redirect('/settingsKategorije');


    }

    
        public function delete($id){
            $kategorije = Kategorije::find($id)->delete();
        
            return redirect('/settingsKategorije');
    }  
}

