<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plano_Internet extends Model
{
    use HasFactory;

    protected $table = "planos_internet";

    protected $fillable = [
        "mega",
        "valor",
        "locacao",
        "conexao_id",
        "pessoa_id",
    ];

    protected $casts = [
        'conexao_id'=>'integer',
        'pessoa_id'=>'integer',
    ];

    public function conexao(){

        return $this->belongsTo(Conexao::class, 'conexao_id');
    }

    public function clientes(){

        return $this->hasMany(Pessoa::class, 'pessoa_id');
    }
}
