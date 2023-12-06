<?php

namespace App\Models;

use App\Models\UnidadesSaude;
use App\Models\User;
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
        'cpf',
        'status'
    ];

    public function unidade(){
        return $this->belongsTo(UnidadesSaude::class, 'id_unidade_saude');
    }

    public function usuarios(){
        return $this->hasMany(User::class);
    }
}
