@component('mail::message')
# Verify your account and complete the registeration process.
<br>
Dear Student,
<br>
<br>
&nbsp;&nbsp; Your account has been created in Training and Placement Cell, GNDEC, Ldh portal.The following are the details regarding your portal. 
<br>
@component('mail::table')
| Details           | Values            |
| :---------------: |:-----------------:|
|Univ. Roll No      |{{$username}}      |
|Phone Number       |{{$phone_number}}  |
|Email              |{{$email}}         |
@endcomponent

<b>Note : To access your placement portal complete the registeration by clicking on the following button.</b>

@component('mail::button', ['url' => 'https://www.tnpgndec.com/register/student'])
Register
@endcomponent

<br>
<br>

@component('mail::panel')
<b>Why do you need to verify? </b>
<br>
&nbsp;&nbsp;On verifying - 
<ol> 
    <li>We will activate your T&P Cell account through which you will get access to different companies who hire as interns, employees throughout the year.</li>
    <li>You will fill your data and check database for any changes.</li>
    <li>You will be informed throughout the year regarding different activites at T&P Cell, GNDEC.</li>
</ol>
@endcomponent

<br>
<br>

All the best! <br>
Thanks,<br>
{{ config('app.name') }}

<br>
<small>** This is a system generated email, please do not reply to this email. </small>

@endcomponent