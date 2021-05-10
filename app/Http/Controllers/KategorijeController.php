<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategorijeController extends Controller
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
        $povez->naziv = $request->input('naziv');
        $povez->save();
        return redirect('/settingsPovez');
    }
    public function edit($id){
        $povez = Povez::find($id);
        return view('povez.edit', compact('povez'));
}
