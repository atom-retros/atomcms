<x-app-layout>
    @push('title', __('Rules'))

    <div class="col-span-12 flex flex-col gap-y-3">
        <div class="mb-4 w-full rounded bg-red-600 p-4 text-white">
            {{ __('Rules and regulations are subject to change without notice. As a member of the :hotel community, you hereby agree to and understand the following terms and conditions above. Failure to comply with these rules and regulations will result in the necessary sanctions implemented upon your account. If you have any questions or concerns in regards to The :hotel Way, please do not hesitate to ask a member of the Hotel Staff.', ['hotel' => setting('hotel_name')]) }}
        </div>

        <div class="flex flex-col gap-y-6">
            @foreach ($categories as $category)
                <x-content.content-section icon="{{ $category->badge }}" classes="border dark:border-gray-900">
                    <x-slot:title>
                        {{ $category->name }}
                    </x-slot:title>

                    <x-slot:under-title>
                        {{ $category->description }}
                    </x-slot:under-title>

                    <ul class="rounded bg-gray-100 p-2 dark:bg-gray-700 dark:text-gray-300">
                        @foreach ($category->rules as $rule)
                            <li><strong>{{ $rule->paragraph }}.</strong> {{ $rule->rule }}</li>
                        @endforeach
                    </ul>
                </x-content.content-section>
            @endforeach
        </div>
    </div>
</x-app-layout>
