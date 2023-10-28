Hello {{ $demo->receiver_name }},
Your registeration was successful! Below are your login credentials. Please keep safe.
 
Login details:
 
Email: {{ $demo->receiver_email }}

Password: {{ $demo->receiver_password }}

Click the link below to activate your account

{{ $demo->acct_activate_link }}
 
Kind regards,

{{ $demo->sender }}.