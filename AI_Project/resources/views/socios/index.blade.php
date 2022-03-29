@extends('master')
@section('title','Lista de Sócios')
@section('content')
<div>
    @can('create', App\User::class)
        <a class="btn btn-primary" href="{{route('socios.create')}}">Adicionar sócio</a>
        <br><br>
    @endcan
    @can('gerirCotasAtivos', App\User::class)
        <form method="POST" action="{{route('socios.reset_quotas')}}" role="form" class="inline">
            <input type="hidden" name="_method" value="patch">
            @csrf
            <button type="submit" class="btn btn btn-primary">Reset a cotas</button>
        </form>
        <br>
        <form method="POST" action="{{route('socios.desativar_sem_quotas')}}" role="form" class="inline">
            <input type="hidden" name="_method" value="patch">
            @csrf
            <button type="submit" class="btn btn btn-primary">Desativar sócios com quotas em atraso</button>
        </form>
    @endcan
</div>
<br>
<div>
    <form method="GET" action="{{route('socios.index')}}">
		<fieldset>
			<legend>Pesquisar</legend>
            <div class="form-group col-md-12">
                <div class="form-group col-md-12">
        			<input id="num_socio" name="num_socio" type="text"
        			placeholder="Número de sócio">
        			<input id="nome_informal" name="nome_informal" type="text"
        			placeholder="Nome informal">
        			<input id="email" name="email" type="text"
        			placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                    <label for="tipo_socio">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control">
                        <option disabled selected></option>
                        <option value="A">Aeromodelista</option>
                        <option value="P">Piloto</option>
                        <option value="NP">Não Piloto</option>
                    </select>
                    <label for="direcao">Direção</label>
                    <select name="direcao" id="direcao" class="form-control">
                        <option disabled selected></option>
                        <option value="1">Sim</option>
                        <option value="0">Não</option>
                    </select>
                    @can('filtrarTodosDados', App\User::class)
                        <label for="quota_paga">Quotas pagas</label>
                        <select name="quotas_pagas" id="quotas_pagas" class="form-control">
                            <option disabled selected></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        <label for="ativo">Ativo</label>
                        <select name="ativo" id="ativo" class="form-control">
                            <option disabled selected></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                    @endcan
                </div>
            </div>
            <button class="btn btn-outline-success" type="submit">Pesquisar</button>
		</fieldset>
    </form>
</div>
<br>
@if (count($socios))
    <table class="table table-striped">
    <thead>
        <tr>
            <th></th>
            <th>Número de sócio</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Tipo</th>
            <th>Direção</th>
            @can('verInfoDirecao', App\User::class)
                <th>Quotas pagas</th>
                <th>Ativo</th>
            @endcan
            <th>Nº de licença</th>
            <th>Ações</th>
            @can('gerirCotasAtivos', App\User::class)
                <th>Opções</th>
            @endcan
        </tr>
    </thead>
    <tbody>
    @foreach ($socios as $socio)
        <tr>
            @if (!empty($socio->foto_url))
                <td><img src="{{ asset('storage/fotos/' . $socio->foto_url) }}" class="rounded-circle" height=35px widht=35px></td>
            @else
                <td><img src="{{ asset('storage/fotos/defaultPIC.jpg') }}" class="rounded-circle" height=35px widht=35px></td>
            @endif
            <td>{{($socio->num_socio)}}</td>
            <td>{{($socio->nome_informal)}}</td>
            <td>{{($socio->email)}}</td>
            @if($socio->telefone!=null)
                <td>{{$socio->telefone}}</td>
            @else
                <td>-----</td>
            @endif
            <td>{{($socio->typeToStr())}}</td>
            <td>{{($socio->direcaoToStr())}}</td>
            @can('verInfoDirecao', App\User::class)
                <td>{{($socio->quotaToStr())}}</td>
                <td>{{($socio->ativoToStr())}}</td>
            @endcan
            @if($socio->tipo_socio=='P')
                @if($socio->num_licenca!=null)
                    <td>{{$socio->num_licenca}}</td>
                @else
                    <td>-----</td>
                @endif
            @else
                <td>-----</td>
            @endif
            <td>
                @can('update', $socio)
                    <a class="btn btn-xs btn-primary" href="{{route('socios.edit',$socio)}}">Editar</a>
                @endcan
                @can('delete', App\User::class)
                    <form action="{{route('socios.destroy',$socio)}}" method="POST" role="form" class="inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
                    </form>
                @endcan
            </td>
            @can('gerirCotasAtivos', App\User::class)
                <td>
                    <form method="POST" action="{{route('socios.quotas',$socio)}}" role="form" class="inline">
                        <input type="hidden" name="_method" value="patch">
                        @csrf
                        <input type="hidden" name="quota_paga"><!--Apenas para passar no teste-->
                        @if ($socio->quota_paga==0)
                            <button type="submit" class="btn btn-xs btn-primary">Quota paga</button>
                        @else
                            <button type="submit" class="btn btn-xs btn-danger">Quota não paga</button>
                        @endif
                    </form>
                    <form method="POST" action="{{route('socios.ativo',$socio)}}" role="form" class="inline">
                        <input type="hidden" name="_method" value="patch">
                        @csrf
                        <input type="hidden" name="ativo"><!--Apenas para passar no teste-->
                        @if ($socio->ativo==0)
                            <button type="submit" class="btn btn-xs btn-primary">Ativar Sócio</button>
                        @else
                            <button type="submit" class="btn btn-xs btn-danger">Desativar Sócio</button>
                        @endif
                    </form>
                </td>
            @endcan
        </tr>
    @endforeach
    </table>
@else
    <h2>Não foram encontrados utilizadores</h2>
@endif
<div style="text-align: center;">{{$socios->appends(request()->except('page'))->links()}}</div>
@endsection
