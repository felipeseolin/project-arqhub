@extends('master')

@section('content')
    @include('navbar')

    <section id="list-projects" class="container ">
        <div>
            <h1 class="text-center font-weight-bold">Meus Projetos</h1>
            <p></p>
        </div>
        <div>
            <p></p>
            <a class="btn btn-success col-" href="{{route("project.create")}}">Novo projeto</a>

            <p></p>
        </div>

        <div>
            <table class="table table-striped text-center">

                <tr>
                    <th>Projeto</th>
                    <th>Largura</th>
                    <th>Comprimento</th>
                    <th>m²</th>
                    <th>Quartos</th>
                    <th>Banheiros</th>
                    <th>Pisos</th>
                    <th>Estacionamento</th>
                    <th>Suítes</th>
                    <th>Categoria</th>

                </tr>
                @foreach($projects as $project)
                    <tr class="bg-light">
                        <td>{{$project->name}}</td>
                        <td>{{$project->width}}</td>
                        <td>{{$project->length}}</td>
                        <td>{{$project->area}}</td>
                        <td>{{$project->num_bedrooms}}</td>
                        <td>{{$project->num_bathrooms}}</td>
                        <td>{{$project->num_floors}}</td>
                        <td>{{$project->num_parking}} vaga(s)</td>
                        <td>{{$project->num_suites}}</td>
                        <td>{{$project->category}}</td>
                    </tr>



                    <tr>
                        <td>
                            <a class="text-center btn btn-info" href="{{route("project.show", $project->id)}}">Visualizar</a>

                        </td>
                        <td>

                            <a class="text-center btn btn-primary" href="{{route("project.edit", $project->id)}}">Editar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </td>
                        <td>
                            <form class="form" method="post" action="{{route('project.destroy', $project->id)}}">
                                {!! method_field('DELETE') !!}
                                {!! csrf_field() !!}
                                <button class="text-center btn btn-danger ">Deletar&nbsp;&nbsp;&nbsp;&nbsp;</button>
                            </form>

                        </td>
                    </tr>
                @endforeach

            </table>

            {!! $projects->links() !!}


        </div>
    </section>
    <div><p><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/></p></div>
    @include('footer')
@endsection