<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ setting('hotel_name') }} - Nitro</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" crossorigin="use-credentials" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#000000">
    <meta name="apple-mobile-web-app-title" content="Nitro">
    <meta name="application-name" content="Nitro">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <base href="./">
    <script type="module" crossorigin src="/nitro/assets/index-4ae5ef8b.js"></script>
    <link rel="modulepreload" crossorigin href="/nitro/assets/vendor-56d266b8.js">
    <link rel="modulepreload" crossorigin href="/nitro/assets/nitro-renderer-0af3579c.js">
    <link rel="stylesheet" href="/nitro/src/assets/index.css">
    <link href="/assets/css/app.965b18bc.css" rel="preload" as="style">
    <link href="/assets/js/app.a6750032.js" rel="preload" as="script">
    <link href="/assets/js/chunk-vendors.836f93a9.js" rel="preload" as="script">
    <link href="/assets/css/app.965b18bc.css" rel="stylesheet">
</head>
<body class="overflow-hidden" id="nitro-client">
<div class="absolute top-4 left-4 flex gap-x-2 z-10">
    <a data-turbolinks="false" href="{{ route('me.show') }}">
        <x-client.client-button>
            <x-icons.home/>
        </x-client.client-button>
    </a>

    <div onclick="reloadClient()">
        <x-client.client-button>
            <x-icons.reload/>
        </x-client.client-button>
    </div>

    <div onclick="toggleFullscreen()">
        <x-client.client-button>
            <x-icons.fullscreen/>
        </x-client.client-button>
    </div>

    <x-client.client-button classes="flex items-center justify-center gap-x-1">
        <x-icons.user/>

        <span id="online-count"></span>
    </x-client.client-button>
</div>

<noscript>You need to enable JavaScript to run this app.</noscript>
<div id="root" class="w-100 h-100"></div>
<div id="app"></div>
<script>
    const NitroConfig = {
            "config.urls": ['/nitro/renderer-config.json', '/nitro/ui-config.json'],
            "sso.ticket": "{{ $_SESSION['sso'] }}",
            "forward.type": (new URLSearchParams(window.location.search).get('room') ? 2 : -1),
            "forward.id": (new URLSearchParams(window.location.search).get('room') || 0),
            "friend.id": (new URLSearchParams(window.location.search).get('friend') || 0),
        }
    ;
</script>


<script src="/assets/js/chunk-vendors.836f93a9.js"></script>
<script src="/assets/js/app.a6750032.js"></script>

{{-- Show disconnected message on client if the user has been disconnected --}}
<div id="disconnected" class="w-full h-screen">
    <div class="absolute bg-black bg-opacity-50 w-full h-full"></div>

    <div class="relative flex flex-col items-center justify-center gap-4 h-full w-full">
        <h2 class="text-2xl text-white">
            {{ __('Whoops! It seems like you have been disconnected...') }}
        </h2>

        <button
            class="py-2 px-4 text-white rounded bg-[#eeb425] hover:bg-[#e3aa1e] border-2 border-[#cf9d15] transition ease-in-out"
            onclick="reloadClient()">
            {{ __('Reload client') }}
        </button>
    </div>
</div>

<script>
    function toggleFullscreen() {
        if (document.fullscreenElement) {
            document.exitFullscreen();

            return;
        }

        document.documentElement.requestFullscreen();
    }

    function reloadClient() {
        window.location.href = window.location;
    }

    window.addEventListener('DOMContentLoaded', (event) => {
        const onlineCount = setInterval(function () {
            getOnlineUserCount();
        }, 15000); //15000 = 15 seconds

        function getOnlineUserCount() {
            fetch('{{ route('api.online-count') }}')
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    document.getElementById('online-count').innerHTML = response.data.onlineCount;
                    clearInterval(onlineCount);
                });
        }

        // Fetch initial online count
        const fetchInitOnlineCount = setTimeout(() => {
            getOnlineUserCount();
            clearTimeout(fetchInitOnlineCount)
        }, 1500) // 150ms
    });
</script>

<script src="{{ asset('assets/js/atom.js') }}"></script>
</body>
</html>
