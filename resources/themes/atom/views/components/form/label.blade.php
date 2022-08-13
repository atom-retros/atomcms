@props(['for', 'info' => ''])

<div class="mb-2">
    <label class="block font-semibold text-gray-700" for="{{ $for }}">
        {{ $slot }}
    </label>

    <p class="text-gray-500 text-[14px]">
        {{ $info }}
    </p>
</div>