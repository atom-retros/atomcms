<div {{ $attributes->merge(['class' => 'bg-white rounded-lg shadow overflow-hidden dark:text-white dark:bg-gray-900']) }}>
    @isset ($title)
        <div class="flex items-center gap-3 p-3 border-b bg-gray-100 dark:bg-gray-950 dark:border-gray-900 text-sm font-medium">
            {{ $title }}
        </div>
    @endisset

    {{ $slot }}
</div>