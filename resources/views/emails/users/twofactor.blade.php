@component('mail::message')
# Introduction

The OTP is {{token_2fa}}.

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
