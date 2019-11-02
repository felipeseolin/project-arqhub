@extends('master')

@section('content')

    <div class="container-fluid">
        @include('navbar')

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-5">
                    <h2>Projetistas</h2>
                    <hr/>
                    <p>
                        Encontre todos os projetistas.
                    </p>
                </div>
            </div>
            <!-- Page Features -->
            <hr/>
            <div class="row text-center">
                @foreach($users as $user)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <div
                                style="width: 100%; background-image: url({{'"'. url('/images/users/') . '/' . ($user->picture ?? 'icon.svg') . '"'}});"
                                class="foto-perfil">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$user->name}}</h4>
                                <p class="card-text">
                                    {{ \count($user->project) }} projeto(s)
                                </p>
                            </div>
                            <div class="card-footer">
                                <a href="{{url('user', $user->id)}}" class="btn btn-outline-primary btn-block">
                                    VER PERFIL
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col col-12">
                    <div class="row">
                        {!! $users->links() !!}
                    </div>
                </div>
                <!-- card -->
            </div>
        </div>
    </div>
    @include('footer')

@endsection
