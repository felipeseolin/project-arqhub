@extends('master')

@section('content')

    <div class="container-fluid">
        @include('navbar')

        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3">
                    <div style="background-image: url({{'"'. url('/images/users/') . '/' . ($user->picture ?? 'icon.svg') . '"'}});"
                         class="foto-perfil">
                    </div>
                    <br>
                    <h2>{{ $user->name }}</h2>
                    <hr/>
                    <address>
                        <strong>{{ $user->bio }}</strong>
                        <br/>
                        <a href="mailto:{{$user->email}}">
                            {{ $user->email }}
                        </a>
                        <br/>
                        <a href="tel:{{$user->phone}}">
                            {{ $user->phone }}
                        </a>
                        <br>
                    </address>
                    <p>Número de projetos:
                        {{ \count($projects) }}
                    </p>
                </div>

                <!-- /.col-lg-3 -->

                <div class="col-lg-9">
                    @if(session('mailStatus'))
                        <div class="alert alert-info">
                            {{ session('mailStatus') }}
                        </div>
                    @endif

                    <div
                            id="carouselExampleIndicators"
                            class="carousel slide my-4"
                            data-ride="carousel"
                    >
                        <ol class="carousel-indicators">
                            @for($i = 0; $i < count($projectsImgs); $i++)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}"
                                    class="{{ $i == 0 ? 'active' : '' }}"></li>
                            @endfor
                        </ol>
                        <div class="carousel-inner" role="listbox">
                            @for($i = 0; $i < count($projectsImgs); $i++)
                                <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                                    <img class="d-block img-fluid"
                                         src="{{ url('/images') . '/' . $projectsImgs[$i]->img_name }}"
                                         alt="Imagem {{$i}}">
                                </div>
                            @endfor

                        </div>
                        <a
                                class="carousel-control-prev"
                                href="#carouselExampleIndicators"
                                role="button"
                                data-slide="prev"
                        >
              <span
                      class="carousel-control-prev-icon"
                      aria-hidden="true"
              ></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a
                                class="carousel-control-next"
                                href="#carouselExampleIndicators"
                                role="button"
                                data-slide="next"
                        >
              <span
                      class="carousel-control-next-icon"
                      aria-hidden="true"
              ></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <div class="row">
                        @foreach($projects as $project)
                            @php
                                $projImg =  $project->project_image[0]->img_name;
                                $src =  url('/images') . '/' . $projImg;
                            @endphp
                            <div class="col-lg-4 col-md-4 mb-4">
                                <div class="card h-100">
                                    <img
                                            class="card-img-top"
                                            src="{{$src}}"
                                            alt="Imagem do projeto"
                                    />
                                    <div class="card-body">
                                        <h4 class="card-title">{{$project->name}}</h4>
                                        <p class="card-text">
                                            Pavimentos: {{$project->num_floors}}<br>
                                            Quartos: {{$project->num_bedrooms}}<br>
                                            Banheiros: {{$project->num_bathrooms}}<br>
                                            Vagas na garagem: {{$project->num_parking}}<br>
                                        </p>
                                    </div>
                                    <div class="card-footer">
                                        Tamanho: {{$project->width}} x {{$project->length}} m<br>
                                        Área: {{$project->area}} m²<br>
                                        <a href="{{url('project/id', $project->id)}}"
                                           class="btn btn-outline-primary btn-block">VER</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.col-lg-9 -->
            </div>
        </div>

    </div>
    @include('footer')
@endsection
