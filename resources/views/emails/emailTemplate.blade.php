@component('mail::message')
# Nova mensagem

Você possui uma nova mensagem:
<br><br>

## Nome
{{ $data['name'] }}

## E-mail
{{ $data['email-from'] }}

## Assunto
{{ $data['subject'] }}

@if(isset($data['phone']) && $data['phone'])
## Telefone
{{ $data['phone'] }}
@endif

## Mensagem
{{ $data['message'] }}

<br><br>
**Não responda essa mensagem**

@endcomponent
