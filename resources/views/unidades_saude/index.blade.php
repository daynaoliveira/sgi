@extends('adminlte::page')

@section('title', 'SGI | ' . $title)

@section('content_header')
    <h1 class="m-0 text-dark"> {{ $title }} </h1>
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
                                    <a href="{{ route('unidades.cadastrar') }}" class="btn btn-success">
                                        <i class="fa-solid fa-plus"></i>
                                        <span>Cadastrar</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="float-right">
                                    <input type="search" class="form-control" placeholder="Pesquisar">
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Unidade
                                                    de saúde</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">CEP
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Ações
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($unidades as $unidade)
                                                <tr class="odd">
                                                    <td>{{ $unidade->id }}</td>
                                                    <td>{{ $unidade->nome_unidade_saude }}</td>
                                                    <td>{{ Str::substrReplace($unidade->cep, '-', 5, 0) }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('unidades.detalhes', $unidade) }}">
                                                                    <i class="fa-solid fa-eye text-teal"></i>
                                                                </a>
                                                            </button>
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('unidades.editar', $unidade) }}">
                                                                    <i class="fa-regular fa-pen-to-square text-info"></i>
                                                                </a>
                                                            </button>
                                                            <form action="{{route('unidades.deletar', $unidade)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="btn">
                                                                    <i class="fa-regular fa-trash-can text-danger"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">#</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Unidade
                                                    de saúde</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">CEP
                                                </th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Ações
                                                </th>
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
                                <span class="" id="example1_info" role="status" aria-live="polite">
                                    Mostrando 10 de 10 resultados
                                </span>
                                <div class="btn-group float-right">
                                    <div class="col-sm-12 col-md-4">
                                        <ul class="pagination pagination-sm float-right">
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="fa-solid fa-angle-left"></i>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">
                                                    <i class="fa-solid fa-angle-right"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
