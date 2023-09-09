/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "./bootstrap";
import Alpine from "alpinejs";
import Focus from '@alpinejs/focus';

Alpine.plugin(Focus);
Alpine.start();

// Swiper CSS
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

// Swiper JS
import Swiper, { Navigation, Pagination } from 'swiper';
Swiper.use([Navigation, Pagination]);

// Your existing code
console.log("Your existing logs...");

// Swiper Initialization
document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('.swiper', {
        // Your Swiper options here
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
        },
    });
});

console.log("%cAtom CMS%c\n\nAtom CMS is a CMS for made for the community to enjoy. You can join our wonderful community at https://discord.gg/rX3aShUHdg\n\n", "color: #14619c; -webkit-text-stroke: 2px black; font-size: 32px; font-weight: bold;", "");

