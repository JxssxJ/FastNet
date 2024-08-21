<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";

    protected $fillable = [
        "nome",
        "departamento_id",
        "valor",
        "qtd",
        "promocao_id",
    ];

    protected $casts = [
        'departamento_id'=>'integer',
        'promocao_id'=>'integer'
    ];

    public function departamento(){
        return $this->belongsTo(Departamento::class, 'departamento_id');
    }
    public function promocao(){
        return $this->belongsTo(Promocao::class, 'promocao_id');
    }
}
