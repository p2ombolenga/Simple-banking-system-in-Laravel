@component('mail::message')
# Welcome {{$newUser->username}} .

your account has been set up, you are now able to explore 
more than 120 competent universities all in one place.

Proffessional consultance with be provided to you through the process.

@component('mail::button', ['url' => 'http:127.0.0.1:8000/'])
Visit Site
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
