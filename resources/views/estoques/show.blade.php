@extends('adminlte::page')

@section('title', 'SGI | ' . $title)

@section('content_header')
    <a href="{{ url()->previous() }}" class="btn text-dark">
        <span>Estoque</span>
    </a>
    <span class="text-dark">⇢</span>
    <a href="{{ url()->previous() }}" class="btn disabled">Lote {{$estoque->lote}} - vacina {{$vacina->vacina}}</a>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">{{$title}}</h3>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img/estoque.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Lote</h5>
                                    <span class="description-text">{{$estoque->lote}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Validade</h5>
                                    <span class="description-text">{{\Carbon\Carbon::parse($estoque->validade)->format('d/m/Y')}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Quantidade</h5>
                                    <span class="description-text">{{ $estoque->quantidade }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-3">
                                <div class="description-block">
                                    <h5 class="description-header">Cadastrado por</h5>
                                    <span class="description-text">{{ $colaborador->name }}</span>
                                    <br>
                                    <span class="description-header">em&nbsp;</span>
                                    <span>{{\Carbon\Carbon::parse($estoque->created_at)->format('d/m/Y')}}&nbsp;</span>
                                    <span class="description-header">às&nbsp;</span>
                                    <span>{{\Carbon\Carbon::parse($estoque->created_at)->format('H:i')}}h</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>

                <div class="card card-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-info">
                        <h3 class="widget-user-username">Detalhes da vacina</h3>
                        <h5 class="widget-user-desc">{{$vacina->vacina}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img/vacinas.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Descrição</h5>
                                    <span class="description-text">{{$vacina->descricao}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Idade mínima - Idade máxima</h5>
                                    <span class="description-text">{{$vacina->idade_minima}} - {{$vacina->idade_maxima}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Doses necessárias</h5>
                                    <span class="description-text">{{ $vacina->qtd_dose }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-3">
                                <div class="description-block">
                                    <h5 class="description-header">Tempo de espera entre doses</h5>
                                    <span class="description-text">{{ $vacina->tempo_espera_dose }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </div>
@stop
