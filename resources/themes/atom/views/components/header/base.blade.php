@auth
    <x-header.currency />
@endauth

<div class="relative flex items-center justify-center w-full h-52" style="background-image: url({{ asset('images/kasja_mepage_header.png') }})">
    <div class="absolute w-full h-full bg-black bg-opacity-50"></div>
    <x-header.auth />
    <x-header.guest />
</div>