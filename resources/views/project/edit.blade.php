@extends('master')

@section('content')
    @include('navbar')

    <section id="edit-project" class="container border">
        <div class="border">
        <h1 class="text-center font-weight-bold">{{$project->name}}</h1>
        <p class="text-center font-italic">Aqui você irá editar as especificações do seu projeto, confira tudo antes de salvar...</p>
        </div>
        
        @if(isset($update))
            <div class="alert {!! $update ? "alert-success" : "alert-danger"  !!}" role="alert">
                {{ $msg }}
            </div>
        @endif
        <form action="{{route('project.update', $project->id)}}" method="POST">
            {!! csrf_field() !!}
            {!! method_field('PUT') !!}

            <div class="form-group">
                <label class="font-weight-bold" for="name">Nome</label>
                <input id="name" name="name" class="form-control" type="text" minlength="5" maxlength="250"
                       value="{{$project->name}}" required>
            </div >

            <div class="form-group">
                <label class="font-weight-bold" for="description">Descrição</label>
                <textarea id="description" name="description" class="form-control" rows="5">{{$project->description}}</textarea>
            </div>

           

            <div class="form-row">

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="area">Área</label>
                <div class="col-sm-7">
                <input id="area" name="area" class="form-control" type="number" min="10" value="{{$project->area}}" required>
                </div>
            </div>

             
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_bedrooms"> Quartos</label>
                <div class="col-sm-7">
                <input id="num_bedrooms" name="num_bedrooms" class="form-control" type="number" min="0" value="{{$project->num_bedrooms}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_bathrooms">Banheiros</label>
                <div class="col-sm-9">
                <input id="num_bathrooms" name="num_bathrooms" class="form-control" type="number" min="0" value="{{$project->num_bathrooms}}"  required>
                </div>
            </div>

           
            </div>

            <div class="form-row">
           
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_suites">Suítes</label>
                <div class="col-sm-7">
                <input id="num_suites" name="num_suites" class="form-control" type="number" min="0" value="{{$project->num_suites}}" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_floors">Andares</label>
                <div class="col-sm-7">
                <input id="num_floors" name="num_floors" class="form-control" type="number" min="0" value="{{$project->num_floors}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_parking">Vagas de Estacionamento</label>
                <div class="col-sm-6">
                <input id="num_parking" name="num_parking" class="form-control" type="number" min="0" value="{{$project->num_parking}}" required>
                </div>
            </div>

           
            </div>
            <div class="form-row">
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="width">Largura</label>
                <div class="col-sm-7">
                <input id="width" name="width" class="form-control" type="number" min="0" value="{{$project->width}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3.5 col-form-label" for="length">Comprimento</label>
                <div class="col-sm-6">
                <input id="length" name="length" class="form-control" type="number" min="0" value="{{$project->length}}" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-4 col-form-label" for="category">Categoria</label>
                <div class="col-sm-8">
                <select id="category" name="category" class="form-control" required>
                    @foreach($categories as $category)
                    <option id="{{$category}}" name="{{$category}}" value="{{ $category }}"
                                {{ $category == $project->category ? "selected" : "" }}
                        >{{ $category }}</option>                    @endforeach
                </select>
                </div>

            </div>
            </div>

            <button id="submit" class="btn btn-success btn-lg" type="submit">Salvar</button>
            
        </form>
    </section>
    
       
    
    
    
@endsection