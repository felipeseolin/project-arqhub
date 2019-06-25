@extends('master')

@section('content')
    @include('navbar')

    <section id="info" class="container">
        <div>
            <h1 class="text-center">Project ArqHub</h1>
            <br>
            <p class="text-center">
                Projeto de software realizado para a disciplina de Oficina de Integração 2<br/> Curso Bach. em
                Engenharia de
                Software<br/>UTFPR - Universidade Tecnológica Federal do Paraná<br/>Câmpus Cornélio Procópio.
            </p>
        </div>
        <div>
            <br>
            <h2 class="text-center font-weight-bold">Alunos</h2>

            <p class="text-center">Elian Marcos Veloso</p>
            <p class="text-center">Felipe Seolin Bento</p>
            <p class="text-center">Rafael Fernandes Marques</p>
            <p class="text-center">Wirlley Oliveira Delfino</p>

        </div>
        <div>
            <br>
            <h2 class="text-center font-weight-bold">Professor</h2>
            <p class="text-center">Rogerio Santos Pozza</p>
        </div>

    </section>
    <div><p><br/><br/><br/><br/></p></div>
    @include('footer')



@endsection