@extends('disseny')
@section('content')
<h1>Dades del client</h1>
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
			<td>{{$dades_client->dni_client}}</td>
		</tr>
		<tr>
			<td>Nom</td>
			<td>{{$dades_client->nom}}</td>
		</tr>
		<tr>
			<td>Cognoms</td>
			<td>{{$dades_client->cognoms}}</td>
		</tr>
		<tr>
			<td>Edat</td>
			<td>{{$dades_client->edat}}</td>
		</tr>
		<tr>
			<td>Telèfon</td>
			<td>{{$dades_client->telefon}}</td>
		</tr>
		<tr>
			<td>Adreça</td>
			<td>{{$dades_client->adressa}}</td>
		</tr>
		<tr>
			<td>Ciutat</td>
			<td>{{$dades_client->ciutat}}</td>
		</tr>
		<tr>
			<td>Pais</td>
			<td>{{$dades_client->pais}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$dades_client->email}}</td>
		</tr>
		<tr>
			<td>Targeta</td>
			<td>{{$dades_client->targeta}}</td>
		</tr>
		<tr>
			<td>Número Targeta</td>
			<td>{{$dades_client->num_targeta}}</td>
		</tr>
	</tbody>	
  </table>
  <div class="p-6 bg-white border-b border-gray-200">
	  <a href="{{ url('clients') }}">Torna a la llista<a/>
  </div>
  <br>
<div>
@endsection