@extends('disseny')
@section('content')
<h1>Dades del apartament</h1>
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
			<td>Codi Apartament</td>
			<td>{{$dades_apartament->codi_apartament}}</td>
		</tr>
		<tr>
			<td>Referència Catastral</td>
			<td>{{$dades_apartament->ref_catastral}}</td>
		</tr>
		<tr>
			<td>Ciutat</td>
			<td>{{$dades_apartament->ciutat}}</td>
		</tr>
		<tr>
			<td>Barri</td>
			<td>{{$dades_apartament->barri}}</td>
		</tr>
		<tr>
			<td>Nom Carrer</td>
			<td>{{$dades_apartament->nom_carrer}}</td>
		</tr>
		<tr>
			<td>Número Carrer</td>
			<td>{{$dades_apartament->numero_carrer}}</td>
		</tr>
		<tr>
			<td>Pis</td>
			<td>{{$dades_apartament->pis}}</td>
		</tr>
		<tr>
			<td>Nombre de Llits</td>
			<td>{{$dades_apartament->nombre_llits}}</td>
		</tr>
		<tr>
			<td>Nombre d'Habitacions</td>
			<td>{{$dades_apartament->nombre_habitacions}}</td>
		</tr>
		<tr>
			<td>Ascensor</td>
			<td>{{$dades_apartament->ascensor ? 'Sí' : 'No' }}</td>
		</tr>
		<tr>
			<td>Calefacció</td>
			<td>
				@if($dades_apartament->calefaccio == 'buta')
                    Butà
                @elseif($dades_apartament->calefaccio == 'gas_natural')
                    Gas Natural
                @elseif($dades_apartament->calefaccio == 'electrica')
                    Elèctrica
                @else
                    {{ $dades_apartament->calefaccio }}
                @endif
			</td>
		</tr>
		<tr>
			<td>Aire Condicionat</td>
			<td>{{$dades_apartament->aire_condicionat ? 'Sí' : 'No' }}</td>
		</tr>
	</tbody>	
  </table>
  <div class="p-6 bg-white border-b border-gray-200">
	  <a href="{{ url('apartaments') }}">Torna a la llista<a/>
  </div>
  <br>
<div>
@endsection