@extends('master')

@section('content')
    
    <div class="container-fluid" style="height: 90vh; background-image: url(https://unsplash.it/1900/1080?image=1076); background-position: center; background-size: cover; background-repeat: no-repeat;">
    @include('navbar')   
    <div style="height: 20vh;"></div>
    <section class="jumbotron text-center">
    <div class="container">
        <div class="card-body">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
                You are logged in!
        </div>
        <p class="lead text-muted">Bem-vindo ao</p>

      <h1 class="jumbotron-heading"><i><b>Arq</i>Hub</b></h1>
      <p class="lead text-muted">A plataforma para divulgação do seu Portfólio</p>
      <p>
        <a href="projects" class="btn btn-secondary my-2">Ver Projetos</a>
      </p>
    </div>
  </section>
    </div>
    @include('footer')
    
    
      
   
@endsection


