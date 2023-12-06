<?php

namespace App\Models;

use App\Models\UnidadesSaude;
use App\Models\Vacinas;
use App\Models\User;
use App\Models\CarteirasVacinacoes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoques extends Model
{
    use HasFactory;

    public      $timestamps = true;
    protected   $table      = 'estoques';
    protected   $fillable   = [
        'id_unidade',
        'id_vacina',
        'id_usuario',
        'lote',
        'validade',
        'quantidade'
    ];

    public function unidade_saude(){
        return $this->belongsTo(UnidadesSaude::class, 'id_unidade_saude');
    }

    public function vacina(){
        return $this->belongsTo(Vacinas::class, 'id_vacina');
    }

    public function usuario(){
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function carteiras_vacinacoes(): HasMany {
        return $this->hasMany(CarteirasVacinacoes::class);
    }
}
