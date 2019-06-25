@extends('master')

@section('content')
    @include('navbar')

    <section id="user" class="container">
        <div class="row justify-content-md-center">
            <div class="col-sm-4 ">
                <div style="background-image: url({{'"'. url('/images/users/') . '/' . ($user->picture ?? 'icon.svg') . '"'}});"
                    class="foto-perfil">
                </div>
                <h3 class="text-center">{{ Auth::user()->name }}</h3>
                <h4 class="text-center">{{ Auth::user()->email }}</h4>
                <h4 class="text-center">{{ Auth::user()->phone }}</h4>

            </div>

            <div class="col col-lg-8 ">
                <div>
                    <h3 class="text-center">PERFIL</h3>
                    <h4 class="text-center">Altere suas informações</h4>
                </div>

                <form id="form" class="form" action="" method="POST" enctype="multipart/form-data">

                    @if(isset($update))
                        @if($update === true)
                            <div class="alert alert-success">
                                As alterações foram salvas com sucesso!
                            </div>
                        @else
                            <div class="alert alert-danger">
                                Ocorreu um erro ao salvar!
                            </div>
                        @endif
                    @endif
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}


                    <input id="active" name="active" value="true" type="hidden">

                    <div class="form-group">
                        <label for="name">Nome</label>
                        <input id="name" name="name" class="form-control" type="text" value="{{$user->name}}">
                    </div>

                    <div class="form-group">
                        <label for="email">E-mail</label>
                        <input id="email" name="email" class="form-control" type="email" value="{{$user->email}}"
                               disabled>
                    </div>

                    <div class="form-group">
                        <label for="phone">Telefone:</label>
                        <input id="phone" name="phone" class="form-control" type="number" value="{{$user->phone}}">
                    </div>

                    <div class="form-group">
                        <label for="birth">Data de Nascimento</label>
                        <input id="birth" name="birth" class="form-control" type="date" value="{{$user->birth}}">
                    </div>

                    <div class="form-group">
                        <label for="picture">Foto de perfil</label>
                        <input id="picture" name="picture" class="form-control" type="file">
                    </div>

                    <div class="form-group">
                        <label for="bio">Fale um pouco sobre você</label>
                        <textarea id="bio" name="bio" class="form-control" rows="10">{{$user->bio}}</textarea>
                    </div>


                    <button id="submit" class="btn btn-success" type="submit">Salvar</button>

                </form>

                <form action="" class="form" method="POST">
                    {!! csrf_field() !!}
                    {!! method_field('PUT') !!}
                    <input id="active" name="active" value="false" type="hidden">
                    <button class="btn btn-danger" type="submit">Desativar a minha conta</button>
                </form>

            </div>
    </section>
@endsection