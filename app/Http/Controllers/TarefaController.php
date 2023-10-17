<?php

namespace App\Http\Controllers;

use App\Http\Helpers\TarefaHelper;
use App\Http\Requests\StoreUpdateTarefa;
use App\Mail\MailAnex;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;



class TarefaController extends Controller
{

    public function listagem(Tarefa $tarefas) // faz a consulta no banco de dados usando o model tarefa
    {

        $id_user = auth()->user()->id;
        
        $tarefa = $tarefas->where('id_user', $id_user)->get();
        
        return view('create', compact('tarefa'));
    }

    

    public function show(string|int $id)
    {
        // o find ja puxa tudo que tem nesse id do banco e esse metodo verifica se tem o id se nao ela manda o usuario de volta para ultima url

        //Tarefa::find($id) pesquisa direto na coluna id
        //Tarefa::where('id', '=' $id)->first(); aqui eu posso passar a coluna e o criterio de comparacao

       if (!$tarefa = Tarefa::find($id))
       {
        return back();
       } 
       
       return view('show', compact('tarefa'));
       
    }


    public function store(StoreUpdateTarefa $request, Tarefa $tarefa){

        /*
        chama o model tarefa o request pega todas as informacoes do formulario e na action do formulario
        vc passa a rota desse arquivo e dessa funcao depois do request com a funcao create e passa o array
        $dados que tem todas as informacoes do form e cria o cadastro
        */

        $dados = $request->validated();

        if(isset($dados['concluida'])){

            $dados['concluida'] = 1;
        }else{
            $dados['concluida'] = 0;
        }

        /* 
            ao inves de eu usar um $request->all() ou only('') ja que esses dados passam por uma validacao eu posso usar o $request->validated();
        */

        $tarefa->create($dados);
        
        return redirect()->route('tarefas.listagem'); //sempre passa o nome da rota para direcionar.
    }


    /*
        essa funcao e igual a funcao show so mudou a forma de escrever pq agora eu chamo a class tarefa
        no parametro e em vez de usar o find agora eu usei o where e passei o campo
    */

    public function edit(string|int $id)
    {
        /*
        if (!$tarefas = Tarefa::find($id)) 
       {
        return back();
       } 
       */
       

       $tarefa = Tarefa::find($id);

       
       return view('edit', compact('tarefa'));
        


    }
    
    /* 
        essa funcao serve para fazer o update primeiramente chamo o require passo os valores dele para $dados depois chamo a class tarefa passo o id pela url e no metodo tarefa->update passo a variavel $dados 
        e depois passo o only que sao apenas os dados que vou realizar o update e redieciono para a rota da listagem
    */
    public function update(StoreUpdateTarefa $dados ,Tarefa $tarefa ,string|int $id)
    {
        if (!$tarefa = $tarefa->find($id))
        {
            return back();
        }

        /*  outra forma
            $tarefa->nome = $dados->nome;
            $tarefa->descricao = $dados->descricao;
            $tarefa->por_ai_vai = $dados->por_ai_vai;
            $tarefa->save();
        */

        /*
        $tarefa->update($dados->only([ posso passar dessa forma ou so validated que ja pega os dados que eu tratei
            'nome',
            'descricao',
            'prazo',
            'prioridade',
            'concluida'
        ]));
        */

        $dados = $dados->validated();

        if(isset($dados['concluida'])){

            $dados['concluida'] = 1;
        }else{
            $dados['concluida'] = 0;
        }

        $tarefa->update($dados);

        return redirect()->route('tarefas.listagem');
    }

    public function destroy(Tarefa $tarefa ,string|int $id)
    {
        if (!$tarefa = $tarefa->find($id))
        {
            return back();
        }

        $tarefa->delete();

        return redirect()->route('tarefas.listagem');

        /* delete e uma action que precisa do id uma requisicao entao tem que enviar como formulario*/

    }

    public function mailanex(Request $request)
    {

        $sent = Mail::to(users: auth()->user()->email, name: auth()->user()->name)->send(mailable:new MailAnex(data:[
            'fromName' => $request->input('nome'),
            'fromEmail' => $request->input('email'),
            'subject' => $request->input('assunto'),
            'message' => $request->input('mensagem'),
            'anexo' => $request->file('files')
        ]));
        
        return redirect()->route('tarefas.listagem');
    }

}
