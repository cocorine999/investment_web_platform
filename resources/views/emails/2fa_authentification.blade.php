@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello!
@endif
@endif

Below is your 2FA authentication code.

#{!! $demo->message !!}
 
This mail was sent to authorize a login to your account. 

Thanks,<br>
{{ config('app.name') }}
@endcomponent
