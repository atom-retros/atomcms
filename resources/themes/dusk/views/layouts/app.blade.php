<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/themes/dusk/css/app.scss', 'resources/themes/dusk/js/app.js'], 'build')


        <script src="{{ asset('/assets/js/dusk.js') }}"></script>
    </head>
    <body class="font-sans antialiased">
        <div id="app" class="min-h-screen bg-[#262a35] relative">
            <x-messages.flash-messages />

            {{-- Desktop navigation --}}
            <div class="hidden lg:block">
                <x-navigation.navigation-menu />
            </div>


            {{-- Mobile navigation --}}
            <div class="block lg:hidden">
                <x-navigation.mobile-navigation-menu />
            </div>

            {{-- Sub header --}}
            <div class="sub-header px-5 xl:px-0">
                <div class="max-w-7xl w-full h-[40px] flex items-center justify-between">
                    <div class="flex gap-4 items-center z-20 relative">
                        <div>
                            <x-navigation.language-selector>
                                <img src="/assets/images/icons/flags/{{ session()->has('locale') ? session()->get('locale') : config('habbo.site.default_language') }}.png"
                                     alt="">
                            </x-navigation.language-selector>
                        </div>

                        <a href="{{ setting('discord_invitation_link') }}" target="_blank" class="transition duration-300 ease-in-out hover:text-gray-300">
                            Discord
                        </a>
                    </div>

                    <a href="{{ route('help-center.rules.index') }}" class="transition duration-300 ease-in-out hover:scale-110">
                        <img src="{{ asset('/assets/images/dusk/rules_icon.png') }}" alt="">
                    </a>
                </div>
            </div>

            {{-- Site background --}}
            <div class="site-bg w-full"></div>

            <!-- Page Content -->
            <main class="main-content">
                <div class="max-w-7xl w-full grid grid-cols-12 gap-4 relative py-4 lg:py-[120px] px-4 xl:px-0">
                    {{ $slot }}
                </div>

            </main>
        </div>

        {{-- Footer --}}
        <footer class="w-full h-14 flex items-center justify-center bg-gray-900 text-gray-400 font-bold">
            &copy {{ date('Y') }} Atom CMS
        </footer>

        @stack('javascript')
    </body>
</html>
