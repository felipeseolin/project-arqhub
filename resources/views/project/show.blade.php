@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container">
        <!-- Heading Row -->
        <div class="row align-items-center my-5">
            <div class="col-lg-7">
                <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
                    <ol class="carousel-indicators">
                        @for($i = 0; $i < count($images); $i++)
                            <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                                class="{{ $i == 0 ? 'active' : '' }}"></li>
                        @endfor
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @for($i = 0; $i < count($images); $i++)
                            <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                <img class="d-block img-fluid"
                                    src="{{ url('/images') . '/' . $images[$i]->img_name }}"
                                    alt="Imagem {{$i}}">
                            </div>
                        @endfor
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
                    <strong>Edícula</strong>
                @endif
                <p>{{$project->description}}</p>
                <ul>
                    <li>Quartos: {{$project->num_bedrooms}}</li>
                    <li>Banheiros: {{$project->num_bathrooms}}</li>
                    <li>Suítes: {{$project->num_suites}}</li>
                    <li>Vagas de estacionamento: {{$project->num_parking}}</li>
                    <li>Pavimentos: {{$project->num_floors}}</li>
                    <li>Tamanho: {{$project->width}} x {{$project->length}} metros</li>
                    <li>Área: {{$project->area}} m²</li>
                </ul>
                <p><a href="{{ url('user' . '/' . $project->user_id) }}">Ver outros projetos do mesmo
                        projetista</a></p>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
        <hr/>
        <h3>Planta humanizada</h3>
        <img style="max-height: 400px; max-width: 900px"
            class="mx-auto d-block" src="{{ url('/images') . '/' . $images[0]->img_name }}"
            alt="Second slide">
        <hr/>
        <h2>Envie uma mensagem para o projetista</h2>
        <form action="{{route('send-email', $project->user_id)}}" method="POST">
            {!! csrf_field() !!}
            <div class="row">
                <div class="col">
                    <label for="name">Nome</label>
                    <input name="name" id="name" type="text" class="form-control" required>
                </div>
                <div class="col">
                    <label for="email-from">E-mail para contato</label>
                    <input name="email-from" id="email-from" type="email" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label for="subject">Assunto</label>
                <input id="subject" name="subject" class="form-control" maxlength="50" type="text" required/>
            </div>
            <div class="form-group">
                <label for="phone">Telefone para contato</label>
                <input id="phone" name="phone" class="form-control" maxlength="50" type="text"/>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Mensagem</label>
                <textarea name="message" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
            <button value="Submit" type="submit" class="btn btn-secondary btn-block">Enviar</button>
        </form>
        <hr/>
    </section>
    @include('footer')

@endsection
