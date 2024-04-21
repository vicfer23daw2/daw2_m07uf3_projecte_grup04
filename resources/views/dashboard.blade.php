@extends('disseny')
@section('content')

<h2 class="mt-4">Dashboard</h2>




<div class="list-group">
    <a href="{{ url('clients') }}" class="list-group-item list-group-item-action">Gestió de CLIENTS</a>
    <a href="{{ url('apartaments') }}" class="list-group-item list-group-item-action">Gestió d'APARTAMENTS</a>
    <a href="{{ url('lloguers') }}" class="list-group-item list-group-item-action">Gestió de LLOGUERS</a>
    @if(auth()->user()->tipus === 'cap_departament')
        <a href="{{ url('users') }}" class="list-group-item list-group-item-action">Gestió de TREBALLADORS</a>
    @endif
</div>

@endsection
