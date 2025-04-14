(function (d) {
  var config = {
    kitId: 'tsm6flx',
    scriptTimeout: 3000,
    async: true
  },
    h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
})(document);

// Khởi tạo SimpleBar khi trang đã tải xong
document.addEventListener('DOMContentLoaded', function() {
  // Khởi tạo SimpleBar cho phần tử có thuộc tính data-simplebar
  // Nếu SimpleBar đã tự động khởi tạo, đoạn code này sẽ không làm gì
  var elements = document.querySelectorAll('[data-simplebar]');
  
  elements.forEach(function(element) {
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
  setTimeout(function() {
    var simplebarElements = document.querySelectorAll('.simplebar-track');
    if (simplebarElements.length > 0) {
      console.log('SimpleBar đã được khởi tạo thành công với', simplebarElements.length, 'thanh cuộn');
    } else {
      console.error('SimpleBar không được khởi tạo đúng cách. Kiểm tra lại thư viện.');
    }
    console.log('SimpleBar đã được khởi tạo với thời gian ẩn 3s:', elements.length, 'phần tử');
  }, 500);
});