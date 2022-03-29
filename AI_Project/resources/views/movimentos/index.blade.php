@extends('master')
@section('title', 'Lista de Movimentos')
@section('content')
    @can('create', App\Movimento::class)
        <div><a class="btn btn-primary" href="{{route('movimentos.create')}}">Adicionar movimento</a></div>
    @endcan
    <br>
    <div>
        <form method="GET" action="{{route('movimentos.index')}}">
            <fieldset>
                <legend>Pesquisar</legend>
                <div class="form-group col-md-12">
                    <div class="form-group col-md-12">
                        <input id="id" name="id" type="text"
                               placeholder="ID do Movimento">
                        <input id="aeronave" name="aeronave" type="text"
                               placeholder="Matrícula da aeronave">
                        <input id="piloto" name="piloto" type="text"
                               placeholder="ID do Piloto">
                        <input id="instrutor" name="instrutor" type="text"
                               placeholder="ID do Instrutor">
                        <input id="data_inf" name="data_inf" type="text"
                               placeholder="Data Inferior">
                        <input id="data_sup" name="data_sup" type="text"
                               placeholder="Data Superior">
                        <input id="num_aterragens" name="num_aterragens" type="text"
                               placeholder="Número de aterragens">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="natureza">Natureza</label>
                        <select name="natureza" id="natureza" class="form-control">
                            <option disabled selected></option>
                            <option value="T">Treino</option>
                            <option value="I">Instrução</option>
                            <option value="E">Especial</option>
                        </select>
                        <label for="direcao">Confirmado</label>
                        <select name="confirmado" id="confirmado" class="form-control">
                            <option disabled selected></option>
                            <option value="1">Sim</option>
                            <option value="0">Não</option>
                        </select>
                        @can('filtrarMeusMovimentos', App\Movimento::class)
                            <br>
                            <label for="meus_movimentos">Meus Movimentos</label>
                            <input type="checkbox" id="meus_movimentos" name="meus_movimentos" value="1">
                        @endcan
                    </div>
                </div>
                <button class="btn btn-outline-success" type="submit">Pesquisar</button>
            </fieldset>
        </form>
    </div>
    @if (count($movimentos))
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Aeronave</th>
                <th>Data</th>
                <th>Hora descolagem</th>
                <th>Hora aterragem</th>
                <th>Tempo voo</th>
                <th>Natureza</th>
                <th>Piloto</th>
                <th>Aeródromo partida</th>
                <th>Aeródromo chegada</th>
                <th>Nº aterragens</th>
                <th>Nº descolagens</th>
                <th>Nº diário</th>
                <th>Nº serviço</th>
                <th>Conta horas inicial</th>
                <th>Conta horas final</th>
                <th>Nº pessoas</th>
                <th>Tipo instrução</th>
                <th>Instrutor</th>
                <th>Confirmado</th>
                @if(Auth::user()->tipo_socio == "P" || Auth::user()->direcao == "1")
                    <th>Ações</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($movimentos as $movimento)
                <tr>
                    <td>{{($movimento->id)}}</td>
                    <td>{{App\Aeronave::find($movimento->aeronave)->matricula}}</td>
                    <td>{{date("d/m/Y", strtotime($movimento->data))}}</td>
                    <td>{{date("H:i", strtotime($movimento->hora_descolagem))}}</td>
                    <td>{{date("H:i", strtotime($movimento->hora_aterragem))}}</td>
                    <td>{{$movimento->tempo_voo}}</td>
                    <td>{{$movimento->typeToStr()}}</td>
                    <td>{{$movimento->piloto->nome_informal}}</td>
                    <td>{{$movimento->aerodromo_partida}}</td>
                    <td>{{$movimento->aerodromo_chegada}}</td>
                    <td>{{$movimento->num_aterragens}}</td>
                    <td>{{$movimento->num_descolagens}}</td>
                    <td>{{$movimento->num_diario}}</td>
                    <td>{{$movimento->num_servico}}</td>
                    <td>{{$movimento->conta_horas_inicio}}</td>
                    <td>{{$movimento->conta_horas_fim}}</td>
                    <td>{{$movimento->num_pessoas}}</td>
                    <td>{{$movimento->hasInstrucao($movimento->tipo_instrucao)}}</td>
                    <td>{{$movimento->hasPiloto($movimento->instrutor_id)}}</td>
                    <td>@if ($movimento->confirmado == 1)
                            <img src="{{ asset('storage/fotos/confirmado1.png') }}" class="rounded-circle" height=42px
                                 widht=42px>
                        @else
                            <img src="{{ asset('storage/fotos/confirmado2.png') }}" class="rounded-circle" height=35px
                                 widht=35px>
                        @endif
                    </td>
                    <td>
                    @can('update', $movimento) <!--A regra para edit é igual ao eliminar por isso basta verificar um deles-->
                        <a class="btn btn-xs btn-primary" href="{{route('movimentos.edit',$movimento)}}">Editar</a>
                        <form action="{{route('movimentos.destroy',$movimento)}}" method="POST" role="form"
                              class="inline">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-xs btn-danger">Eliminar</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <h2>Não foram encontradas voos</h2>
    @endif
    <div style="text-align: center;">{{$movimentos->appends(request()->except('page'))->links()}}</div>
@endsection