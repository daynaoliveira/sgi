<?php

namespace App\Http\Controllers;

use App\Models\Estoques;
use App\Models\Vacinas;
use App\Models\Colaboradores;
use App\Models\UnidadesSaude;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;

class EstoquesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Estoque de vacinas';

        $dt_atual = Carbon::now();

        $dt_atual = $dt_atual->format('Y-m-d');

        $etq =  Estoques::
                where('quantidade', '>', 0)
                ->where('validade', '>=', $dt_atual)
                ->paginate(10);

        return view('estoques.index', [
            'title' => $title
        ])->with('estoques', $etq);
    }

    public function select_vaccine(){
        $title = 'Selecionar vacina';

        $vac = Vacinas::paginate(10);

        return view('estoques.select_vaccine', [
            'title' => $title
        ])->with('vacinas', $vac);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($vacina)
    {
        //
        $title = 'Cadastrar estoque de vacinas';

        $vac = Vacinas::find($vacina);

        return view('estoques.create', [
            'title' => $title
        ])->with('vacina', $vac);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user();

        $colab = Colaboradores::where('id', $user->id_colaborador)->get()->first();

        $stock = new Estoques();

        $stock->id_unidade  = $colab->id_unidade_saude;
        $stock->id_vacina   = $request->id_vacina;
        $stock->id_usuario  = $user->id;
        $stock->lote        = $request->lote;
        $stock->validade    = $request->validade;
        $stock->quantidade  = $request->quantidade;

        try {
            $stock->save();

            Alert::success('Estoque Cadastrado!');
            return redirect()->route('estoques.listar');
        } catch (Exception $e) {
            Alert::success('Estoque Não Cadastrado!');
            return redirect()->route('estoques.cadastrar_estoque');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Estoques $estoque)
    {
        //
        $title = 'Detalhes do estoque';

        $vac = Vacinas::where('id', $estoque->id_vacina)->get()->first();

        $colab = User::where('id', $estoque->id_usuario)->get()->first();

        return view('estoques.show', [
            'title' => $title
        ])
            ->with('estoque', $estoque)
            ->with('vacina', $vac)
            ->with('colaborador', $colab);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estoques $estoque)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estoques $estoque)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estoques $estoque)
    {
        //
    }
}
