@props(['route' => '', 'classes' => '', 'target' => '_self'])

<a href="{{ $route }}" target="{{ $target }}" @class(['
', $classes])>
    {{ $slot }}
</a>
