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
                        <span class="card-title">Edite as informações do colaborador</span>
                    </div>
                    <form action="{{ route('colaboradores.editar_colaborador', $colaborador->id) }}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>Nome</label>
                                        <input name='nome' value="{{ $colaborador->nome }}" type="text"
                                            class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group">
                                        <label>CPF</label>
                                        <input name='cpf' value="{{ $colaborador->cpf }}" type="text"
                                            class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input name='email' value="{{ $usuario->email }}" type="email"
                                            class="form-control" placeholder="...">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Unidade de saúde</label>
                                        <select name="unidade_saude" class="form-control">
                                            @foreach ($unidades as $unidade)
                                                @if ($unidade->id == $colaborador->id_unidade_saude)
                                                    <option value="{{ $unidade->id }}" selected>{{ $unidade->nome_unidade_saude }}</option>
                                                @else
                                                    <option value="{{ $unidade->id }}">{{ $unidade->nome_unidade_saude }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nível de acesso</label>
                                        <select name="nivel_acesso" class="form-control">
                                            <option value="Administrador" @if ($usuario->nivel_acesso == 'Administrador') selected @endif>Administrador</option>
                                            <option value="Colaborador" @if($usuario->nivel_acesso == 'Colaborador') selected @endif>Colaborador</option>
                                        </select>
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
    <script src="{{ asset('js/app.js') }}"></script>
@endpush
