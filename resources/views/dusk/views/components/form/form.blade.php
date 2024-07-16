@props(['route' => '', 'method' => 'POST'])

<form {{ $attributes->merge(['class' => '']) }} action="{{ $route }}" method="{{ $method }}">
    @csrf

    {{ $slot }}
</form>