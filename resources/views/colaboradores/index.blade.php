@extends('adminlte::page')

@section('title', 'SGI | '.$title)

@section('content_header')
    <h1 class="m-0 text-dark">{{$title}}</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="dt-buttons flex-wrap">
                                    <a href="{{ route('colaboradores.cadastrar') }}" class="btn btn-success">
                                        <i class="fa-solid fa-plus"></i>
                                        <span>Cadastrar</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">#</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Nome</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">CPF</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Unidade de saúde</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($colaboradores as $colaborador)
                                                <tr class="odd">
                                                    <td>{{$colaborador->id}}</td>
                                                    <td>{{$colaborador->nome}}</td>
                                                    <td>{{$colaborador->cpf}}</td>
                                                    <td>{{$colaborador->unidade->nome_unidade_saude}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('colaboradores.detalhes', $colaborador) }}">
                                                                    <i class="fa-solid fa-eye text-teal"></i>
                                                                </a>
                                                            </button>
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('colaboradores.editar', $colaborador) }}">
                                                                    <i class="fa-regular fa-pen-to-square text-info"></i>
                                                                </a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">#</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Nome</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">CPF</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Unidade de saúde</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Ações</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                {{ $colaboradores->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
