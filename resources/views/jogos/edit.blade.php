@extends('layouts.app')

@section('title', 'Edição')

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<!--Tudo aqui dentro vai ser renderizado lá no nosso templete-->
<div class="container mt-5">
        <h1>Editar jogo</h1>
        <hr>
        <form action="{{ route('jogos-update', ['id'=>$jogos->nome]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="fom-group">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome" value="{{ $jogos->nome }}" 
                        placeholder="Digite um nome...">
                </div>
                <br>
                <div class="fom-group">
                        <label for="categoria">Categoria:</label>
                        <input type="text" class="form-control" name="categoria" value="{{ $jogos->categoria }}"
                         placeholder="Digite uma categoria...">
                </div>
                <br>
                <div class="form-group">
                        <label for="ano_criacao">Ano de criação:</label>
                        <input type="number" class="form-control" name="ano_criacao" id="ano_criacao" value="{{ $jogos->ano_criacao }}"
                                placeholder="Digite o ano de criação..." min="1900" max="2099" step="1">
                </div>
                <br>
                <div class="fom-group">
                        <label for="valor">Valor:</label>
                        <input type="number" class="form-control" name="valor" value="{{ $jogos->valor }}"
                         placeholder="Digite um valor...">
                </div>
                <br>
                <div class="fom-group">
                        <input type="submit" name="submit" class="btn btn-success" value="Atualizar">
                </div>
        </form>
</div>
@endsection