@extends('master')

@section('content')
    @include('navbar')

    <section id="user" class="container">
        <h1>Nome do Usuario</h1>

        <ul>
            <li>Nome: <span>Meu Nome</span></li>
            <li>E-mail: <span>Meu email</span></li>
        </ul>

        <form id="form" class="form"  action="{{route('user.update')}}" method="POST">

            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" name="name" class="form-control" type="text" value="{{$user->name}}">
            </div>
            
            <div class="form-group">
                <label for="phone">Telefone:</label>
                <input id="phone" name="phone" class="form-control" type="number" value="{{$user->phone}}">
            </div>
            
            <div class="form-group">
                <label for="birth">Data de Nascimento:</label>
                <input id="birth" name="birth" class="form-control" type="date" value="{{$user->birth}}">
            </div>

            <div class="form-group">
                <label for="photo">Foto de perfil</label>
                <input id="photo" name="photo" class="form-control" type="file">
            </div>
            
            <div class="form-group">
                <label for="bio">Fale um pouco sobre voce</label>
                <textarea id="bio" name="bio" class="form-control" rows="10">{{$user->bio}}</textarea>
            </div>


            <button id="submit" class="btn btn-success" type="button">Salvar</button>
        </form>

    </section>
@endsection