@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container">
        <!-- Heading Row -->
        <div class="row align-items-center my-5">
            <div class="col-lg-7">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block img-fluid" src="http://placehold.it/900x400" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x400" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block img-fluid" src="http://placehold.it/900x400" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-5">
                    <h1 class="font-weight-light">{{$project->name}}</h1>
                    @if($project->category == 'tradicional')
                        <strong>Casa tradicional</strong>
                    @elseif($project->category == 'campo')
                        <strong>Casa de campo</strong>
                    @elseif($project->category == 'praia')
                        <strong>Casa de praia</strong>
                    @elseif($project->category == 'edicula')
                        <strong>Edicula</strong>    
                    @endif    
                    <p>{{$project->description}}</p>
                    <ul>
                        <li>Quartos: {{$project->num_bedrooms}}</li>
                        <li>Banheiros: {{$project->num_bathrooms}}</li>
                        <li>Suítes: {{$project->num_suites}}</li>
                        <li>Vagas de estacionamento: {{$project->num_parking}}</li>
                        <li>Pavimentos: {{$project->num_floors}}</li>
                        <li>Tamanho: {{$project->width}} x {{$project->length}} m</li>
                        <li>Área: {{$project->area}}</li>
                    </ul>
                    <p><a href="http://127.0.0.1:8000/user/{{$project->user_id}}">Ver outros projetos do mesmo projetista</a></p>
                </div>
                <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
        <hr />
        <p>Planta humanizada</p>
        <img class="mx-auto d-block" src="http://placehold.it/900x400" alt="Second slide">
        <hr />
        <h2>Envie uma mensagem para o projetista</h2>
        <form action="https://formspree.io/{{$userEmail}}" method="POST">
            <div class="row">
                <div class="col">
                    <label for="name">Nome</label>
                    <input name="Nome" id="name" type="text" class="form-control">
                </div>
                <div class="col">
                    <label for="name">Email</label>
                    <input name="Email" id="email" type="email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem</label>
                <textarea name="Mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <button value="Submit" type="submit" class="btn btn-secondary btn-block">Enviar</button>
        </form>
        <hr />
    </section>
    @include('footer')

@endsection