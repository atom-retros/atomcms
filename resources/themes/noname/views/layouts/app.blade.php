<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>

        @vite(['resources/themes/noname/css/app.css', 'resources/themes/noname/js/app.js'])
    </head>

    <body>
        <div id="app" class="bg-gray-100">
            {{-- Top header --}}
            @auth
                <x-top-header />
            @endauth

            {{-- Site Header --}}
            <x-site-header />

            {{-- Navigation --}}
            <div class="bg-white border-b border-gray-100 relative">
                <nav class="px-4 mx-auto max-w-7xl flex justify-between min-h-[60px]">
                    <div class="container flex flex-wrap  justify-end md:justify-start">
                        <x-navigation.mobile-menu />

                        <x-navigation.navigation-menu />
                    </div>
                </nav>
            </div>

            {{-- Content --}}
            <main class="mt-12 overflow-hidden bg-white">
                <div class="max-w-7xl mx-auto p-6 grid grid grid-cols-12 gap-x-3 gap-y-8">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
