<?php

namespace App\Models;

use App\Models\Estoques;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacinas extends Model
{
    use HasFactory;

    public      $timestamps = true;
    protected   $table      = 'vacinas';
    protected   $fillable   = [
        'vacina',
        'descricao',
        'idade_minima',
        'idade_maxima',
        'qtd_doses',
        'tempo_espera_dose'
    ];

    public function estoques(): HasMany {
        return $this->hasMany(Estoques::class);
    }
}
