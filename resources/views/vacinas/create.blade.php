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
                        <span class="card-title">Insira as informações para cadastrar uma nova vacina</span>
                    </div>
                    <form action="{{route('vacinas.cadastrar_vacina')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label>Vacina</label>
                                        <input name='vacina' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Idade mínima</label>
                                        <input name='idade_minima' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Idade máxima</label>
                                        <input name='idade_maxima' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Doses</label>
                                        <input name='qtd_dose' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>Tempo de espera</label>
                                        <input name='tempo_espera_dose' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Descrição</label>
                                        <textarea name='descricao' class="form-control" rows="3" placeholder="..."></textarea>
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
