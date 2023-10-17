<?php

namespace App\Http\Helpers;

class TarefaHelper
{

    public function traduzprioridade(int $prioridade): string
    {
        if($prioridade == 0){
            return "baixa";
        }elseif($prioridade == 1){
            return "media";
        }elseif($prioridade == 2){
            return "alta";
        }
    }


    public function traduzconcluido(int $concluido): string
    {
        if($concluido == 0){
            return "nao";
        }elseif($concluido == 1){
            return "sim";
        }
    }

}