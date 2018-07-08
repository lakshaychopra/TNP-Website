@component('mail::message')
# Verify account and complete registeration.
<br>
Dear Student,

@component('mail::table')
| Details           | Values            |
| :---------------: |:-----------------:|
|University Roll No.|{{$username}}      |
|Email              |{{$email}}         |
|Phone Number       |{{$phone_number}}  |
@endcomponent


<br>
<br>

@component('mail::button', ['url' => '/register'])
Button Text

Thanks,<br>
{{ config('app.name') }}

<br>


<small>** This is a system generated email, please do not reply to this email. </small>


@endcomponent