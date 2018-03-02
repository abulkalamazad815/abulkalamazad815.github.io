@component('mail::message')
# Welcome To E-medicine Shop

Press The Button Below For **Active Your Account** 

@component('mail::button', ['url' => 'http://localhost/E_medicine_shop/'])
Active Your Account
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
