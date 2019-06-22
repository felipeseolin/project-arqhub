@component('mail::message')
# Nova mensagem
<br><br>
## Informações
<br><br>
**Nome**
<br>
{{ $data['name'] }}

**E-mail**
<br>
{{ $data['email'] }}

**Assunto**
<br>
{{ $data['subject'] }}

@if(isset($data['phone']) && $data['phone'])
**Telefone**
<br>
{{ $data['phone'] }}
@endif

**Mensagem**
<br>
{{ $data['message'] }}

@endcomponent
