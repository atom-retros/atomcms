@props(['colSpan'])

<div class="col-span-2 lg:col-span-{{ $colSpan }}">
    {{ $image }}

    <div class="shadow py-2 px-4 rounded-md flex flex-col gap-y-4">
        <h2 class="font-semibold text-xl">{{ $title }}</h2>

        {{ $slot }}
    </div>
</div>