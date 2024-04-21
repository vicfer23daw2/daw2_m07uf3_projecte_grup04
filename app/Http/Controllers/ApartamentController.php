<?php

namespace App\Http\Controllers;

use App\Models\Apartament;
use Illuminate\Http\Request;

class ApartamentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_apartaments = Apartament::all();
        return view('apartaments-index', compact('dades_apartaments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('apartaments-crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouApartament = $request->validate([
            'codi_apartament' => 'required|unique:apartaments',
            'ref_catastral' => 'required',
            'ciutat' => 'required',
            'barri' => 'required',
            'nom_carrer' => 'required',
            'numero_carrer' => 'required',
            'pis' => 'nullable',
            'nombre_llits' => 'required',
            'nombre_habitacions' => 'required',
            'ascensor' => 'boolean',
            'calefaccio' => 'required',
            'aire_condicionat' => 'boolean',

        ]);
        $apartament = Apartament::create($nouApartament);
        $dades_apartaments = Apartament::all();
        return view('apartaments-index', compact('dades_apartaments'));
    }

    /**
     * Display the specified resource.
     */
    public function show($codi_apartament)
    {
        $dades_apartament = Apartament::findOrFail($codi_apartament);
        return view('apartaments-mostra',compact('dades_apartament'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($codi_apartament)
    {
        $dades_apartament = Apartament::findOrFail($codi_apartament);
        return view('apartaments-editar',compact('dades_apartament'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $codi_apartament)
    {
        $noves_dades_apartament = $request->validate([
            'codi_apartament' => 'required|unique:apartaments,codi_apartament,' . $codi_apartament . ',codi_apartament',
            'ref_catastral' => 'required',
            'ciutat' => 'required',
            'barri' => 'required',
            'nom_carrer' => 'required',
            'numero_carrer' => 'required',
            'pis' => 'nullable',
            'nombre_llits' => 'required',
            'nombre_habitacions' => 'required',
            'ascensor' => 'boolean',
            'calefaccio' => 'required',
            'aire_condicionat' => 'boolean',
        ]);
        Apartament::findOrFail($codi_apartament)->update($noves_dades_apartament);
        $dades_apartaments = Apartament::all();
        return view('apartaments-index', compact('dades_apartaments'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($codi_apartament)
    {
        $apartament = Apartament::findOrFail($codi_apartament)->delete();
        $dades_apartaments = Apartament::all();
        return view('apartaments-index', compact('dades_apartaments'));
    }
}
