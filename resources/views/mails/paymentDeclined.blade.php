<x-mail::message>
# Hello {{ $parent->name }}

We are sorry to inform you that your payment of {!!$currencySymbol!!}{{number_format($payment->amount) }} for {{ $payment->description }} has been declined.

# Reason 
{{ $data->decline_reason }}



<x-mail::button :url="$url">
View Payment Details
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
