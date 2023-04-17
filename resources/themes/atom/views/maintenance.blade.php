<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ setting('hotel_name') }} - {{ __('Maintenance') }}</title>

    <link rel="stylesheet" href="/assets/css/flowbite.min.css" />
    <script src="/assets/js/flowbite.js"></script>

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
</head>
<body class="h-screen overflow-hidden" style="background: url({{ asset('assets/images/maintenance/background.png') }})">
    <x-messages.flash-messages />

    <x-modals.modal-wrapper classes="flex flex-col justify-center items-center h-full relative">
        @guest
        <div class="absolute top-6 right-6">
            <button @click="open = !open" class="text-black bg-white bg-opacity-70 transition ease-in-out duration-200 hover:bg-opacity-100 py-2 px-4 rounded-full font-semibold">
                {{ __('Staff login') }}
            </button>
        </div>
        @endguest

        <img src="{{ asset('assets/images/maintenance/pictures.png') }}" alt="{{ setting('hotel_name') }}">

        <div class="text-white">
            <h1 class="text-3xl font-semibold text-center">{{ __('Maintenance') }}</h1>
            <p class="text-center">{{ setting('maintenance_message') }}</p>
        </div>

        <x-modals.regular-modal x-model="show {{ session()->get('wrong-auth') }}">
            <x-auth.login-form />
        </x-modals.regular-modal>
    </x-modals.modal-wrapper>
</body>
</html>