
@section('title', 'tarefas')

@extends('layouts.templaite')

<?php use App\Http\Helpers\TarefaHelper; $function = new TarefaHelper; ?>

<div class="ar">

<h1> Bem vindo {{ auth()->user()->name }} 
<a href="{{ route('login.destroy') }}">
<input type="submit" value="logout" class="log">
</a>
</h1>

</div>

<div>

<div class="form">
<form action=" {{ route('tarefas.store') }}" method="POST">

    @csrf()
    <input type="hidden" value=" {{ auth()->user()->id }}" name="id_user">
    <div class="inputs">
        <div>
            <p>Nome</p>
            <input type="text"  name="nome" value="{{ old('nome') }} "><!-- o old serve para quando der algum problema o no requeriment como a quantidade de caracteres nao for o suficiente ele nao perder oque o usuario ja digitou -->
        </div>
        <div>
            <p>Descricao</p>
            <input type="text"  name="descricao" value="{{ old('descricao') }} "> 
        </div>
        <div>
            <p>Prazo</p>
            <input type="text"  name="prazo" value="{{ old('prazo') }}  ">
        </div>
    </div>
    <div class="checks">
        <div>
            <label> Prioridade 
            Baixa
            <input type="radio" name="prioridade" value="0">
            </label>
            <label>
            Media
            <input type="radio" name="prioridade" value="1">
            </label>
            <label>
            Alta
            <input type="radio" name="prioridade" value="2">
            </label>
        </div>
            <label>Tarefa Concluída
                <input type="checkbox" name="concluida" value="1">
            </label>
            <input class="submit" type="submit" value="enviar">
    </div>
</form> 
</div>

    </div>

</div>

    

@if ($errors->any())
    @foreach($errors->all() as $error)
        {{ $error }}
    @endforeach
@endif

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

        @foreach($tarefa as $tarefas)

        <tr>
            <td scope="row""><a href="{{ route('tarefas.edit', $tarefas->id ) }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></a>
<a href="{{ route('tarefas.show', $tarefas->id) }}"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></a></td>
            <td scope="row"">{{ $tarefas->nome }}</td>
            <td scope="row"">{{ $tarefas->descricao }}</td>
            <td scope="row"">{{ $tarefas->prazo }}</td>
            <td scope="row"">{{ $function->traduzprioridade($tarefas->prioridade) }}</td>
            <td scope="row"">{{ $function->traduzconcluido($tarefas->concluida) }}</td>
        </tr>

        @endforeach

        </tbody>
    </table>
</div>





