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
                                    <a href="{{ route('vacinas.cadastrar') }}" class="btn btn-success">
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Vacina</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade mínima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade máxima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Doses necessárias</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($vacinas as $vacina)
                                                <tr class="odd">
                                                    <td>{{$vacina->id}}</td>
                                                    <td>{{$vacina->vacina}}</td>
                                                    <td>{{$vacina->idade_minima}}</td>
                                                    <td>{{$vacina->idade_maxima}}</td>
                                                    <td>{{$vacina->qtd_dose}}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('vacinas.detalhes', $vacina) }}">
                                                                    <i class="fa-solid fa-eye text-teal"></i>
                                                                </a>
                                                            </button>
                                                            <button type="button" class="btn">
                                                                <a href="{{ route('vacinas.editar', $vacina) }}">
                                                                    <i class="fa-regular fa-pen-to-square text-info"></i>
                                                                </a>
                                                            </button>
                                                            <form action="{{route('vacinas.deletar', $vacina)}}" method="post">
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
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Vacina</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade mínima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Idade máxima</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-sort="ascending">Doses necessárias</th>
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
                                {{ $vacinas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
