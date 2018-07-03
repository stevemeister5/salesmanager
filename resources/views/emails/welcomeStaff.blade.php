@component('mail::message')
# Welcome Onboard!

Hi {{$first_name}},<br/>
Your City Cyber Gaming Solutions Management Portal Account has been successfully created!

@component('mail::panel')
Your username is {{$username}} and your default password is password. 
You will be required to change your password immediately you login into your account.
Remember to always keep your password safe and use the portal for only company related activities.
You can use the link below to access the portal.
@endcomponent

@component('mail::button', ['url' => 'www.citybetsolutions.com'])
Vist Portal
@endcomponent

Regards,<br>
City Cyber Solutions
@endcomponent
