<?php

namespace App\Http\Controllers;

use App\Models\UnidadesSaude;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UnidadesSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // FUNÇÃO PARA LISTAR AS UNIDADES DE SAÚDE

        $title = 'Unidades de saúde';

        //$us = DB::select('SELECT * FROM unidades_saudes');
        $us = UnidadesSaude::all();

        return view('unidades_saude.index', [
            'title' => $title
        ])->with('unidades', $us);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Cadastrar unidade de saúde';

        return view('unidades_saude.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // FUNÇÃO PARA CADASTRAR UNIDADES DE SAÚDE

        $us                     = new UnidadesSaude();
        $us->nome_unidade_saude = $request->nome;
        $us->cep                = Str::replace('-', '', $request->cep);
        $us->numero             = $request->numero;

        $us->save();

        return redirect()->route('unidades.listar');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnidadesSaude $unidade)
    {
        //FUNÇÃO PARA MOSTRAR DETALHES DA UNIDADE DE SAÚDE CADASTRADA

        $endereco = file_get_contents('https://viacep.com.br/ws/'.$unidade->cep.'/json/');

        $arr = json_decode($endereco);

        $endereco = [
            'rua'       => $arr->logradouro,
            'numero'    => $unidade->numero,
            'bairro'    => $arr->bairro,
            'cidade'    => $arr->localidade,
            'uf'        => $arr->uf
        ];

        $unidade['endereco'] = $endereco;

        $title = 'Detalhes da unidade de saúde';

        return view('unidades_saude.show', [
            'title' => $title
        ])->with('unidade', $unidade);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnidadesSaude $unidade)
    {
        //
        $endereco = file_get_contents('https://viacep.com.br/ws/'.$unidade->cep.'/json/');

        $arr = json_decode($endereco);

        $endereco = [
            'rua'       => $arr->logradouro,
            'numero'    => $unidade->numero,
            'bairro'    => $arr->bairro,
            'cidade'    => $arr->localidade,
            'uf'        => $arr->uf
        ];

        $unidade['endereco'] = $endereco;

        $title = 'Editar unidade de saúde';

        return view('unidades_saude.edit', [
            'title' => $title
        ])->with('unidade', $unidade);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnidadesSaude $unidade)
    {
        //
        $unidade->fill([
            'nome_unidade_saude'    => $request->nome,
            'cep'                   =>  Str::replace('-', '', $request->cep),
            'numero'                => $request->numero
        ])->save();

        return redirect()->route('unidades.listar');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnidadesSaude $unidade)
    {
        //
        $unidade->delete();

        return redirect()->route('unidades.listar');
    }
}
