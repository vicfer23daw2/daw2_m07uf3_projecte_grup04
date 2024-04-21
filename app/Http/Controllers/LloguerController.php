<?php

namespace App\Http\Controllers;

use App\Models\Lloguer;
use App\Models\Apartament;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class LloguerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_lloguers = Lloguer::all();
        return view('lloguers-index', compact('dades_lloguers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dades_clients = Client::all();
        $dades_apartaments = Apartament::all();
        return view('lloguers-crear', compact('dades_clients', 'dades_apartaments'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouLloguer = $request->validate([
            'dni_client' => 'required',
            'codi_apartament' => [
                'required',
                Rule::unique('lloguers')->where(function ($query) use ($request) {
                    return $query->where('codi_apartament', $request->codi_apartament)
                                 ->where(function ($q) use ($request) {
                                     $q->whereBetween('data_inici', [$request->data_inici, $request->data_finalitzacio])
                                       ->orWhereBetween('data_finalitzacio', [$request->data_inici, $request->data_finalitzacio]);
                                 });
                }),
            ],
            'data_inici' => 'required',
            'hora_inici' => 'required',
            'data_finalitzacio' => 'required',
            'hora_finalitzacio' => 'required',
            'lliurament_claus' => 'required',
            'devolucio_claus' => 'required',
            'preu_dia' => 'required',
            'diposit' => 'boolean',
            'quantitat_diposit' => $request->has('diposit') ? 'required|numeric' : 'nullable|prohibited',
            'asseguransa' => 'required',

        ]);
        $lloguer = Lloguer::create($nouLloguer);
        $dades_lloguers = Lloguer::all();
        return view('lloguers-index', compact('dades_lloguers'));
    }

    /**
     * Display the specified resource.
     */
    public function show($dni_client, $codi_apartament)
    {
        $dades_lloguer = DB::table('lloguers')
            ->where('dni_client', $dni_client)
            ->where('codi_apartament', $codi_apartament)
            ->first();
        return view('lloguers-mostra',compact('dades_lloguer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dni_client, $codi_apartament)
    {
        $dades_lloguer = DB::table('lloguers')
            ->where('dni_client', $dni_client)
            ->where('codi_apartament', $codi_apartament)
            ->first();

        $dades_clients = Client::all();
        $dades_apartaments = Apartament::all();
        return view('lloguers-editar',compact('dades_lloguer', 'dades_clients', 'dades_apartaments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dni_client, $codi_apartament)
    {
        $noves_dades_lloguer = $request->validate([
            'dni_client' => 'required',
            'codi_apartament' => [
                'required',
                Rule::unique('lloguers')->where(function ($query) use ($request, $dni_client, $codi_apartament) {
                    return $query->where('codi_apartament', $request->codi_apartament)
                                 ->where('dni_client', '<>', $dni_client)
                                 ->where(function ($q) use ($request) {
                                     $q->whereBetween('data_inici', [$request->data_inici, $request->data_finalitzacio])
                                       ->orWhereBetween('data_finalitzacio', [$request->data_inici, $request->data_finalitzacio]);
                                 });
                }),
            ],
            'data_inici' => 'required',
            'hora_inici' => 'required',
            'data_finalitzacio' => 'required',
            'hora_finalitzacio' => 'required',
            'lliurament_claus' => 'required',
            'devolucio_claus' => 'required',
            'preu_dia' => 'required',
            'diposit' => 'boolean',
            'quantitat_diposit' => $request->has('diposit') ? 'required|numeric' : 'nullable|prohibited',
            'asseguransa' => 'required',
        ]);
        DB::table('lloguers')
            ->where('dni_client', $dni_client)
            ->where('codi_apartament', $codi_apartament)
            ->update($noves_dades_lloguer);

        $dades_lloguers = Lloguer::all();
        return view('lloguers-index', compact('dades_lloguers'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dni_client, $codi_apartament)
    {
        DB::table('lloguers')
            ->where('dni_client', $dni_client)
            ->where('codi_apartament', $codi_apartament)
            ->delete();

        $dades_lloguers = Lloguer::all();
        return view('lloguers-index', compact('dades_lloguers'));
    }
   
}
