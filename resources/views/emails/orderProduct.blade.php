@component('mail::message')
    @if(!$toAdmin)
# Здравствуйте {{$data['name']}}

<b>Ваша заявка на {{$data['title']}} принята.<br>
Мы свяжемся с Вами в ближайшее время.<br>
    Это письмо отправлено роботом, не отвечайте на него.</b>
    @else
        @include('emails.includes.orderProductToAdmin')
    @endif


Best regards,<br>
{{ config('app.name') }}<br>
https://palwood.ru
@endcomponent
