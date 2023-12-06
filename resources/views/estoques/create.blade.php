@extends('adminlte::page')

@section('title', 'SGI | ' . $title)

@section('content_header')
    <h1 class="m-0 text-dark"> {{ $title }} </h1>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card card-teal">
                    <div class="card-header">
                        <span class="card-title">Insira as informações para cadastrar o estoque de vacinas</span>
                    </div>
                    <form action="{{ route('estoques.cadastrar_estoque') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <input name='id_vacina' type="hidden" value="{{$vacina->id}}" class="form-control" placeholder="...">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Lote</label>
                                        <input name='lote' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Validade</label>
                                        <input name='validade' type="date" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Quantidade</label>
                                        <input name='quantidade' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <hr>
                                    <h5 class="">Informações da vacina</h5>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>Vacina</h6>
                                        <label>{{$vacina->vacina}}</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>Descrição</h6>
                                        <label>{{$vacina->descricao}}</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>Idade mínima | Idade máxima</h6>
                                        <label>{{$vacina->idade_minima}} | {{$vacina->idade_maxima}}</label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <h6>Doses necessárias | Tempo de espera entre doses</h6>
                                        <label>{{$vacina->qtd_dose}} | {{$vacina->tempo_espera_dose}}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-info float-left">Voltar</a>
                            <button type="submit" class="btn btn-success float-right">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
