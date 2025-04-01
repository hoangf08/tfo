
// Cập nhật khi trang được tải
document.addEventListener('DOMContentLoaded', function () {
  const swiper1 = new Swiper('.lead-slide', {
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 2,
    spaceBetween: 16,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    autoplay: {
      delay: 3000,
      pauseOnMouseEnter: true,
    },
    updateOnWindowResize: true, // Cập nhật khi thay đổi kích thước
    observer: true, // Theo dõi thay đổi DOM
    observeParents: true,
    observeSlideChildren: true,
  });

  // Cập nhật background của .top-image dựa trên slide đang active
  function updateTopImageBackground() {
    const activeSlide = document.querySelector('.lead-slide .swiper-slide-active');
    const topImage = document.querySelector('.top-i1');

    if (activeSlide && topImage) {
      // Lấy background từ slide đang active
      const computedStyle = window.getComputedStyle(activeSlide);
      const backgroundImage = computedStyle.backgroundImage;

      // Áp dụng vào top-image
      topImage.style.backgroundImage = backgroundImage;
    }
  }

  // Cập nhật khi slide thay đổi
  swiper1.on('slideChange', function () {
    setTimeout(() => {
      updateTopImageBackground();
    }, 1);
  });

  const swiper2 = new Swiper('.room-slide', {
    loop: true,
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 2,
    spaceBetween: 16,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: false,
      renderBullet: function (index, className) {
        // Chỉ hiển thị tối đa 3 nút
        if (index < 3) {
          return '<span class="' + className + '"></span>';
        } else {
          return '';
        }
      }
    },
    autoplay: {
      delay: 3000,
      pauseOnMouseEnter: true,
    },
    updateOnWindowResize: true, // Cập nhật khi thay đổi kích thước
    observer: true, // Theo dõi thay đổi DOM
    observeParents: true,
    observeSlideChildren: true,
  });
});

