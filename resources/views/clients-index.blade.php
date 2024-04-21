@extends('disseny')
@section('content')
<h2 class="mt-4">Llista de clients</h2>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>DNI</td>
          <td>Nom</td> 
          <td>Cognoms</td> 
          <td>Email</td>           
          <td>Accions sobre la taula</td>           
        </tr>
    </thead>
    <tbody>
        @foreach($dades_clients as $client)
        <tr>
            <td>{{$client->dni_client}}</td>
            <td>{{$client->nom}}</td> 
            <td>{{$client->cognoms}}</td>  
            <td>{{$client->email}}</td>                     
            <td class="text-left">
            <a href="{{ route('clients.edit', $client->dni_client)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('clients.destroy', $client->dni_client)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('clients.show', $client->dni_client)}}" class="btn btn-info btn-sm">Mostra</a>  
          </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
  <a href="{{ url('clients/create') }}">Clients: Crea un nou client<a/><br><br>
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection