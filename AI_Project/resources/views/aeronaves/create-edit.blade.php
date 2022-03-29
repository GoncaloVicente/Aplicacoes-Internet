<div class="form-group col-md-4">
    <label for="inputMarca">Marca</label>
    <input
        type="text" class="form-control"
        name="marca" id="inputMarca" value="{{old('marca',$aeronave->marca)}}"/>
    @if ($errors->has('marca'))
        <em>{{ $errors->first('marca') }}</em>
    @endif 
</div>
<div class="form-group col-md-4">
    <label for="inputModelo">Modelo</label>
    <input
        type="text" class="form-control"
        name="modelo" id="inputModelo" value="{{old('modelo',$aeronave->modelo)}}"/>
    @if ($errors->has('modelo'))
        <em>{{ $errors->first('modelo') }}</em>
    @endif 
</div>
<div class="form-group col-md-4">
    <label for="inputLugares">Número de Lugares</label>
    <input
        type="text" class="form-control"
        name="num_lugares" id="inputLugares" value="{{old('num_lugares',$aeronave->num_lugares)}}"/>
    @if ($errors->has('num_lugares'))
        <em>{{ $errors->first('num_lugares') }}</em>
    @endif 
</div>
<div class="form-group col-md-4">
    <label for="inputHoras">Horas</label>
    <input
        type="text" class="form-control"
        name="conta_horas" id="inputHoras" value="{{old('conta_horas',$aeronave->conta_horas)}}"/>
    @if ($errors->has('conta_horas'))
        <em>{{ $errors->first('conta_horas') }}</em>
    @endif 
</div>
<div class="form-group col-md-4">
    <label for="inputPrecoHora">Preço por Hora</label>
    <input
        type="text" class="form-control"
        name="preco_hora" id="inputPrecoHora" value="{{old('preco_hora',$aeronave->preco_hora)}}"/>
    @if ($errors->has('preco_hora'))
        <em>{{ $errors->first('preco_hora') }}</em>
    @endif 
</div>
<div class="form-group col-md-12">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Conta Horas</th>            
                <th>Minutos</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i < 11; $i++)
                <tr>               
                    <th>{{$i}}</th>
                    <th><input type="text" name="tempos[{{$i}}]"
                    value="{{old('tempos.'.$i,$valores[$i-1]->minutos)}}"/></th>
                    <th><input type="text" name="precos[{{$i}}]"
                    value="{{old('precos.'.$i,$valores[$i-1]->preco)}}"/></th>
                </tr>
            @endfor
    </table>
    @if ($errors->has('tempos'))
        <em>{{ $errors->first('tempos') }}</em>
    @endif
    @if ($errors->has('tempos.*'))
        <em>{{ $errors->first('tempos.*') }}</em>
    @endif  
    @if ($errors->has('precos'))
        <em>{{ $errors->first('precos') }}</em>
    @endif 
    @if ($errors->has('precos.*'))
        <em>{{ $errors->first('precos.*') }}</em>
    @endif 
</div>