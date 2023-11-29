<?php

namespace App\Models;

use App\Models\UnidadesSaude;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaboradores extends Model
{
    use HasFactory;

    public      $timestamps = true;
    protected   $table      = 'colaboradores';
    protected   $fillable   = [
        'id_unidade_saude',
        'nome',
        'cpf'
    ];

    public function unidade(){
        return $this->belongsTo(UnidadesSaude::class, 'id_unidade_saude', 'id');
    }
}
