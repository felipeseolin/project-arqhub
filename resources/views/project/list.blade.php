@extends('master')

@section('content')
    @include('navbar')

    <section id="list-projects" class="container">
        <h1>Projetos Gerais</h1>
        <p>Alguma descrição do que fazer</p>

        <table class="table table-striped">
            <tr>
                <th>Nome</th>
                <th>Area</th>
                <th>Numero quartos</th>
                <th>Numero banheiros</th>
                <th>Numero pisos</th>
                <th>Numero estacionamento</th>
                <th>Numero suítes</th>
                <th>Largura</th>
                <th>Comprimento</th>
                <th>Usuário</th>
                <th width="100px">Ações</th>
            </tr>
            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->area}}</td>
                    <td>{{$project->num_bedrooms}}</td>
                    <td>{{$project->num_bathrooms}}</td>
                    <td>{{$project->num_floors}}</td>
                    <td>{{$project->num_parking}}</td>
                    <td>{{$project->num_suites}}</td>
                    <td>{{$project->width}}</td>
                    <td>{{$project->length}}</td>
                    <td>{{$userName}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route("project.show", $project->id)}}">Visualizar</a>
                        @if($project->canEdit)
                            <a class="btn btn-primary" href="{{route("project.edit", $project->id)}}">Editar</a>
                            <form class="form" method="post" action="{{route('project.destroy', $project->id)}}">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}
                                <button class="btn btn-danger">Deletar</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>

    </section>

@endsection