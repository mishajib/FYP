@component('mail::message')
    # Received Mail from Specon

    {{ $message }}

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
