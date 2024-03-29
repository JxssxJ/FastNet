<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conexao extends Model
{
    use HasFactory;

    protected $table = "conexoes";
    //app/Models/
    protected $fillable = [
        "descricao",
    ];
}
