<?php

namespace App\Http\Controllers;

use App\Models\Colaboradores;
use App\Models\UnidadesSaude;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ColaboradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Colaboradores';

        $colab = Colaboradores::all();

        return view('colaboradores.index', [
            'title' => $title
        ])->with('colaboradores', $colab);

        //return view('colaboradores.index', compact('colaboradores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Cadastrar novo colaborador';

        $us = UnidadesSaude::all();

        //dd($us);

        return view('colaboradores.create', [
            'title' => $title
        ])->with('unidades', $us);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $colab                      = new Colaboradores();
        $colab->id_unidade_saude    = $request->unidade_saude;
        $colab->nome                = $request->nome;
        $colab->cpf                 = $request->cpf;

        $colab->save();

        $id = $colab->id;

        $user = new User();
        $user->id_colaborador = $id;
        $user->name = $request->nome;
        $user->email = $request->email;
        $user->password = Hash::make('SgI@2023');

        $user->save();

        return redirect()->route('colaboradores.listar');
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaboradores $colaborador)
    {
        //

        $title = 'Detalhes do colaborador';

        $un = UnidadesSaude::where('id', $colaborador->id_unidade_saude);

        dd($un->colaborador()->get());

        return view('colaboradores.show', [
            'title' => $title
        ])->with('colaborador', $col);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colaboradores $colaborador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colaboradores $colaborador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaboradores $colaborador)
    {
        //
    }
}
