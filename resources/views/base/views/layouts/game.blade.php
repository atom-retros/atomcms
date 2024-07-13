<!DOCTYPE html>
<html class="w-full h-full overflow-hidden {{ $settings->get('cms_color_mode') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="turbolinks-cache-control" content="no-cache">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings->get('hotel_name') }} - @stack('title')</title>
    <link rel="icon" type="image/gif" sizes="18x17" href="{{ asset('assets/images/favicon.gif') }}">
    @vite(['resources/views/' . $settings->get('theme') . '/css/app.css'], 'build')
</head>

<body class="w-full h-full">
    {{ $slot }}
</body>

</html>
