@extends('master')
@section('title','Editar Aeronave')
@section('content')
<form method="POST" action="{{route('aeronaves.update',$aeronave)}}" class="form-group">
	<input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group col-md-4">
    	<label for="inputMatricula">Matricula</label>
        <input type="text" class="form-control" name="matricula" id="inputMatricula" 
        value="{{old('matricula',$aeronave->matricula)}}" readonly="readonly" />
    </div>
    @include('aeronaves.create-edit')  
    <div class="form-group col-md-12">
        <button type="submit" class="btn btn-success" name="ok">Save</button>
        <a href="{{route('aeronaves.index')}}" class="btn btn-default">Cancel</a>
    </div>
</form>
@endsection
