(function (d) {
  var config = {
    kitId: 'tsm6flx',
    scriptTimeout: 3000,
    async: true
  },
    h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
})(document);

// Khởi tạo SimpleBar khi trang đã tải xong
document.addEventListener('DOMContentLoaded', function () {
  // Khi click vào lang-box-item
  const langBoxItems = document.querySelectorAll('.lang-box-item');
  const langBox = document.querySelector('.lang-box');
  langBoxItems.forEach(function (item) {
    item.addEventListener('click', function () {
      langBox.style.display = 'none';
    });
  });

  // Xử lý hiệu ứng cho từng chữ trong các nút .long-arrow
  function splitTextIntoChars() {
    const longArrows = document.querySelectorAll('.long-arrow');
    
    longArrows.forEach(arrow => {
      // Kiểm tra xem đã được xử lý chưa
      if (arrow.querySelector('.text-wrapper-default')) {
        return; // Bỏ qua nếu đã được xử lý
      }
      
      // Tạo một bản sao của nội dung nút
      const textContent = arrow.textContent.trim();
      
      // Xóa nội dung hiện tại (chỉ xóa text node, giữ lại các phần tử con khác)
      arrow.childNodes.forEach(node => {
        if (node.nodeType === Node.TEXT_NODE && node.textContent.trim() !== '') {
          node.remove();
        }
      });
      
      // Tạo wrapper cho văn bản mặc định (hiển thị khi không hover)
      const textWrapperDefault = document.createElement('span');
      textWrapperDefault.className = 'text-wrapper-default';
      
      // Tách từng ký tự và tạo span cho mỗi ký tự của văn bản mặc định
      Array.from(textContent).forEach((char, index) => {
        if (char.trim() !== '') { // Bỏ qua khoảng trắng
          const charSpan = document.createElement('span');
          charSpan.className = 'char';
          charSpan.style.setProperty('--char-index', index);
          charSpan.textContent = char;
          textWrapperDefault.appendChild(charSpan);
        } else {
          // Thêm khoảng trắng để giữ nguyên định dạng văn bản
          const spaceSpan = document.createElement('span');
          spaceSpan.className = 'char space';
          spaceSpan.innerHTML = '&nbsp;';
          textWrapperDefault.appendChild(spaceSpan);
        }
      });
      
      // Tạo wrapper cho văn bản hiển thị khi hover
      const textWrapperHover = document.createElement('span');
      textWrapperHover.className = 'text-wrapper-hover';
      
      // Kiểm tra xem có thuộc tính data-hover-text không
      const hoverText = arrow.getAttribute('data-hover-text') || textContent;
      
      // Tách từng ký tự và tạo span cho mỗi ký tự của văn bản khi hover
      Array.from(hoverText).forEach((char, index) => {
        if (char.trim() !== '') { // Bỏ qua khoảng trắng
          const charSpan = document.createElement('span');
          charSpan.className = 'char';
          charSpan.style.setProperty('--char-index', index);
          charSpan.textContent = char;
          textWrapperHover.appendChild(charSpan);
        } else {
          // Thêm khoảng trắng để giữ nguyên định dạng văn bản
          const spaceSpan = document.createElement('span');
          spaceSpan.className = 'char space';
          spaceSpan.innerHTML = '&nbsp;';
          textWrapperHover.appendChild(spaceSpan);
        }
      });
      
      // Chèn wrapper vào đầu nút
      arrow.insertBefore(textWrapperHover, arrow.firstChild);
      arrow.insertBefore(textWrapperDefault, arrow.firstChild);
      
      // Thêm phần tử icon mũi tên nếu chưa có
      if (!arrow.querySelector('.arrow-icon')) {
        const arrowIcon = document.createElement('span');
        arrowIcon.className = 'arrow-icon';
        arrow.appendChild(arrowIcon);
      }
    });
  }
  
  // Gọi hàm khi trang đã tải xong
  splitTextIntoChars();

  // Khởi tạo SimpleBar cho phần tử có thuộc tính data-simplebar
  // Nếu SimpleBar đã tự động khởi tạo, đoạn code này sẽ không làm gì
  var elements = document.querySelectorAll('[data-simplebar]');

  elements.forEach(function (element) {
    // Kiểm tra nếu SimpleBar chưa được khởi tạo cho phần tử này
    if (!element.querySelector('.simplebar-content-wrapper')) {
      new SimpleBar(element, {
        autoHide: true,
        autoHideDelay: 3000, // Tự động ẩn thanh cuộn sau 3 giây không hoạt động
        scrollbarMinSize: 25,
        classNames: {
          autoHide: 'simplebar-autoHide',
          visible: 'simplebar-visible'
        }
      });
    }
  });

  // Kiểm tra lại xem SimpleBar đã được áp dụng đúng cách chưa
  setTimeout(function () {
    var simplebarElements = document.querySelectorAll('.simplebar-track');
    if (simplebarElements.length > 0) {
      console.log('SimpleBar đã được khởi tạo thành công với', simplebarElements.length, 'thanh cuộn');
    } else {
      console.error('SimpleBar không được khởi tạo đúng cách. Kiểm tra lại thư viện.');
    }
    console.log('SimpleBar đã được khởi tạo với thời gian ẩn 3s:', elements.length, 'phần tử');
  }, 500);

  // Kiểm tra khi cuộn trang
  const mainWrapper = document.querySelector('.main-wrapper');
  const header = document.querySelector('.header-container');
  const topImg = document.querySelector('.top');
  const onTopButton = document.querySelector('.on-top');
  const scrollThreshold = 500; // Ngưỡng hiển thị nút on-top (px)
  
  // Đặt giá trị topPadding dựa trên kích thước màn hình
  let topPadding = 80; // giá trị mặc định là 80px
  
  // Hàm cập nhật topPadding dựa trên kích thước màn hình
  function updateTopPadding() {
    if (window.innerWidth < 768) {
      topPadding = 20; // Khi màn hình dưới 768px, topPadding là 20px
    } else {
      topPadding = 80; // Khi màn hình lớn hơn hoặc bằng 768px, topPadding là 80px
    }
  }
  
  // Cập nhật giá trị ban đầu
  updateTopPadding();
  
  // Lắng nghe sự kiện thay đổi kích thước màn hình
  window.addEventListener('resize', updateTopPadding);

  // Lắng nghe sự kiện cuộn từ SimpleBar
  const simpleBar = SimpleBar.instances.get(mainWrapper);
  if (simpleBar) {
    const scrollElement = simpleBar.getScrollElement();

    scrollElement.addEventListener('scroll', () => {
      // Hiển thị header khi scroll
      if (scrollElement.scrollTop > 50) {
        header.classList.add('visible');
        topImg.style.paddingLeft = `${topPadding}px`;
        topImg.style.paddingRight = `${topPadding}px`;
      } else {
        header.classList.remove('visible');
        topImg.style.paddingLeft = '0px';
        topImg.style.paddingRight = '0px';
      }

      // Hiển thị nút on-top khi scroll xuống đủ xa
      if (scrollElement.scrollTop > scrollThreshold) {
        onTopButton.classList.add('visible');
      } else {
        onTopButton.classList.remove('visible');
      }
    });
  }

  // Xử lý sự kiện click vào nút on-top
  if (onTopButton) {
    onTopButton.addEventListener('click', function(e) {
      e.preventDefault();
      // Cuộn lên đầu trang
      if (simpleBar) {
        const scrollElement = simpleBar.getScrollElement();
        scrollElement.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }
    });
  }

  // Khởi tạo Swiper khi trang đã tải xong
  const leadSlider = new Swiper('.lead-slider', {
    // Các tùy chọn Swiper
    loop: true,
    slidesPerView: window.innerWidth <= 768 ? 1.2 : 1.8,
    spaceBetween: window.innerWidth <= 768 ? 16 : 72,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
    breakpoints: {
      768: {
        slidesPerView: 1.8
      }
    }
  });
  const facilitiesSlider = new Swiper('.facilities-slider', {
    // Các tùy chọn Swiper
    loop: true,
    slidesPerView: 1.8,
    spaceBetween: 72,
    centeredSlides: true,
    autoplay: {
      delay: 2500,
      disableOnInteraction: false,
    },
  });
});