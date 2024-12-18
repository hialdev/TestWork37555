jQuery('.hero-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    items: 1,
    loop:true,
    autoplay:true,
    autoplayTimeout:3500,
});

jQuery('.popular-carousel').owlCarousel({
    loop: true,
    margin: 10,
    nav: false,
    dots: false,
    loop:true,
    items: 3,
    autoplay:true,
    autoplayTimeout:3500,
    responsive : {
        0 : {
            items: 1,
        },
        768 : {
            items: 2,
        },
        820 : {
            items: 3,
        },
    }
});