document.addEventListener('DOMContentLoaded', function() {
  // Lấy tất cả các thẻ a có href bắt đầu bằng #
  const anchors = document.querySelectorAll('a[href^="#"]');
  
  // Thêm sự kiện click cho mỗi thẻ
  anchors.forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      // Ngăn chặn hành vi mặc định của trình duyệt
      e.preventDefault();
      
      // Lấy ID của phần tử đích từ href
      const targetId = this.getAttribute('href');
      
      // Bỏ qua nếu href chỉ là "#"
      if (targetId === '#') return;
      
      // Lấy phần tử đích
      const targetElement = document.querySelector(targetId);
      
      // Kiểm tra xem phần tử đích có tồn tại không
      if (targetElement) {
        // Lấy vị trí của phần tử đích
        const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset;
        
        // Cuộn đến phần tử đích một cách mượt mà
        window.scrollTo({
          top: targetPosition,
          behavior: 'smooth'
        });
      }
    });
  });
  
  // Xử lý nút cuộn lên đầu trang
  const backToTopButton = document.querySelector('.ontop');
  if (backToTopButton) {
    backToTopButton.addEventListener('click', function(e) {
      e.preventDefault();
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  }
});
