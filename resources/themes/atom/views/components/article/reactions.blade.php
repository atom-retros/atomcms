@props(['article'])

<x-modals.modal-wrapper>
    <x-card.base class="!bg-gray-200 dark:!bg-gray-800">
        <div class="flex flex-wrap items-center gap-3">
            <button class="px-2 hover:scale-110 transition-all font-semibold h-8 flex items-center justify-center border-2 text-xs border-yellow-400 cursor-pointer bg-[#eeb425] text-white rounded-lg" x-on:click="open = true">
                {{ __('Add') }}
            </button>

            @foreach ($article->reactions->groupBy('reaction') as $reaction)
                <x-form.form action="{{ route('community.articles.update', $article) }}">
                    @method('PUT')

                    <input type="hidden" name="reaction" value="{{ $reaction->first()->reaction }}" />

                    <button @class([
                        'flex items-center justify-center w-12 h-8 gap-2 text-sm font-bold transition-all border-2 border-gray-300 rounded-lg cursor-pointer dark:text-white dark:border-gray-800 hover:bg-gray-200 hover:scale-110 dark:hover:bg-gray-700',
                        'bg-gray-300 dark:bg-gray-700' => $reaction->contains(fn ($react) => $react->user_id === auth()->id())
                    ])>
                        <img src="{{ asset('images/reactions/' . $reaction->first()->reaction . '.png') }}" alt="{{ $reaction->first()->reaction }}">
                        {{ $reaction->count() }}
                    </button>
                </x-form.form>
            @endforeach            
        </div>
    </x-card.base>

    <x-modals.regular-modal title="{{ __('Insert Reaction') }}">
        <div class="flex flex-wrap justify-center w-full gap-3 p-2">
            @foreach (config('theme.reactions', []) as $reaction)
                <x-form.form action="{{ route('community.articles.update', $article) }}">
                    @method('PUT')

                    <input type="hidden" name="reaction" value="{{ $reaction }}">
                    <button type="submit" class="px-3 py-2 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-700 dark:hover:border-g dark:border-gray-800">
                        <img src="{{ asset('images/reactions/' . $reaction . '.png') }}" alt="{{ $reaction }}">
                    </button>
                </x-form.form>
            @endforeach
        </div>
    </x-modals.regular-modal>
</x-modals.modal-wrapper>