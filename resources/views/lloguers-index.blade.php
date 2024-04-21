@extends('disseny')
@section('content')
<h2 class="mt-4">Llista de lloguers</h2>
<div class="mt-5">
  <table class="table">
    <thead>
        <tr class="table-primary">
          <td>DNI Client</td>
          <td>Codi Apartament</td> 
          <td>Data d'inici</td> 
          <td>Data de finalització</td> 
          <td>Dipòsit</td>        
          <td>Accions sobre la taula</td>   
        </tr>
    </thead>
    <tbody>
        @foreach($dades_lloguers as $lloguer)
        <tr>
            <td>{{ $lloguer->dni_client }}</td>
            <td>{{ $lloguer->codi_apartament }}</td>  
            <td>{{ $lloguer->data_inici }}</td>
            <td>{{ $lloguer->data_finalitzacio }}</td> 
            <td>{{ $lloguer->diposit ? 'Sí' : 'No' }}</td>                  
            <td class="text-left">
                <a href="{{ route('lloguers.edit', [$lloguer->dni_client, $lloguer->codi_apartament]) }}" class="btn btn-primary btn-sm">Edita</a>
                <form action="{{ route('lloguers.destroy', [$lloguer->dni_client, $lloguer->codi_apartament]) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Esborra</button>
                </form>
                <a href="{{ route('lloguers.show', [$lloguer->dni_client, $lloguer->codi_apartament]) }}" class="btn btn-info btn-sm">Mostra</a>  
            </td>            
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<div class="p-6 bg-white border-b border-gray-200">
  <a href="{{ url('lloguers/create') }}">Lloguers: Crea un nou lloguer</a><br><br>
  <a href="{{ url('dashboard') }}">Torna al dashboard</a>
</div>
@endsection
