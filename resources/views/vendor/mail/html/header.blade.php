@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
  <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="{{ config('app.name') }}">
{{-- @if (trim($slot) === 'Laravel')
<img src="{{  url('assets/images/logo.png') }}" class="logo" alt="{{ config('app.name') }}">
@else
{{ $slot }}
@endif --}}
</a>
</td>
</tr>
