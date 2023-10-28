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

This is to notify you that your investment plan ({{ $demo->receiver_plan }} plan)  has expired and you can withdrawal your capital.
 
More information:

Plan: {{ $demo->receiver_plan }}

Amount: {{ $demo->received_amount }}

Date: {{ $demo->date }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
