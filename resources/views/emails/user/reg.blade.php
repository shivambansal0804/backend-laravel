@component('mail::message')

@component('mail::panel')

Hi {{ $user->name }},

We Welcome you to DTUtimes 
<br>
Happy to have you on board.
<br><br>

you can login with {{$password}} as your password


@component('mail::button', ['url' => 'http://dtutimes.dtu.ac.in/login'])
Login to Dashboard
@endcomponent


Thanks,<br>
DTUtimes
@endcomponent

@endcomponent

