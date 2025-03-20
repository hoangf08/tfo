// スワイパー１
const FirstSwiper = new Swiper('.swiper1', {
    // Optional parameters
    loop: true,
   
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
        clickable: true,
        type: 'bullets'
    },
   
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
   
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    autoplay: {
      delay: 4000,
      pauseOnMouseEnter: true,        // 追記
      disableOnInteraction: false,  
  },
  speed: 500,  
  });
// スワイパー2
  const SecondSwiper = new Swiper('.swiper2', {
    // Optional parameters
    loop: true,
   
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
        clickable: true,
        type: 'bullets'
    },
   
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
   
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    autoplay: {
      delay: 4000,
      pauseOnMouseEnter: true,        // 追記
      disableOnInteraction: false,  
  },
  speed: 500,  
  });

// スワイパー3
const ThirdSwiper = new Swiper('.swiper3', {
    // Optional parameters
    loop: true,
    slidesPerView: 2, // コンテナ内に表示させるスライド数（CSSでサイズ指定する場合は 'auto'）
    breakpoints: {
        500: {
            slidesPerView: 3,
        },
        900: {
            slidesPerView: 4,
        }
    },
    spaceBetween: 17,
    // If we need pagination
    pagination: {
      el: '.swiper-pagination',
        clickable: true,
        type: 'bullets'
    },
   
    // Navigation arrows
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
   
    // And if we need scrollbar
    scrollbar: {
      el: '.swiper-scrollbar',
    },
    autoplay: {
      delay: 3000,
      pauseOnMouseEnter: true,        // 追記
      disableOnInteraction: false,  
  },
  speed: 1000,   

  });


