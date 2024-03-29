<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class planotv extends Model
{
    use HasFactory;

    protected $table = "planos_tv";

    protected $fillable = [
        "nome",
        "qtd_telas",
        "valor",
    ];

}
