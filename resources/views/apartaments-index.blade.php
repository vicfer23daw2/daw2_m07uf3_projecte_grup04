@extends('disseny')
@section('content')
<h2 class="mt-4">Llista d'apartaments</h2>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>Codi Apartament</td>
          <td>Ciutat</td> 
          <td>Barri</td>
          <td>Nombre de llits</td>
          <td>Nombre d'habitacions</td>        
          <td>Accions sobre la taula</td>   
        </tr>
    </thead>
    <tbody>
        @foreach($dades_apartaments as $apartament)
        <tr>
            <td>{{$apartament->codi_apartament}}</td> 
            <td>{{$apartament->ciutat}}</td>
            <td>{{$apartament->barri}}</td>
            <td>{{$apartament->nombre_llits}}</td>  
            <td>{{$apartament->nombre_habitacions}}</td>                  
            <td class="text-left">
            <a href="{{ route('apartaments.edit', $apartament->codi_apartament)}}" class="btn btn-primary btn-sm">Edita</a>
            <form action="{{ route('apartaments.destroy', $apartament->codi_apartament)}}" method="post" style="display: inline-block">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit">
                Esborra
              </button>
            </form>
            <a href="{{ route('apartaments.show', $apartament->codi_apartament)}}" class="btn btn-info btn-sm">Mostra</a>  
          </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
<div class="p-6 bg-white border-b border-gray-200">
  <a href="{{ url('apartaments/create') }}">Apartaments: Crea un nou apartament<a/><br><br>
	<a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection