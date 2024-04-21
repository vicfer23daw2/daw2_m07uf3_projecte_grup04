@extends('disseny')
@section('content')
<h1>Dades del usuari</h1>
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
			<td>Nom</td>
			<td>{{$dades_user->name}}</td>
		</tr>
		<tr>
			<td>Cognoms</td>
			<td>{{$dades_user->cognoms}}</td>
		</tr>
		<tr>
			<td>Email</td>
			<td>{{$dades_user->email}}</td>
		</tr>
		<tr>
			<td>Contrasenya</td>
			<td>{{$dades_user->password}}</td>
		</tr>
		<tr>
			<td>Tipus</td>
			<td>{{$dades_user->tipus}}</td>
		</tr>
		<tr>
			<td>Hora d'entrada</td>
			<td>{{$dades_user->hora_entrada}}</td>
		</tr>
		<tr>
			<td>Hora de sortida</td>
			<td>{{$dades_user->hora_sortida}}</td>
		</tr>
	</tbody>	
  </table>
  <div class="p-6 bg-white border-b border-gray-200">
	  <a href="{{ url('users') }}">Torna a la llista<a/>
  </div>
  <br>
<div>
@endsection