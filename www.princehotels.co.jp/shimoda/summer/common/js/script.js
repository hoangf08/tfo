$(document).ready(function () {
  $(window).on("scroll", function () {
    scrollPosition = $(window).height() + $(window).scrollTop();
    $(".view").each(function () {
      if (scrollPosition - 100 > $(this).offset().top) {
        $(this).addClass("on");
      }
    });
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const slider = document.querySelector('.slider');
  const wrapper = document.querySelector('.slider-wrapper');
  
  const images = wrapper.innerHTML;
  wrapper.innerHTML += images;
});

document.addEventListener('DOMContentLoaded', function() {
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.visibility = 'visible';
        observer.unobserve(entry.target);
      }
    });
  });

  const topKv = document.querySelector('.top_kv');
  if (topKv) {
    topKv.style.visibility = 'hidden';
    observer.observe(topKv);
  }
});

// Observer configuration
const observerOptions = {
  root: null,
  threshold: 0.2,
  rootMargin: '0px'
};

// Store the last scroll position to detect scroll direction
let lastScrollY = window.scrollY;

// Intersection Observer callback
const observerCallback = (entries, observer) => {
  entries.forEach(entry => {
      // Detect scroll direction
      const currentScrollY = window.scrollY;
      const isScrollingDown = currentScrollY > lastScrollY;

      if (entry.isIntersecting) {
          // Add active class only when scrolling down
          if (isScrollingDown) {
              entry.target.classList.add('active');
          }
      } else {
          // Remove active class only when scrolling up
          if (!isScrollingDown) {
              entry.target.classList.remove('active');
          }
      }
  });

  // Update last scroll position
  lastScrollY = window.scrollY;
};

// Create observer
const observer = new IntersectionObserver(observerCallback, observerOptions);

// Observe all elements with animate class
document.addEventListener('DOMContentLoaded', () => {
  const elements = document.querySelectorAll('.animate');
  elements.forEach(el => observer.observe(el));
});
