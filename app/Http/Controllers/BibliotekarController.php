<?php

namespace App\Http\Controllers;

use App\Models\Bibliotekar;
use Illuminate\Http\Request;
use App\Models\Tipkorisnika;
use App\Models\Korisnik;


class BibliotekarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $idb=Tipkorisnika::where('Naziv','Bibliotekar')->first()->id;
        $bib=Korisnik::where('tipkorisnika_id',$idb)->get();
        return view('bibliotekar.index',['bib'=>$bib]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip=Tipkorisnika::all();
        return view('bibliotekar.create',['tip'=>$tip]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $bibliotekar=new Korisnik;
        $bibliotekar->ImePrezime=$request->imePrezimeBibliotekar;
        $bibliotekar->JMBG=$request->jmbgBibliotekar;
        $bibliotekar->Email=$request->emailBibliotekar;
        $bibliotekar->KorisnickoIme=$request->usernameBibliotekar;
        $bibliotekar->Sifra=$request->pwBibliotekar;
        $bibliotekar->tipkorisnika_id=$request->tip_korisnika;

        //slika
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if($request->file('foto')){
            $file = $request->file('foto');
            $path = "storage/slikeKorisnici/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slikeKorisnici/slike-kategorija" , $file->getClientOriginalName());
            $bibliotekar->Foto=$path;
        }
        

        $bibliotekar->save();
        return redirect()->route('bibliotekar.index');

    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function show(Korisnik $bibliotekar)
    {
        $bibliotekar=Korisnik::where('id',$bibliotekar->id)->first();
    
        return view('bibliotekar.show',['b'=>$bibliotekar]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function edit(Korisnik $bibliotekar)
    {
        $bibliotekar=Korisnik::where('id',$bibliotekar->id)->first();
        $tip=Tipkorisnika::all();
       //'t'=>$tip
        return view('bibliotekar.edit',['b'=>$bibliotekar,'tip'=>$tip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bibliotekar $bibliotekar)
    {
        
            $bibliotekar=Korisnik::where('id',$bibliotekar->id)->first();
            $bibliotekar->ImePrezime=$request->imePrezimeBibliotekarEdit;
            $bibliotekar->JMBG=$request->jmbgBibliotekarEdit;
            $bibliotekar->Email=$request->emailBibliotekarEdit;
            $bibliotekar->KorisnickoIme=$request->usernameBibliotekarEdit;
            $bibliotekar->Sifra=$request->pwBibliotekarEdit;
            $bibliotekar->tipkorisnika_id=$request->tip_korisnika;

            //files
    
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if($request->file('foto')){
            $file = $request->file('foto');
            $newpath = "/storage/public/slikeKorisnici/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slikeKorisnici/slike-kategorija" , $file->getClientOriginalName());
            $bibliotekar->Foto=$newpath;
        }
        

            $bibliotekar->save();
            return redirect()->route('bibliotekar.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bibliotekar  $bibliotekar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bibliotekar $bibliotekar)
    {
        $bibliotekar=Bibliotekar::where('id',$bibliotekar->id)->delete();
        return redirect()->route('bibliotekar.index');
  
    }
}
