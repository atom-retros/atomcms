@props(['subnav', 'contentinfo'])

    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="{{ Vite::asset('resources/images/favicon.ico') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Habbo.pm - @stack('title')</title>

    @vite(['resources/themes/habbo/scss/app.scss', 'resources/themes/habbo/js/app.js'], 'build')
    @stack('scripts')
</head>
<body>
@if(request()->is('/'))
    <x-app.header_big />
@else
    <x-app.header_small />
@endif

<main class="min-h-[calc(100vh_-_70px)] flex flex-col">
    <x-app.navbar />

    @isset($subnav)
        <div class="h-[50px] bg-[var(--blue-darkest)]">
            <div class="max-w-[1200px] w-full h-full mx-auto">
                <div class="h-full flex justify-center items-center gap-6">
                    @foreach($subnav as $snitem)
                        <a class="uppercase" @style(['color: #6796b1!important' => $snitem->active]) href="{{ $snitem->url }}">{{ $snitem->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    @endisset

    @isset($contentinfo)
        <div class="bg-[var(--blue-light)] border-b border-[var(--blue-dark)]">
            <div class="max-w-[1200px] w-full py-6 px-2 mx-auto">
                <div class="h-full grid items-center">
                    <h1 class="text-3xl sm:text-4xl uppercase">{{ $contentinfo->header }}</h1>

                    <hr class="border-[var(--blue-dark)] shadow-[0_1px_1px_0_#2a9cde] my-4" />

                    <p class="text-[#7ecaee]">
                        {{ $contentinfo->body }}
                    </p>
                </div>
            </div>
        </div>
    @endisset

    <div class="content flex-grow" style="@stack('content-style')">
        <div class="max-w-[1200px] w-full content-body py-8 px-3 mx-auto">
            {{ $slot }}
        </div>
    </div>

    <footer class="bg-[var(--blue-darkest)] py-6 px-4">
        <div class="flex max-md:flex-col justify-center gap-4">
            <div class="flex flex-col gap-y-3 max-md:mx-auto">
                <p class="font-semibold text-[#7ecaee]">Folge uns</p>
                <div class="flex gap-2 justify-center">
                    <img src="{{ Vite::asset('resources/images/discord_footer.png') }}" alt="">
                </div>
            </div>
            <div class="grid justify-center">
                <div class="mb-2">
                    <ul class="links">
                        <li>
                            <a href="/legal-notice">Impressum</a>
                        </li>
                        <li>
                            <a href="mailto:support@habbo.pm">Kontakt</a>
                        </li>
                    </ul>
                </div>

                <p class="text-sm">
                    &copy; 2024 <a class="underline" href="/">habbo.pm</a>.
                </p>

                <p class="text-xs text-gray-400">
                    <span class="font-semibold">Sulake Corporation Ltd</span> und <span class="font-semibold">HABBO®</span> sind eigenständige Warenzeichen und stehen in keinerlei Bezug zu <span class="font-semibold">Habbo.pm</span>.
                </p>
                <p class="text-xs text-gray-400">
                    Alle Bildmaterialien welche auf dieser Webseite verwendet werden, unterliegen dem Recht von <span class="font-semibold">Sulake Corporation Oy</span>.
                </p>
            </div>
        </div>
    </footer>
</main>

@stack('javascript')
</body>
</html>
