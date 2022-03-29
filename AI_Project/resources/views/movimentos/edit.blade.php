@extends('master')
@section('title','Editar Movimento')
@section('content')
    <form method="POST" action="{{route('movimentos.update',$movimento)}}" class="form-group">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        @include('movimentos.create-edit')
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('movimentos.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </form>
<div class="form-group col-md-12">
@can('confimarVoo', App\Movimento::class)
    @if ($movimento->confirmado == 0)
        <form action="{{route('movimentos.update', $movimento)}}" method="post">
            @method('put')
            @csrf
            <input type="hidden" name="confirmar" value="1" />
            <button type="submit" class="btn btn-primary">Confirmar Movimento</button>
        </form>
    @endif
@endcan
</div>
@endsection

