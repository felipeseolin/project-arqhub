@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container">
        <h1>Novo Projeto</h1>
        <p>Alguma descrição do que fazer</p>

        <ul>
            <li>Id: {{$project->id}}</li>
            <li>Nome: {{$project->name}}</li>
            <li>Descrição: {{$project->description}}</li>
            <li>Área: {{$project->area}}</li>
            <li>Quartos: {{$project->num_bedrooms}}</li>
            <li>Banheiros: {{$project->num_bathrooms}}</li>
            <li>Andares: {{$project->num_floors}}</li>
            <li>Vagas de estacionamento: {{$project->num_parking}}</li>
            <li>Suítes: {{$project->num_suites}}</li>
            <li>Largura: {{$project->width}}</li>
            <li>Comprimento: {{$project->length}}</li>
            <li>Categoria: {{$project->category}}</li>
            <li>Usuário que cadastrou: {{$userName}}</li>
        </ul>
    </section>

@endsection