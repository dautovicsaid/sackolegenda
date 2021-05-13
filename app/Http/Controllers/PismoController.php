<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pismo;

class PismoController extends Controller
{
    
public function index(){
   $pisma = Pismo::all();
   return view('pismo.index', ['pisma' => $pisma]);
}
public function create(){
return view('pismo.create');

}
public function store(Request $request){
    $pismo = new Pismo();
    $pismo->Naziv = $request->input('naziv');
    $pismo->save();
    return redirect()->route('pismo.index');

}
public function update($id, Request $request){
  $input = $request->all(); 
  $pismo = Pismo::find($id);
  $pismo->Naziv = $input['naziv'];
  $pismo->save();
  return redirect()->route('pismo.index');
}
public function edit($id){
    
    $pismo = Pismo::find($id);
    return view('pismo.edit', compact('pismo'));
}
    
   


public function destroy($id){
    $pismo = Pismo::find($id)->delete();
   
    return redirect()->route('pismo.index');
 
}}