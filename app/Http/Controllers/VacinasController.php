<?php

namespace App\Http\Controllers;

use App\Models\Vacinas;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;

class VacinasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $title = 'Vacinas';

        $vac = Vacinas::paginate(10);

        return view('vacinas.index', [
            'title' => $title
        ])->with('vacinas', $vac);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $title = 'Cadastrar nova vacina';

        return view('vacinas.create', [
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $vac = new Vacinas();

        $vac->vacina            = $request->vacina;
        $vac->descricao         = $request->descricao;
        $vac->idade_minima      = $request->idade_minima;
        $vac->idade_maxima      = $request->idade_maxima;
        $vac->qtd_dose          = $request->qtd_dose;
        $vac->tempo_espera_dose = $request->tempo_espera_dose;

        try {
            $vac->save();

            Alert::success('Vacina cadastrada!', 'A vacina ' . $vac->vacina . ' foi cadastrada com sucesso!');

            return redirect()->route('vacinas.listar');
        } catch (Exception $e) {
            Alert::error('Vacina Não Cadastrada!', 'A vacina ' . $vac->vacina . ' não foi cadastrada!');

            return redirect()->route('vacinas.cadastrar_vacina');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Vacinas $vacina)
    {
        //

        $title = 'Detalhes da vacina';

        return view('vacinas.show', [
            'title' => $title
        ])->with('vacina', $vacina);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacinas $vacina)
    {
        //

        $title = 'Editar unidade de saúde';

        return view('vacinas.edit', [
            'title' => $title
        ])->with('vacina', $vacina);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vacinas $vacina)
    {
        //

        $dsc = $vacina->descricao;

        if($request->descricao != NULL || $request->descricao != ''){
            $dsc = $request->descricao;
        }

        try {
            $vacina->fill([
                'vacina'            => $request->vacina,
                'descricao'         => $dsc,
                'idade_minima'      => $request->idade_minima,
                'idade_maxima'      => $request->idade_maxima,
                'qtd_dose'          => $request->qtd_dose,
                'tempo_espera_dose' => $request->tempo_espera_dose
            ])->save();
    
            Alert::success('Vacina Atualizada!', 'A vacina ' . $request->vacina . ' foi atualizada com sucesso!');

            return redirect()->route('vacinas.listar');
        } catch (Exception $e) {
            Alert::error('Vacina Não Atualizada!', 'A vacina ' . $request->vacina . ' não foi atualizada!');
            return redirect()->route('vacinas.editar_vacina');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacinas $vacina)
    {
        try {
            $vacina->delete();

            Alert::success('Vacina Excluida!', 'A vacina ' . $vacina->vacina . ' foi deletada!');
        } catch (Exception $e) {
            Alert::error('Vacina Não Excluida!', 'A vacina ' . $vacina->vacina . ' não foi deletada!');
        }

        return redirect()->route('vacinas.listar');
    }
}
