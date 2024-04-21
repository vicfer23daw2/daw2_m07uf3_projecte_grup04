@extends('disseny')
@section('content')
<h1>Dades del lloguer</h1>
<div class="mt-5">
  <table class="table table-striped table-bordered table-hover">
	<thead class="thead-dark">
		<tr class="table-primary">
			<th scope="col">CAMP</td>
			<th scope="col">VALOR</td>
        </tr>
	</thead>
	<tbody>
		<tr>
			<td>DNI</td>
			<td>{{$dades_lloguer->dni_client}}</td>
		</tr>
		<tr>
			<td>Codi Apartament</td> 
			<td>{{$dades_lloguer->codi_apartament}}</td>
		</tr>
		<tr>
			<td>Data d'inici</td>
			<td>{{$dades_lloguer->data_inici}}</td>
		</tr>
		<tr>
			<td>Hora d'inici</td>
			<td>{{$dades_lloguer->hora_inici}}</td>
		</tr>
		<tr>
			<td>Data de finalització</td>
			<td>{{$dades_lloguer->data_finalitzacio}}</td>
		</tr>
		<tr>
			<td>Hora de finalització</td>
			<td>{{$dades_lloguer->hora_finalitzacio}}</td>
		</tr>
		<tr>
			<td>Lloc de lliurament de claus</td>
			<td>{{$dades_lloguer->lliurament_claus}}</td>
		</tr>
		<tr>
			<td>Lloc de devolució de claus</td>
			<td>{{$dades_lloguer->devolucio_claus}}</td>
		</tr>
		<tr>
			<td>Preu per dia</td>
			<td>{{$dades_lloguer->preu_dia}} €</td>
		</tr>
		<tr>
			<td>Dipòsit</td>
			<td>{{$dades_lloguer->diposit ? 'Sí' : 'No' }}</td>
		</tr>
		<tr>
			<td>Quantitat del dipòsit</td>
			<td>{{$dades_lloguer->quantitat_diposit}} €</td>
		</tr>
		<tr>
			<td>Assegurança</td>
			<td>
                @if($dades_lloguer->asseguransa == 'franquicia_fins_1000_euros')
                    Franquícia fins a 1000€
                @elseif($dades_lloguer->asseguransa == 'franquicia_fins_500_euros')
                    Franquícia fins a 500€
                @elseif($dades_lloguer->asseguransa == 'sense_franquicia')
                    Sense Franquícia
                @else
                    {{ $dades_lloguer->asseguransa }}
                @endif
            </td>
		</tr>
 
	</tbody>	
  </table>
  <div class="p-6 bg-white border-b border-gray-200">
	  <a href="{{ url('lloguers') }}">Torna a la llista<a/>
  </div>
  <br>
<div>
@endsection