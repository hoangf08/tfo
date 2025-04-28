
/* readyEvent
------------------------------------------------------------------------*/

$(function(){

	$('.obj_accordion').click(function(){
		if(!$(this).is('.sp_only') || $(this).is('.sp_only') && abi.sp) {
			var $next = $(this).next();
			if(!$next.is(':animated')) $next.slideToggle(300).prev().toggleClass('active');
		}
	});

	// smoothScroll ---------------------------//
	var	speed = 1000,
		easing = 'swing',
		pcPosition = -0,
		tabPosition = -0,
		spPosition = -0;

	$('a').not('.noscroll').click(function(){
		var href = $(this).attr('href'),
			case1 = href.charAt(0) == '#',
			case2 = location.href.split('#')[0] == href.split('#')[0];

		if(case1 || case2) {
			if(case2)
				href = '#'+href.split('#')[1];

			$target = $(href);

			if($target.length){
				$html.add($body).not(':animated').animate({scrollTop : String($target.offset().top + (abi.pc ? pcPosition : abi.tab ? tabPosition : spPosition))},speed,easing);

				return false;
			}
		}
	});

	// outerPageAnchorLink ---------------------------//
	if(window.location.href.split('#')[1] == undefined || window.location.href.split('#')[1].indexOf('=') == -1) {
		var $target = $('#'+window.location.href.split('#')[1]),
			adjust = (abi.pc) ? pcPosition : (abi.tab) ? tabPosition : spPosition;

		if($target.length) {
			$w.load(function(){
				var targetPosition = $target.offset().top;
				$html.add($body).animate({scrollTop: String(targetPosition + adjust)}, 10);
			});
		}
	}

 	var ClickFlag = true;

    $('.btn_gnav,.btn_close,.overlay').click(function() {
		$html.toggleClass('openMenu');
		$('#MenuList .fade').css({opacity: 0}).each(function(i){
            $(this).delay(200 * i).animate({opacity:1}, 800);
        });//順番に表示
        //$(this).toggleClass('active');

		ClickFlag = true;

    });

    if($html.is('.openMenu')) {
		$('.btn_gnav').find('.st').text('CLOSE');
	} else {
		$('.btn_gnav').find('.st').text('MENU');
	}

	//トップ（ページ上部）に戻る
	var $contents = $('#contents');

	$w.on({
		//load
		'load' : function(){
		},
		//scroll
		'scroll' : function(){

			var contsT =  $contents.offset().top;
			if(abi.sT > contsT) {
				$body.addClass('fix');
			} else {
				$body.removeClass('fix');
			}

		}
	}).superResize({
		//resize
		resizeAfter : function(){

		}
	}).firstLoad({
		//firstLoad
		pc_tab : function(){

		},
		sp : function(){

		}
	});

});

function matchHeight($o,m) {
    $o.css('height','auto')
    var foo_length = $o.length;

    for(var i = 0 ; i < Math.ceil(foo_length / m) ; i++) {
        var maxHeight = 0;
        for(var j = 0; j < m; j++){
            if ($o.eq(i * m + j).height() > maxHeight) {
                maxHeight = $o.eq(i * m + j).height();
            }
        }
        for(var k = 0; k < m; k++){
            $o.eq(i * m + k).height(maxHeight);
        }
    }
}
