@extends('disseny')
@section('content')
<div class="card mt-5">
  <div class="card-header">
    Afegeix un nou treballador
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
    <form method="post" action="/users">
        @csrf
        <div class="form-group">           
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name"/>
        </div>
        <div class="form-group">           
            <label for="cognoms">Cognoms</label>
            <input type="text" class="form-control" name="cognoms"/>
        </div>
        <div class="form-group">           
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email"/>
        </div>
        <div class="form-group">           
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password"/>
        </div>
        <div class="form-group">           
            <label for="tipus">Tipus de treballador</label>
            <select name="tipus">
			    <option value="treballador">Treballador</option>
			    <option value="cap_departament">Cap de departament</option>			    
			</select>
        </div>
        <div class="form-group">           
            <label for="hora_entrada">Hora d'entrada</label>
            <input type="time" class="form-control" name="hora_entrada"/>
        </div>
        <div class="form-group">           
            <label for="hora_sortida">Hora de sortida</label>
            <input type="time" class="form-control" name="hora_sortida"/>            
        </div>        
        <button type="submit" class="btn btn-block btn-primary">Envia</button>
    </form>    
  </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection