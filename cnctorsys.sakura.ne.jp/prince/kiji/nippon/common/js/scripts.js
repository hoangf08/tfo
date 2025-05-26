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
// Lấy tất cả các phần tử có class schedule_img_slide
const scheduleSlides = document.querySelectorAll('.schedule_img_slide');

// Khởi tạo Swiper riêng biệt cho từng slide
scheduleSlides.forEach((slideContainer, index) => {
    const slidesCount = slideContainer.querySelectorAll('.swiper-slide').length;
    
    if (slidesCount > 1) {
        new Swiper(slideContainer, {
            slidesPerView: 1,
            centeredSlides: true,
            allowTouchMove: true,
            centerInsufficientSlides: true,
            speed: 600,
            loop: true,
            loopAdditionalSlides: 2,
            breakpoints: { 
                0: { // Áp dụng cho màn hình rộng từ 0px trở lên
                    slidesPerView: 1,
                },
                768: { // Áp dụng cho màn hình rộng từ 768px trở lên
                    slidesPerView: 1,
                }
            },
            pagination: {
                el: slideContainer.parentElement.querySelector('.swiper-pagination'),
                type: 'bullets',
                clickable: true,
            },
            navigation: {
                nextEl: slideContainer.parentElement.querySelector('.swiper-button-next'),
                prevEl: slideContainer.parentElement.querySelector('.swiper-button-prev'),
            },
        });
    }
});