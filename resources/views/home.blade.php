@extends('master')

@section('title', 'home')

@section('link', '/css/home.css')

@section('content')


<div class="title">
  <h2>A sua nova agenda virtual</h2>
</div>

<div class="btns"> 
<div class="container-login">
<a href="{{ route('login.index') }}">
  <input type="submit" value="seguir" class="btn">
</a>
</div>
<div class="container-cad">
<a href="{{ route('cadastro.index') }}">
  <input type="submit" value="cadastrar" class="btn">
</a>
</div>
</div>

<div class="messsage">
<div class="typewriter">
    <h1 id="text">

Olá, eu sou uma aplicação destinada a pessoas que desejam organizar melhor suas tarefas. Agora, com essa agenda virtual, você pode verificar e anotar compromissos ou tarefas a serem realizadas. Escolha um botão para continuar.</h1>
  </div>
</div>


<script src="/css/script.js">
</script>


@endsection