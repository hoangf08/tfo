$(function () {
  /*===========================================================*/
  /* メイン機能 タブ切り替えでTOPに戻る */
  /*===========================================================*/

  $('.tab>li')
    .click(function () {
      var num = $(this).parent().children('li').index(this);
      $('.tab').each(function () {
        $('>li', this).removeClass('active').eq(num).addClass('active');
      });
      $('.tabcontents-list').hide().eq(num).show().addClass('is-active');
    })
    .first()
    .click();
  $('.tab-bottom>li').click(function () {
    var speed = 400;
    var href = $(this).attr('data-url');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate({ scrollTop: position }, speed, 'swing');
    return false;
  });

  /*===========================================================*/
  /* 画面右下TOPに戻るアンカーリンボタン */
  /*===========================================================*/
  $('a[href^="#"]').click(function () {
    var speed = 500;
    var href = $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top;
    $('body,html').animate(
      {
        scrollTop: position,
      },
      speed,
      'swing'
    );
    return false;
  });
  var btn = $('.pagetop');
  $(window).on('load scroll', function () {
    if ($(this).scrollTop() > 100) {
      btn.addClass('active');
    } else {
      btn.removeClass('active');
    }
  });
  $(window).on('load scroll', function () {
    var height = $(document).height(),
      position = window.innerHeight + $(window).scrollTop(),
      footer = $('footer').height();
    if (height - position < footer) {
      btn.addClass('absolute');
    } else {
      btn.removeClass('absolute');
    }
  });
  btn.on('click', function () {
    $('body,html').animate({
      scrollTop: 0,
    });
  });
});
