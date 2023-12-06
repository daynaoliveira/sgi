@extends('adminlte::page')

@section('title', 'SGI | ' . $title)

@section('content_header')
    <a href="{{ url()->previous() }}" class="btn text-dark">
        <span>Colaboradores</span>
    </a>
    <span class="text-dark">⇢</span>
    <a href="{{ url()->previous() }}" class="btn disabled">{{$colaborador->nome}}</a>

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
                        <h5 class="widget-user-desc">{{$colaborador->nome}}</h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle elevation-2" src="{{ asset('img/colaborador.png') }}" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">CPF</h5>
                                    <span class="description-text">{{$colaborador->cpf}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">Unidade de saúde</h5>
                                    <span class="description-text">{{$unidade->nome_unidade_saude}}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-3 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">E-mail</h5>
                                    <span class="description-text">{{ $usuario->email }}</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <div class="col-sm-3">
                                <div class="description-block">
                                    <h5 class="description-header">Nível de acesso</h5>
                                    <span class="description-text">{{ $usuario->nivel_acesso }}</span>
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
