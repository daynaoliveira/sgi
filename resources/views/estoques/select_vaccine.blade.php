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
                                    <a href="{{ route('estoques.listar') }}" class="btn btn-info float-left">Voltar</a>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6">
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Vacina</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Descrição</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade mínima | Idade máxima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Doses | Tempo de espera entre doses</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Adicionar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vacinas as $vacina)
                                                <tr class="odd">
                                                    <td>{{$vacina->id}}</td>
                                                    <td>{{$vacina->vacina}}</td>
                                                    <td>{{$vacina->descricao}}</td>
                                                    <td>{{$vacina->idade_minima}} | {{$vacina->idade_maxima}}</td>
                                                    <td>{{$vacina->qtd_dose}} | {{$vacina->tempo_espera_dose}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('estoques.cadastrar', $vacina) }}">
                                                                    <i class="fa-solid fa-plus text-teal"></i>
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Vacina</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade mínima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade máxima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Doses necessárias</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Adicionar</th>
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
