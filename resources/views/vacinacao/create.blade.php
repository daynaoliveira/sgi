@extends('adminlte::page')

@section('title', 'SGI | '.$title)

@section('content_header')
    <a href="{{ route('home') }}" class="btn text-dark">
        <span>Início</span>
    </a>
    <span class="text-dark">⇢</span>
    <a href="" class="btn disabled">Procedimento de vacinação</a>
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{$title}}</h3>
                        <h5 class="widget-user-desc">Vacina {{$vacina->vacina}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img/estoque.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Lote</h5>
                                    <span class="description-text">{{$estoque->lote}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Validade</h5>
                                    <span class="description-text">{{\Carbon\Carbon::parse($estoque->validade)->format('d/m/Y')}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">Quantidade</h5>
                                    <span class="description-text">{{ $estoque->quantidade }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class="card card-teal">
                    <div class="card-header">
                        <span class="card-title">Informe o CPF do paciente</span>
                        <a href="{{ route('estoques.listar') }}" class="btn btn-dark float-right">Finalizar sessão</a>
                    </div>
                    <form action="{{route('vacinacao.vacinar')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <input name='id_estoque' type="hidden" value="{{$estoque->id}}" class="form-control" placeholder="...">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>CPF - paciente</label>
                                        <input name="cpf" type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Concluir</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
