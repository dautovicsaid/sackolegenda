<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Povez;

class PovezController extends Controller
{
    public function index(){
        $povezi= Povez::all(); 
        return view('povez.index', ['povezi'=>$povezi]);
    }
    public function create(){
        return view('povez.create');
    }
    public function store(Request $request){
        $povez = new Povez();
        $povez->Naziv = $request->input('Naziv');
        $povez->save();
        return redirect('/settingsPovez');
    }
    public function edit($id){
        $povez = Povez::find($id);
        return view('povez.edit', compact('povez'));
    
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $povez = Povez::find($id);
        $povez->Naziv = $input['Naziv'];
        $povez->save();
        return redirect('/settingsPovez');


    }

    
        public function delete($id){
            $povez = Povez::find($id)->delete();
        
            return redirect('/settingsPovez');
    }
} 
