@extends('master')

@section('content')
    @include('navbar')

    <section id="edit" class="container">
        <h1>Novo Projeto</h1>
        <p>Alguma outra coisa</p>

        @if(isset($update))
            <div class="alert {!! $update ? "alert-success" : "alert-danger"  !!}" role="alert">
                {{ $msg }}
            </div>
        @endif
        <form action="{{route('project.update', $project->id)}}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label for="name">Nome do projeto</label>
                <input id="name" name="name" class="form-control" type="text" minlength="5" maxlength="250"
                       value="{{$project->name}}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{$project->description}}
                </textarea>
            </div>

            <div class="form-group">
                <label for="area">Área em m²</label>
                <input id="area" name="area" class="form-control" type="number" min="10" value="{{$project->area}}"
                       required>
            </div>

            <div class="form-group">
                <label for="num_bedrooms">Quantidade de quartos</label>
                <input id="num_bedrooms" name="num_bedrooms" class="form-control" type="number" min="0"
                       value="{{$project->num_bedrooms}}" required>
            </div>

            <div class="form-group">
                <label for="num_bathrooms">Quantidade de banheiros</label>
                <input id="num_bathrooms" name="num_bathrooms" class="form-control" type="number" min="0"
                       value="{{$project->num_bathrooms}}" required>
            </div>

            <div class="form-group">
                <label for="num_suites">Quantidade de suítes</label>
                <input id="num_suites" name="num_suites" class="form-control" type="number" min="0"
                       value="{{$project->num_suites}}" required>
            </div>

            <div class="form-group">
                <label for="num_floors">Quantidade de andares</label>
                <input id="num_floors" name="num_floors" class="form-control" type="number" min="0"
                       value="{{$project->num_floors}}" required>
            </div>

            <div class="form-group">
                <label for="num_parking">Quantidade de vagas de estacionamento</label>
                <input id="num_parking" name="num_parking" class="form-control" type="number" min="0"
                       value="{{$project->num_parking}}" required>
            </div>

            <div class="form-group">
                <label for="width">Largura em metros</label>
                <input id="width" name="width" class="form-control" type="number" min="0"
                       value="{{$project->width}}" required>
            </div>

            <div class="form-group">
                <label for="length">Comprimento em metros</label>
                <input id="length" name="length" class="form-control" type="number" min="0"
                       value="{{$project->length}}" required>
            </div>

            <button id="submit" class="btn btn-success" type="submit">Salvar</button>
        </form>

    </section>
@endsection