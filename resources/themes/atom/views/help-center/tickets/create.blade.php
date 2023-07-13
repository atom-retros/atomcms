<x-app-layout>
    @push('title', 'Create a ticket')

    <x-content.content-card icon="chat-icon" classes="border dark:border-gray-900 col-span-12 lg:col-span-8">
        <x-slot:title>
            {{ __('Create a ticket') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('Please describe your request below') }}
        </x-slot:under-title>

        <form action="{{ route('help-center.ticket.store') }}" method="POST">
            @csrf

            <select name="category_id" id="category_id" class="focus:ring-0 border-4 border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 focus:border-[#eeb425] w-full @error('category_id') border-red-600 ring-red-500 @enderror">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name  }}
                    </option>
                @endforeach
            </select>

            <x-form.wysiwyg-editor />

            <x-form.secondary-button type="submit" classes="mt-4">
                {{ __('Submit ticket') }}
            </x-form.secondary-button>
        </form>
    </x-content.content-card>

    <x-content.content-card icon="duo-chat-icon" classes="border dark:border-gray-900 col-span-12 lg:col-span-4">
        <x-slot:title>
            {{ __('Open tickets') }}
        </x-slot:title>

        <x-slot:under-title>
            {{ __('Below you can find your current open tickets') }}
        </x-slot:under-title>


        Some tickets
    </x-content.content-card>
</x-app-layout>
