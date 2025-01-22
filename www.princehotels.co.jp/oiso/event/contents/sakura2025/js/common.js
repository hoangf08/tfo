// --------------------------------------------------
//	page topボタン
// --------------------------------------------------
$(function () {
	var topBtn = $('.pageTop');
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
//	pickupLink
// --------------------------------------------------
$(document).ready(function () {
	// 通常のページ内リンク
	$('a[href^="#"]').not('.linkPickup').click(function (e) {
		e.preventDefault(); // デフォルトの動作を防止
		var targetId = $(this).attr('href');
		var targetPosition = $(targetId).offset().top - parseInt($('html').css('scroll-padding-top'));

		$('html, body').animate({
			scrollTop: targetPosition
		}, 500); // スムーズスクロールの速度（ミリ秒）
	});

	// .linkPickupクリック時の特別な処理
	$('.linkPickup').click(function (e) {
		e.preventDefault(); // デフォルトの動作を防止
		$('html').css('scroll-padding-top', '0'); // 一時的にscroll-padding-topを0に

		var targetId = $(this).attr('href');
		var targetPosition = $(targetId).offset().top;

		$('html, body').animate({
			scrollTop: targetPosition
		}, 800, function () {
			// スクロール完了後にscroll-padding-topを元に戻す
			$('html').css('scroll-padding-top', '12vw');
		});
	});
});