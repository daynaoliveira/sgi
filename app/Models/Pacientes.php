<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    public      $timestamps = true;
    protected   $table      = 'pacientes';
    protected   $fillable   = [
        'nome',
        'cpf',
        'data_nascimento'
    ];

    public function carteiras_vacinacoes(): HasMany {
        return $this->hasMany(CarteirasVacinacoes::class);
    }
}
