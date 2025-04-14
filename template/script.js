document.addEventListener('DOMContentLoaded', function () {
  // Lấy tất cả các container
  const containers = document.querySelectorAll('.container');

  // Thiết lập Intersection Observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const container = entry.target;
        const color = container.getAttribute('simplebar-color');
        const firstContentElement = container.querySelector('p');
        const contentId = firstContentElement ? firstContentElement.getAttribute('content') : 'không xác định';

        console.log(`Đang xem container có màu: ${color}`);
        console.log(`Container này bắt đầu với nội dung có ID: ${contentId}`);

        // Hiển thị thông báo trên trang (tùy chọn)
        const infoBox = document.getElementById('container-info');
        if (infoBox) {
          infoBox.textContent = `Đang xem container: ${color}, bắt đầu với nội dung: ${contentId}`;
          document.documentElement.style.setProperty('--scrollbar-color', color);
        }
      }
    });
  }, {
    threshold: 0.5 // Element được coi là visible khi hiển thị ít nhất 50%
  });

  // Theo dõi tất cả các container
  containers.forEach(container => {
    observer.observe(container);
  });

  // Tạo một info box để hiển thị thông tin (tùy chọn)
  const infoBox = document.createElement('div');
  infoBox.id = 'container-info';
  infoBox.style.cssText = 'position: fixed; top: 10px; right: 10px; background: rgba(0,0,0,0.7); color: white; padding: 10px; border-radius: 5px; z-index: 9999;';
  document.body.appendChild(infoBox);
});