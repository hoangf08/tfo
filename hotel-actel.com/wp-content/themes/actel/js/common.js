$(function() {

	// 空室検索 & Gナビ ---------------------------//
	var searchFlag = false,
	menuFlag = false;

	$('.trigger_search').on('click', function() {
		if($(window).width() < 768) {
			if(!searchFlag) {
				$('.con_rsv').slideDown();	
				searchFlag = true;
			} else {
				$('.con_rsv').slideUp();	
				searchFlag = false;
			}
		}
		
	});
	$('.trigger_menu').on('click', function() {
		if(!menuFlag) {
			$('#header .gnav').slideDown();	
			$('#header .btn_menu').addClass('active');
			menuFlag = true;
		} else {
			$('#header .gnav').slideUp();	
			$('#header .btn_menu').removeClass('active');
			menuFlag = false;
		}
	});

	var scrollFlag = false;
	var currentWidth = window.innerWidth;

	if($(window).width() > 767) {
		window.addEventListener('scroll', scrollFunc);	
	} else {
		window.removeEventListener('scroll', scrollFunc);
		$('.gnav').removeClass('fixed').slideUp();
		scrollFlag = false;
	}

	window.addEventListener("resize", function() {
	    if (currentWidth == window.innerWidth) {
	        return;
	    }
	    currentWidth = window.innerWidth;
	    if($(window).width() > 767) {
			window.addEventListener('scroll', scrollFunc);	
		} else {
			window.removeEventListener('scroll', scrollFunc);
			$('.gnav').removeClass('fixed').slideUp();
			scrollFlag = false;
		}
	});

    function scrollFunc() {
    	if ($(this).scrollTop() > 139) {
            $('.gnav').addClass('fixed').slideDown();
            scrollFlag = true;
        } else {
        	if(!menuFlag && scrollFlag) {
				$('.gnav').removeClass('fixed').slideUp();

				scrollFlag = false;
        	} else if(menuFlag && scrollFlag) {
        		$('#header .btn_menu').removeClass('active');
				menuFlag = false;
        	} else {
        		$('.gnav').removeClass('fixed')
        	}

        }
    }


	
	// smoothScroll ---------------------------//
	var	speed = 1000,
		easing = 'swing',
		pcPosition = -0,
		tabPosition = -0,
		spPosition = -85,
		pc,
		sp;

	function checkDeviceWidth() {
		if($(window).width() < 768) {
			sp = true;
			pc = false;
		} else {
			sp = false;
			pc = true;
		}
	}

	checkDeviceWidth();

	$(window).on('resize', checkDeviceWidth);
	

	$('a').not('.noscroll').click(function(){
		var href = $(this).attr('href'),
			case1 = href.charAt(0) == '#',
			case2 = location.href.split('#')[0] == href.split('#')[0];

		if(case1 || case2) {
			if(case2)
				href = '#'+href.split('#')[1];

			$target = $(href);

			if($target.length){
				$('html').add('.body').not(':animated').animate({scrollTop : String($target.offset().top + (pc ? pcPosition : spPosition))},speed,easing);

				return false;
			}
		}
	});

	// outerPageAnchorLink ---------------------------//
	if(window.location.href.split('#')[1] == undefined || window.location.href.split('#')[1].indexOf('=') == -1) {
		var $target = $('#'+window.location.href.split('#')[1]),
			adjust = (pc) ? pcPosition : spPosition;

		if($target.length) {
			$(window).load(function(){
				var targetPosition = $target.offset().top;
				$('html').add('.body').animate({scrollTop: String(targetPosition + adjust)}, 10);
			});
		}
	}

	$('.page .box_slide').slick({
		arrows: false,
		dots: true,
		customPaging: function(slider, i) {
			var thumbSrc = $(slider.$slides[i]).data('thumb');
			return '<img src="' + thumbSrc + '">';
		}
	});


});