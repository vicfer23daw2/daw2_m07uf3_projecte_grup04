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
        <form method="post" action="{{ route('lloguers.update', [$dades_lloguer->dni_client, $dades_lloguer->codi_apartament]) }}">
            @csrf
            @method('PATCH')
            <div class="form-group">           
                <label for="dni_client">DNI Client</label>
                <select name="dni_client" class="form-control">
                    <option value="">Selecciona un client</option>
                    @foreach($dades_clients as $client)
                    <option value="{{ $client->dni_client }}" {{ $client->dni_client == $dades_lloguer->dni_client ? 'selected' : '' }}>{{ $client->dni_client }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">           
                <label for="codi_apartament">Codi Apartament</label>
                <select name="codi_apartament" class="form-control">
                    <option value="">Selecciona un apartament</option>
                    @foreach($dades_apartaments as $apartament)
                    <option value="{{ $apartament->codi_apartament }}" {{ $apartament->codi_apartament == $dades_lloguer->codi_apartament ? 'selected' : '' }}>{{ $apartament->codi_apartament }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="data_inici">Data d'inici</label>
                <input type="date" class="form-control" name="data_inici" value="{{ $dades_lloguer->data_inici }}"/>
            </div>
            <div class="form-group">
                <label for="hora_inici">Hora d'inici</label>
                <input type="time" class="form-control" name="hora_inici" value="{{ $dades_lloguer->hora_inici }}"/>
            </div>
            <div class="form-group">
                <label for="data_finalitzacio">Data de finalització</label>
                <input type="date" class="form-control" name="data_finalitzacio" value="{{ $dades_lloguer->data_finalitzacio }}"/>
            </div>
            <div class="form-group">
                <label for="hora_finalitzacio">Hora de finalització</label>
                <input type="time" class="form-control" name="hora_finalitzacio" value="{{ $dades_lloguer->hora_finalitzacio }}"/>
            </div>
            <div class="form-group">           
                <label for="lliurament_claus">Lloc de lliurament de claus</label>
                <input type="text" class="form-control" name="lliurament_claus" value="{{ $dades_lloguer->lliurament_claus }}"/>
            </div>
            <div class="form-group">           
                <label for="devolucio_claus">Lloc de devolució de claus</label>
                <input type="text" class="form-control" name="devolucio_claus" value="{{ $dades_lloguer->devolucio_claus }}"/>
            </div>
            <div class="form-group">           
                <label for="preu_dia">Preu per dia</label>
                <input type="number" class="form-control" name="preu_dia" value="{{ $dades_lloguer->preu_dia }}"/>
            </div>
            <div class="form-group">           
                <label for="diposit">Dipòsit</label>
                <input type="checkbox" class="form-control" name="diposit" value="1" {{ $dades_lloguer->diposit ? 'checked' : '' }}>
            </div>
            <div class="form-group">           
                <label for="quantitat_diposit">Quantitat del dipòsit</label>
                <input type="number" class="form-control" name="quantitat_diposit" {{ $dades_lloguer->diposit }}/>
            </div>
            <div class="form-group">           
                <label for="asseguransa">Assegurança</label>
                <select name="asseguransa" class="form-control">                    
                    <option value="franquicia_fins_1000_euros" {{ $dades_lloguer->asseguransa == 'franquicia_fins_1000_euros' ? 'selected' : '' }}>Franquícia fins a 1000€</option>
                    <option value="franquicia_fins_500_euros" {{ $dades_lloguer->asseguransa == 'franquicia_fins_500_euros' ? 'selected' : '' }}>Franquícia fins a 500€</option>    
                    <option value="sense_franquicia" {{ $dades_lloguer->asseguransa == 'sense_franquicia' ? 'selected' : '' }}>Sense Franquícia</option>
                </select>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Modifica</button>
        </form>
    </div>
</div>
<div class="p-6 bg-white border-b border-gray-200">
    <a href="{{ url('dashboard') }}">Torna al dashboard<a/>
</div>
@endsection
