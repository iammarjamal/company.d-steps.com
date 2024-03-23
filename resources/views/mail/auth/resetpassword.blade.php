@component('mail::message')

# {{ trans('mail.Reset_Password_body') }}

@component('mail::button', ['url' => route('auth.reset-password', ['token' => $token, 'email' => $email])])
    {{ trans('mail.Reset_Password_btn') }}
@endcomponent

{{ trans('mail.Reset_Password_note_1') }}

{{ trans('mail.Reset_Password_note_2') }}

{{ trans('mail.Regards') }},<br>
{{ trans('app.name') }}

@endcomponent