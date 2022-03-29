@extends('master')
@section('title','Mudar Palavra-Passe')
@section('content')
    <form method="POST" action="{{route('socios.updatePassword')}}" class="form-group">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="inputOld">Palavra-Passe Antiga</label>
            <input type="password" class="form-control" name="old_password" id="inputOld"/>
            @if ($errors->has('old_password'))
                <em>{{ $errors->first('old_password') }}</em>
            @endif
        </div>
        <div class="form-group">
            <label for="inputNew">Palavra-Passe Nova</label>
            <input type="password" class="form-control" name="password" id="inputNew"/>
            @if ($errors->has('password'))
                <em>{{ $errors->first('password') }}</em>
            @endif
        </div>
        <div class="form-group">
            <label for="inputConfirmation">Confirmação da Palavra-Passe</label>
            <input type="password" class="form-control" name="password_confirmation" 
            id="inputConfirmation"/>
            @if ($errors->has('password_confirmation'))
                <em>{{ $errors->first('password_confirmation') }}</em>
            @endif
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success" name="ok">Guardar</button>
            <a href="{{route('socios.index')}}" class="btn btn-default">Cancel</a>
        </div>
    </form>
@endsection
