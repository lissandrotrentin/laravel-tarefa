<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateTarefa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    /* agora na funcao store no meu controller em vez de passar a class Requere eu passo essa class ou seja StoreUpdateTarefa */
    public function rules(): array
    {
        /* esse metodo de regra vale tanto para criar a tarefa e fazer o update
        a regra comeca recebendo esse array
        */
        $rules = [
            'id_user' => [],
            'nome' => [
                'required',
                'min:3',
                'max:255',
            ],
            'descricao' => [
                'required',
                'min:3',
                'max:255',          
            ],
            'prazo' => [],
            'prioridade' => [
                'required',
                'min:1'
            ],
            'concluida' => [],

        ];


        /* 
            quando a gente da um update o metodo que passamos e PUT entao a regra so muda para o update
            em estamos dizendo ali na ultima linha do array que para o id que vem da url ele crie uma essecao 
            e nao aplique o unique, se nao ele nao deixa fazer a atualizacao do mesmo nome
        */
        if ($this->method() === 'PUT')
        {
            $rules['nome'] = [
                'required',
                'min:3',
                'max:255', 
                //"unique:tarefas,nome, {$this->id},id" // primeira forma
                Rule::unique('tarefas')->ignore($this->id) // segunda forma
            ];
        }

        return $rules;
    }
}
