@extends('master')

@section('content')
    @include('navbar')

    <section id="info" class="container">
        <h1>{{ $user->name ?? 'Usuario' }}</h1>
        <p>
            Muitas informacoes
        </p>

        <h2>Fale comigo</h2>
        @if(isset($response))
        <div class="alert {{$response ? 'alert-success' : 'alert-error'}}">
            {{ $msg }}
        </div>
        @endif
        <form id="form" action="" method="POST">
            {!! csrf_field() !!}

            <div class="form-group">
                <label for="name">Nome *</label>
                <input id="name" name="name" class="form-control" type="text" maxlength="150" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input id="email" name="email" class="form-control" type="email" maxlength="150" required>
            </div>

            <div class="form-group">
                <label for="subject">Assunto *</label>
                <input id="subject" name="subject" class="form-control" type="text" maxlength="150" required>
            </div>

            <div class="form-group">
                <label for="phone">Telefone para contato</label>
                <input id="phone" name="phone" class="form-control" type="number" maxlength="10">
            </div>

            <div class="form-group">
                <label for="message">Mensagem *</label>
                <textarea name="message" id="message"  class="form-control" rows="10" required></textarea>
            </div>

            <button id="btn" class="btn btn-success" type="submit">Enviar</button>


        </form>



    </section>
@endsection