<?php

namespace App\Http\Controllers;

use App\Models\CarteirasVacinacoes;
use App\Models\Estoques;
use App\Models\Vacinas;
use App\Models\Pacientes;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Alert;

class CarteirasVacinacoesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($estoque)
    {
        //

        $title = 'Procedimento de vacinação';

        $stock = Estoques::find($estoque);

        $vac = Vacinas::where('id', $stock->id_vacina)->get()->first();

        return view('vacinacao.create', [
            'title' => $title
        ])
            ->with('estoque', $stock)
            ->with('vacina', $vac);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $estoque = Estoques::find($request->id_estoque);
        // A vacina vem do relacionamento com o estoque, não preciso de nada dela alem de informações fixas.
        $vacina = $estoque->vacina;
        $paciente = Pacientes::where('cpf', $request->cpf)->get()->first();

        $data_hoje = Carbon::now();

        $data_hoje = $data_hoje->format('Y-m-d');

        if (
            $vacina->idade_minima &&
            Carbon::parse($paciente->data_nascimento)->diffInMonths(Carbon::now()) < $vacina->idade_minima
        ) {
            // Alerta, porém permite que a vacina seja contabilizada. afinal, se foi aplicada, já era.
            Alert::warning('Paciente muito novo para tomar essa vacina!');
        }

        if (
            $vacina->idade_maxima &&
            Carbon::parse($paciente->data_nascimento)->diffInMonths(Carbon::now()) > $vacina->idade_maxima
        ) {
            // Alerta, porém permite que a vacina seja contabilizada. afinal, se foi aplicada, já era.
            Alert::warning('Paciente muito velho para tomar essa vacina!');
        }

        $dosesJaTomadas = CarteirasVacinacoes::where([
            ['id_vacina', '=', $vacina->id],
            ['id_paciente', '=', $paciente->id]
        ])->orderBy('dose', 'DESC')->get();

        if (count($dosesJaTomadas) >= $vacina->qtd_dose) {
            // Alerta, porém permite que a vacina seja contabilizada. afinal, se foi aplicada, já era.
            Alert::warning('Paciente excedeu o número de doses para essa vacina.');
        }

        $vacinacao = new CarteirasVacinacoes();

        $vacinacao->id_paciente = $paciente->id;
        $vacinacao->id_vacina = $vacina->id;
        $vacinacao->id_estoque = $estoque->id;
        $vacinacao->id_usuario_vacina = $user->id;
        $vacinacao->data_vacinacao = $data_hoje;

        if (count($dosesJaTomadas) == 0) {
            $vacinacao->dose = '1';
        } else {
            $vacinacao->dose = $dosesJaTomadas[0]->dose + 1;
        }

        if ($vacina->qtd_dose > 1 && $vacinacao->dose < $vacina->qtd_dose) {
            $vacinacao->data_proxima_dose = Carbon::now()->addDays($vacina->tempo_espera_dose)->format('Y-m-d');
        }

        try {
            $vacinacao->save();

            $qtd = $estoque->quantidade - 1;
    
            $estoque->fill([
                'quantidade'    => $qtd,
                'updated_at'    => Carbon::now()
            ])->save();

            Alert::success('Paciente Vacinado!', 'O(A) paciente ' . $paciente->nome . ' foi vacinado(a).');
        } catch(Exception $e) {
            Alert::error('Paciente Não Vacinado!', 'O(A) paciente ' . $paciente->nome . ' não foi vacinado(a).');
        }

        return view('vacinacao.create', [
            'title' => 'Procedimento de vacinação'
        ])
            ->with('estoque', $estoque)
            ->with('vacina', $vacina);
    }

    /**
     * Display the specified resource.
     */
    public function show(CarteirasVacinacoes $carteirasVacinacoes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CarteirasVacinacoes $carteirasVacinacoes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CarteirasVacinacoes $carteirasVacinacoes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CarteirasVacinacoes $carteirasVacinacoes)
    {
        //
    }
}
