@props(['route' => '', 'method' => 'POST'])

<form {{ $attributes->merge(['class' => '']) }} action="{{ $route }}" method="{{ $method }}">
    @if ($method !== 'GET') @csrf @endif

    {{ $slot }}
</form>