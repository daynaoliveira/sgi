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
                                    <a href="{{ route('estoques.selecionar_vacina') }}" class="btn btn-success">
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Vacina</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Lote</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Validade</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Quantidade</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Detalhes</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Selecionar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($estoques as $estoque)
                                                <tr class="odd">
                                                    <td>{{$estoque->id}}</td>
                                                    <td>{{$estoque->vacina->vacina}}</td>
                                                    <td>{{$estoque->lote}}</td>
                                                    <td>{{\Carbon\Carbon::parse($estoque->validade)->format('d/m/Y')}}</td>
                                                    <td>{{$estoque->quantidade}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('estoques.detalhes', $estoque) }}">
                                                                    <i class="fa-solid fa-eye text-teal"></i>
                                                                </a>
                                                            </button>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('vacinacao.cadastrar', $estoque) }}">
                                                                    <i class="fa-solid fa-vial-circle-check text-info"></i>
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Lote</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Validade</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Quantidade</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Detalhes</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Selecionar</th>
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
                                {{ $estoques->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
