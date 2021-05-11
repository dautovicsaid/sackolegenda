<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zanrovi;

class ZanroviController extends Controller
{
    public function index(){
        $zanrovi= Zanrovi::all(); 
        return view('zanrovi.index', ['zanrovi'=>$zanrovi]);
    }
    public function create(){
        return view('zanrovi.create');
    }
    public function store(Request $request){
        $zanrovi = new Zanrovi();
        $zanrovi->Naziv = $request->input('Naziv');
        $zanrovi->save();
        return redirect('/settingsZanrovi');
    }
    public function edit($id){
        $zanrovi = Zanrovi::find($id);
        return view('zanrovi.edit', compact('zanrovi'));
    
    }
    
    public function update($id, Request $request){
        $input = $request->all(); 
        $zanrovi = Zanrovi::find($id);
        $zanrovi->Naziv = $input['Naziv'];
        $zanrovi->save();
        return redirect('/settingsZanrovi');


    }

    
        public function delete($id){
            $zanrovi = Zanrovi::find($id)->delete();
        
            return redirect('/settingsZanrovi');
    }
     }
