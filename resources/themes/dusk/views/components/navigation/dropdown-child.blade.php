@props(['route' => '', 'classes' => '', 'target' => '_self'])

<a href="{{ $route }}" target="{{ $target }}" @class(['dropdown-item
', $classes])>
    {{ $slot }}
</a>
