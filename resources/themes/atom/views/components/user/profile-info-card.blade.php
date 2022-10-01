@props(['colSpan'])

<div class="col-span-2 lg:col-span-{{ $colSpan }}">
    {{ $image }}

    <div class="shadow">
        <div class="flex gap-x-2 border-b p-3 dark:border-gray-700 bg-gray-50 rounded-t dark:bg-gray-900">
            <p class="text-black font-semibold dark:text-white">{{ $title }}</p>
        </div>

        <section class="p-3 bg-white rounded-b dark:bg-gray-800 dark:text-white">
            {{ $slot }}
        </section>
    </div>
</div>
