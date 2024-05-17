@component('mail::layout')
{{-- Header --}}
@slot('header')
@component('mail::header', ['url' => config('app.url')])
{{-- {{ config('app.name') }} --}}
@php
     $logoUrl = trim(str_replace('"', '', DB::table('settings')
                    ->where('group', 'general')
                    ->where('name', 'logo')
                    ->value('payload')));
@endphp
<a href="{{ route('spc.index') }}">
    @if (!empty($logoUrl))
       <img src="{{ asset('public/assets/images/logo/' . $logoUrl) }}"
    class="img-fluid" alt="" style="top: 0px; height: 52px;">
    @else
        {{ config('app.name') }}
    @endif
</a>
@endcomponent
@endslot

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
@slot('subcopy')
@component('mail::subcopy')
{{ $subcopy }}
@endcomponent
@endslot
@endisset

{{-- Footer --}}
@slot('footer')
@component('mail::footer')
© {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
@endcomponent
@endslot
@endcomponent
