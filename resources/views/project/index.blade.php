@extends('master')

@section('content')

    <div class="container-fluid" >
    @include('navbar')

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h2>Projetos</h2>
                    <hr />
                    <p>
                        Aqui estão listados os projetos disponíveis, filtre e encontre resultados
                        melhores.
                    </p>
                    @if($param1 != 'category' && $param2 != 'category' && $param3 != 'category' && $param4 != 'category')
                        <a class="btn btn-dark btn-lg " href="{{url()->current()}}/category-tradicional">Casas Tradicionais</a>
                        <a class="btn btn-dark btn-lg" href="{{url()->current()}}/category-praia">Casas de Praia</a>
                        <a class="btn btn-dark btn-lg" href="{{url()->current()}}/category-campo">Casas de Campo</a>
                        <a class="btn btn-dark btn-lg" href="{{url()->current()}}/category-edicula">Edícula</a>
                    @else
                        <a class="btn btn-secondary btn-lg disabled" href="{{url()->current()}}/category-tradicional">Casas Tradicionais</a>
                        <a class="btn btn-secondary btn-lg disabled" href="{{url()->current()}}/category-praia">Casas de Praia</a>
                        <a class="btn btn-secondary btn-lg disabled" href="{{url()->current()}}/category-campo">Casas de Campo</a>
                        <a class="btn btn-secondary btn-lg disabled" href="{{url()->current()}}/category-edicula">Edícula</a>
                    @endif
                </div>
                <div class="col-md-4 mb-5">
                    <h2>Filtrar</h2>
                    <hr />
                    <h4>Pavimentos: </h4>
                    @if($param1 != 'num_floors' && $param2 != 'num_floors' && $param3 != 'num_floors' && $param4 != 'num_floors')
                        <a href="{{url()->current()}}/num_floors-1" class="btn btn-outline-primary btn-sm ">1</a>
                        <a href="{{url()->current()}}/num_floors-2" class="btn btn-outline-primary btn-sm">2</a>
                    @else
                        <a href="{{url()->current()}}/num_floors-1" class="btn btn-outline-info btn-sm disabled">1</a>
                        <a href="{{url()->current()}}/num_floors-2" class="btn btn-outline-info btn-sm disabled">2</a>
                    @endif
                    <h4>Quartos: </h4>
                    @if($param1 != 'num_bedrooms' && $param2 != 'num_bedrooms' && $param3 != 'num_bedrooms' && $param4 != 'num_bedrooms')
                        <a href="{{url()->current()}}/num_bedrooms-1" class="btn btn-outline-primary btn-sm">1</a>
                        <a href="{{url()->current()}}/num_bedrooms-2" class="btn btn-outline-primary btn-sm">2</a>
                        <a href="{{url()->current()}}/num_bedrooms-3" class="btn btn-outline-primary btn-sm">3</a>
                        <a href="{{url()->current()}}/num_bedrooms-4" class="btn btn-outline-primary btn-sm">4</a>
                    @else
                        <a href="{{url()->current()}}/num_bedrooms-1" class="btn btn-outline-info btn-sm disabled">1</a>
                        <a href="{{url()->current()}}/num_bedrooms-2" class="btn btn-outline-info btn-sm disabled">2</a>
                        <a href="{{url()->current()}}/num_bedrooms-3" class="btn btn-outline-info btn-sm disabled">3</a>
                        <a href="{{url()->current()}}/num_bedrooms-4" class="btn btn-outline-info btn-sm disabled">4</a>
                    @endif
                    <h4>Banheiros: </h4>
                    @if($param1 != 'num_bathrooms' && $param2 != 'num_bathrooms' && $param3 != 'num_bathrooms' && $param4 != 'num_bathrooms')
                        <a href="{{url()->current()}}/num_bathrooms-1" class="btn btn-outline-primary btn-sm">1</a>
                        <a href="{{url()->current()}}/num_bathrooms-2" class="btn btn-outline-primary btn-sm">2</a>
                        <a href="{{url()->current()}}/num_bathrooms-3" class="btn btn-outline-primary btn-sm">3</a>
                        <a href="{{url()->current()}}/num_bathrooms-4" class="btn btn-outline-primary btn-sm">4</a>
                    @else
                        <a href="{{url()->current()}}/num_bathrooms-1" class="btn btn-outline-info btn-sm disabled">1</a>
                        <a href="{{url()->current()}}/num_bathrooms-2" class="btn btn-outline-info btn-sm disabled">2</a>
                        <a href="{{url()->current()}}/num_bathrooms-3" class="btn btn-outline-info btn-sm disabled">3</a>
                        <a href="{{url()->current()}}/num_bathrooms-4" class="btn btn-outline-info btn-sm disabled">4</a>
                    @endif
                </div>
            </div>
        <!-- Page Features -->
            <hr />
            <div class="row text-center">
            @foreach($projects as $project)
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <img
                        class="card-img-top"
                        src="{{ url('/images') . '/' . $project->project_image[0]->img_name }}"
                        alt="Imagem do projeto"
                        />
                        <div class="card-body">
                            <h4 class="card-title">{{$project->name}}</h4>
                            <p class="card-text">
                                Pavimentos: {{$project->num_floors}}<br>
                                Quartos: {{$project->num_bedrooms}}<br>
                                Banheiros: {{$project->num_bathrooms}}<br>
                                Vagas na garagem: {{$project->num_parking}}<br>
                                Categoria: {{$project->category}}<br>
                            </p>
                        </div>
                        <div class="card-footer">
                                Tamanho: {{$project->width}} x {{$project->length}} m<br>
                                Área: {{$project->area}} m²<br>
                            <a href="http://127.0.0.1:8000/project/id/{{$project->id}}" class="btn btn-outline-primary btn-block">VER</a>
                        </div>
                    </div>
                </div>
                @endforeach
{{--                {!! $projects->links() !!}--}}
                <!-- card -->
            </div>
        </div>
    </div>
    @include('footer')

@endsection