@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello {{ $demo->receiver }} !
@endif
@endif
This is to inform you that your deposit of $$deposit->amount has been received and confirmed.


\n Click on this link You can now purchase to a new invest plan, click on this link";

{{ config('app.url').'/plans' }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
