<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    use HasFactory;

    protected $table = "promocoes";
    //app/Models/
    protected $fillable = [
        "descricao",
        "valor",
        "quantidade",
        "imagem",
        "produto_id",
    ];

    protected $casts = [
        'produto_id'=>'integer',
    ];

    public function produtos(){
        return $this->hasMany(Produto::class, 'produto_id');
    }
}
