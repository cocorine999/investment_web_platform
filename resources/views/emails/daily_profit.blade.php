@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# Whoops!
@else
# Hello {{ $demo->receiver_name }} !
@endif
@endif

This is a notification of a new return on investment (ROI) on your investment account.
 
#ROI information:

#Plan: {{ $demo->receiver_plan }}

#Amount: {{ $demo->received_amount }}

#Date: {{ $demo->date }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
