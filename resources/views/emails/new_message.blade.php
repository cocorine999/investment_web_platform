@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello
@endif
@endif

{{$demo->subject}} 

#{{$demo->message}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
