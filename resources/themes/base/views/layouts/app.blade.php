<!DOCTYPE html>
<html class="w-full min-h-full app {{ $settings->get('cms_color_mode') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $settings->get('hotel_name') }} - @stack('title')</title>

    <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/favicon.gif') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap">

    @vite(['resources/views/' . $settings->get('theme') . '/css/app.css', 'resources/views/' . $settings->get('theme') . '/js/app.js'], 'build')

    @stack('scripts')
</head>

<body class="bg-gray-100 dark:bg-gray-800">
    <main class="flex flex-col max-w-xl gap-6 py-6 mx-auto">
        <x-layout.header />

        <x-layout.container>
            <x-layout.navigation />

            {{ $slot }}
        </x-layout.container>

        <x-layout.footer />
    </main>

    @stack('javascript')
</body>

</html>
