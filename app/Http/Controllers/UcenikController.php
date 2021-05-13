<?php

namespace App\Http\Controllers;

use App\Models\Ucenik;
use Illuminate\Http\Request;
use App\Models\Tipkorisnika;
use App\Models\Korisnik;
class UcenikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipid=Tipkorisnika::where('Naziv','Ucenik')->first()->id;
        $ucenici=Korisnik::where('tipkorisnika_id',$tipid)->get();
        return view('ucenik.index',['ucenici'=>$ucenici]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tip=Tipkorisnika::all();
        return view('ucenik.create',['tip'=>$tip]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$ucenik=new Korisnik;
        $ucenik->ImePrezime = $request->input('ImePrezimeUcenik');
        $ucenik->JMBG = $request->input('jmbgUcenik');
        $ucenik->Email = $request->input('emailUcenik');
        $ucenik->KorisnickoIme = $request->input('usernameUcenik');
        $ucenik->Sifra = $request->input('pwUcenik');
        $ucenik->tipkorisnika_id = $request->input('tip_korisnika');
        $ucenik->save();*/
        $ucenik=new Korisnik;
        $ucenik->ImePrezime=$request->imePrezimeUcenik;
        $ucenik->JMBG=$request->jmbgUcenik;
        $ucenik->Email=$request->emailUcenik;
        $ucenik->KorisnickoIme=$request->usernameUcenik;
        $ucenik->Sifra=$request->pwUcenik;
        $ucenik->tipkorisnika_id=$request->tip_korisnika;
        $ucenik=$ucenik->save(); 

        //slika
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if($request->file('foto')){
            $file = $request->file('foto');
            $path = "storage/slikeKorisnici/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slikeKorisnici/slike-kategorija" , $file->getClientOriginalName());
            $ucenik->Foto=$path;
        }
        




        return redirect()->route('ucenik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function show(Korisnik $ucenik )
    {
         
        $ucenik = Korisnik::find($ucenik->id);
        return view('ucenik.show',['u'=>$ucenik]);

        // $ucenik=Korisnik::where('id',$ucenik->id)->first();
    
        // return view('ucenik.show',['u'=>$ucenik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function edit(Korisnik $ucenik)
    {
        $ucenik=Korisnik::where('id',$ucenik->id)->first();
        $tip=Tipkorisnika::all();
       //'t'=>$tip
        return view('ucenik.edit',['u'=>$ucenik,'tip'=>$tip]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ucenik $ucenik)
    {
        $ucenik=Korisnik::where('id',$ucenik->id)->first();
        $ucenik->ImePrezime=$request->imePrezimeUcenikEdit;
        $ucenik->JMBG=$request->jmbgUcenikEdit;
        $ucenik->Email=$request->emailUcenikEdit;
        $ucenik->KorisnickoIme=$request->usernameUcenikEdit;
        $ucenik->Sifra=$request->pwUcenikEdit;
        $ucenik->tipkorisnika_id=$request->tip_korisnika;

        //slika
        $request->validate([
            'foto'=>'nullable|image|max:2048'
        ]);

        if($request->file('foto')){
            $file = $request->file('foto');
            $newpath = "storage/slikeKorisnici/slike-kategorija/{$file->getClientOriginalName()}" ;
            $file->storeAs("/public/slikeKorisnici/slike-kategorija" , $file->getClientOriginalName());
        }
        $ucenik->Foto=$newpath;



        $ucenik=$ucenik->save(); 
        return redirect()->route('ucenik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ucenik $ucenik)
    {
        $ucenik=Ucenik::where('id',$ucenik->id)->delete();
        return redirect()->route('ucenik.index');
    }
}

