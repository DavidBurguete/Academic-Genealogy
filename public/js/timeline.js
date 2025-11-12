window.addEventListener("load", () => {
    let screen_width = window.screen.width;
    let slide_amount = 1;
    if (screen_width > 1000) {
        slide_amount = 3;
    }

    const swiperImages = new Swiper('.swiper--timeline-images', {
        direction: 'horizontal',

        slidesPerView: slide_amount,

        centeredSlides: true,

        effect: "fade",
        fadeEffect: { crossFade: true }
    });

    const swiperHeader = new Swiper('.swiper--timeline-header', {
        direction: 'horizontal',

        navigation: {
            nextEl: '#next',
            prevEl: '#prev',
        },

        slidesPerView: slide_amount,

        centeredSlides: true
    });

    const swiperContent = new Swiper('.swiper--timeline-content', {
        direction: 'horizontal',

        allowTouchMove: false,
        simulateTouch: false,

        slidesPerView: slide_amount,

        centeredSlides: true,
    });

    swiperHeader.controller.control = [swiperContent, swiperImages];
    swiperImages.controller.control = swiperHeader;
    swiperContent.controller.control = swiperHeader;
});