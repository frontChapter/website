@component('mail::message')
# {{ __('Hello!') }}

{{ __('Deer :name,', ['name' => $ticket->data->data->first_name . ' ' . $ticket->data->data->last_name]) }}

{{ __('We are very happy that you have joined the participants of the biggest front-end conference in Iran.') }}

{{ __('We are impatiently waiting for your warm presence on the 29th day of February in the beautiful city of Fereydunkenar.') }}

{{ __('We will display your name and Gravatar image on the conference page as a participant.') }}

{{ __('If you want the other participants to have more information about you,') }}
{{ __('you can register on the Front Chapter site from the link below and complete your profile.') }}

@component('mail::button', ['url' => route('register'), 'color' => 'green'])
{{ __('Register') }}
@endcomponent

{{ __('After Registeration, You can follow the complete ticket information through the link below :)') }}

@component('mail::button', ['url' => route('ticket')])
{{ __('My tickets') }}
@endcomponent

@endcomponent
