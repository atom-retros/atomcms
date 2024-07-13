<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Atom Installation</title>
    <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/home_icon.gif') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @vite(['resources/css/app.css'], 'build')
    @stack('scripts')
</head>

<body class="flex items-center justify-center min-h-screen site-bg">
    <main class="mx-auto w-full lg:w-[40%] p-4 lg:px-0 lg:py-4">
        {{ $slot }}
    </main>
</body>

</html>
