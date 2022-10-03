@props(['packageId','package', 'price'])

<x-content.content-section icon="bronze-vip">
    <x-slot:title>
        {{ $package->name }} (${{ $package->price }})
    </x-slot:title>

    <x-slot:under-title>
        {{ $package->description }}
    </x-slot:under-title>

    <div class="relative flex items-center">
        <div class="flex justify-between w-full">
            <div class="flex flex-col">
                <p class="font-semibold">{{ __('You will receive:') }}</p>

                <ul class="pl-4 list-disc">
                    <li class="ml-3">Bronze VIP badge</li>
                    <li class="ml-3">Bronze VIP catalogue</li>
                    <li class="ml-3">Bronze VIP commands</li>
                    <li class="ml-3">350 credits every 15 minutes</li>
                    <li class="ml-3">350 duckets every 15 minutes</li>
                    <li class="ml-3">1 diamond every hour</li>
                </ul>
            </div>

            <form action="{{ route('shop.purchase', $packageId) }}" method="POST">
                @csrf

                <x-form.primary-button>
                    {{ __('Purchase') }}
                </x-form.primary-button>
            </form>
        </div>
    </div>
</x-content.content-section>
