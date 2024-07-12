<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <link rel="icon" href="{{ asset('dist/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/dist/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/dist/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/dist/favicon-16x16.png') }}">
    <link rel="manifest" crossorigin="use-credentials" href="{{ asset('/dist/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('/dist/safari-pinned-tab.svg') }}" color="#000000">
    <meta name="apple-mobile-web-app-title" content="{{ $settings->get('hotel_name') }}">
    <meta name="application-name" content="{{ $settings->get('hotel_name') }}">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="theme-color" content="#000000" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <title>{{ $settings->get('hotel_name') }}</title>
    <script type="module" crossorigin src="{{ asset('dist/assets/index.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('dist/assets/vendor.js') }}"></script>
    <script type="module" crossorigin src="{{ asset('dist/assets/nitro-renderer.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('dist/src/assets/index.css') }}">
  </head>

  <body>
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <div id="root" class="w-100 h-100"></div>
    <script>
        const NitroConfig = {
          "config.urls": [ '/dist/renderer-config.json', '/dist/ui-config.json' ],
          "sso.ticket": '{{ auth()->user()->auth_ticket }}',
          "forward.type": (new URLSearchParams(window.location.search).get('room') ? 2 : -1),
          "forward.id": (new URLSearchParams(window.location.search).get('room') || 0),
          "friend.id": (new URLSearchParams(window.location.search).get('friend') || 0),
        };
      </script>
  </body>
</html>
