<x-mail::message>
# Hello {{ $parent->name }}

Congratulations🚀, your payment of {!!$currencySymbol!!}{{number_format($payment->amount) }} for {{ $payment->description }} has been approved successfully.

<x-mail::button :url="$url">
View Payment Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
