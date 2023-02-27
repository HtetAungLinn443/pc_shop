AOS.init();

// select item js

$(document).ready(function() {
    $('.select-item').click(function() {
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })

    $('.ph-menu').click(function() {
        $('#menu').toggleClass('phone-menu');
    })

    $('.ph-category').click(function() {
        $('#category-list').toggleClass('show');
    })

    //
    $('#allCategory').click(function() {
        $("#allCategory i").hasClass('fa-chevron-up') == true;
        $("#allCategory i").hasClass('fa-chevron-right') == false;

        if ($("#allCategory i").hasClass('fa-chevron-up') == true) {
            $('#allCategory i').addClass('fa-chevron-right');
            $('#allCategory i').removeClass('fa-chevron-up');
            $('.product__category').removeClass('show');

        } else {
            $('#allCategory i').removeClass('fa-chevron-right');
            $('#allCategory i').addClass('fa-chevron-up');
            $('.product__category').addClass('show');
        }
    })
    setInterval(function() {
        const currentTime = new Date();
        let hours = currentTime.getHours();
        const minutes = currentTime.getMinutes().toString().padStart(2, '0');
        const seconds = currentTime.getSeconds().toString().padStart(2, '0');
        let ampm = 'AM';
        if (hours >= 12) {
            ampm = 'PM';
            hours = hours % 12 || 12;
        }
        const formattedTime = hours + ' : ' + minutes + ' : ' + seconds + ' ' + ampm;
        $('#clock').text(formattedTime);
    }, 1000);
})

// swiper js
var swiper = new Swiper(".mySwiper", {
    slidesPerView: 5.4,

    spaceBetween: 0,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

// related Product slider
var swiper = new Swiper(".relatedPd__container .mySwiper", {
    slidesPerView: 5,
    spaceBetween: 1,
    pagination: {
        el: ".relatedPd__container .swiper-pagination",
        clickable: true,
    },
    autoplay: {
        delay: 4500,
        disableOnInteraction: false,
    },
});

// Header Slider
var swiper = new Swiper(".headerSwiper", {
    spaceBetween: 30,
    centeredSlides: true,
    loop: true,
    autoplay: {
        delay: 5000,
        disableOnInteraction: false,
    },
    pagination: {
        el: ".swiper-pagination",
        clickable: true,

    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});