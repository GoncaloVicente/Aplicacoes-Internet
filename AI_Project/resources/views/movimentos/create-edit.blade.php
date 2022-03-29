<div>
    <div class="form-group col-md-4">
        <label for="inputData">Data</label>
        <input
                type="text" class="form-control"
                name="data" id="inputData" value="{{old('data',$movimento->data)}}"/>
        @if ($errors->has('data'))
            <em>{{ $errors->first('data') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputHoraDescolagem">Hora de Descolagem</label>
        <input
                type="text" class="form-control"
                name="hora_descolagem" id="inputHoraDescolagem" value="{{old('hora_descolagem',$movimento->hora_descolagem)}}"/>
        @if ($errors->has('hora_descolagem'))
            <em>{{ $errors->first('hora_descolagem') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputHoraAterragem">Hora de Aterragem</label>
        <input
                type="text" class="form-control"
                name="hora_aterragem" id="inputHoraAterragem" value="{{old('hora_aterragem',$movimento->hora_aterragem)}}"/>
        @if ($errors->has('hora_aterragem'))
            <em>{{ $errors->first('hora_aterragem') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputAeronave">Aeronave</label>
        <select name="aeronave" id="inputAeronave" class="form-control">
            <option disabled selected> -- Selecione uma opção -- </option>
            @foreach($matriculas as $matricula)
            <option {{ old('aeronave',$movimento->aeronave) == "$matricula" ? 'selected' : '' }} value="{{$matricula}}">{{$matricula}}</option>
            @endforeach
        </select>
        @if ($errors->has('aeronave'))
            <em>{{ $errors->first('aeronave') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNumDiario">Nº Diário</label>
        <input
                type="text" class="form-control"
                name="num_diario" id="inputNumDiario" value="{{old('num_diario',$movimento->num_diario)}}"/>
        @if ($errors->has('num_diario'))
            <em>{{ $errors->first('num_diario') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNumServico">Nº Serviço</label>
        <input
                type="text" class="form-control"
                name="num_servico" id="inputNumServico" value="{{old('num_servico',$movimento->num_servico)}}"/>
        @if ($errors->has('num_servico'))
            <em>{{ $errors->first('num_servico') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputPiloto">ID de Piloto</label>
        <input
                type="text" class="form-control"
                name="piloto_id" id="inputPiloto" value="{{old('piloto_id',$movimento->piloto_id)}}"/>
        @if ($errors->has('piloto_id'))
            <em>{{ $errors->first('piloto_id') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNatureza">Natureza</label>
        <select name="natureza" id="inputNatureza" class="form-control">
            <option disabled selected> -- Selecione uma opção -- </option>
            <option {{ old('natureza',$movimento->natureza) == 'T' ? 'selected' : '' }} value="T">Treino</option>
            <option {{ old('natureza',$movimento->natureza) == 'I' ? 'selected' : '' }} value="I">Instrução</option>
            <option {{ old('natureza',$movimento->natureza) == 'E' ? 'selected' : '' }} value="E">Especial</option>
        </select>
        @if ($errors->has('natureza'))
            <em>{{ $errors->first('natureza') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputAerodromoPartida">Aeródromo de Partida</label>
        <input
                type="text" class="form-control"
                name="aerodromo_partida" id="inputAerodromoPartida" value="{{old('aerodromo_partida',$movimento->aerodromo_partida)}}"/>
        @if ($errors->has('aerodromo_partida'))
            <em>{{ $errors->first('aerodromo_partida') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputAerodromoChegada">Aeródromo de Chegada</label>
        <input
                type="text" class="form-control"
                name="aerodromo_chegada" id="inputAerodromoChegada" value="{{old('aerodromo_chegada',$movimento->aerodromo_chegada)}}"/>
        @if ($errors->has('aerodromo_chegada'))
            <em>{{ $errors->first('aerodromo_chegada') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNumAterragens">Nº Aterragens</label>
        <input
                type="text" class="form-control"
                name="num_aterragens" id="inputNumAterragens" value="{{old('num_aterragens',$movimento->num_aterragens)}}"/>
        @if ($errors->has('num_aterragens'))
            <em>{{ $errors->first('num_aterragens') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNumDescolagens">Nº Descolagens</label>
        <input
                type="text" class="form-control"
                name="num_descolagens" id="inputNumDescolagens" value="{{old('num_descolagens',$movimento->num_descolagens)}}"/>
        @if ($errors->has('num_descolagens'))
            <em>{{ $errors->first('num_descolagens') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputNumPessoas">Nº Pessoas</label>
        <input
                type="text" class="form-control"
                name="num_pessoas" id="inputNumPessoas" value="{{old('num_pessoas',$movimento->num_pessoas)}}"/>
        @if ($errors->has('num_pessoas'))
            <em>{{ $errors->first('num_pessoas') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputContaHorasInicio">Conta-horas Inicial</label>
        <input
                type="text" class="form-control"
                name="conta_horas_inicio" id="inputNumPessoas" value="{{old('conta_horas_inicio',$movimento->conta_horas_inicio)}}"/>
        @if ($errors->has('conta_horas_inicio'))
            <em>{{ $errors->first('conta_horas_inicio') }}</em>
        @endif
    </div>
    <div class="form-group col-md-4">
        <label for="inputContaHorasFim">Conta-horas Final</label>
        <input
                type="text" class="form-control"
                name="conta_horas_fim" id="inputContaHorasFim" value="{{old('conta_horas_fim',$movimento->conta_horas_fim)}}"/>
        @if ($errors->has('conta_horas_fim'))
            <em>{{ $errors->first('conta_horas_fim') }}</em>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputTempoVoo">Tempo de Voo</label>
        <input
                type="text" class="form-control"
                name="tempo_voo" id="inputTempoVoo" value="{{old('tempo_voo',$movimento->tempo_voo)}}"/>
        @if ($errors->has('tempo_voo'))
            <em>{{ $errors->first('tempo_voo') }}</em>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputPrecoVoo">Preço do Voo</label>
        <input
                type="text" class="form-control"
                name="preco_voo" id="inputPrecoVoo" value="{{old('preco_voo',$movimento->preco_voo)}}"/>
        @if ($errors->has('preco_voo'))
            <em>{{ $errors->first('preco_voo') }}</em>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputModoPagamento">Modo de pagamento</label>
        <select name="modo_pagamento" id="inputModoPagamento" class="form-control">
            <option disabled selected> -- Selecione uma opção -- </option>
            <option {{ old('modo_pagamento',$movimento->modo_pagamento) == 'N' ? 'selected' : '' }} value="N">Numerário</option>
            <option {{ old('modo_pagamento',$movimento->modo_pagamento) == 'M' ? 'selected' : '' }} value="M">Multibanco</option>
            <option {{ old('modo_pagamento',$movimento->modo_pagamento) == 'T' ? 'selected' : '' }} value="T">Transferência</option>
            <option {{ old('modo_pagamento',$movimento->modo_pagamento) == 'P' ? 'selected' : '' }} value="P">Pacote de horas</option>
        </select>
        @if ($errors->has('modo_pagamento'))
            <em>{{ $errors->first('modo_pagamento') }}</em>
        @endif
    </div>
    <div class="form-group col-md-3">
        <label for="inputNumRecibo">Nº de recibo</label>
        <input
                type="text" class="form-control"
                name="num_recibo" id="inputNumRecibo" value="{{old('num_recibo',$movimento->num_recibo)}}"/>
        @if ($errors->has('num_recibo'))
            <em>{{ $errors->first('num_recibo') }}</em>
        @endif
    </div>
    <div class="form-group col-md-12">
        <label for="inputObeservacoes">Observações</label>
        <textarea name="observacoes" id="observacoes" rows="5" cols="48" style="resize: none"
                  class="form-control">{{old('observacoes',$movimento->observacoes)}}</textarea>
        @if ($errors->has('observacoes'))
            <em>{{ $errors->first('observacoes') }}</em>
        @endif
    </div>
    <div class="col-md-12">
        <h3>Caso seja de Instrução:</h3>
    </div>
    <div class="form-group col-md-6">
        <label for="inputTipoInstrucao">Tipo de Instrução</label>
        <select name="tipo_instrucao" id="inputTipoInstrucao" class="form-control">
            <option disabled selected> -- Selecione uma opção  -- </option>
            <option {{ old('tipo_instrucao',$movimento->tipo_instrucao) == 'D' ? 'selected' : '' }} value="D">Duplo</option>
            <option {{ old('tipo_instrucao',$movimento->tipo_instrucao) == 'S' ? 'selected' : '' }} value="S">Solo</option>
        </select>
        @if ($errors->has('tipo_instrucao'))
            <em>{{ $errors->first('tipo_instrucao') }}</em>
        @endif
    </div>
    <div class="form-group col-md-6">
        <label for="inputInstrutorID">ID de Instrutor</label>
        <input
                type="text" class="form-control"
                name="instrutor_id" id="inputInstrutorID" value="{{old('instrutor_id',$movimento->instrutor_id)}}"/>
        @if ($errors->has('instrutor_id'))
            <em>{{ $errors->first('instrutor_id') }}</em>
        @endif
    </div>
</div>
