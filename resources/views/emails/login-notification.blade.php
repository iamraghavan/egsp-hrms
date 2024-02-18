@component('mail::message')
# Hello {{ $userName }},

You have successfully logged in. Here are the details:

- **Login Timestamp:** {{ $loginTimestamp }}
- **IP Address:** {{ $ipAddress }}
- **Browser:** {{ $browserInfo['browser'] }} (Version: {{ $browserInfo['version'] }})

Thank you for using our application!

@component('mail::button', ['url' => route('pages.dashboard')])
Go to Dashboard
@endcomponent

Thanks,<br>
Raghavan Jeeva - Developer<br>
{{ config('app.name') }}

@endcomponent
