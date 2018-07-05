@component('mail::message')
# YOUR OTP - {{$user->token_2fa}}

Apply <strong>{{$user->token_2fa}}</strong> as One Time Password (OTP) to log in to your T&P account.This OTP is valid for 15 minutes.

Please do not share this OTP with anyone for security reasons.<br>

Thanks,<br>
{{ config('app.name') }}

<br>


<small>** This is a system generated email, please do not reply to this email. </small>


@endcomponent