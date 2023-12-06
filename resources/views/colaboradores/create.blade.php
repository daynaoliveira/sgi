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
                        <span class="card-title">Insira as informações para cadastrar um novo colaborador</span>
                    </div>
                    <form action="{{ route('colaboradores.cadastrar_colaborador') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input name='nome' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input name='cpf' type="text" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input name='email' type="email" class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Unidade de saúde</label>
                                        <select name="unidade_saude" class="form-control">
                                            @foreach ($unidades as $unidade)
                                                <option value="{{$unidade->id}}">{{$unidade->nome_unidade_saude}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nível de acesso</label>
                                        <select name="acesso" class="form-control">
                                            <option value="Administrador">Administrador</option>
                                            <option value="Colaborador">Colaborador</option>
                                        </select>
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
