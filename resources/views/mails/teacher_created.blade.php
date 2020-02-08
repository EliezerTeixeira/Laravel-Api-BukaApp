@component('mail::message')
# Introduction

Seja bem vindo **{{ $teacherName }}** ao buka app

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
