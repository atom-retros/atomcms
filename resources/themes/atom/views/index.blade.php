<x-app-layout>
    @push('title', __('Welcome to the best hotel on the web!'))

    <!-- Validation Errors -->
    <x-messages.flash-messages />

    <div class="space-y-14 col-span-12">
        <div class="col-span-12">
            <x-content.auth-content-section icon="hotel-icon">
                <x-slot:title>
                    {{ __('Latest news') }}
                </x-slot:title>

                <x-slot:under-title>
                    {{ __('Keep up to date with the latest hotel gossip.') }}
                </x-slot:under-title>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @forelse($articles as $article)
                        <x-article-card :article="$article"/>
                    @empty
                        <h2 class="text-2xl font-semibold">{{ __('There is currently no articles') }}</h2>
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

                <grid class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-2">
                    @foreach($photos as $photo)
                        <a
                                href="{{ $photo->url }}"
                                data-fancybox="gallery"
                                class="cursor-pointer"
                        >
                            <div class="rounded-lg border-2 dark:border-gray-600 w-[300px] h-[300px] relative" style="background: url({{ $photo->url }}) no-repeat;">
                                <div class="absolute bg-white rounded-full dark:bg-gray-800 bottom-3 left-4 pr-3 flex items-center gap-x-3">
                                    <div class="w-10 h-10 bg-gray-100 dark:bg-gray-900 rounded-full flex items-center justify-center overflow-hidden">
                                        <img src="{{ setting('avatar_imager') }}{{ $photo->user->look ?? '' }}&direction=2&headonly=1&head_direction=2&gesture=sml" alt="">
                                    </div>

                                    <p class="dark:text-white">
                                        {{ $photo->user->username ?? 'Unknown' }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </grid>
            </x-content.auth-content-section>
        </div>
    </div>

    @push('javascript')
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    @endpush

    <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css"
    />
</x-app-layout>
