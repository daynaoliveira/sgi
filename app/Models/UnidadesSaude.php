<?php

namespace App\Models;

use App\Models\Colaboradores;
use App\Models\Estoques;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function colaboradores(): HasMany {
        return $this->hasMany(Colaboradores::class);
    }

    public function estoques(): HasMany {
        return $this->hasMany(Estoques::class);
    }
}
