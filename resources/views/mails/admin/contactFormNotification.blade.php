<x-mail::message>
# Hello {{ $admin->name }}

A user has submitted a contact form with the following details:

# Fullname: {{ Str::title($contact->firstname) }} {{ Str::title($contact->lastname) }}
# Contact: {{ $contact->phone }}
# Subject: {{ $contact->subject }}
# Message: {{ $contact->message }}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
