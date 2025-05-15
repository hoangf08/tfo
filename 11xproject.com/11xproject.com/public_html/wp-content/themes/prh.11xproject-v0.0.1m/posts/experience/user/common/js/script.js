// /*--------------------------------------------------------
//     1. SLIDESHOW TOP
// --------------------------------------------------------*/
// const slideLength01 = document.querySelectorAll('.s__slideshow .swiper-slide').length;

// if (slideLength01 > 1) {
//   const swiper01 = new Swiper('.slideshow', {
//     grabCursor: true,
//     loop: true,
//     allowTouchMove: true,
//     slidesPerView: 'auto',
//     centeredSlides: true,
//     initialSlide: 0,
//     breakpoints: {
//       0: {
//         // 逕ｻ髱｢蟷�0px莉･荳翫〒驕ｩ逕ｨ
//         spaceBetween: 10,
//       },
//       768: {
//         // 逕ｻ髱｢蟷�768px莉･荳翫〒驕ｩ逕ｨ
//         spaceBetween: 40,
//       },
//     },
//     autoplay: {
//       delay: 3000,
//       disableOnInteraction: false,
//     },
//     speed: 800,
//     effect: 'slide',
//     pagination: {
//       el: '.swiper-pagination',
//       type: 'bullets',
//       clickable: true,
//     },
//     navigation: {
//       nextEl: '.swiper-btn-next',
//       prevEl: '.swiper-btn-prev',
//     },
//   });
// }

// // const navToggle = $('.header__main--navtoggle');

// // document.addEventListener('click', e => {
// //     !navToggle.contains(e.target) && $('body').removeClass('mainmenu-active') && $('.lp_overlay').removeClass('is_open');
// // })

// // const anchorLinks = document.querySelectorAll('a[href^="#"]');

// // anchorLinks.forEach(function(link) {
// //     link.addEventListener('click', function(event) {
// //       event.preventDefault();  // Prevent the default anchor link behavior

// //       const href = this.getAttribute('href');
// //       const target = (href === '#' || href === '') ? document.documentElement : document.querySelector(href);

// //       // Scroll to the target element (without hash in the URL)
// //       window.scrollTo({
// //         top: target.offsetTop,
// //         behavior: 'smooth'
// //       });

// //       // Update the URL without the hash
// //       history.pushState(null, null, window.location.pathname + window.location.search);
// //     // return false;
// //     });
// //   });

// $(function () {
//   // $('a[href^="#"]').on('click', event => {
//   //   event.preventDefault();

//   //   const anchor = event.currentTarget; // get the clicked anchor
//   //   const href = $(anchor).attr('href'); // get the href attribute of the clicked anchor
//   //   const target = $(href === '#' || href === '' ? 'html' : href); // find the target element
//   //   const position = target.offset().top; // calculate the position of the target element
//   //   const speed = 1000; // speed of the scroll in milliseconds

//   //   // animate the scroll to the target element
//   //   $('html, body').animate(
//   //     {
//   //       scrollTop: position,
//   //     },
//   //     speed,
//   //     'swing'
//   //   ); // 'swing' is the easing function

//   //   history.pushState(null, null, location.pathname + location.search);

//   //   return false; // prevent the default action of the anchor
//   // });

//   const navToggle = $('.header__main--navtoggle');


//   $(document).on('click', function (e) {
//     if (!navToggle.is(e.target) && navToggle.has(e.target).length === 0) {
//       $('body').removeClass('mainmenu-active');
//       $('.lp_overlay').removeClass('is_open');
//     }
//   });

//   /*--------------------------------------------------------
//     2. MENU BUTTON DROPDOWN
//     --------------------------------------------------------*/
//   $('.header__main--nav .btn__nav').on('click', function (e) {
//     e.preventDefault();
//     $('body').toggleClass('mainmenu-active');
//     $('.lp_overlay').toggleClass('is_open');
//     return false;
//   });

//   $('.lp_subnav-link a, .header__main--navtoggle a.closed, .lp_nav-link').on('click', function (e) {
//     e.preventDefault();
//     $('body').removeClass('mainmenu-active');
//     $('.lp_overlay').removeClass('is_open');
//     return false;
//   });


//   /*--------------------------------------------------------
//     3. Scroll pagetop
//     --------------------------------------------------------*/
//   const topBtn = $('.pageTop');
//   topBtn.hide();
//   $(window).on('scroll', function () {
//     if ($(this).scrollTop() > 300) {
//       topBtn.fadeIn();
//     } else {
//       topBtn.fadeOut();
//     }
//   });


// });


/*--------------------------------------------------------
    1. SLIDESHOW TOP
--------------------------------------------------------*/
const slideLength01 = document.querySelectorAll('.s__slideshow .swiper-slide').length;

if (slideLength01 > 1) {
  const swiper01 = new Swiper('.slideshow', {
    grabCursor: true,
    loop: true,
    allowTouchMove: true,
    slidesPerView: 'auto',
    centeredSlides: true,
    initialSlide: 0,
    breakpoints: {
      0: {
        // 逕ｻ髱｢蟷�0px莉･荳翫〒驕ｩ逕ｨ
        spaceBetween: 10,
      },
      768: {
        // 逕ｻ髱｢蟷�768px莉･荳翫〒驕ｩ逕ｨ
        spaceBetween: 40,
      },
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


const hide = () => {
    $('body').toggleClass('mainmenu-active');
    $('.lp_overlay').toggleClass('is_open');
  };

(function ($) {
  'use strict';



  /*--------------------------------------------------------
    2. MENU BUTTON DROPDOWN
    --------------------------------------------------------*/
  $('.header__main--nav .btn__nav').on('click', function (e) {
    e.preventDefault();
    hide();
    return false;
  });

  $('.header__main--navtoggle a.closed').on('click', function (e) {
    e.preventDefault();
    hide();
    return false;
  });
  $('.lp_nav-link').on('click', function () {
    hide();
  });

  $('.lp_subnav-link').on('click', function () {
    hide();
  });

  /*--------------------------------------------------------
    3. Scroll pagetop
    --------------------------------------------------------*/
  var topBtn = $('.pageTop');
  topBtn.hide();
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });


})(jQuery);

const navToggle = document.querySelector('.header__main--navtoggle');
const overlay = document.querySelector('.lp_overlay');

overlay.addEventListener('click', e => {
  !navToggle.contains(e.target)
  &&
  $('body').removeClass('mainmenu-active')
  &&
  $('.lp_overlay').removeClass('is_open');;
});
