@extends('master')
@section('title','Editar Aeródromo')
@section('content')
    <form method="POST" action="{{route('aerodromos.update',$aerodromo)}}" class="form-group">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group col-md-12">
            <label for="inputCode">Código</label>
            <select name="code" id="inputTipoLicenca" class="form-control">
                <option disabled selected> -- Selecione uma opção -- </option>
                @foreach(DB::table('aerodromos')->pluck('code') as $codigo)
                    <option {{ old('code',$aerodromo->code) == "$codigo" ? 'selected' : '' }} value="{{$codigo}}">{{$codigo}}</option>
                @endforeach
            </select>
            @if ($errors->has('code'))
                <em>{{ $errors->first('code') }}</em>
            @endif
        </div>
        <div class="form-group col-md-12">
            <label for="inputNome">Nome</label>
            <input type="text" class="form-control" name="nome" id="inputNome"
                   value="{{old('nome',$aerodromo->nome)}}"/>
            @if ($errors->has('nome'))
                <em>{{ $errors->first('nome') }}</em>
            @endif
        </div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('aerodromos.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </form>
@endsection