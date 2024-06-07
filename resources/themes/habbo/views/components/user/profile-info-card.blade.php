@props(['colSpan'])

<div class="col-span-2 lg:col-span-{{ $colSpan }}">
    {{ $image }}

    <div class="shadow">
        <div class="flex gap-x-2 rounded-t border-b bg-gray-50 p-3 dark:border-gray-700 dark:bg-gray-900">
            <p class="font-semibold text-black dark:text-white">{{ $title }}</p>
        </div>

        <section class="rounded-b bg-white p-3 dark:bg-gray-800 dark:text-white">
            {{ $slot }}
        </section>
    </div>
</div>
