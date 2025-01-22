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
	$('.gnav__list--item a').on('click', function () {
		$('body').removeClass('is-open');
		$('.filter').removeClass('overlay');
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

// --------------------------------------------------
//	pickupLink
// --------------------------------------------------
// linkPickup クラスを持つリンクにイベントリスナーを設定
document.querySelectorAll('.linkPickup').forEach(link => {
	link.addEventListener('click', function (e) {
		// 一時的にscroll-padding-topを0に設定
		document.documentElement.style.scrollPaddingTop = '0';

		// hrefからセクションIDを取得
		const sectionId = this.getAttribute('href').substring(1);
		const section = document.getElementById(sectionId);

		if (section) {
			// セクションまでスムーズにスクロール
			setTimeout(() => { // スムーズスクロールを確実に実行するためにsetTimeoutを使用
				section.scrollIntoView({
					behavior: 'smooth'
				});

				// スクロールが完了した後、scroll-padding-topを元に戻す
				setTimeout(() => {
					document.documentElement.style.scrollPaddingTop = '12vw';
				}, 500); // スムーズスクロールの時間に合わせて適宜調整
			}, 0);
		} else {
			// 目的のセクションがない場合は、すぐにscroll-padding-topを元に戻す
			document.documentElement.style.scrollPaddingTop = '12vw';
		}
	});
});