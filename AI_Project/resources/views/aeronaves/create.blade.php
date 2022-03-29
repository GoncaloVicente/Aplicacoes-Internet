@extends('master')
@section('title','Adicionar Aeronave')
@section('content')
<form method="POST" action="{{route('aeronaves.store')}}" class="form-group">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group col-md-4">
	    <label for="inputMatricula">Matricula</label>
	    <input
	        type="text" class="form-control"
	        name="matricula" id="inputMatricula" value="{{old('matricula',$aeronave->matricula)}}"/>
	    @if ($errors->has('matricula'))
	        <em>{{ $errors->first('matricula') }}</em>
	    @endif
	</div>
    @include('aeronaves.create-edit')	
    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-success" name="ok">Adicionar</button>
        <a href="{{route('aeronaves.index')}}" class="btn btn-default">Cancelar</a>
    </div>
</form>
@endsection