@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => "Mail"])
Button Text
@endcomponent

Thanks,
{{ config('app.name') }}
@endcomponent
