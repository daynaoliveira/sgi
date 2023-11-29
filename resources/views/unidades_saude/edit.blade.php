@extends('adminlte::page')

@section('title', 'SGI | '.$title)

@section('content_header')
    <h1 class="m-0 text-dark"> {{ $title }} </h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <span class="card-title">Insira as informações para editar a unidade de saúde</span>
                    </div>
                    <form action="{{route('unidades.editar_unidade', $unidade->id)}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nome da unidade de saúde</label>
                                        <input name="nome" type="text" class="form-control" value="{{$unidade->nome_unidade_saude}}" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>CEP</label>
                                        <input name="cep" id="cep"type="text" maxlength="9" class="form-control" value="{{Str::substrReplace($unidade->cep, '-', 5, 0)}}" placeholder="xxxxx-xxx" onblur="Cep(this)" onkeypress="CepMascara(this)">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Rua</label>
                                        <input name="rua" id='rua' type="text" class="form-control" value="{{$unidade->endereco['rua']}}" placeholder="..." @readonly(true)>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>Número</label>
                                        <input name="numero" id='numero' type="text" class="form-control" value="{{$unidade->numero}}" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Bairro</label>
                                        <input name="bairro" id='bairro' type="text" class="form-control" value="{{$unidade->endereco['bairro']}}" placeholder="..." @readonly(true)>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <label>Cidade</label>
                                        <input name="cidade" id='cidade' type="text" class="form-control" value="{{$unidade->endereco['cidade']}}" placeholder="..." @readonly(true)>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <input name="estado" id='estado' type="text" class="form-control" value="{{$unidade->endereco['uf']}}" placeholder="..." @readonly(true)>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-info float-left">Voltar</a>
                            <button type="submit" class="btn btn-success float-right">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{asset('js/app.js')}}"></script>
@endpush
