@extends('master')

@section('content')
    
    <div class="container-fluid" >
    @include('navbar')   

    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-3">
          <h2>{{ $user->name }}</h2>
          <hr />
          <address>
            <strong>{{ $user->bio }}</strong>
            <br />{{ $user->email }}<br />
          </address>
        </div>

        <!-- /.col-lg-3 -->

        <div class="col-lg-9">
          <div
            id="carouselExampleIndicators"
            class="carousel slide my-4"
            data-ride="carousel"
          >
            <ol class="carousel-indicators">
              <li
                data-target="#carouselExampleIndicators"
                data-slide-to="0"
                class=""
              ></li>
              <li
                data-target="#carouselExampleIndicators"
                data-slide-to="1"
                class=""
              ></li>
              <li
                data-target="#carouselExampleIndicators"
                data-slide-to="2"
                class="active"
              ></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item">
                <img
                  class="d-block img-fluid"
                  src="http://placehold.it/900x350"
                  alt="First slide"
                />
              </div>
              <div class="carousel-item">
                <img
                  class="d-block img-fluid"
                  src="http://placehold.it/900x350"
                  alt="Second slide"
                />
              </div>
              <div class="carousel-item active">
                <img
                  class="d-block img-fluid"
                  src="http://placehold.it/900x350"
                  alt="Third slide"
                />
              </div>
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
          <div class="col-lg-4 col-md-4 mb-4">
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
                          Quartos: {{$project->num_bedrooms}}<br>
                          Banheiros: {{$project->num_bathrooms}}<br>
                          Vagas na garagem: {{$project->num_parking}}<br>
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
          </div>
          <!-- /.row -->
        </div>
        <!-- /.col-lg-9 -->
      </div>
    </div>

    </div>
    @include('footer')
    
    
      
   
@endsection