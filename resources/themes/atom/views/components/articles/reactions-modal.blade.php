@props([
    'article' => null
])

@if ($article)
    <div x-data='{
        articleReactions: [],
        allReactions: [],

        init() {
            this.setAllReactions()
            this.setArticleReactions()
        },

        setAllReactions() {
            this.allReactions = @json(config('habbo.reactions'))
        },

        setArticleReactions() {
            let articleReactions = @json($article->reactions)

            articleReactions.forEach(reactionData => {
                if(this.hasReaction(reactionData.reaction)) return

                this.articleReactions.push({
                    name: reactionData.reaction,
                    count: articleReactions.filter(r => r.reaction === reactionData.reaction).length,
                })
            })
        },

        toggleReaction(name, index) {
            axios.post("{{ route('article.reaction.add', $article->slug) }}", {
                reaction: name
            }).then(response => {
                if (!response.data.success) return

                if(!response.data.added) {
                    this.getReactionData(name).count--
                    return
                }

                if(this.hasReaction(name)) {
                    this.getReactionData(name).count++
                    return
                }

                this.articleReactions.push({ name, count: 1 })
            })
        },

        hasReaction(name) {
            return this.articleReactions.filter(reaction => reaction.name === name).length > 0
        },

        getReactionData(name) {
            return this.articleReactions.find(reaction => reaction.name === name)
        },

        userHasReaction(name) {
            return @json($article->reactions->where('user_id', auth()->id())->pluck('reaction')).includes(name) || this.getReactionData(name).count <= 1
        }
    }'>
        <div class="flex w-full flex-wrap gap-2 my-4 bg-gray-100 rounded p-2">
            <div class="w-12 h-8 flex items-center justify-center border-2 text-xs border-yellow-400 cursor-pointer bg-[#eeb425] text-white rounded-lg" data-modal-toggle="article-reactions-modal">
                Add
            </div>
            <template x-for="(articleReaction, index) in articleReactions">
                <div
                    v-show="articleReaction.count > 0"
                    class="w-12 h-8 border-2 border-gray-300 rounded-lg flex gap-2 font-bold text-sm justify-center items-center cursor-pointer hover:bg-gray-200"
                    :class="{ 'bg-gray-200': userHasReaction(articleReaction.name) }"
                    :id="'reaction-' + articleReaction.name"
                    @click="toggleReaction(articleReaction.name, index)"
                >
                    <img :src="'/assets/images/icons/reactions/' + articleReaction.name + '.png'" :alt="articleReaction.name">
                    <span x-text="articleReaction.count"></span>
                </div>
            </template>
        </div>
        <div id="article-reactions-modal" tabindex="-1" class="hidden transition ease-in-out duration-200 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
            <div class="relative p-4 w-full max-w-lg h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="article-reactions-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>

                    <div class="py-6 px-6 lg:px-8">
                        <div class="flex flex-col items-center mb-2">
                            <h2 class="font-semibold text-2xl dark:text-gray-200">{{ __('Insert Reaction') }}</h2>
                        </div>
                        <div class="w-full p-2 flex gap-3 flex-wrap justify-center">
                            <template x-for="(defaultReaction, index) in allReactions">
                                <div
                                    class="px-3 py-2 border-2 border-gray-300 rounded-lg cursor-pointer hover:bg-gray-200"
                                    :class="{ 'bg-gray-200': userHasReaction(defaultReaction) }"
                                    @click="toggleReaction(defaultReaction, index)">
                                    <img :src="'/assets/images/icons/reactions/' + defaultReaction + '.png'" :alt="defaultReaction">
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('javascript')
    <script src="//unpkg.com/alpinejs" defer></script>
    @endpush
@endif


