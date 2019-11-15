@extends('master')

@section('content')

    <div class="container-fluid">
        @include('navbar')

        <div class="container mt-5">
            <div class="row">
                <div class="col-12 mb-5">
                    <h2>Projetos</h2>
                    <hr/>
                    <p>
                        Aqui estão listados os projetos disponíveis, filtre e encontre resultados
                        melhores.
                    </p>
                    <div class="card">
                        <div class="card-header" style="cursor: pointer" data-toggle="collapse"
                            data-target="#filtrar" aria-expanded="false" aria-controls="filtrar"
                        >
                            Filtrar projetos
                        </div>
                        <div id="filtrar" class="collapse">
                            <form action="" method="GET">
                                <div class="card-body">
                                    <!-- Categoria -->
                                    <div class="form-group">
                                        <p>Categorias</p>
                                        <div class="btn-group-toggle" data-toggle="buttons">
                                            @foreach($categories as $key => $category)
                                                <label class="btn btn-primary
                                            {!! (isset($filters['category']) && in_array($key, $filters['category'])) ? 'active' : '' !!}"
                                                >
                                                    <input name="category[]" type="checkbox" autocomplete="off"
                                                        {!! (isset($filters['category']) && in_array($key, $filters['category'])) ? 'checked' : '' !!}
                                                        value="{{$key}}">{{ $category }}
                                                </label>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- Quantidaede de quartos -->
                                    <div class="form-group">
                                        <p>Quantidade de quartos</p>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            {{-- 1 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bedrooms']) ? $filters['num_bedrooms'] == 1 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bedrooms" id="1" value="1"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bedrooms']) && $filters['num_bedrooms'] == 1) ? 'checked' : '' !!}
                                                > 1
                                            </label>
                                            {{-- 2 --}}
                                            <label class="btn btn-primary
                                     {!! isset($filters['num_bedrooms']) ? $filters['num_bedrooms'] == 2 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bedrooms" id="2" value="2"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bedrooms']) && $filters['num_bedrooms'] == 2) ? 'checked' : '' !!}
                                                > 2
                                            </label>
                                            {{-- 3 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bedrooms']) ? $filters['num_bedrooms'] == 3 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bedrooms" id="3" value="3"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bedrooms']) && $filters['num_bedrooms'] == 3) ? 'checked' : '' !!}
                                                > 3
                                            </label>
                                            {{-- 4 ou + --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bedrooms']) ? $filters['num_bedrooms'] == 4 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bedrooms" id="+4" value="4"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bedrooms']) && $filters['num_bedrooms'] == 4) ? 'checked' : '' !!}
                                                > +4
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Quantidade de banheiros-->
                                    <div class="form-group">
                                        <p>Quantidade de banheiros</p>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            {{-- 1 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bathrooms']) ? $filters['num_bathrooms'] == 1 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bathrooms" id="1" value="1"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bathrooms']) && $filters['num_bathrooms'] == 1) ? 'checked' : '' !!}
                                                > 1
                                            </label>
                                            {{-- 2 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bathrooms']) ? $filters['num_bathrooms'] == 2 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bathrooms" id="2" value="2"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bathrooms']) && $filters['num_bathrooms'] == 2) ? 'checked' : '' !!}
                                                > 2
                                            </label>
                                            {{-- 3 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bathrooms']) ? $filters['num_bathrooms'] == 3 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bathrooms" id="3" value="3"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bathrooms']) && $filters['num_bathrooms'] == 3) ? 'checked' : '' !!}
                                                > 3
                                            </label>
                                            {{-- 4 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_bathrooms']) ? $filters['num_bathrooms'] == 4 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_bathrooms" id="+4" value="4"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_bathrooms']) && $filters['num_bathrooms'] == 4) ? 'checked' : '' !!}
                                                > +4
                                            </label>
                                        </div>
                                    </div>
                                    <!-- Quantidade de pisos -->
                                    <div class="form-group">
                                        <p>Quantidade de pavimentos</p>

                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            {{-- 1 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_floors']) ? $filters['num_floors'] == 1 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_floors" id="1" value="1"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_floors']) && $filters['num_floors'] == 1) ? 'checked' : '' !!}
                                                > 1
                                            </label>
                                            {{-- 2 --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_floors']) ? $filters['num_floors'] == 2 ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_floors" id="2" value="2"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_floors']) && $filters['num_floors'] == 2) ? 'checked' : '' !!}
                                                > 2
                                            </label>
                                            {{-- 3 ou + --}}
                                            <label class="btn btn-primary
                                        {!! isset($filters['num_floors']) ? $filters['num_floors'] == 3
                                         ? 'active' : '' : '' !!}"
                                            >
                                                <input type="radio" name="num_floors" id="+3" value="3"
                                                    autocomplete="off"
                                                    {!! (isset($filters['num_floors']) && $filters['num_floors'] == 3
                                                    ) ? 'checked' : '' !!}
                                                > +3
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="{{url('/projects')}}" class="btn btn-secondary">Limpar filtros</a>
                                    <button class="btn btn-primary">Filtrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page Features -->
            <hr/>
            <div class="row text-center">
                @foreach($projects as $project)
                    <div class="col-lg-3 col-md-6 mb-4">
                        <div class="card h-100">
                            <img
                                class="card-img-top"
                                src="{{ url('/images') . '/' . $project->cover }}"
                                style="max-height: 500px; max-width: 500px"
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
                                <a href="{{url('project/id', $project->id)}}" class="btn btn-outline-primary btn-block">VER</a>
                            </div>
                        </div>
                    </div>
            @endforeach
            {!! $projects->links() !!}
            <!-- card -->
            </div>
        </div>
    </div>
    @include('footer')

@endsection
