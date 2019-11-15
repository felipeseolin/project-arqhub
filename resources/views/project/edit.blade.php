@extends('master')

@section('content')
    @include('navbar')

    <section id="edit-project" class="container">
        <div>
            <h1 class="text-center font-weight-bold">{{$project->name}}</h1>
            <p class="text-center font-italic">Aqui você irá editar as especificações do seu projeto, confira tudo antes
                de salvar...</p>
        </div>

        @if(isset($update))
            <div class="alert {!! $update ? "alert-success" : "alert-danger"  !!}" role="alert">
                {{ $msg }}
            </div>
        @endif

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('project.update', $project->id)}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label class="font-weight-bold" for="name">Nome</label>
                <input id="name" name="name" class="form-control" type="text" minlength="5" maxlength="250"
                    value="{{$project->name}}" required>
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control"
                    rows="5">{{$project->description}}</textarea>
            </div>

            <div class="form-group">
                <label for="cover">Nova capa do projeto</label>
                <input id="cover" name="cover" type="file" class="form-control">
                <small>* Somente arquivos em png, jpg, jpeg ou svg. <br>
                    * Quando a nova imagem for adicionada a antiga será apagada.
                </small>
            </div>

            <div class="form-group">
                <label for="humanized_plant">Nova planta humanizada</label>
                <input id="humanized_plant" name="humanized_plant" type="file" class="form-control">
                <small>* Somente arquivos em png, jpg, jpeg ou svg. <br>
                    * Quando a nova imagem for adicionada a antiga será apagada.
                </small>
            </div>

            <div class="form-group">
                <label class="font-weight-bold" for="images">Novas Imagens</label>
                <input name="images[]" class="form-control" type="file" multiple="multiple">
                <small>* Somente arquivos em png, jpg, jpeg ou svg. <br>
                    * Quando novas imagens forem adicionadas as antigas serão apagadas.
                </small>
            </div>


            <div class="form-row">

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="area">Área em m²</label>
                    <div class="col-sm-7">
                        <input id="area" name="area" class="form-control" type="number" min="10"
                            value="{{$project->area}}" required>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="num_bedrooms">Quartos</label>
                    <div class="col-sm-7">
                        <input id="num_bedrooms" name="num_bedrooms" class="form-control" type="number" min="0"
                            value="{{$project->num_bedrooms}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="num_bathrooms">Banheiros</label>
                    <div class="col-sm-9">
                        <input id="num_bathrooms" name="num_bathrooms" class="form-control" type="number" min="0"
                            value="{{$project->num_bathrooms}}" required>
                    </div>
                </div>


            </div>

            <div class="form-row">

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="num_suites">Suítes</label>
                    <div class="col-sm-7">
                        <input id="num_suites" name="num_suites" class="form-control" type="number" min="0"
                            value="{{$project->num_suites}}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="num_floors">Andares</label>
                    <div class="col-sm-7">
                        <input id="num_floors" name="num_floors" class="form-control" type="number" min="0"
                            value="{{$project->num_floors}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="num_parking">Vagas de
                        Estacionamento</label>
                    <div class="col-sm-6">
                        <input id="num_parking" name="num_parking" class="form-control" type="number" min="0"
                            value="{{$project->num_parking}}" required>
                    </div>
                </div>


            </div>
            <div class="form-row">
                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3 col-form-label" for="width">Largura em m</label>
                    <div class="col-sm-7">
                        <input id="width" name="width" class="form-control" type="number" min="0"
                            value="{{$project->width}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-3.5 col-form-label" for="length">Comprimento em m</label>
                    <div class="col-sm-6">
                        <input id="length" name="length" class="form-control" type="number" min="0"
                            value="{{$project->length}}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="font-weight-bold col-sm-4 col-form-label" for="category">Categoria</label>
                    <div class="col-sm-8">
                        <select id="category" name="category" class="form-control" required>
                            @foreach($categories as $category)
                                <option id="{{$category}}" name="{{$category}}" value="{{ $category }}"
                                    {{ $category == $project->category ? "selected" : "" }}
                                >{{ $category }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>

            <button id="submit" class="btn btn-success btn-lg" type="submit">Salvar</button>

        </form>
    </section>

    @include('footer')

@endsection
