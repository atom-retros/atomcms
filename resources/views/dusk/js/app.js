import "./bootstrap";
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// ArticleReactions.init();

Swiper.use([Navigation, Pagination]);

// Swiper Initialization
document.addEventListener("DOMContentLoaded", function () {
    const swiper = new Swiper(".swiper", {
        // Your Swiper options here
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
});

console.log(
    "%cAtom CMS%c\n\nAtom CMS is a CMS for made for the community to enjoy. You can join our wonderful community at https://discord.gg/rX3aShUHdg\n\n",
    "color: #14619c; -webkit-text-stroke: 2px black; font-size: 32px; font-weight: bold;",
    ""
);
