@extends('adminlte::page')

@section('title', 'SGI | ' . $title)

@section('content_header')
    <a href="{{ url()->previous() }}" class="btn text-dark">
        <span>Unidades de saúde</span>
    </a>
    <span class="text-dark">⇢</span>
    <a href="{{ url()->previous() }}" class="btn disabled">{{$unidade->nome_unidade_saude}}</a>

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
                        <!--<h5 class="widget-user-desc">Founder &amp; CEO</h5>-->
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img/unidade_saude.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Nome</h5>
                                    <span class="description-text">{{ $unidade->nome_unidade_saude }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Endereço</h5>
                                    <span class="description-text">
                                        {{ $unidade->endereco['rua'] }}, nº {{ $unidade->endereco['numero'] }},
                                        {{ $unidade->endereco['bairro'] }}
                                    </span>
                                    <br>
                                    <span class="description-text">
                                        {{ $unidade->endereco['cidade'] }} - {{ $unidade->endereco['uf'] }}
                                    </span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">CEP</h5>
                                    <span class="description-text">{{ Str::substrReplace($unidade->cep, '-', 5, 0) }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
                <!-- /.widget-user -->
            </div>
        </div>
    </div>
@stop
