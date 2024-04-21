<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dades_users = User::all();
        return view('users-index', compact('dades_users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users-crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nouUser = $request->validate([
            'name' => 'required',
            'cognoms' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tipus' => 'required',
            'hora_entrada' => 'required',
            'hora_sortida' => 'required'
        ]);
        $user = User::create($nouUser);
        $dades_users = User::all();
        return view('users-index', compact('dades_users'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dades_user = User::findOrFail($id);
        return view('users-mostra',compact('dades_user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dades_user = User::findOrFail($id);
        return view('users-editar',compact('dades_user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $noves_dades_user = $request->validate([
            'name' => 'required',
            'cognoms' => 'required',
            'email' => 'required',
            'password' => 'required',
            'tipus' => 'required',
            'hora_entrada' => 'required',
            'hora_sortida' => 'required'
        ]);
        User::findOrFail($id)->update($noves_dades_user);
        $dades_users = User::all();
        return view('users-index', compact('dades_users'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id)->delete();
        $dades_users = User::all();
        return view('users-index', compact('dades_users'));
    }

}
