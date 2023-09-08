@props(['route' => '', 'classes' => '', 'turbolink' => true, 'target' => '_self'])

<a @if(!$turbolink) data-turbolinks="false" @endif href="{{ $route }}" target="{{ $target }}" @class(['dropdown-item dark:text-gray-200 dark:hover:bg-gray-700', $classes])>
    {{ $slot }}
</a>