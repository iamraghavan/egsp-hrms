@component('mail::message')
# Hello ,

You have successfully logged in. Here are the details:

## *Login Timestamp:* {{ $loginTimestamp }}
<br><br>
## *IP Address:* {{ $ipAddress }}
<br><br>
## *Browser:* {{ $browserInfo['browser'] }} (Version: {{ $browserInfo['version'] }})

Thank you for using our application!

@component('mail::button', ['url' => route('pages.dashboard')])
Go to Dashboard
@endcomponent

Thanks,<br>
<a href="https://jsraghavan.me/?skip" style="text-decoration: none"> <b> Raghavan Jeeva </b></a> - Cybersecurity Specialist & FSD <br>
<a href="mailto:raghavan@egspgroup.in?cc=sayhello@jsraghavan.me, raghavanofficials@gmail.com" style="text-decoration: none">raghavan@egspgroup.in</a>  | +91 99425 02245<br>
{{ config('app.footer_text') }}

@endcomponent
