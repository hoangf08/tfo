document.addEventListener('DOMContentLoaded', function () {
  // Select all elements with data-fade attribute
  const fadeElements = document.querySelectorAll('[data-fade]');
  
  // Create Intersection Observer
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('fade-in');
      }
    });
  }, {
    threshold: 0.2 // Trigger when 20% of the element is visible
  });

  // Observe all fade elements
  fadeElements.forEach(element => {
    observer.observe(element);
  });
});