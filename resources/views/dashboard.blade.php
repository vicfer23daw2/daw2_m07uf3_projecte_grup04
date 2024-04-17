@extends('disseny')
@section('content')

<h2 class="mt-4">Dashboard</h2>

<div class="list-group">
    <a href="#" class="list-group-item list-group-item-action">Gestió de CLIENTS</a>
    <a href="#" class="list-group-item list-group-item-action">Gestió d'APARTAMENTS</a>
    <a href="#" class="list-group-item list-group-item-action">Gestió de LLOGUERS</a>
    <!-- Opcions per a usuaris 'cap_departament' -->
    @if(auth()->user()->tipus === 'cap_departament')
        <a href="{{ url('users') }}" class="list-group-item list-group-item-action">Gestió de TREBALLADORS</a>
    @endif
</div>

@endsection
