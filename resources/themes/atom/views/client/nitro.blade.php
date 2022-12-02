<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ setting('hotel_name') }} - Nitro</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
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
<iframe
    id="nitro"
    src="{{ sprintf('%s/index.html?sso=%s', config('habbo.client.nitro_path'), $sso) }}"
    class="border-none overflow-hidden h-full w-full m-0 p-0 absolute top-0 left-0"></iframe>

{{-- Show disconnected message on client if the user has been disconnected --}}
<div id="disconnected" class="w-full h-screen">
    <div class="absolute bg-black bg-opacity-50 w-full h-full"></div>

    <div class="relative flex flex-col items-center justify-center gap-4 h-full w-full">
        <h2 class="text-2xl text-white">
            {{ __('Whoops! It seems like you have been disconnected...') }}
        </h2>

        <button class="py-2 px-4 text-white rounded bg-[#eeb425] hover:bg-[#e3aa1e] border-2 border-[#cf9d15] transition ease-in-out"
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
