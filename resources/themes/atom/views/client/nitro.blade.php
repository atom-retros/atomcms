<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ setting('hotel_name') }} - Nitro</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Condensed&display=swap" rel="stylesheet">

    @vite(['resources/themes/atom/css/app.css', 'resources/themes/atom/js/app.js'])
</head>
<body class="overflow-hidden">
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
    </script>
</body>
</html>
