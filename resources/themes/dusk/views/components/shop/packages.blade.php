<x-content.shop-card color="{{ $article->color }}">
    <x-slot:title>
        {{ $article->name }}
    </x-slot:title>

    <div class="flex justify-between dark:text-white">

        <div class="flex flex-col">
            <div class="flex justify-center w-full">
                <div class="bg-[#303642] rounded-md p-2">
                    <img src="{{ $article->icon_url }}" alt="">
                </div>
            </div>

            <div class="text-gray-100 mt-4">
                {{ $article->info }}
            </div>
        </div>
    </div>

    <div class="pt-4 mt-auto flex gap-4">
        <x-modals.modal-wrapper>
            <div x-on:click="open = true">
                <x-form.primary-button classes="px-6">
                    {{ __('View') }}
                </x-form.primary-button>
            </div>


            <x-shop.package-content :package="$article"/>
        </x-modals.modal-wrapper>

        <form action="{{ route('shop.buy', $article) }}" method="POST" class="w-full">
            @csrf

            <button type="submit"
                    class="w-full rounded bg-green-600 hover:bg-green-700 text-white p-2 border-2 border-green-500 transition ease-in-out duration-150 font-semibold">
                {{ __('Buy for $:cost', ['cost' => $article->price()]) }}
            </button>
        </form>
    </div>
</x-content.shop-card>
