Hello {{ $demo->receiver_name }},
This is to notify you that your investment plan ({{ $demo->receiver_plan }} plan)  has expired and you can withdrawal your capital.
 
More information:
 
Plan: {{ $demo->receiver_plan }}

Amount: {{ $demo->received_amount }}

Date: {{ $demo->date }}
 
 
Kind regards,

{{ $demo->sender }}.