<x-mail::message>
# Hello {{ $admin->name }}

A new payment has been uploaded by a student.

<x-mail::button :url="$url">
View Payment Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
