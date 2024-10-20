@component('mail::message')
# Welcome, {{ $user->name }}!

Thank you for registering with us. We're excited to have you on board!


Thanks,<br>
{{ config('app.name') }}
@endcomponent
