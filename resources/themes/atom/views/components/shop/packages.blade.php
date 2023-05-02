<x-content.content-section icon="bronze-vip">
    <x-slot:title>
        {{ __('Bronze VIP') }}
    </x-slot:title>

    <x-slot:under-title>
        {{ __('Our lowest VIP rank') }}
    </x-slot:under-title>

    <div class="relative flex items-center">
        <div class="flex flex-col">
            <p class="font-semibold">{{ __('You will receive:') }}</p>

            <ul class="pl-4 list-disc">
                <li class="ml-3">{{ __('Bronze VIP badge') }}</li>
                <li class="ml-3">{{ __('Bronze VIP catalogue') }}</li>
                <li class="ml-3">{{ __('Bronze VIP commands') }}</li>
                <li class="ml-3">{{ __('350 credits every 15 minutes') }}</li>
                <li class="ml-3">{{ __('350 duckets every 15 minutes') }}</li>
                <li class="ml-3">{{ __('1 diamond every hour') }}</li>
            </ul>
        </div>
    </div>
</x-content.content-section>

<x-content.content-section icon="silver-vip">
    <x-slot:title>
        {{ __('Silver VIP') }}
    </x-slot:title>

    <x-slot:under-title>
        {{ __('Our middle ground VIP rank') }}
    </x-slot:under-title>

    <div class="flex flex-col">
        <p class="font-semibold">{{ __('You will receive:') }}</p>

        <ul class="pl-4 list-disc">
            <li class="ml-3">{{ __('Everything from Bronze VIP') }}</li>
            <li class="ml-3">{{ __('Silver VIP badge') }}</li>
            <li class="ml-3">{{ __('Silver VIP catalogue') }}</li>
            <li class="ml-3">{{ __('Silver VIP commands') }}</li>
            <li class="ml-3">{{ __('450 credits every 15 minutes') }}</li>
            <li class="ml-3">{{ __('450 duckets every 15 minutes') }}</li>
            <li class="ml-3">{{ __('2 diamonds every hour') }}</li>
        </ul>
    </div>
</x-content.content-section>

<x-content.content-section icon="gold-vip">
    <x-slot:title>
        {{ __('Gold VIP') }}
    </x-slot:title>

    <x-slot:under-title>
        {{ __('Our highest VIP rank') }}
    </x-slot:under-title>

    <div class="flex flex-col">
        <p class="font-semibold">{{ __('You will receive:') }}</p>

        <ul class="pl-4 list-disc">
            <li class="ml-3">{{ __('Everything from Silver VIP') }}</li>
            <li class="ml-3">{{ __('Gold VIP badge') }}</li>
            <li class="ml-3">{{ __('Gold VIP catalogue') }}</li>
            <li class="ml-3">{{ __('Gold VIP commands') }}</li>
            <li class="ml-3">{{ __('550 credits every 15 minutes') }}</li>
            <li class="ml-3">{{ __('550 duckets every 15 minutes') }}</li>
            <li class="ml-3">{{ __('3 diamonds every hour') }}</li>
        </ul>
    </div>
</x-content.content-section>

