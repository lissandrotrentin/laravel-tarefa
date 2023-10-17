@extends('master')

@section('title', 'login')

@section('link', '/css/cadastro.css')

@section('content')


@if (session()->has('succes'))
    {{ session()->get('succes') }}
@endif

@error('error')
    <span>{{ $message }}</span>
@enderror

@error('name')
    <span>{{ $message }}</span>
@enderror

@error('password')
    <span>{{ $message }}</span>
@enderror

@error('email')
    <span>{{ $message }}</span>
@enderror

<div class="form-login">
    <p class="p">cadastrar</p>
<form action="{{ route('cadastro') }}" method="post" class="form-cad">
@csrf
    <div class="campos" >
    <label>nome</label>
    <input type="text" name="name" class="input-login">
    </div>
    <div class="campos">
    <label>email</label>
    <input type="email" name="email" class="input-login">
    </div>
    <div class="campos">
    <label>senha</label>
    <input type="password" name="password" class="input-login">
    </div>
    <input type="submit" value="cadastrar" class="btn-login">
</form>
</div>


@endsection