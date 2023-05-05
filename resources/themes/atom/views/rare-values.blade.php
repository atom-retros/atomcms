<x-app-layout>
    @push('title', __('Rare values'))

    <div class="col-span-12 lg:col-span-9 lg:w-[96%]">
        <div class="flex flex-col gap-y-4">
            @foreach($categories as $category)
                <x-content.content-section :icon="$category->badge">
                    <x-slot:title>
                        {{ $category->name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        All the {{ $category->name }} rares
                    </x-slot:under-title>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($category->furniture as $rare)
                            <x-rares.rare-card :rare="$rare" />
                        @endforeach
                    </div>
                </x-content.content-section>
            @endforeach
        </div>
    </div>

    <div class="col-span-12 lg:col-span-3 lg:w-[110%] space-y-4 lg:-ml-[32px]">
        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Search') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Search for rares') }}
            </x-slot:under-title>

            <form action="{{ route('values.search') }}" method="POST" class="space-y-3">
                @csrf

                <x-form.input name="search" placeholder="Search for a rare"/>

                <x-form.secondary-button>
                    {{ __('Search') }}
                </x-form.secondary-button>
            </form>
        </x-content.content-section>

        <x-content.content-section icon="hotel-icon" classes="border dark:border-gray-900">
            <x-slot:title>
                {{ __('Rare categories') }}
            </x-slot:title>

            <x-slot:under-title>
                {{ __('Select a category below') }}
            </x-slot:under-title>

            <div class="px-2 text-sm dark:text-gray-200 space-y-2">
                <div class="rounded bg-gray-200 dark:bg-gray-700 py-2 px-4 transition duration-200 ease-in-out hover:scale-[102%]">
                    <a href="{{ route('values.index') }}" class="block text">
                        All values
                    </a>
                </div>

                @foreach($categoriesNav as $category)
                    <div class="rounded bg-gray-200 dark:bg-gray-700 py-2 px-4 transition duration-200 ease-in-out hover:scale-[102%]">
                        <a href="{{ route('values.category', $category->id) }}" class="block text">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </x-content.content-section>
    </div>
</x-app-layout>
