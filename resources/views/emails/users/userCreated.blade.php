@component('mail::message')
# Introduction

The body of your message.

{{$user->username}}<br>
{{$user->email}}<br>
{{$user->phone_number}}<br>

@component('mail::button', ['url' => '/register'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
