@section('title', 'editar')

@extends('layouts.templaite')

<?php use App\Http\Helpers\TarefaHelper; $function = new TarefaHelper; ?>


<div class="barra">
<h2>Tarefa</h2>
</div>


<div>

<div class="form">
<form action=" {{ route('tarefas.update', $tarefa->id) }}" method="POST">

    @method('put')
    @csrf()
    <div class="inputs">
        <div>
            <p>Nome</p>
            <input type="text"  name="nome" value="{{ $tarefa->nome }} "><!-- o old serve para quando der algum problema o no requeriment como a quantidade de caracteres nao for o suficiente ele nao perder oque o usuario ja digitou -->
        </div>
        <div>
            <p>Descricao</p>
            <input type="text"  name="descricao" value="{{ $tarefa->descricao }} "> 
        </div>
        <div>
            <p>Prazo</p>
            <input type="text"  name="prazo" value="{{ $tarefa->prazo }}">
        </div>
    </div>
    <div class="checks">
        <div>
            <label> Prioridade 
            Baixa
            <input type="radio" name="prioridade" <?php if($tarefa->prioridade == 0): echo 'checked';  endif?> value="0">
            </label>
            <label>
            Media
            <input type="radio" name="prioridade" value="1" <?php if($tarefa->prioridade == 1): echo 'checked';  endif?>>
            </label>
            <label>
            Alta
            <input type="radio" name="prioridade" value="2" <?php if($tarefa->prioridade == 2): echo 'checked';  endif?>>
            </label>
        </div>
            <label>Tarefa Concluída
                <input type="checkbox" name="concluida" value="1" <?php if($tarefa->concluida == 1): echo 'checked';  endif?>>
            </label>
            <input class="submit" type="submit" value="enviar">
    </div>
</form> 
</div>

    </div>

</div>


<div class="div">
    <table class="table table-hover table-dark">
        <thead>
            <tr>
            <th scope="col""></th>
            <th scope="col"">Nome</th>
            <th scope="col"">Descricao</th>
            <th scope="col"">Prazo</th>
            <th scope="col"">Prioridade</th>
            <th scope="col"">Concluida</th>
            
            </tr>
        </thead>
        <tbody>

        <tr>
            <td scope="row""><a href="{{ route('tarefas.show', $tarefa->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></a></td>
            <td scope="row"">{{ $tarefa->nome }}</td>
            <td scope="row"">{{ $tarefa->descricao }}</td>
            <td scope="row"">{{ $tarefa->prazo }}</td>
            <td scope="row"">{{ $function->traduzprioridade($tarefa->prioridade) }}</td>
            <td scope="row"">{{ $function->traduzconcluido($tarefa->concluida) }}</td>
            <!-- se for mais do que um parametro passa na forma de array [] -->
        </tr>

        </tbody>
    </table>
</div>

