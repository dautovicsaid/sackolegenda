<?php

namespace App\Http\Controllers;

use App\Models\Format;
use Illuminate\Http\Request;

class FormatController extends Controller
{
    public function index(){

        $formati = Format::all();

        return view('format.index' , ['formati'=>$formati]);
    }

    public function create(){

        return view('format.create');
    }

    public function store(Request $request){

        $format = new Format();
        $format->naziv = $request->input('Naziv');
        $format->save();
        return redirect('/settingsFormat');
    }

    public function edit($id){

        $format = Format::find($id);
       
        return view('format.edit', compact('format'));
    }

    public function update($id, Request $request){

        $input = $request->all(); 
        $format = Format::find($id);
        $format->naziv = $input['Naziv'];
        $format->save();

        return redirect('/settingsFormat');
    }

    public function delete($id){

        $format = Format::find($id)->delete();
        
        return redirect('/settingsFormat');
    }
}