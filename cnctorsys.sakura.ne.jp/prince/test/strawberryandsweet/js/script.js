// Cập nhật khi trang được tải
document.addEventListener('DOMContentLoaded', function () {

  // Tạo Intersection Observer
  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        // Thêm class 'visible' khi element xuất hiện
        entry.target.classList.add('visible');
        // Ngừng theo dõi sau khi hiển thị (tùy chọn)
        observer.unobserve(entry.target);
      }
    });
  }, {
    root: null, // Viewport mặc định
    rootMargin: '0px', // Margin quanh viewport
    threshold: 0.2 // Kích hoạt khi 20% element xuất hiện
  });

  // Chọn tất cả các section để theo dõi
  const sections = document.querySelectorAll('.section');
  sections.forEach(section => {
    observer.observe(section);
  });

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
    breakpoints: {
      // Khi màn hình nhỏ hơn 768px
      320: {
        slidesPerView: 1.2,
      },
      // Khi màn hình từ 768px trở lên
      768: {
        slidesPerView: 2,
      }
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
        // Chỉ hiển thị 3 nút và khi slide sang ảnh thứ 4 thì quay lại active cho pagination 1
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
    breakpoints: {
      // Khi màn hình nhỏ hơn 768px
      320: {
        slidesPerView: 1.2,
      },
      // Khi màn hình từ 768px trở lên
      768: {
        slidesPerView: 2,
      }
    },
    updateOnWindowResize: true, // Cập nhật khi thay đổi kích thước
    observer: true, // Theo dõi thay đổi DOM
    observeParents: true,
    observeSlideChildren: true,
  });


  // Khi index >= 3, không hiển thị nút và reset về nút đầu tiên
  swiper2.on('slideChange', function () {
    if (swiper2.realIndex >= 3) {
      setTimeout(() => {
        swiper2.pagination.bullets[swiper2.realIndex % 3].classList.add('swiper-pagination-bullet-active');
      }, 10);
    }
  });

  
});

