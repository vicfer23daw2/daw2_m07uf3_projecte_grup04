@extends('disseny')
@section('content')
<h2 class="mt-4">Llista d'usuaris</h2>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>Nom</td>
          <td>Cognoms</td> 
          <td>Email</td> 
          <td>Tipus</td>
          <td>Hora Entrada</td> 
          <td>Hora Sortida</td>           
          <td>Accions sobre la taula</td>           
        </tr>
    </thead>
    <tbody>
        @foreach($dades_users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->cognoms}}</td>  
            <td>{{$user->email}}</td>
            <td>{{$user->tipus}}</td>
            <td>{{$user->hora_entrada}}</td>
            <td>{{$user->hora_sortida}}</td>                     
            <td class="text-left">
            <a href="{{ route('users.edit', $user->id)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('users.destroy', $user->id)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('users.show', $user->id)}}" class="btn btn-info btn-sm">Mostra</a>  
          </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
  <a href="{{ url('users/create') }}">Treballadors: Crea un nou treballador<a/><br><br>
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection