@extends('master')
@section('title','Criar Sócio')
@section('content')
    <form action="{{route('socios.store',$socio)}}" method="post" class="form-group" enctype="multipart/form-data">
        @method('post')
        @csrf
        @include('socios.create-form')
		<div class="form-group col-md-12">
            <button type="submit" class="btn btn-success" name="ok">Save</button>
            <a href="{{route('socios.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </form>
@endsection
