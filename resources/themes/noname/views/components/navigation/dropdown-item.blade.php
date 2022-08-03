@props(['routeName' => ''])

<a href="{{ $routeName }}" class="block py-2 px-4 hover:bg-gray-100 font-bold">
    {{ $slot }}
</a>