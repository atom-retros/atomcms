import Swiper, { Autoplay, Pagination } from "swiper";

const AtomSliders = {
    init() {
        document.addEventListener('turbolinks:load', () => {
            this.initArticleSlider();
        })
    },

    initArticleSlider() {
        new Swiper('.articles-slider', {
            modules: [Autoplay, Pagination],
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        })
    }
}

export { AtomSliders as default };
