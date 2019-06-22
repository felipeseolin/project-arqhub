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
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt
                        neque tempore recusandae animi soluta quasi? Asperiores rem dolore
                        eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat
                        explicabo, maiores!
                    </p>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis
                        optio neque consectetur consequatur magni in nisi, natus beatae
                        quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt
                        voluptate. Voluptatum.
                    </p>
                    @if($param1 != 'category' && $param2 != 'category' && $param3 != 'category' && $param4 != 'category')
                        <a class="btn btn-secondary btn-lg" href="{{url()->current()}}/category-tradicional">Casas Tradicionais</a>
                        <a class="btn btn-secondary btn-lg" href="{{url()->current()}}/category-praia">Casas de Praia</a>
                        <a class="btn btn-secondary btn-lg" href="{{url()->current()}}/category-campo">Casas de Campo</a>
                        <a class="btn btn-secondary btn-lg" href="{{url()->current()}}/category-edicula">Edícula</a>
                    @endif
                </div>
                <div class="col-md-4 mb-5">
                    <h2>Filtrar</h2>
                    <hr />
                    @if($param1 != 'num_floors' && $param2 != 'num_floors' && $param3 != 'num_floors' && $param4 != 'num_floors')
                        <h4>Pavimentos: </h4>
                        <a href="{{url()->current()}}/num_floors-1" class="btn btn-outline-primary btn-sm">1</a>
                        <a href="{{url()->current()}}/num_floors-2" class="btn btn-outline-primary btn-sm">2</a>
                    @endif
                    @if($param1 != 'num_bedrooms' && $param2 != 'num_bedrooms' && $param3 != 'num_bedrooms' && $param4 != 'num_bedrooms')
                        <h4>Quartos: </h4>
                        <a href="{{url()->current()}}/num_bedrooms-1" class="btn btn-outline-primary btn-sm">1</a>
                        <a href="{{url()->current()}}/num_bedrooms-2" class="btn btn-outline-primary btn-sm">2</a>
                        <a href="{{url()->current()}}/num_bedrooms-3" class="btn btn-outline-primary btn-sm">3</a>
                        <a href="{{url()->current()}}/num_bedrooms-4" class="btn btn-outline-primary btn-sm">4</a>
                    @endif
                    @if($param1 != 'num_bathrooms' && $param2 != 'num_bathrooms' && $param3 != 'num_bathrooms' && $param4 != 'num_bathrooms')
                        <h4>Banheiros: </h4>
                        <a href="{{url()->current()}}/num_bathrooms-1" class="btn btn-outline-primary btn-sm">1</a>
                        <a href="{{url()->current()}}/num_bathrooms-2" class="btn btn-outline-primary btn-sm">2</a>
                        <a href="{{url()->current()}}/num_bathrooms-3" class="btn btn-outline-primary btn-sm">3</a>
                        <a href="{{url()->current()}}/num_bathrooms-4" class="btn btn-outline-primary btn-sm">4</a>
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
                        src="http://placehold.it/500x325"
                        alt=""
                        />
                        <div class="card-body">
                            <h4 class="card-title">{{$project->name}}</h4>
                            <p class="card-text">
                                Pavimentos: {{$project->num_floors}}<br>
                                Quartos: {{$project->num_bedrooms + $project->num_suites}}<br>
                                Banheiros: {{$project->num_bathrooms + $project->num_suites}}<br>
                                Área: {{$project->area}} m²<br>
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="project/id/{{$project->id}}" class="btn btn-outline-primary btn-block">VER</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- card -->
            </div>
        </div>
    </div>
    @include('footer')
    
@endsection