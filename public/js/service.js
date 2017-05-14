$(function () {
    $('.heading .slider')
        .slick({
            infinite: true,
            centerMode: true,
            slidesToShow: 1,
            centerPadding: '15%',
            arrows: false,
            autoplay: true,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            responsive: [{
                breakpoint: 640,
                settings: {
                    centerMode: false,
                }
            }]
        })
        .removeClass('hidden');

    $('.images .slider')
        .slick({
            infinite: true,
            centerMode: true,
            slidesToShow: 1,
            centerPadding: '15%',
            arrows: true,
            dots: false,
            autoplay: true,
            autoplaySpeed: 5000,
            cssEase: 'linear',
            responsive: [{
                breakpoint: 640,
                settings: {
                    centerMode: false,
                }
            }]
        })
        .removeClass('hidden');
});
