<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_clients = Client::all();
        return view('clients-index', compact('dades_clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients-crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouClient = $request->validate([
            'dni_client' => 'required|unique:clients',
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
            'telefon' => 'required',
            'adressa' => 'required',
            'ciutat' => 'required',
            'pais' => 'required',
            'email' => 'required|unique:clients',
            'targeta' => 'required',
            'num_targeta' => 'required'
        ]);
        $client = Client::create($nouClient);
        $dades_clients = Client::all();
        return view('clients-index', compact('dades_clients'));
    }

    /**
     * Display the specified resource.
     */
    public function show($dni_client)
    {
        $dades_client = Client::findOrFail($dni_client);
        return view('clients-mostra',compact('dades_client'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($dni_client)
    {
        $dades_client = Client::findOrFail($dni_client);
        return view('clients-editar',compact('dades_client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $dni_client)
    {
        $noves_dades_client = $request->validate([
            'dni_client' => 'required|unique:clients,dni_client,' . $dni_client . ',dni_client',
            'nom' => 'required',
            'cognoms' => 'required',
            'edat' => 'required',
            'telefon' => 'required',
            'adressa' => 'required',
            'ciutat' => 'required',
            'pais' => 'required',
            'email' => 'required|unique:clients,email,' . $dni_client . ',dni_client',
            'targeta' => 'required',
            'num_targeta' => 'required'
        ]);
        Client::findOrFail($dni_client)->update($noves_dades_client);
        $dades_clients = Client::all();
        return view('clients-index', compact('dades_clients'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($dni_client)
    {
        $client = Client::findOrFail($dni_client)->delete();
        $dades_clients = Client::all();
        return view('clients-index', compact('dades_clients'));
    }
}
