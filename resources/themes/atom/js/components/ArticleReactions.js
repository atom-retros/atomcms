import Alpine from 'alpinejs';

const ArticleReactions = {
    init() {
        document.addEventListener('alpine:init', () => this.startComponent())
    },

    startComponent() {
        Alpine.data('reactions', (myReactions = [], articleReactions = [], url ='') => ({
            url,
            myReactions,
            articleReactions,
            allReactions: [],
            isAuthenticated: false,

            init() {
                this.treatArticleReactions()
                this.allReactions = window.App.defaultReactions
                this.isAuthenticated = window.App.isAuthenticated
            },

            treatArticleReactions() {
                let articleReactions = this.articleReactions

                this.articleReactions = []

                Object.entries(articleReactions).forEach(reactionData => {
                    let reactions = Object.values(reactionData[1])

                    this.articleReactions.push({
                        name: reactionData[0],
                        count: reactions.length,
                        users: reactions.map(reaction => reaction.user?.username ?? '')
                    })
                })
            },

            toggleReaction(reaction) {
                if(!this.url.length || !this.isAuthenticated) return

                axios.post(this.url, { reaction }).then(response => {
                    if(!response.data.success) return

                    if(!response.data.added) {
                        this.removeReaction(reaction, response.data.username)
                        return
                    }

                    this.addReaction(reaction, response.data.username)
                })
            },

            addReaction(name, username) {
                this.myReactions.push(name)

                let existingReaction = this.getReactionDataFromName(name)

                if(existingReaction) {
                    existingReaction.count++
                    existingReaction.users.push(username)
                    return
                }

                this.articleReactions.push({ name, count: 1 })
            },

            removeReaction(name, username) {
                this.myReactions.splice(this.myReactions.indexOf(name), 1)

                let reactionData = this.getReactionDataFromName(name)

                if(reactionData.count > 1) {
                    reactionData.count--
                    reactionData.users.splice(reactionData.users.indexOf(username), 1)
                    return
                }

                this.$nextTick(() => {
                    this.articleReactions.splice(this.articleReactions.indexOf(reactionData), 1)
                })
            },

            userHasReaction(reaction) {
                return this.myReactions.includes(reaction.name)
            },

            canAddReactionFromModal(name) {
                return !this.userHasReaction(name) && !this.articleHasReaction(name)
            },

            articleHasReaction(name) {
                return typeof this.getReactionDataFromName(name) !== 'undefined'
            },

            getReactionDataFromName(name) {
                return this.articleReactions.find(reaction => reaction.name === name)
            }
        }))
    }
}

export { ArticleReactions as default };
