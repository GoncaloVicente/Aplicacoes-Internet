@extends('master')
@section('title','Adicionar Movimento')
@section('content')
    <form method="POST" action="{{route('movimentos.store',$movimento)}}" class="form-group">
    	<input type="hidden" name="_token" value="{{csrf_token()}}">
        @include('movimentos.create-edit')
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success" name="ok">Adicionar</button>
            <a href="{{route('movimentos.index')}}" class="btn btn-default">Cancelar</a>
        </div>
    </form>
@endsection