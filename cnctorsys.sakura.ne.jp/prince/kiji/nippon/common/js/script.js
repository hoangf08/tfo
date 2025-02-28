/*===========================================================*/
/* ページ内リンクスライダー */
/*===========================================================*/
const slideLength02 = document.querySelectorAll('.page_link_slide .swiper-slide').length

if (slideLength02 > 1) {
    const swiper02 = new Swiper('.page_link_slide', {
        grabCursor: true,
        allowTouchMove: true,
        breakpoints: { 
            0: { // 画面幅0px以上で適用
                slidesPerView: 1.2,
            },
            768: { // 画面幅768px以上で適用
                slidesPerView: 4,
            }
        },
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


/*===========================================================*/
/* 記事詳細スライダー */
/*===========================================================*/
const slideLength01 = document.querySelectorAll('.schedule_img_slide .swiper-slide').length

if (slideLength01 > 1) {
    const swiper01 = new Swiper('.schedule_img_slide', {
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