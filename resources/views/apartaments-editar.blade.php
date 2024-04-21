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
        <form method="post" action="{{ route('apartaments.update', $dades_apartament->codi_apartament) }}">
			@csrf
            @method('PATCH')
			<div class="form-group">           
				<label for="codi_apartament">Codi Apartament</label>
				<input type="text" class="form-control" name="codi_apartament" value="{{ $dades_apartament->codi_apartament }}" />
			</div>
            <div class="form-group">           
				<label for="ref_catastral">Referència Catastral</label>
				<input type="text" class="form-control" name="ref_catastral" value="{{ $dades_apartament->ref_catastral }}" />
			</div>
			<div class="form-group">           
				<label for="ciutat">Ciutat</label>
				<input type="text" class="form-control" name="ciutat" value="{{ $dades_apartament->ciutat }}"/>
			</div>
			<div class="form-group">
				<label for="barri">Barri</label>
				<input type="text" class="form-control" name="barri"  value="{{ $dades_apartament->barri }}"/>
			</div>
			<div class="form-group">
				<label for="nom_carrer">Nom del carrer</label>
				<input type="text" class="form-control" name="nom_carrer"  value="{{ $dades_apartament->nom_carrer }}"/>
			</div>
			<div class="form-group">
				<label for="numero_carrer">Número del carrer</label>
				<input type="text" class="form-control" name="numero_carrer"  value="{{ $dades_apartament->numero_carrer }}"/>
			</div>
			<div class="form-group">
				<label for="pis">Pis</label>
				<input type="text" class="form-control" name="pis"  value="{{ $dades_apartament->pis }}"/>
			</div>
			<div class="form-group">
				<label for="nombre_llits">Nombre de llits</label>
				<input type="number" class="form-control" name="nombre_llits"  value="{{ $dades_apartament->nombre_llits }}"/>
			</div>
			<div class="form-group">
				<label for="nombre_habitacions">Nombre d'habitacions</label>
				<input type="number" class="form-control" name="nombre_habitacions"  value="{{ $dades_apartament->nombre_habitacions }}"/>
			</div>
			<div class="form-group">
				<label for="ascensor">Ascensor</label>
				<input type="hidden" name="ascensor" value="0">
				<input type="checkbox" class="form-control" name="ascensor" id="ascensor" value="1" {{ $dades_apartament->ascensor ? 'checked' : '' }}>
			</div>
			<div class="form-group">           
				<label for="calefaccio">Calefacció</label>
				<select name="calefaccio">					
					<option value="electrica" {{ $dades_apartament->calefaccio == "electrica" ? 'selected' : ''}}>Elèctrica</option>
					<option value="gas_natural" {{ $dades_apartament->calefaccio == "gas_natural" ? 'selected' : ''}}>Gas Natural</option>	
					<option value="buta" {{ $dades_apartament->calefaccio == "buta" ? 'selected' : ''}}>Butà</option>
				</select>
			</div>      
			<div class="form-group">
				<label for="aire_condicionat">Aire Condicionat</label>
				<input type="hidden" name="aire_condicionat" value="0">
				<input type="checkbox" class="form-control" name="aire_condicionat" id="aire_condicionat" value="1" {{ $dades_apartament->aire_condicionat ? 'checked' : '' }}>
			</div>

			<button type="submit" class="btn btn-block btn-primary">Modifica</button>
        </form>
    </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection