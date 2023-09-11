@props(['icon' => '', 'classes' => ''])

<div class="w-full bg-[#21242e] py-3 px-6 rounded-lg text-3xl font-bold text-gray-100 flex items-center gap-3 mb-6 {{ $classes }}">
    @if (!empty($icon))
        {{ $icon }}
    @endif

    {{ $slot }}
</div>
