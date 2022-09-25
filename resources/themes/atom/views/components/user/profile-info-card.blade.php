@props(['colSpan'])

<div class="col-span-2 lg:col-span-{{ $colSpan }}">
    {{ $image }}

    <div class="shadow">
        <div class="flex gap-x-2 border-b p-3 bg-gray-50 rounded-t">
            <p class="text-black font-semibold">{{ $title }}</p>
        </div>

        <section class="p-3 bg-white rounded-b">
            {{ $slot }}
        </section>
    </div>
</div>
