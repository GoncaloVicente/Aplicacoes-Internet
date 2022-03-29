@extends('master')
@section('title','Lista de Aeródromos')
@section('content')
    @if (count($aerodromos))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Militar</th>
                <th>Ultraleve</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach ($aerodromos as $aerodromo)
                <tr>
                    <td>{{($aerodromo->code)}}</td>
                    <td>{{($aerodromo->nome)}}</td>
                    <td>{{($aerodromo->militar)}}</td>
                    <td>{{$aerodromo->ultraleve}}</td>
                    <td>
                        <a class="btn btn-xs btn-primary" href="{{route('aerodromos.edit',$aerodromo)}}">Editar</a>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>Não foram encontrados aeródromos</h2>
    @endif
@endsection
