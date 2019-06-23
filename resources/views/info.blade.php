@extends('master')

@section('content')
    @include('navbar')

    <section id="info" class="container">
        <div class='border'>
        <h1 class="text-center font-weight-bold">Project ArqHub</h1>
        <p class="text-center font-italic">
            Projeto de software realizado para a disciplina de Oficina de Integração 2<br/> Curso Bach. em Engenharia de
            Software<br/>UTFPR - Universidade Tecnológica Federal do Paraná<br/>Câmpus Cornélio Procópio.
        </p>
        </div>
        <div class='border'>
        <h2 class="text-center font-weight-bold">Alunos</h2>
        
            <p class="text-center font-italic ">Elian Marcos Veloso</p>
            <p class="text-center font-italic">Felipe Seolin Bento</p>
            <p class="text-center font-italic">Rafael Fernandes Marques</p>
            <p class="text-center font-italic">Wirlley Oliveira Delfino</p>
        
        </div>
        <div >
        <h2 class="text-center font-weight-bold">Professor</h2>
        <p class="text-center font-italic">Rogerio Santos Pozza</p>
        </div>
        
    </section>
    <div><p><br/><br/><br/><br/></p></div>
    @include('footer')



@endsection