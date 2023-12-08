<?php

namespace App\Http\Controllers;

use App\Models\Colaboradores;
use App\Models\UnidadesSaude;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Alert;

class ColaboradoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Colaboradores';

        $colab = Colaboradores::paginate(10);

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

        return view('colaboradores.create', [
            'title' => $title
        ])->with('unidades', $us);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $colab = new Colaboradores();

        $colab->id_unidade_saude    = $request->unidade_saude;
        $colab->nome                = $request->nome;
        $colab->cpf                 = $request->cpf;

        $user = new User();

        $user->nivel_acesso     = $request->acesso;
        $user->name             = $request->nome;
        $user->email            = $request->email;
        $user->password         = Hash::make('12345678');

        try {
            $colab->save();
            $user->id_colaborador = $colab->id;
            $user->save();

            Alert::success('Colaborador Cadastrado!', 'O(A) Colaborador(a) ' . $request->nome . ' foi cadastrado(a).');
            return redirect()->route('colaboradores.listar');
        } catch (Exception $e) {
            Alert::error('Colaborador Não Cadastrado!', 'O(A) Colaborador(a) ' . $request->nome . ' não foi cadastrado(a).');
            return redirect()->route('colaboradores.cadastrar_colaborador');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Colaboradores $colaborador)
    {
        $title = 'Detalhes do colaborador';

        $un = UnidadesSaude::find($colaborador->id_unidade_saude);

        $us = User::where('id_colaborador', $colaborador->id)->get()->first();


        return view('colaboradores.show', [
            'title' => $title
        ])
            ->with('colaborador', $colaborador)
            ->with('unidade', $un)
            ->with('usuario', $us);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colaboradores $colaborador)
    {
        $title = 'Editar colaborador';

        $un = UnidadesSaude::all();

        $us = User::where('id_colaborador', $colaborador->id)->get()->first();

        return view('colaboradores.edit', [
            'title' => $title
        ])
                ->with('colaborador', $colaborador)
                ->with('unidades', $un)
                ->with('usuario', $us);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colaboradores $colaborador)
    {
        try {
            $colaborador->fill([
                'id_unidade_saude'    => $request->unidade_saude,
                'nome'                => $request->nome,
                'cpf'                 => $request->cpf
            ])->save();

            $user = User::where('id_colaborador', $colaborador->id)->first();

            $user->fill([
                'nivel_acesso'  => $request->nivel_acesso,
                'name'          => $request->nome,
                'email'         => $request->email
            ])->save();

            Alert::success('Colaborador(a) Atualizado(a)!', 'O(A) colaborador(a) ' . $request->nome . ' foi atualizado(a).');
            return redirect()->route('colaboradores.listar');
        } catch (Exception $e) {

            Alert::success('Colaborador(a) Não Atualizado(a)!', 'O(A) colaborador(a) ' . $request->nome . ' não foi atualizado(a).');
            return redirect()->route('colaboradores.editar_colaborador');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colaboradores $colaborador)
    {
        //
        try {
            $colaborador->usuarios()->delete();
            $colaborador->delete();

            Alert::success('Colaborador(a) Deletado(a)!', 'O(A) colaborador(a) ' . $colaborador->nome . ' foi deletado(a).');
        } catch (Exception $e) {
            Alert::success('Colaborador(a) Não Deletado(a)!', 'O(A) colaborador(a) ' . $colaborador->nome . ' não foi deletado(a).');
        }

        return redirect()->route('colaboradores.listar');
    }
}
