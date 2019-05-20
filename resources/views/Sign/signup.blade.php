@extends('master')

@section('content')
    @include('navbar')

    <div class="container">
        <h1>Cadastre-se</h1>
        <p>
            Caso você seja um arquiteto ou alguém que deseja mostrar o seu trabalho é importante
            se inscrever em nosso site.
        </p>

        <form class="form" method="post" action="{{route('signup.store')}}">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="fname">Nome</label>
                <input id="fname" name="fname" type="text" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="lname">Sobrenome</label>
                <input id="lname" name="lname" type="text" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="birth">Nascimento</label>
                <input id="birth" name="birth" type="date" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input id="email" name="email" type="email" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="phone">Telefone</label>
                <input id="phone" name="phone" type="number" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Senha</label>
                <input id="password" name="password" type="password" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="password-confirm">Confirme a senha</label>
                <input id="password-confirm" name="password-confirm" type="password" class="form-control" required="required">
            </div>

            <div class="form-group">
                <label for="bio">Biografia</label>
                <textarea id="bio" name="bio" cols="30" rows="10" class="form-control"></textarea>
            </div>

            <div class="form-check">
                <input id="agree" class="form-check-input" type="checkbox" required="required">
                <label class="form-check-label" for="agree">
                    Eu concordo com as políticas do site
                </label>
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
@endsection()