// L?y ph?n t? co class page_link_slide
const linkSlides = document.querySelectorAll('.page_link_slide')

// L?y gia tr? width c?a .page_link_slide
const linkSlide = document.querySelector('.page_link_slide')
let slideWidth = 0
if (linkSlide) {
  slideWidth = parseInt(window.getComputedStyle(linkSlide).getPropertyValue('width').replace('px', ''))
}
console.log('Gia tr? width c?a .page_link_slide:', slideWidth)

// Kh?i t?o Swiper cho ph?n t? co class page_link_slide
linkSlides.forEach((slideContainer, index) => {
  new Swiper(slideContainer, {
    grabCursor: true,
    allowTouchMove: true,
    breakpoints: {
      0: {
        // ��ʕ�0px�ȏ�œK�p
        slidesPerView: 1.2,
      },
      768: {
        // ��ʕ�768px�ȏ�œK�p
        slidesPerView: 4,
      },
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
  })

  // L?y s? l??ng slides
  const slidesCount = slideContainer.querySelectorAll('.swiper-slide').length

  // L?y gia tr? width c?a .swiper-slide
  const swiperSlide = slideContainer.querySelector('.swiper-slide')
  let itemWidth = 0
  if (swiperSlide) {
    itemWidth = parseInt(window.getComputedStyle(swiperSlide).getPropertyValue('width').replace('px', ''))
    console.log('Gia tr? width c?a .swiper-slide:', itemWidth)
  }
  // L?y gia tr? gap t? CSS c?a .swiper-wrapper
  const swiperWrapper = slideContainer.querySelector('.swiper-wrapper')
  let gap = 0
  if (swiperWrapper) {
    const computedStyle = window.getComputedStyle(swiperWrapper)
    gap = parseInt(computedStyle.getPropertyValue('gap').replace('px', ''))
    console.log('Gia tr? gap c?a .swiper-wrapper:', gap)
  }

  // Tinh toan s? l??ng slidesPerView d?a tren gap va width
  const slidesPerView = (itemWidth + gap) * slidesCount
  console.log('S? l??ng slidesPerView:', slidesPerView)

  if (slidesPerView < slideWidth) {
    const swiper_btn_box = slideContainer.querySelector('.swiper_btn_box')
    if (swiper_btn_box) {
      swiper_btn_box.style.display = 'none'
    }
    if (slideContainer) {
      slideContainer.style.paddingBottom = '15px'
    }
    console.log(slidesPerView)
  }
})

/*===========================================================*/
/* �L���ڍ׃X���C�_�[ */
/*===========================================================*/
// L?y t?t c? cac ph?n t? co class schedule_img_slide
const scheduleSlides = document.querySelectorAll('.schedule_img_slide')

// Kh?i t?o Swiper rieng bi?t cho t?ng slide
scheduleSlides.forEach((slideContainer, index) => {
  const slidesCount = slideContainer.querySelectorAll('.swiper-slide').length
  // console.log('S? l??ng slides:', slidesCount);

  // Luon kh?i t?o Swiper v?i cac c?u hinh phu h?p
  const swiperConfig = {
    slidesPerView: 1,
    centeredSlides: true,
    allowTouchMove: true,
    centerInsufficientSlides: true,
    speed: 600,
    loop: slidesCount > 1, // Ch? b?t loop n?u co nhi?u h?n 1 slide
    loopAdditionalSlides: slidesCount > 1 ? 2 : 0,
    breakpoints: {
      0: {
        slidesPerView: 1,
      },
      768: {
        slidesPerView: 1,
      },
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
  }

  // Kh?i t?o Swiper
  const swiper = new Swiper(slideContainer, swiperConfig)

  // ?n cac nut ?i?u h??ng n?u ch? co 1 slide
  if (slidesCount <= 1) {
    const btn_left = slideContainer.parentElement.querySelector('.btn_left')
    const btn_right = slideContainer.parentElement.querySelector('.btn_right')
    if (btn_left) btn_left.style.display = 'none'
    if (btn_right) btn_right.style.display = 'none'
  }
})
