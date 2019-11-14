@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container">
        <h1>Novo Projeto</h1>
        <p>Cadastre um novo projeto e o descreva.</p>

        @if (isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{$error}}</p>
                @endforeach
            </div>
        @endif

        <form action="{{route('project.store')}}" method="POST" enctype="multipart/form-data">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Nome do projeto</label>
                <input id="name" name="name" class="form-control" type="text" minlength="5" maxlength="250"
                       value="{{old('name')}}" required>
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <label for="area">Área em m²</label>
                <input id="area" name="area" class="form-control" type="number" min="10" value="{{old('area')}}" required>
            </div>

            <div class="form-group">
                <label for="num_bedrooms">Quantidade de quartos</label>
                <input id="num_bedrooms" name="num_bedrooms" class="form-control" type="number" min="0" value="{{old('num_bedrooms')}}" required>
            </div>

            <div class="form-group">
                <label for="num_bathrooms">Quantidade de banheiros</label>
                <input id="num_bathrooms" name="num_bathrooms" class="form-control" type="number" min="0" value="{{old('num_bathrooms')}}" required>
            </div>

            <div class="form-group">
                <label for="num_suites">Quantidade de suítes</label>
                <input id="num_suites" name="num_suites" class="form-control" type="number" min="0" value="{{old('num_suites')}}" required>
            </div>

            <div class="form-group">
                <label for="num_floors">Quantidade de andares</label>
                <input id="num_floors" name="num_floors" class="form-control" type="number" min="0" value="{{old('num_floors')}}" required>
            </div>

            <div class="form-group">
                <label for="num_parking">Quantidade de vagas de estacionamento</label>
                <input id="num_parking" name="num_parking" class="form-control" type="number" min="0" value="{{old('num_parking')}}" required>
            </div>

            <div class="form-group">
                <label for="width">Largura em metros</label>
                <input id="width" name="width" class="form-control" type="number" min="0" value="{{old('width')}}" required>
            </div>

            <div class="form-group">
                <label for="length">Comprimento em metros</label>
                <input id="length" name="length" class="form-control" type="number" min="0" value="{{old('length')}}" required>
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <select id="category" name="category" class="form-control" required>
                    <option value="" selected>Selecione uma categoria...</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="images">Imagens do projeto</label>
                <input name="images[]" class="form-control" type="file" multiple="multiple" required>
                <p>* Somente arquivos em png, jpg, jpeg ou svg. <br> * Selecione múltiplos arquivos.</p>
            </div>

            <button id="submit" class="btn btn-success" type="submit">Salvar</button>
        </form>
    </section>

@endsection
