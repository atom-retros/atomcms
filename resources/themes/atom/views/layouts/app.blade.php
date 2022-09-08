<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ setting('hotel_name') }} - @stack('title')</title>

        <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/home_icon.gif') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        <script src="https://unpkg.com/@popperjs/core@2"></script>
        <script src="https://unpkg.com/tippy.js@6"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link
                rel="stylesheet"
                href="https://unpkg.com/tippy.js@6/animations/scale.css"
        />

        @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
    </head>

    <body class="flex flex-col min-h-screen">
        <x-messages.flash-messages />

        <div id="app" class="bg-gray-100">
            {{-- Top header --}}
            @auth
                <x-top-header />
            @endauth

            {{-- Site Header --}}
            <x-site-header />

            {{-- Navigation --}}
            <nav class="relative bg-white shadow">
                {{-- relative w-full flex flex-col items-center md:flex-row md:items- md:justify-between gap-x-8 uppercase font-semibold text-[14px] mt-5 --}}
                <div class="px-4 mx-auto max-w-7xl h-auto md:h-[60px] flex md:items-center md:justify-between">
                    <div class="h-full w-full">
                        <x-navigation.mobile-menu />

                        <x-navigation.navigation-menu />
                    </div>

                    <x-navigation.language-selector>
                        <img src="/assets/images/icons/flags/{{ session()->has('locale') ? session()->get('locale') : 'en' }}.png" alt="">
                    </x-navigation.language-selector>
                </div>
            </nav>

            {{-- Content --}}
            <main class="overflow-hidden bg-white">
                <div class="max-w-7xl mx-auto p-6 grid grid grid-cols-12 gap-x-3 gap-y-8 mt-10 md:mt-0">
                    {{ $slot }}
                </div>
            </main>
        </div>

        <footer class="w-full h-14 bg-gray-100 mt-auto flex flex-col justify-center md:flex-row md:justify-between text-gray-400 items-center md:px-8 text-sm">
            <div class="md:font-semibold text-[12px] md:text-[14px]">&copy {{ date('Y') }} - {{ __(':hotel is a not for profit educational project', ['hotel' => setting('hotel_name')]) }}</div>
            <div class="flex gap-x-1">
                {{ __('Made with') }}

                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-700 animate-pulse" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>

                {{ __('By') }} <a href="https://devbest.com/members/object.78351/" target="_blank" class="font-semibold underline transition ease-in-out duration-150 hover:scale-105">Object</a></div>
        </footer>

        @stack('javascript')
    </body>
</html>
