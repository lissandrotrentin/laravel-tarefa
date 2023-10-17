<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    // vc diz quais os campos podem ser preenchidos da tabela sem isso o laravel nao deixa fazer nenhum 
    //insert por seguranca 
    protected $fillable = [ 
        'user',
        'password'
    ];
}
