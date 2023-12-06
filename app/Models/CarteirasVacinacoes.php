<?php

namespace App\Models;

use App\Models\Pacientes;
use App\Models\Estoques;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarteirasVacinacoes extends Model
{
    use HasFactory;

    public      $timestamps = true;
    protected   $table      = 'carteiras_vacinacoes';
    protected   $fillable   = [
        'id_paciente',
        'id_estoque',
        'id_usuario_vacina',
        'data_vacinacao',
        'dose',
        'data_proxima_dose'
    ];

    public function paciente(){
        return $this->belongsTo(Pacientes::class, 'id_paciente');
    }

    public function estoque(){
        return $this->belongsTo(Estoques::class, 'id_estoque');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario_vacina');
    }
}
