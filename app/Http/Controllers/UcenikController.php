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
        $tipk=Tipkorisnika::where('Naziv','Ucenik')->first()->id;
        $ucenici=Korisnik::where('tipkorisnika_id',$tipk)->get();

        return view('ucenik.index' , ['ucenici'=>$ucenici]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function show(Korisnik $ucenik)
    {
        $ucenik=Korisnik::where('id',$ucenik->id)->first();
        return view('ucenik.show',['ucenik'=>$ucenik]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function edit(Ucenik $ucenik)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ucenik  $ucenik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ucenik $ucenik)
    {
        //
    }
}
