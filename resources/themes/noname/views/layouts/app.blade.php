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
            @auth
                <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 items-center flex justify-between py-2">
                    <div class="flex gap-x-6">
                        <x-navigator-currency icon="nav-credit-icon">
                            <x-slot:currency>
                                {{ auth()->user()->credits }}
                            </x-slot:currency>

                            {{ __('Credits') }}
                        </x-navigator-currency>

                        <x-navigator-currency icon="nav-ducket-icon">
                            <x-slot:currency>
                                {{ auth()->user()->currency('duckets') }}
                            </x-slot:currency>

                            {{ __('Duckets') }}
                        </x-navigator-currency>

                        <x-navigator-currency icon="nav-diamond-icon">
                            <x-slot:currency>
                                {{ auth()->user()->currency('diamonds') }}
                            </x-slot:currency>

                            {{ __('Diamonds') }}
                        </x-navigator-currency>
                    </div>

                    <div>
                        <button class="rounded-md bg-gray-200 py-1 px-4 flex gap-x-2 items-center">
                            <span>
                                <img class="w-8 h-9" src="https://www.habbo.com/habbo-imaging/avatarimage?figure=hr-100-39.hd-195-1.ch-210-66.lg-270-1338.sh-290-1408&direction=2&headonly=true&head_direction=2&gesture=sml" alt="">
                            </span>

                            <span>{{ auth()->user()->username }}</span>

                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </div>
                </div>

            @endauth
            {{-- Header --}}
            <div class="w-full h-52 bg-blue-400 relative flex items-center justify-center header-bg">
                <div class="w-full h-full bg-black absolute bg-opacity-50"></div>

                @auth
                   <div class="max-w-7xl relative h-full w-full flex items-center justify-between pr-10">
                       <a href="#">
                           <img style="image-rendering: pixelated;" class="absolute -bottom-10 left-4 drop-shadow transition ease-in-out duration-300 hover:scale-105" src="https://www.habbo.com/habbo-imaging/avatarimage?figure=hr-100-39.hd-195-1.ch-210-66.lg-270-1338.sh-290-1408&direction=2&head_direction=3&gesture=sml&action=wav&size=l" alt="">
                       </a>

                       <button class="relative rounded-full py-2 px-6 bg-white bg-opacity-90 transition duration-300 ease-in-out hover:bg-opacity-100 text-black font-bold">
                           Go to Hotel
                       </button>
                   </div>
                @endauth

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
