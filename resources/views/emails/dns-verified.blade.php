@component('mail::message')
# Your short domain has been verified

Woohoo! Your short domain *{{ $shortdomain }}* has been successfully verified and is now active!

@component('mail::button', ['url' => route('dashboard')])
Your Dashboard
@endcomponent

@endcomponent