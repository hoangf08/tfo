/* =========================================================
 anchor
========================================================= */
$('.p-top-anchor a,.js-anchor').click(function() {
	const speed = 1000;
	let href = $(this).attr("href");
	let target = $(href == "#" || href == "" ? "html" : href);
	let position = target.offset().top;
	$("body,html").animate({
		scrollTop: position,
	}, speed, "swing");
	return false;
});
$(function() {
	const speed = 1000;
	var topBtn = $(".p-top-pagetop");
	topBtn.hide();
	$(window).scroll(function() {
		if ($(this).scrollTop() > 80) {
			topBtn.fadeIn();
		} else {
			topBtn.fadeOut();
		}
	});
 
  $(topBtn).click(function () {
    $('html, body').animate({
      scrollTop: 0
    }, speed, "swing");
  });
});



/* =========================================================
 slide
========================================================= */
(function () {
  'use strict';

  // Function to update the slide information
  function updateSlideInfo(splide, targetSelector) {
    const totalSlides = splide.length; // Total number of slides
    const currentSlideIndex = splide.index + 1; // Current slide index (1-based)

    // Display the information
    document.querySelector(targetSelector).textContent = `${currentSlideIndex} / ${totalSlides}`;
  }

  // kv
  (function () {
    const target = '.p-top-kv .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: false,
      pagination: false,
					pauseOnHover: false,
      drag: false,
      speed: 1000,
      interval: 5000,
    };
    const mySplide = new Splide(target, options);
    mySplide.mount();
  })();

  // flower
  (function () {
    const target = '.p-top-flower .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.flower-slide-info');
    });
    mySplide.mount();
  })();

  // sweets
  (function () {
    const target = '.p-top-sweets .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.sweets-slide-info');
    });
    mySplide.mount();
  })();

  // taste
  (function () {
    const target = '.p-top-taste .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.taste-slide-info');
    });
    mySplide.mount();
  })();

  // art
  (function () {
    const target = '.p-top-art .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.art-slide-info');
    });
    mySplide.mount();
  })();

  // nature
  (function () {
    const target = '.p-top-nature .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.nature-slide-info');
    });
    mySplide.mount();
  })();

  // sports
  (function () {
    const target = '.p-top-sports .splide';
    const options = {
      type: 'loop',
      autoplay: true,
      arrows: true,
      pagination: false,
      fixedWidth: '500px',
      gap: 60,
      focus: 'center',
      speed: 1000,
      interval: 6000,
						mediaQuery: 'max',
						breakpoints: {
							768: {
								fixedWidth: '70%',
								gap: 40,
							},
					},
    };
    const mySplide = new Splide(target, options);
    mySplide.on('mounted moved', function () {
      updateSlideInfo(mySplide, '.sports-slide-info');
    });
    mySplide.mount();
  })();

})();



/* =========================================================
modal
========================================================= */
$(function(){
 $('.js-modal-open').each(function(){
  $(this).on('click',function(){
   var target = $(this).data('target');
   var modal = document.getElementById(target);
   $(modal).fadeIn();
   $(".c-modal__bg,body").addClass("is-on");
   return false;
  });
 });
 $('.js-modal-close').on('click',function(){
  $('.js-modal').fadeOut();
  $(".c-modal__bg,body").removeClass("is-on");
  return false;
 }); 
});

//==============================================
// 表示文字数を制限
//==============================================
const els = document.getElementsByClassName('p-top-contents__card-txt');
const maxLen = 40; // 最大文字数を指定します

for (let i = 0; i < els.length; i++) {
	const el = els[i];
	const str = el.textContent.trim();
	let len = 0;
	let result = '';

	for (let j = 0; j < str.length; j++) {
		const char = str[j];
		if (char.match(/[ -~]/)) { // 半角英数字および記号の範囲
			len += 0.5;
		} else {
			len += 1;
		}

		if (len > maxLen) {
			result += '…';
			break;
		}
		result += char;
	}

	el.textContent = result;
}
