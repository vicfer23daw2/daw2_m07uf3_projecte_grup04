@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou client
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
    <form method="post" action="/apartaments">
        @csrf
        <div class="form-group">           
          <label for="codi_apartament">Codi Apartament</label>
          <input type="text" class="form-control" name="codi_apartament"/>
        </div>
        <div class="form-group">           
          <label for="ref_catastral">Referència Catastral</label>
          <input type="text" class="form-control" name="ref_catastral"/>
        </div>
        <div class="form-group">           
          <label for="ciutat">Ciutat</label>
          <input type="text" class="form-control" name="ciutat"/>
        </div>
        <div class="form-group">
          <label for="barri">Barri</label>
          <input type="text" class="form-control" name="barri"/>
        </div>
        <div class="form-group">
          <label for="nom_carrer">Nom del carrer</label>
          <input type="text" class="form-control" name="nom_carrer"/>
        </div>
        <div class="form-group">
          <label for="numero_carrer">Número del carrer</label>
          <input type="text" class="form-control" name="numero_carrer"/>
        </div>
        <div class="form-group">
          <label for="pis">Pis</label>
          <input type="text" class="form-control" name="pis"/>
        </div>
        <div class="form-group">
          <label for="nombre_llits">Nombre de llits</label>
          <input type="number" class="form-control" name="nombre_llits"/>
        </div>
        <div class="form-group">
          <label for="nombre_habitacions">Nombre d'habitacions</label>
          <input type="number" class="form-control" name="nombre_habitacions"/>
        </div>
        <div class="form-group">
          <label for="ascensor">Ascensor</label>
          <input type="checkbox" class="form-control" name="ascensor" value="1">
        </div>
        <div class="form-group">           
          <label for="calefaccio">Calefacció</label>
          <select name="calefaccio">					
            <option value="electrica">Elèctrica</option>
            <option value="gas_natural">Gas Natural</option>	
            <option value="buta">Butà</option>
          </select>
        </div>      
        <div class="form-group">
          <label for="aire_condicionat">Aire Condicionat</label>
          <input type="checkbox" class="form-control" name="aire_condicionat" value="1">
        </div>
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection