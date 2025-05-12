/*--------------------------------------------------------
    1. SLIDESHOW TOP
--------------------------------------------------------*/
const slideLength01 = document.querySelectorAll('.s__slideshow .swiper-slide').length

if (slideLength01 > 1) {
    const swiper01 = new Swiper('.slideshow', {
        grabCursor: true,
        loop: true,
        allowTouchMove: true,
        slidesPerView: "auto",
        centeredSlides: true,
        initialSlide: 1, 
        breakpoints: { 
            0: { // 画面幅0px以上で適用
                spaceBetween: 10,
            },
            768: { // 画面幅768px以上で適用
                spaceBetween: 40,
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
            nextEl: '.swiper-btn-next',
            prevEl: '.swiper-btn-prev',
        },
    });
}

(function($) {
	'use strict';

    /*--------------------------------------------------------
    2. MENU BUTTON DROPDOWN
    --------------------------------------------------------*/
    $('.header__main--nav .btn__nav').on('click', function (e) {
        e.preventDefault();
        $('body').toggleClass('mainmenu-active');
        $('.lp_overlay').toggleClass('is_open');
        return false;
    });
    
    $('.header__main--navtoggle a.closed').on('click', function (e) {
        e.preventDefault();
        $('body').removeClass('mainmenu-active');
        $('.lp_overlay').removeClass('is_open');
        return false;
    });
    $('.lp_nav-link').on('click', function () {
		$('body').removeClass('mainmenu-active');
        $('.lp_overlay').removeClass('is_open');
	});

    $('.lp_subnav-link').on('click', function () {
		$('body').removeClass('mainmenu-active');
        $('.lp_overlay').removeClass('is_open');
	});

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
      }
    });

})(jQuery);