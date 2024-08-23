<!DOCTYPE html>
<html class="w-full min-h-full app {{ $settings->get('cms_color_mode') }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('meta.description', ['name' => $settings->get('hotel_name')]) }}" />
    <meta name="keywords" content="{{ __('meta.keywords', ['name' => $settings->get('hotel_name'), 'url' => config('app.url')]) }}" />
    <meta name="robots" content="index, follow">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="x-dns-prefetch-control" content="on">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta itemprop="name" content="{{ $settings->get('hotel_name') }}">
    <meta itemprop="description" content="{{ __('meta.description', ['name' => $settings->get('hotel_name')]) }}">
    <meta itemprop="image" content="{{ asset('images/app_summary_image.png') }}">

    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $settings->get('hotel_name') }}">
    <meta property="og:title" content="{{ $settings->get('hotel_name') }}">
    <meta property="og:description" content="{{ __('meta.description', ['name' => $settings->get('hotel_name')]) }}">
    <meta property="og:image" content="{{ asset('images/app_summary_image.png') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ url()->current() }}">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta name="twitter:title" content="{{ $settings->get('hotel_name') }}">
    <meta name="twitter:description" content="{{ __('meta.description', ['name' => $settings->get('hotel_name')]) }}">
    <meta name="twitter:image" content="{{ asset('images/app_summary_image.png') }}">
    <meta name="twitter:site" content="{{ __('meta.twitter') }}">

    <title>{{ $settings->get('hotel_name') }} - @stack('title')</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    
    <link rel="icon" type="image/png" sizes="18x17" href="{{ asset('images/favicon.png') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap">
    
    @if (config('services.turnstile.enabled'))@turnstileScripts()@endif

    @if (config('sentry.dsn'))<script src="https://js.sentry-cdn.com/06998e4b6cace292c6d5ac3fb05698e7.min.js" crossorigin="anonymous"></script>@endif

    @stack('scripts')

    @vite(sprintf('resources/themes/%s/css/app.css', $settings->get('theme')))
    @vite(sprintf('resources/themes/%s/js/app.js', $settings->get('theme')))
</head>

<body class="w-screen min-h-screen overflow-x-hidden overflow-y-auto" style="background-image: url('{{ asset('images/bg.png') }}')">
    <main class="w-screen h-screen">
        @yield('content')
    </main>
</body>
</html>