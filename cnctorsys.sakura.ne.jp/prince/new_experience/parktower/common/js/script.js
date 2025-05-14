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
        initialSlide: 0,
        breakpoints: {
            0: { // 逕ｻ髱｢蟷�0px莉･荳翫〒驕ｩ逕ｨ
                spaceBetween: 10,
            },
            768: { // 逕ｻ髱｢蟷�768px莉･荳翫〒驕ｩ逕ｨ
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

    const hide = () =>  {
            $('body').toggleClass('mainmenu-active');
            $('.lp_overlay').toggleClass('is_open');
    }

    /*--------------------------------------------------------
    2. MENU BUTTON DROPDOWN
    --------------------------------------------------------*/
    $('.header__main--nav .btn__nav').on('click', function (e) {
        e.preventDefault();
        hide();
        // $('body').toggleClass('mainmenu-active');
        // $('.lp_overlay').toggleClass('is_open');
        return false;
    });

    $('.header__main--navtoggle a.closed').on('click', function (e) {
        e.preventDefault();
        // $('body').removeClass('mainmenu-active');
        // $('.lp_overlay').removeClass('is_open');
        hide();
        return false;
    });
    $('.lp_nav-link').on('click', function () {
        hide();
		// $('body').removeClass('mainmenu-active');
        // $('.lp_overlay').removeClass('is_open');
	});

    $('.lp_subnav-link').on('click', function () {
        hide();
		// $('body').removeClass('mainmenu-active');
        // $('.lp_overlay').removeClass('is_open');
	});

    /*--------------------------------------------------------
    3. Scroll pagetop
    --------------------------------------------------------*/
    var topBtn = $('.pageTop');
    topBtn.hide();
    // 繝懊ち繝ｳ縺ｮ陦ｨ遉ｺ險ｭ螳�
    $(window).scroll(function () {
      if ($(this).scrollTop() > 300) {
        // 逕ｻ髱｢繧呈欠螳嗔x繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ縺励◆繧峨√�繧ｿ繝ｳ繧定｡ｨ遉ｺ縺吶ｋ
        topBtn.fadeIn();
      } else {
        // 逕ｻ髱｢縺梧欠螳嗔x繧医ｊ荳翫↑繧峨√�繧ｿ繝ｳ繧定｡ｨ遉ｺ縺励↑縺�
        topBtn.fadeOut();
      }
    });

})(jQuery);

const navToggle = document.querySelector('.header__main--navtoggle');

// navToggle.addEventListener('click', e => console.log(e.target))

const overlay = document.querySelector('.lp_overlay.is_open');



document.addEventListener('click', e => {
    !navToggle.contains(e.target) && $('body').removeClass('mainmenu-active') && $('.lp_overlay').removeClass('is_open');
    // !navToggle.contains(e.target) && hide();
})

