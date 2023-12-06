<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // CRIA UNIDADE DE SAUDE
        \App\Models\UnidadesSaude::create([
            'id' => 1,
            'nome_unidade_saude' => 'Unidade Teste',
            'cep' => '76812624',
            'numero' => '123',
        ]);

        // CRIA VACINA
        \App\Models\Vacinas::create([
            'id' => 1,
            'vacina' => 'BCG',
            'descricao' => 'Previne tuberculose – principalmente as formas graves, como meningite tuberculosa e tuberculose miliar (espalhada pelo corpo).',
            'idade_minima' => 0,
            'idade_maxima' => 60,
            'qtd_dose' => 1
        ]);

        // CRIA ADMINISTRADOR E COLABORADOR
        \App\Models\User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@sgi.dev',
            'password' => Hash::make('admin'),
            'nivel_acesso' => 'Administrador'
        ]);


        \App\Models\User::create([
            'id' => 2,
            'name' => 'Colab',
            'email' => 'colab@sgi.dev',
            'password' => Hash::make('colab'),
            'nivel_acesso' => 'Colaborador'
        ]);

        \App\Models\Colaboradores::create([
            'id' => 2,
            'id_unidade_saude' => 1,
            'nome' => 'John',
            'cpf' => '12345678900'
        ]);

        // CRIA ESTOQUE
        \App\Models\Estoques::create([
            'id' => 1,
            'id_unidade' => 1,
            'id_vacina' => 1,
            'id_usuario' => 2,
            'lote' => 'EX1',
            'validade' => '2024-06-06',
            'quantidade' => 123
        ]);

        // CRIA PACIENTE
        \App\Models\Pacientes::create([
            'id' => 1,
            'nome' => 'Jane Doe',
            'cpf' => '12345678901',
            'data_nascimento' => '2000-01-02'
        ]);
    }
}
