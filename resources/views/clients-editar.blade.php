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
        <form method="post" action="{{ route('clients.update', $dades_client->dni_client) }}">
			@csrf
            @method('PATCH')
			<div class="form-group">           
				<label for="dni_client">DNI</label>
				<input type="text" class="form-control" name="dni_client" value="{{ $dades_client->dni_client }}" />
			</div>
            <div class="form-group">           
				<label for="nom">Nom</label>
				<input type="text" class="form-control" name="nom" value="{{ $dades_client->nom }}" />
			</div>
			<div class="form-group">           
				<label for="cognoms">Cognoms</label>
				<input type="text" class="form-control" name="cognoms" value="{{ $dades_client->cognoms }}"/>
			</div>
			<div class="form-group">
				<label for="edat">Edat</label>
				<input type="number" class="form-control" name="edat"  value="{{ $dades_client->edat }}"/>
			</div>
			<div class="form-group">
				<label for="telefon">Telèfon</label>
				<input type="text" class="form-control" name="telefon"  value="{{ $dades_client->telefon }}"/>
			</div>
			<div class="form-group">
				<label for="adressa">Adreça</label>
				<input type="text" class="form-control" name="adressa"  value="{{ $dades_client->adressa }}"/>
			</div>
			<div class="form-group">
				<label for="ciutat">Ciutat</label>
				<input type="text" class="form-control" name="ciutat"  value="{{ $dades_client->ciutat }}"/>
			</div>
			<div class="form-group">
				<label for="pais">País</label>
				<input type="text" class="form-control" name="pais"  value="{{ $dades_client->pais }}"/>
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input type="text" class="form-control" name="email"  value="{{ $dades_client->email }}"/>
			</div>
			<div class="form-group">           
				<label for="targeta">Targeta</label>
				<select name="targeta">					
					<option value="debit" {{ $dades_client->targeta == "debit" ? 'selected' : ''}}>Dèbit</option>
					<option value="credit" {{ $dades_client->targeta == "credit" ? 'selected' : ''}}>Crèdit</option>					    
				</select>
			</div>      
			<div class="form-group">
				<label for="num_targeta">Num. Targeta</label>
				<input type="text" class="form-control" name="num_targeta"  value="{{ $dades_client->num_targeta }}"/>
			</div>
			<button type="submit" class="btn btn-block btn-primary">Modifica</button>
        </form>
    </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection