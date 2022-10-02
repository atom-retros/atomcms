<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ setting('hotel_name') }} - Nitro</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
</head>
<body class="overflow-hidden relative" id="nitro-client">
    <div class="absolute top-4 left-4 flex gap-x-2">
        <a href="{{ route('me.show') }}" class="min-w-[40px] text-center bg-[#eeb425] hover:bg-[#e3aa1e] rounded py-1 px-2 text-sm text-white border-2 border-[#cf9d15]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
            </svg>
        </a>

        <button onclick="location.reload();" class="min-w-[40px] text-center bg-[#eeb425] hover:bg-[#e3aa1e] rounded py-1 px-2 text-sm text-white border-2 border-[#cf9d15]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
            </svg>
        </button>

        <button onclick="document.getElementById('nitro-client').requestFullscreen()" class="min-w-[40px] text-center bg-[#eeb425] hover:bg-[#e3aa1e] rounded py-1 px-2 text-sm text-white border-2 border-[#cf9d15]">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
            </svg>
        </button>

        <div class="min-w-[40px] flex items-center justify-center gap-x-1 bg-[#eeb425] hover:bg-[#e3aa1e] rounded py-1 px-2 text-sm text-white border-2 border-[#cf9d15]">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
            </svg>

            <span id="online-count">
                0
            </span>
        </div>
    </div>
    <iframe
            id="nitro"
            src="{{ sprintf('%s/index.html?sso=%s', config('habbo.client.nitro_path'), $sso) }}"
            class="border-none overflow-hidden h-full w-full m-0 p-0 absolute top-0 left-0"></iframe>

    <div id="app"></div>

    <div id="disconnected">
        <div class="disconnect-layer"></div>

        <p class="disconnect-message">
            {{ __('Whoops! It seems like you have been disconnected...') }}
            <br>

            <button class="reload-button" onclick="reloadClient()">
                {{ __('Reload client') }}
            </button>
        </p>
    </div>

    <script>
        function disconnected() {
            document.querySelector("#disconnected").style = "display: block !important;"
        }

        function reloadClient() {
            window.location.href = window.location
        }

        let frame = document.getElementById('nitro');
        window.FlashExternalInterface = {};
        window.FlashExternalInterface.disconnect = () => {
            disconnected();
            setTimeout(reloadUser, 5000);
        };

        if (frame && frame.contentWindow) {
            console.log(window.FlashExternalInterface)
            window.addEventListener("message", ev => {
                if (!frame || ev.source !== frame.contentWindow) return;
                const legacyInterface = "Nitro_LegacyExternalInterface";
                if (typeof ev.data !== "string") return;
                if (ev.data.startsWith(legacyInterface)) {
                    const {
                        method,
                        params
                    } = JSON.parse(
                        ev.data.substr(legacyInterface.length)
                    );
                    if (!("FlashExternalInterface" in window)) return;
                    const fn = window.FlashExternalInterface[method];
                    if (!fn) return;
                    fn(...params);
                    return;
                }
            });
        }

        window.addEventListener('DOMContentLoaded', (event) => {
            getOnlineUserCount();

            setInterval(function() {
                getOnlineUserCount();
            }, 30000); //30000 = 30 seconds
        });

        function getOnlineUserCount() {
            fetch('{{ route('api.online-count') }}')
                .then(function (response) {
                    return response.json();
                })
                .then(function (response) {
                    document.getElementById('online-count').innerHTML = response.data.onlineCount;
                });
        }
    </script>
</body>
</html>
