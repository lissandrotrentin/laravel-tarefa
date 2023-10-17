<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    use HasFactory;


    // vc diz quais os campos podem ser preenchidos da tabela sem isso o laravel nao deixa fazer nenhum 
    //insert por seguranca 
    protected $fillable = [ 
        'id_user',
        'nome',
        'descricao',
        'prazo',
        'prioridade',
        'concluida'
    ];
}
