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
                    <a class="btn btn-secondary btn-lg" href="#">Categoria 1</a>
                    <a class="btn btn-secondary btn-lg" href="#">Categoria 2</a>
                    <a class="btn btn-secondary btn-lg" href="#">Categoria 3</a>
                    <a class="btn btn-secondary btn-lg" href="#">Categoria 4</a>
                </div>
                <div class="col-md-4 mb-5">
                    <h2>Filtrar</h2>
                    <hr />
                    <label for="pavimentos">Pavimentos</label>
                    <select class="form-control" id="pavimentos">
                        <option>-</option>
                        <option>1</option>
                        <option>2</option>
                    </select>
                    <label for="quartos">Quartos</label>
                    <select class="form-control" id="quartos">
                        <option>-</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4 ou +</option>
                    </select>
                    <label for="banheiros">Banheiros</label>
                    <select class="form-control" id="banheiros">
                        <option>-</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4 ou +</option>
                    </select>
                </div>
            </div>
        <!-- Page Features -->
            <hr />
            <div class="row text-center">
                <!-- card -->
                <div class="col-lg-3 col-md-6 mb-4">
                    <div class="card h-100">
                        <img
                        class="card-img-top"
                        src="http://placehold.it/500x325"
                        alt=""
                        />
                        <div class="card-body">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Explicabo magni sapiente, tempore debitis beatae culpa natus
                                architecto.
                            </p>
                        </div>
                        <div class="card-footer">
                            <a href="#" class="btn btn-primary">Find Out More!</a>
                        </div>
                    </div>
                </div>
                <!-- card -->
            </div>
        </div>
    </div>
    @include('footer')
    
@endsection