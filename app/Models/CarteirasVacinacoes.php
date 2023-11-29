<?php

namespace App\Models;

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
        'dose'
    ];
}
