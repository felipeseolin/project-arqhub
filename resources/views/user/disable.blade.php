@extends('master')

@section('content')
    @include('navbar')

    <section id="user" class="container text-center">
        <h1>Desativar a minha conta</h1>
        <p>
            Tenha noção que ao desativar a sua conta, você não será incluido mais como um projetista, seus projetos
            não serão mais listados e os outros usuários não poderão mais te mandar mensagens. Porém, ao realizar
            login novamente com seu usário e senha, seu usuário se tornará ativo novamente, assim como todas as
            funcionalidades.
        </p>
        <h2>Você tem certeza que deseja desativar a sua conta por tempo inderteminado?</h2>
        <div class="row float-right mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-primary mr-4">Não, desejo continuar com a minha conta</a>
            <form action="/user" class="form" method="POST">
                {!! csrf_field() !!}
                {!! method_field('PUT') !!}
                <input id="active" name="active" value="false" type="hidden">
                <button class="btn btn-danger mr-3" type="submit">Sim, desejo desativar a minha conta</button>
            </form>
        </div>
    </section>
@endsection
