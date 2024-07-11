<x-app-layout>
    @push('title', __('title.rules'))

    <x-card class="p-3 !bg-red-600 !text-white text-xs">
        {{ __('rules.message', ['name' => $settings->get('name')]) }}
    </x-card>

    <x-rules.list :categories="$categories" />
</x-app-layout>
