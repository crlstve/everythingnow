// SPLIDE SLIDER //
document.addEventListener('DOMContentLoaded', function () {
    new Splide('#cardlist', {
        gap: 16,
        padding: {
            left: 12,
            right: 12
        },
        perPage: 3,
        perMove: 1,
        type: 'slide',
        preloadPages: 1,
        arrows: false,
        pagination: true,
        rewind: true,
        interval: 3000,
        breakpoints: {
            1080: {
                perPage: 2,
            },

            767: {
                perPage: 1,
                focus: 'center',
            },
        }
    }).mount();

});