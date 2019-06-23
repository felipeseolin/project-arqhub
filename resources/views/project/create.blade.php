@extends('master')

@section('content')
    @include('navbar')

    <section id="create-project" class="container border">
        <div class="border">
        <h1 class="text-center font-weight-bold">Novo Projeto</h1>
        <p class="text-center font-italic">Aqui você irá colocar as especificações do seu projeto, confira tudo antes de salvar...</p>
        </div>
        
        <form action="{{route('project.store')}}" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label class="font-weight-bold" for="name">Nome</label>
                <input placeholder="Insira o nome do projeto..."id="name" name="name" class="form-control" type="text" minlength="5" maxlength="250"
                       required>
            </div >

            <div class="form-group">
                <label class="font-weight-bold" for="description">Descrição</label>
                <textarea placeholder="Descreva sobre o projeto..."id="description" name="description" class="form-control" rows="5"></textarea>
            </div>

           

            <div class="form-row">

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="area">Área</label>
                <div class="col-sm-7">
                <input placeholder="Em M²..." id="area" name="area" class="form-control" type="number" min="10" required>
                </div>
            </div>

             
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_bedrooms"> Quartos</label>
                <div class="col-sm-7">
                <input placeholder="Quantidade..." id="num_bedrooms" name="num_bedrooms" class="form-control" type="number" min="0" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_bathrooms">Banheiros</label>
                <div class="col-sm-9">
                <input placeholder="Quantidade..." id="num_bathrooms" name="num_bathrooms" class="form-control" type="number" min="0" required>
                </div>
            </div>

           
            </div>

            <div class="form-row">
           
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_suites">Suítes</label>
                <div class="col-sm-7">
                <input placeholder="Quantidade..." id="num_suites" name="num_suites" class="form-control" type="number" min="0" required>
                </div>
            </div>
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_floors">Andares</label>
                <div class="col-sm-7">
                <input placeholder="Quantidade..." id="num_floors" name="num_floors" class="form-control" type="number" min="0" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="num_parking">Vagas de Estacionamento</label>
                <div class="col-sm-6">
                <input placeholder="Quantidade..." id="num_parking" name="num_parking" class="form-control" type="number" min="0" required>
                </div>
            </div>

           
            </div>
            <div class="form-row">
            <div class="form-group row">
                <label class="font-weight-bold col-sm-3 col-form-label" for="width">Largura</label>
                <div class="col-sm-7">
                <input placeholder="Em Metros..." id="width" name="width" class="form-control" type="number" min="0" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-3.5 col-form-label" for="length">Comprimento</label>
                <div class="col-sm-6">
                <input placeholder="Em Metros..." id="length" name="length" class="form-control" type="number" min="0" required>
                </div>
            </div>

            <div class="form-group row">
                <label class="font-weight-bold col-sm-4 col-form-label" for="category">Categoria</label>
                <div class="col-sm-8">
                <select id="category" name="category" class="form-control" required>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
                </div>

            </div>
            </div>

            <button id="submit" class="btn btn-success btn-lg" type="submit">Salvar</button>
            
        </form>
    </section>
    
       
    
    
    
@endsection