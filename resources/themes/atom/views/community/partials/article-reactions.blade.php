<x-modals.modal-wrapper>
    <div class="select-none"
         x-data='reactions(@json($myReactions), @json($articleReactions), "{{ route('article.toggle-reaction', $article->slug) }}")'>
        <div class="flex w-full flex-wrap gap-2 mt-4 bg-gray-100 dark:bg-gray-900 rounded-lg p-2">
            <div x-show="isAuthenticated"
                 class="px-2 hover:scale-110 transition-all font-semibold h-8 flex items-center justify-center border-2 text-xs border-yellow-400 cursor-pointer bg-[#eeb425] text-white rounded-lg"
                 x-on:click="open = true">
                {{ __('Add') }}
            </div>

            <template x-for="articleReaction in articleReactions">
                <div>
                    <div class="w-12 h-8 border-2 border-gray-300 dark:border-gray-800 rounded-lg flex gap-2 font-bold text-sm justify-center items-center"
                         :class="{ 'bg-gray-300 dark:bg-gray-800 dark:border-gray-700': userHasReaction(articleReaction), 'cursor-pointer hover:bg-gray-200 hover:scale-110 transition-all dark:hover:bg-gray-700': isAuthenticated }"
                         @click="toggleReaction(articleReaction.name)"
                         :data-popover-target="articleReaction.id"
                    >
                        <img :src="'/assets/images/icons/reactions/' + articleReaction.name + '.png'"
                             :alt="articleReaction.name">
                        <span x-text="articleReaction.count"></span>
                    </div>

                    <div data-popover :id="articleReaction.id" role="tooltip"
                         class="inline-block absolute invisible z-10 w-64 text-sm font-light text-gray-500 bg-white rounded-lg border border-gray-200 shadow-sm opacity-0 transition-opacity duration-300 dark:text-gray-400 dark:border-gray-600 dark:bg-gray-800">
                        <div class="py-2 px-3 bg-gray-100 rounded-t-lg border-b border-gray-200 dark:border-gray-600 dark:bg-gray-700">
                            <div class="font-semibold text-gray-900 dark:text-white flex justify-center items-center w-full">
                                {{ __('Reactions with') }} <img
                                        :src="'/assets/images/icons/reactions/' + articleReaction.name + '.png'"
                                        class="ml-1" :alt="articleReaction.name">
                            </div>
                        </div>
                        <div class="py-2 px-3 overflow-y-auto" style="max-height: 200px">
                            <template x-for="user in articleReaction.users">
                                <p class="w-full text-center" x-text="user"></p>
                            </template>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
            </template>
        </div>

        <div x-show="isAuthenticated">
            <x-modals.regular-modal >
                <x-slot name="title">
                    <h2 class="text-2xl">
                        {{ __('Insert Reaction') }}
                    </h2>
                </x-slot>

                <div class="w-full p-2 flex gap-3 flex-wrap justify-center">
                    <template x-for="defaultReaction in allReactions">
                        <div class="px-3 py-2 border-2 border-gray-300 dark:border-gray-800 dark:hover:bg-gray-700 dark:hover:border-g rounded-lg cursor-pointer hover:bg-gray-200"
                             x-show="canAddReactionFromModal(defaultReaction)"
                             @click="toggleReaction(defaultReaction)">
                            <img :src="'/assets/images/icons/reactions/' + defaultReaction + '.png'" :alt="defaultReaction">
                        </div>
                    </template>
                </div>
            </x-modals.regular-modal>
        </div>
    </div>
</x-modals.modal-wrapper>

@push('scripts')
    <script>
        window.App = {
            defaultReactions: @json(config('habbo.reactions')),
            isAuthenticated: @json(auth()->check())
        }
    </script>
@endpush


