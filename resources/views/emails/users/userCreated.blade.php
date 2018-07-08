@component('mail::message')
# Introduction

The body of your message.

{{$username}}<br>
{{$email}}<br>
{{$phone_number}}<br>

@component('mail::button', ['url' => '/register'])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
