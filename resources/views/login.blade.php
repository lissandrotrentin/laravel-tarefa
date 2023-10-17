@extends('master')

@section('title', 'login')

@section('link', '/css/home.css')

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

<div class="form-div">
    <p>login</p>
<form action="{{ route('login.store') }}" method="post" class="form-login">
@csrf
    <div class="campos">
    <label>nome</label>
    <input type="text" name="name" class="input-login">
    </div>
    <div class="campos">
    <label>senha</label>
    <input type="password" name="password" class="input-login">
    </div>
    <input type="submit" value="entrar" class="btn-login">
</form>
</div>


@endsection