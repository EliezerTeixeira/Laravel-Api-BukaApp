@component('mail::message')
# Introduction

Olá **{{ $teacherName }}** seja bem vido ao buka app

O seu cadastro foi feito com sucesso com o email **{{ $teacherEmail }}

@component('mail::button', ['url' => $url])
Entrar no App
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
