(function($) {
	'use strict';

    /*--------------------------------------------------------
    1. Menu
    --------------------------------------------------------*/
    /* Active menu on PC */
    $('.lp_nav-list>li').click(function () {
        var num = $(this).parent().children('li').index(this);
        $('.lp_nav-list').each(function () {
            $('>li', this).removeClass('active').eq(num).addClass('active');
        });
    });

    /* Dropdown menu on SP */
    $('.header .btn__nav').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('is_open');
        return false;
    });

    $('.lp_nav-link').on('click', function () {
		$('body').removeClass('is_open');
	});

    /*--------------------------------------------------------
    2. LP content image slide
    --------------------------------------------------------*/
    const slideLength01 = document.querySelectorAll('.lp-cont__slide__wrap .swiper-slide').length

    if (slideLength01 > 1) {
        const swiper01 = new Swiper('.lp-cont__slide', {
            slidesPerView: 1,
            centeredSlides: true,
            allowTouchMove: true,
            centerInsufficientSlides: true,
            speed: 600,
            loop: "true",
            loopAdditionalSlides: 2,
            breakpoints: { 
                0: { // 画面幅0px以上で適用
                    slidesPerView: 1,
                },
                768: { // 画面幅768px以上で適用
                    slidesPerView: 1,
                }
            },
            autoplay: {
                delay: 3000,       
                disableOnInteraction: false, 
            },
            speed: 800,
            effect: 'slide',
            pagination: {
                el: '.swiper-pagination',
                type: 'bullets',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    }

    /*--------------------------------------------------------
    3. Scroll pagetop
    --------------------------------------------------------*/
    var topBtn = $('.pageTop');
    topBtn.hide();
    // ボタンの表示設定
    $(window).scroll(function () {
      if ($(this).scrollTop() > 80) {
        // 画面を指定pxスクロールしたら、ボタンを表示する
        topBtn.fadeIn();
      } else {
        // 画面が指定pxより上なら、ボタンを表示しない
        topBtn.fadeOut();
        $('.lp_nav-list > li').removeClass('active');
      }
    });

})(jQuery);
