<h1>Tarefa {{ $tarefa->nome}} </h1>

@section('title', 'tarefa')
@extends('layouts.show_templaite')

<?php use App\Http\Helpers\TarefaHelper; $function = new TarefaHelper; ?>

<div class="all">
    <div class="lista">
<ul>    
    <div class="linha">
    <label>Descricao:</label>
    <li>{{ $tarefa->descricao }}</li>
    </div>
    <div class="linha">
    <label>Prazo:</label>
    <li>{{ $tarefa->prazo }}</li>
    </div>
    <div class="linha">
    <label>Prioridade:</label>
    <li>{{ $function->traduzprioridade($tarefa->prioridade) }}</li>
    </div>
    <div class="linha">
    <label>Concluida:</label>
    <li>{{ $function->traduzconcluido($tarefa->concluida) }}</li>
    </div>
</ul>
</div>
<div class="mail">
    <h2>envie um anexo para o seu email</h2>
<form action="{{ route('tarefas.mailanex') }}" method="post" enctype="multipart/form-data" class="mail-form">
@csrf()

    <input type="hidden" name="nome" value="lissandro">
    <input type="hidden" name="email" value="3lissandro3578@gmail.com"> 
    <input type="hidden" name="mensagem" value="">
    <div class="inputs-email">
    <p>Assunto</p>
    <input type="text" name="assunto" value="{{ $tarefa->nome }}" class="assunto">
    </div>
    <div class="inputs-email">
    <input type="file" name="files" class="file">
    </div>
    <div class="btn-email">
    <input type="submit" value="enviar" class="btn-env"> 
    </div>
</form>
</div>

</div>
<form action="{{ route('tarefas.destroy', $tarefa->id) }}" method="post">
    @csrf()
    @method('delete')
    <!-- a requisicao htp e delete entao precisa disso-->
    <input class="delete" type="submit" value="deletar">
</form>



