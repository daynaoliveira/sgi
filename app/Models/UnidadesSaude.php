<?php

namespace App\Models;

use App\Models\Colaboradores;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class UnidadesSaude extends Model
{
    use HasFactory, Notifiable;

    public      $timestamps = true;
    protected   $table      = 'unidades_saudes';
    protected   $fillable   = [
        'nome_unidade_saude',
        'cep',
        'numero'
    ];

    public function colaborador()
    {
        return $this->hasMany(Colaboradores::class, 'id', 'id_unidade_saude');
    }
}
