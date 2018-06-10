@component('mail::message')
# Introduction

Your OTP is {{$user->token_2fa}}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
