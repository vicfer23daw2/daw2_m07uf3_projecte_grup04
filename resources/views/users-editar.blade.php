@extends('disseny')
@section('content')
<div class="card mt-5">
    <div class="card-header">
        Actualització de dades
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('users.update', $dades_user->id) }}">
			@csrf
            @method('PATCH')
            <div class="form-group">           
				<label for="name">Nom</label>
				<input type="text" class="form-control" name="name" value="{{ $dades_user->name }}" />
			</div>
			<div class="form-group">           
				<label for="cognoms">Cognoms</label>
				<input type="text" class="form-control" name="cognoms" value="{{ $dades_user->cognoms }}"/>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email"  value="{{ $dades_user->email }}"/>
			</div>
            <div class="form-group">           
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="{{ $dades_user->password }}"/>
            </div>
			<div class="form-group">           
				<label for="tipus">Tipus</label>
				<select name="tipus">					
					<option value="treballador" {{ $dades_user->tipus == "treballador" ? 'selected' : ''}}>Treballador</option>
					<option value="cap_departament" {{ $dades_user->tipus == "cap_departament" ? 'selected' : ''}}>Cap de Departament</option>					    
				</select>
			</div>
			<div class="form-group">           
				<label for="hora_entrada">Hora d'Entrada</label>
				<input type="time" class="form-control" name="hora_entrada"  value="{{ $dades_user->hora_entrada }}"/>
			</div>        
			<div class="form-group">
				<label for="hora_sortida">Hora de Sortida</label>
				<input type="time" class="form-control" name="hora_sortida"  value="{{ $dades_user->hora_sortida }}"/>
			</div>
			<button type="submit" class="btn btn-block btn-primary">Modifica</button>
        </form>
    </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection