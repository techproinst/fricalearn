<x-mail::message>
# Email Verification

Thank you for signing up.
Your six-digit code is {{ $pin }}

<x-mail::button :url="route('parent.verify_otp',['parent' => $parent])">
Verify OTP
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
