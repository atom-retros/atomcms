<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/themes/noname/css/app.css', 'resources/themes/noname/js/app.js'])
    </head>
    <body>
        <div id="app" class="bg-gray-100">
            {{-- Header --}}
            <div class="w-full h-52 bg-blue-400 relative flex items-center justify-center header-bg">
                <div class="w-full h-full bg-black absolute bg-opacity-50"></div>

                @guest
                    <div class="text-white relative font-bold flex-col w-[600px]">
                        <p class="text-center text-xl">
                            Online virtual community where you can create your own avatar, make friends, chat, create rooms and much more!
                        </p>

                        {{-- TODO: Figure something out in regards to login & reg --}}
                        <div class="uppercase flex justify-center items-center gap-x-6 mt-6">
                            <a href="{{ route('login') }}">
                                <button class="uppercase border-2 border-white px-8 py-2 rounded-full transition ease-in-out duration-200 hover:bg-white hover:text-black">Login</button>
                            </a>
                            <p class="text-opacity-80 text-sm uppercase">Or</p>
                            <a href="{{ route('register') }}">
                                <button class="uppercase bg-green-600 bg-opacity-80 px-8 py-2.5 rounded-full transition ease-in-out duration-200 hover:bg-opacity-100">Create account</button>
                            </a>
                        </div>
                    </div>
                @endguest
            </div>

            {{-- Navigation --}}
            @include('layouts.navigation')

            {{-- Content --}}
            <main class="mt-12 overflow-hidden bg-white">
                <div class="max-w-7xl mx-auto p-6 grid grid grid-cols-12 gap-3">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
