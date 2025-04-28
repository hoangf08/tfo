// --------------------------------------------------
//	スムーズスクロール
// --------------------------------------------------
$('a[href^="#"]').click(function () {
	const speed = 1000;
	let href = $(this).attr("href");
	let target = $(href == "#" || href == "" ? "html" : href);
	let position = target.offset().top;
	$("body,html").animate({
		scrollTop: position
	}, speed, "swing");
	return false;
});

// --------------------------------------------------
//	page topボタン
// --------------------------------------------------
$(function () {
	var topBtn = $('#pageTop');
	topBtn.hide();
	// ボタンの表示設定
	$(window).scroll(function () {
		if ($(this).scrollTop() > 80) {
			// 画面を指定pxスクロールしたら、ボタンを表示する
			topBtn.fadeIn();
		} else {
			// 画面が指定pxより上なら、ボタンを表示しない
			topBtn.fadeOut();
		}
	});
});

// --------------------------------------------------
//	toggle
// --------------------------------------------------
$(function () {
	$('.toggle').on('click', function () {
		$('body').toggleClass('is-open');
		$('.filter').toggleClass('overlay');
	});
	$(document).on('click', '.overlay', function () {
		$('body').removeClass('is-open');
		$('.filter').removeClass('overlay');
	});
	$('.gnav_item a').on('click', function () {
		$('body').removeClass('is-open');
		$('.filter').removeClass('overlay');
	});
});

// --------------------------------------------------
//	アコーディオン
// --------------------------------------------------
$(function () {
	$(".accordion_title").on("click", function () {
		$(this).next().slideToggle(300);
		$(this).toggleClass("open", 300);
	});
});

// --------------------------------------------------
//	要素のフェードイン（必要無ければ消す）
// --------------------------------------------------
$(function () {
	$(window).scroll(function () {
		$(".fadeBlock").each(function () {
			var scroll = $(window).scrollTop();
			var blockPosition = $(this).offset().top;
			var windowHeihgt = $(window).height();
			if (scroll > blockPosition - windowHeihgt + 240) {
				$(this).addClass("fadeIn");
			}
		});
	});
});