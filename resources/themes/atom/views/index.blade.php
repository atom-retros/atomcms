<x-app-layout>
    @push('title', __('Welcome to the best hotel on the web!'))

    <!-- Validation Errors -->
    <x-messages.flash-messages />

    <div class="col-span-12 space-y-14">
        <div class="col-span-12">
            <x-content.auth-content-section icon="hotel-icon">
                <x-slot:title>
                    {{ __('Latest news') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Keep up to date with the latest hotel gossip.') }}
                </x-slot:under-title>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                    @forelse($articles as $article)
                        <x-article-card :article="$article" />
                    @empty
                        <div class="h-[210px] dark:bg-gray-900 rounded w-full bg-white shadow relative overflow-hidden transition ease-in-out duration-200">
                            <div style="background: url('https://i.imgur.com/uGLDOUu.png');" class="article-image">
                            </div>

                            <div class="mt-4 px-4">
                                <p class="font-semibold text-lg truncate dark:text-gray-200">
                                    No published articles
                                </p>

                                <div class="flex items-center gap-x-2">
                                    <div
                                        class="mt-3 flex h-10 w-10 items-center justify-center overflow-hidden rounded-full bg-gray-100 dark:bg-gray-800">
                                        <img src="{{ setting('avatar_imager') }}&headonly=1" alt="{{ setting('hotel_name') }}">
                                    </div>

                                    <p class="mt-4 font-semibold dark:text-gray-400">
                                        {{ setting('hotel_name') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>
            </x-content.auth-content-section>
        </div>

        <div class="col-span-12">
            <x-content.auth-content-section icon="camera-icon">
                <x-slot:title>
                    {{ __('Latest Photos') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Have a look at some of the great moments captured by users around the hotel.') }}
                </x-slot:under-title>

                <x-photos :photos="$photos" />
            </x-content.auth-content-section>
        </div>
    </div>

    @push('javascript')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    @endpush

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
</x-app-layout>
