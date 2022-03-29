@extends('master')
@section('title','Lista de Pilotos Não Autorizados')
@section('content')
@if (count($pilotos))
    <table class="table table-striped">
    <thead>
        <tr>
            <th>Número de sócio</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Tipo</th>
            <th>Direção</th>
            <th>Quotas pagas</th>
            <th>Ativo</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($pilotos as $piloto)
        <tr>
            <td>{{($piloto->num_socio)}}</td>
            <td>{{($piloto->nome_informal)}}</td>
            <td>{{($piloto->email)}}</td>
            <td>{{($piloto->typeToStr())}}</td>
            <td>{{($piloto->direcaoToStr())}}</td>
            <td>{{($piloto->quotaToStr())}}</td>
            <td>{{($piloto->ativoToStr())}}</td>
            <td>
                <form action="{{route('aeronaves.autorizarPiloto',[$aeronave,$piloto])}}" method="POST" role="form" class="inline">
                    @csrf
                    <button type="submit" class="btn btn-xs btn-primary">Autorizar</button>
                </form>
            </td>
        </tr>       
    @endforeach
    </table>
@else 
    <h2>Não foram encontradas pilotos não autorizados</h2>
@endif
<div style="text-align: center;">{{ $pilotos->links() }}</div>
@endsection
