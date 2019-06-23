@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container">
        <h1 class="text-center font-weight-bold">{{$project->name}}</h1>
        <p class="text-center font-italic ">Descrição do projeto</p>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Área</th>
                <th>Banheiros</th>
                <th>Andares</th>
                <th>Estacionamento</th>
                <th>Suítes</th>
                <th>Largura</th>
                <th>Comprimento</th>
                <th>Categoria</th>
                <th>Usuário que cadastrou</th>
            </tr>
    
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->area}}</td>
                    <td>{{$project->num_bedrooms}}</td>
                    <td>{{$project->num_bathrooms}}</td>
                    <td>{{$project->num_floors}}</td>
                    <td>{{$project->num_parking}} vaga(s)</td>
                    <td>{{$project->num_suites}}</td>
                    <td>{{$project->width}}</td>
                    <td>{{$project->length}}</td>
                    <td>{{$project->category}}</td>
                    <td>{{$userName}}</td>
                    <td>
                      
                
                    </td>
                </tr>
        </table>
        <table class="table table-striped">
            <tr>
                <th class='text-center'>Descrição</th>
            </tr>
                <tr>
                    <td class='text-center'>{{$project->description}}</td>
                </tr>
        </table>
    </section>

@endsection