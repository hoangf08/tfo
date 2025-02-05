(function ($) {

  // ie
  var ua = navigator.userAgent;
  var win7 = ua.match(/Win(dows )?NT 6\.1/);
  $(function(){
    if(win7){
      $('body').addClass('win7');
    }
  });

  //viewport
  $(function(){
    // setViewport
    tbView = 'width=1300px';

    if(navigator.userAgent.indexOf('iPad') > 0 || (navigator.userAgent.indexOf('Android') > 0 && navigator.userAgent.indexOf('Mobile') == -1)){
        $('head').prepend('<meta name="viewport" content="' + tbView + '">');
    }
  });

  // lang
  $(function() {
    $('.lang-active').on('click', function() {
      $(this).parent('.header-lang').toggleClass('open');
      $(this).next().fadeToggle();
    });
    $('.lang-box a').on('click', function() {
      $(this).parents('.header-lang').toggleClass('open');
      $(this).parents('.lang-box').fadeToggle();
    });
  });

  // lang close
  $(function() {
    isOpen = false;
    $('body').click(function() {
      if ($('.header-lang.open').length > 0){
        if (isOpen) {
          $('.lang-active').parent('.header-lang').removeClass('open');
          $('.lang-active').next().fadeOut();
        }
        isOpen = !isOpen;

      } else {
        isOpen = false;
      }
    });
  });

  // gnav width
  $(function() {
      var width = window.innerWidth;
      var point = 736;
      if (width > point) {
        var num = $('.area .header-nav li').length;
        var size = Math.floor(1260/num)-1;
        var lastsize = 1260-size*(num-1);
        $('.area .header-nav li').css('width', size);
        $('.area .header-nav li:last-child').css('width', lastsize);
      }
  });
  
  // stay mega menu
  $(function() {
    $('.header-nav li.stay > a').on('click', function() {
      $(this).toggleClass('active');
      $(this).next().fadeToggle();
      return false;
    });
    $('.header-nav li.stay .close').on('click', function() {
      $(this).parent().prev().removeClass('active');
      $(this).parent().fadeToggle();
      return false;
    });
    $(document).on('click touchend', function(event) {
      if (!$(event.target).closest('.stay-menu').length) {
        $('.header-nav li.stay a').removeClass('active');
        $('.stay-menu').hide();
      }
    });
    $('.header-nav li.mega01 > a').on('click', function() {
      $('.header-nav li.mega02 > a').removeClass('active');
      $('.header-nav li.mega02 > a').next().hide();
      return false;
    });
    $('.header-nav li.mega02 > a').on('click', function() {
      $('.header-nav li.mega01 > a').removeClass('active');
      $('.header-nav li.mega01 > a').next().hide();
      return false;
    });
  });

  // datepicker
  $(function() {

      var width = window.innerWidth;
      var point = 736;
      if (width <= point) {

      $('#datefrom,#dateto,#datefrom02,#dateto02').datepicker({
        numberOfMonths: 1,
        dateFormat: 'yy年mm月dd日(D)',
        showButtonPanel: true,
            beforeShow: function(input, inst) {
                var calendar = inst.dpDiv;
                setTimeout(function() {
                    calendar.position({
                        my: 'left top',
                        at: 'left-16px bottom+7px',
                        of: input,
                        //collision: 'none'
                    });
                }, 1);
            }
      });

      } else {

      $('.reserve-block #datefrom02,.reserve-block #dateto02').datepicker({
        numberOfMonths: 2,
        dateFormat: 'yy年mm月dd日(D)',
        showButtonPanel: true,
            beforeShow: function(input, inst) {
                var calendar = inst.dpDiv;
                setTimeout(function() {
                    calendar.position({
                        my: 'center bottom',
                        at: 'center top-7px',
                        of: input,
                        collision: 'none'
                    });
                }, 1);
            }
      });
      $('.header-reserve #datefrom,.header-reserve #dateto,.reserve-popup-cont #datefrom03,.reserve-popup-cont #dateto03').datepicker({
        numberOfMonths: 2,
        dateFormat: 'yy年mm月dd日(D)',
        showButtonPanel: true,
            beforeShow: function(input, inst) {
                var calendar = inst.dpDiv;
                setTimeout(function() {
                    calendar.position({
                        my: 'center top',
                        at: 'center bottom+3px',
                        of: input,
                        collision: 'none'
                    });
                }, 1);
            }
      });

      }

    $.datepicker.regional['ja'] = {
      closeText: '<i class="fa fa-times" aria-hidden="true"></i>',
      prevText: '<前',
      nextText: '次>',
      currentText: '今日',
      monthNames: ['1月','2月','3月','4月','5月','6月',
      '7月','8月','9月','10月','11月','12月'],
      monthNamesShort: ['1月','2月','3月','4月','5月','6月',
      '7月','8月','9月','10月','11月','12月'],
      dayNames: ['日曜日','月曜日','火曜日','水曜日','木曜日','金曜日','土曜日'],
      dayNamesShort: ['日','月','火','水','木','金','土'],
      dayNamesMin: ['日','月','火','水','木','金','土'],
      weekHeader: '週',
      dateFormat: 'yy/mm/dd',
      firstDay: 0,
      isRTL: false,
      showMonthAfterYear: true,
      yearSuffix: '年'};
    $.datepicker.setDefaults($.datepicker.regional['ja']);

    $('#datefrom,#dateto,#datefrom02,#dateto02,#datefrom03,#dateto03').datepicker().datepicker('setDate', 'today');

    $('#datefrom,#datefrom02,#datefrom03').on('click', function() {
      $('#ui-datepicker-div').removeClass('dateto').addClass('datefrom');
    });

    $('#dateto,#dateto02,#dateto03').datepicker().bind('click', function() {
      $('#ui-datepicker-div').removeClass('datefrom').addClass('dateto');
    });

    $('.header-reserve #datefrom,.header-reserve #dateto,.reserve-popup-cont #datefrom03,.reserve-popup-cont #dateto03').on('click', function() {
      $('#ui-datepicker-div').removeClass('reserve-datepicker').addClass('header-datepicker');
    });
    $('.reserve-block #datefrom02,.reserve-block #dateto02').on('click', function() {
      $('#ui-datepicker-div').removeClass('header-datepicker').addClass('reserve-datepicker');
    });

    if ( navigator.userAgent.indexOf('iPhone') > 0 ){
      $('.datepicker input').on('focus', function(){
          $(this).blur();
      });
    }
  });
  
  // only sp setting
  $(function(){
    var width = window.innerWidth;
    var point = 736;
    if (width <= point) {
      
      //accordion
      $('.sp-wedding-menu-head').on('click', function() {
        $(this).next().fadeToggle();
        $(this).toggleClass('active');
      });
      $('.bnr-block h3').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
      $('.refine-map-head h3').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
      $('.refine-brand-bottom h4').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
      $('.area-facility-block h5').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
      $('.mypage-menu h4').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
      
      //tab
      $('.p-tab-head .sp-active').addClass('active');
      
      //region
      //$('.hotel .region-block').insertAfter('.refine-list');
      
      //reserve
      //$('.room-num').insertAfter('.person-num');
      
      //popup
      $('.open-popup').magnificPopup({
        type:'inline',
        fixedContentPos: true
      });
      
      if($('.open-popup-cont').length){
        $('.open-popup').on('mfpOpen', function() {
          var opcHeight = $('.open-popup-cont').outerHeight(true),
              winHeight = window.innerHeight;
          if(opcHeight+50 > winHeight) {
            $('.mfp-close-bottom').css('position', 'static');
            $('.sp-tel-block').css('height', 'auto');
          } else {
            $('.mfp-close-bottom').css('position', 'absolute');
            $('.sp-tel-block').css('height', '100%');
          }
        });
        $('.open-popup').on('mfpClose', function() {
          $('.mfp-close-bottom').css('position', 'static');
          $('.sp-tel-block').css('height', 'auto');
        });
      }
      
      //facility
      $(".facility-head").on("click", function() {
        $(this).siblings('.facility-body').slideToggle();
        $(this).toggleClass('active');
      });
      
      //tab
      $('.p-tab-head .tab02').addClass('active');
      $('.refine-block #tab-body02').addClass('active');
      
      //sp-fixed-btn
      $('.sp-fixed-btn').hide();
      $(window).scroll(function () {
        if($(window).scrollTop() > 50) {
          $('.sp-fixed-btn').show();
        } else {
          $('.sp-fixed-btn').hide();
        }
      });

    } else {
      
      //only pc setting
      //header-fixed
      if($('header').hasClass('header-home')) {

        //alert
        if ($('.alart').length){
          var h = $('.alart').outerHeight();
          $('.header-home').css('top',h);
          $(window).scroll(function () {
            if($(window).scrollTop() > 768+h) {
              $('header').removeClass('header-home').addClass('header-move');
              $('header').show();
              $('.header-move').css('top',0);
            } else {
              $('header').removeClass('header-move').addClass('header-home');
              $("header").hide();
              $('.header-home').css('top',h);
              $('#mv-scroll-cont').css('padding-top','40px');
            }
          });
        } else {
          $(window).scroll(function () {
            if($(window).scrollTop() > 768) {
              $('header').removeClass('header-home').addClass('header-move');
              $('header').show();
            } else {
              $('header').removeClass('header-move').addClass('header-home');
              $("header").hide();
            }
          });
        }
        $('.mv-scroll').on('click', function() {
          var speed = 800;
          var target = $('#mv-scroll-cont');
          var position = target.offset().top;
          $('html, body').animate({scrollTop:position}, speed, 'swing');
          $(function(){
              setTimeout(function(){
                  target.css('padding-top','156px');
              },810);
          });
        });
        
      } else if($('body').hasClass('wedding') && $('.wedding-fix').length) {
        nav02 = $('.wedding-fix'), 
        offset02 = nav02.offset(),
        x = offset02.left,
        y = offset02.top;
        
        $(window).scroll(function () {
          if($(window).scrollTop() > y) {
            nav02.addClass('fixed').css('left',x+'px');
          } else {
            nav02.removeClass('fixed').css('left','');
          }
        });
      } else if($('body').hasClass('golf') && !$('body').hasClass('area') && $('.golf-fix').length && $('.header-fix').length) {
        nav04 = $('.header-fix'), 
        offset04 = nav04.offset(),
        y = offset04.top;
        
        $(window).scroll(function () {
          if($(window).scrollTop() > y) {
            $('.golf-fix').addClass('fixed');
          } else {
            $('.golf-fix').removeClass('fixed');
          }
        });
      } else if($('body').hasClass('area') && $('body').hasClass('ski') && $('.header-fix').length && $('.ski-fix').length) {
        nav03 = $('.ski-fix'), 
        offset03 = nav03.offset(),
        x = offset03.left,
        y = offset03.top;
        
        $(window).scroll(function () {
          if($(window).scrollTop() > y) {
            $('.header-fix').addClass('fixed').css('left',x+'px');
          } else {
            $('.header-fix').removeClass('fixed').css('left','');
          }
        });
      } else if(!$('body').hasClass('wedding') && $('.header-fix').length ) {
        var nav = $('.header-fix'),
        offset = nav.offset(),
        x = offset.left;
        $(window).scroll(function () {
          if($(window).scrollTop() > 17) {
            nav.addClass('fixed').css('left',x+'px');
          } else {
            nav.removeClass('fixed').css('left','');
          }
        });
      }

      
      //header-tel,reserve,login
      $('.header-tel > p').on('click', function() {
        $('.header-tel-cont').fadeToggle();
        $(this).parent().toggleClass('active');
        $('.header-reserve,.header-login').removeClass('active');
        $('.header-reserve-cont,.header-login-cont').hide();
      });
      $('.header-reserve > p').on('click', function() {
        $('.header-reserve-cont').fadeToggle();
        $(this).parent().toggleClass('active');
        $('.header-tel,.header-login').removeClass('active');
        $('.header-tel-cont,.header-login-cont').hide();
      });
      $('.header-login > p').on('click', function() {
        $('.header-login .header-login-cont').fadeToggle();
        $(this).parent().toggleClass('active');
        $('.header-tel,.header-reserve').removeClass('active');
        $('.header-tel-cont,.header-reserve-cont').hide();
      });
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.cv-link > p').length && !$(event.target).closest('.cv-cont').length && !$(event.target).closest('#ui-datepicker-div').length && !$(event.target).closest('.ui-datepicker-next').length && !$(event.target).closest('.ui-datepicker-prev').length) {
          $('.cv-link').removeClass('active');
          $('.cv-cont').hide();
        }
      });
      
      //wedding-menu
      $('.wedding-tel > p').on('click', function() {
        $('.wedding-tel-cont').fadeToggle();
        $(this).parent().toggleClass('active');
      });
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.wedding-tel').length) {
          $('.wedding-tel').removeClass('active');
          $('.wedding-tel-cont').fadeOut();
        }
      });
      
      //popup-menu
      /*$('.popup-menu > p').on('click', function() {
        $('.popup-menu-cont').fadeToggle();
        $(this).parent().toggleClass('active');
      });
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.popup-menu').length) {
          $('.popup-menu').removeClass('active');
          $('.popup-menu-cont').fadeOut();
        }
      });*/

      //golf-fix popup
      $('.golf-fix .tel > p').on('click', function() {
        $('.golf-tel-cont').fadeToggle();
        $(this).parent().toggleClass('active');
        $('.golf-fix .searchbox').removeClass('active');
        $('.golf-searchbox-cont').hide();
      });
      $('.golf-fix .searchbox > p').on('click', function() {
        $('.golf-searchbox-cont').fadeToggle();
        $(this).parent().toggleClass('active');
        $('.golf-fix .tel').removeClass('active');
        $('.golf-tel-cont').hide();
      });
      $(document).on('click touchend', function(event) {
        if (!$(event.target).closest('.popup-menu > p').length && !$(event.target).closest('.popup-menu-cont').length && !$(event.target).closest('#ui-datepicker-div').length && !$(event.target).closest('.ui-datepicker-next').length && !$(event.target).closest('.ui-datepicker-prev').length && !$(event.target).closest('.golf-reserve .date').length) {
          $('.popup-menu').removeClass('active');
          $('.popup-menu-cont').hide();
        }
      });


    }
  });
  
  //tab
  $(function(){
    $('.p-tab-head a').not('.map-btn a').click(function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      if (! $(target).length) return false;
      $('.tab', $(this).closest('.p-tab-head')).removeClass('active');
      $(this).closest('.tab').addClass('active');
      $('.box', $(target).closest('.p-tab-body')).removeClass('active');
      $(target).addClass('active');
    });
    $('.p-tab-head-lv01 a').not('.map-btn a').click(function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      if (! $(target).length) return false;
      $('.tab', $(this).closest('.p-tab-head-lv01')).removeClass('active');
      $(this).closest('.tab').addClass('active');
      $('.info-list-lv02', $(target).closest('.p-tab-body-lv01')).removeClass('active');
      $(target).addClass('active');
    });
    $('.golf-reserve .filter li a').click(function(e) {
      e.preventDefault();
      var index = $('.filter li a').index(this);
      $(this).parents('.filter').siblings('.select-cont').children('div').css('display','none');
      $('.select-cont div').eq(index).css('display','block');
      $(this).parent().siblings().removeClass('active');
      $(this).parent().addClass('active');
    });
  });

  //pagetop
  $(function(){
    $('a[href^=#]').not('.golf-reserve .filter li a,.mv-nav a,.slick-slider a,.tab a,.header a,#more-btn, .noScroll, .js-tab-trigger').on('click',function() {
      var speed = 800;
      var href= $(this).attr('href');
      var target = $(href == '#' || href == '' ? 'html' : href);
      var position = target.offset().top;
      $('html, body').animate({scrollTop:position}, speed, 'swing');
      return false;
    });
  });
  
  //accordion
  $(function(){
    $(".accordion-block dt:not('.no-cont')").on("click", function() {
      $(this).next().slideToggle();
      $(this).toggleClass('active');
    });
    $(".acc-head").on("click", function() {
      $(this).next().slideToggle();
      $(this).toggleClass('active');
    });
    $(".lv02-head").on("click", function() {
      $(this).children(".lv02").slideToggle();
      $(this).toggleClass('active');
    });
    var width = window.innerWidth;
    var point = 736;
    if (width <= point) {
      $(".room-search-form .meal span").on("click", function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
      });
    }
  });
  
  //pc popup
  $(function(){
    $('.open-popup').magnificPopup({
      type:'inline',
      fixedContentPos: true
    });
  });
  
  /* mv movie */
  $(function(){
    $('.movie .mv-msg').on('click', function(){
      videoControl('playVideo');
    });
    function videoControl(action){ 
      var $playerWindow = $('#mv-movie')[0].contentWindow;
      $playerWindow.postMessage('{"event":"command","func":"'+action+'","args":""}', '*');
    }
  });
  
  //slider slick
  //slick basic setting
  $(function(){
    $('.p-slider-type01').slick({
      dots: true,
      arrows: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/header_slider_prev_02.png" width="22" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/header_slider_next_02.png" width="22" alt="次へ"></a>'
    });
    
    $('.p-slider-type02').slick({
      dots: true,
      arrows: false
    });
    
    $(".sp-header-menu-btn").on("click", function() {
      $('.p-slider-type02').slick('setPosition');
    });
    
    $('.p-slider-type03').slick({
      dots: true,
      arrows: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });
    
    $('.p-slider-type04').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });
    var width = window.innerWidth;
    var point = 736;
    if (width <= point) {
      $('.p-slider-type05').slick({
        slidesToShow: 2,
        slidesToScroll: 2,
        dots: true,
        arrows: false
      });
    }
    
    $('.p-slider-type06').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });
    $('.p-slider-type07').slick({
      dots: true,
      arrows: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/header_slider_prev_02.png" width="22" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/header_slider_next_02.png" width="22" alt="次へ"></a>'
    });
    $('.p-slider-type08').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            centerMode: true,
            centerPadding: '15px',
          }
        }
      ]
    });
    $('.p-slider-type09').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/asset05_prev.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/asset05_next.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false
          }
        }
      ]
    });

    
    //slick setPosition setting
    $('.open-popup').on('click', function() {
      $('.p-slider-type01,.p-slider-type02,.p-slider-type07').slick('setPosition');
    });
    $('.tab').on('click', function() {
      $('.p-slider-type02').slick('setPosition');
      $('.p-acc-slider').slick('setPosition');
    });
    $('dt').on('click', function() {
      $('.p-slider-type01').slick('setPosition');
    });
    
    //slick custom setting
    $('.recommended-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '75px',
            arrows: false
          }
        }
      ]
    });
    if($('.p-asset01-slider').hasClass('type02')){
      var paddingSize = '15px';
    } else {
      var paddingSize = '75px';
    }
    $('.p-asset01-slider').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: paddingSize,
            arrows: false
          }
        }
      ]
    });
    $('.p-asset01-slider-02').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '25px',
            arrows: false
          }
        }
      ]
    });
    $('.p-asset01-slider-03').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '20px',
            arrows: false
          }
        }
      ]
    });
    $('.p-asset03-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '5px',
            arrows: false
          }
        }
      ]
    });
    $('.p-asset05-slider').slick({
      slidesToShow: 2,
      slidesToScroll: 2,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/asset05_prev.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/asset05_next.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            centerPadding: '16px',
            arrows: false
          }
        }
      ]
    });
  $(function(){
    var width = window.innerWidth;
    var point = 736;
    if (width <= point) {
      
    $('.p-asset08-slider .block').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '20px',
    });
    $('.p-asset09-slider .block').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '20px',
    });
    $('.service-slider-03').slick({
      dots: true,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '20px'
    });
    $('.wedding-instagram .right ul').slick({
      dots: false,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '80px',
    });
    $('.wedding-reason .block').slick({
      dots: true,
      arrows: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      centerPadding: '28px',
    });
    $('.golf-select-02.p-asset03').slick({
      dots: true,
      arrows: false,
      slidesToShow: 2,
      slidesToScroll: 1
    });
    }
  });

    $('.p-header-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      fade: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/header_slider_prev_02.png" width="22" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/header_slider_next_02.png" width="22" alt="次へ"></a>',
    });
    
    $('.p-hotel-header-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      fade: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/hotel/header_slider_prev.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/hotel/header_slider_next.png" alt="次へ"></a>',
    });
    
    $('.service-slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/header_slider_prev_02.png" width="22" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/header_slider_next_02.png" width="22" alt="次へ"></a>',
    });
    
    $('.service-slider-02').slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/asset05_prev.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/asset05_next.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            centerMode: true,
            centerPadding: '15px',
            arrows: false,
          }
        }
      ]
    });
    
    $('.bnr-slider').slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
            responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            centerMode: true,
            centerPadding: '15px',
            arrows: false,
          }
        }
      ]
    });
    
    $('.bnr-slider-col3').slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
            responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            
          }
        }
      ]
    });
    
    if($('.bnr-slider-col4').hasClass('type02')){
      var paddingSize = '15px';
    } else {
      var paddingSize = '0';
    }
    $('.bnr-slider-col4').slick({
      slidesToShow: 4,
      slidesToScroll: 4,
      dots: true,
      centerPadding: '50px',
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>',
            responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            arrows: false,
            centerMode: true,
            centerPadding: paddingSize,
          }
        }
      ]
    });
    
    $('.mv-slider').slick({
      autoplay: false,
      dots: true,
      arrows: false,
      fade: true,
      speed: 1500
    });
    /*$('.mv-slider02').slick({
      autoplay: true,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/hotel/header_slider_prev.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/hotel/header_slider_next.png" alt="次へ"></a>',
      fade: true,
      speed: 1500
    });*/
    $('.mv-slider02').slick({
      autoplay: true,
      arrows: false,
      prevArrow: '.mv-prev',
      nextArrow: '.mv-next',
      dots: true,
      appendDots: '.dots',
      fade: true,
      speed: 1500
    });
    $('.mv-prev').on('click', function (e) {
        e.preventDefault();
        $('.mv-slider02').slick('slickPrev');
    });
    $('.mv-next').on('click', function (e) {
        e.preventDefault();
        $('.mv-slider02').slick('slickNext');
    });
    /*$('.mv-slider02').slick({
      autoplay: true,
      dots: true,
      appendDots: '.dots',
      prevArrow: '.slick-prev',
      arrows: false,
      nextArrow: '.slick-next',
      fade: true,
      speed: 1500
    });*/

    $('.home .brand-slider,.ski-course .brand-slider').slick({
      dots: true,
      arrows: false,
    });
    $('.footer-bnr-slider').slick({
      slidesToShow: 5,
      slidesToScroll: 1,
      dots: true,
      prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_04.png" alt="前へ"></a>',
      nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_04.png" alt="次へ"></a>',
      responsive: [
        {
          breakpoint: 736,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: false,
            centerMode: true,
            centerPadding: '27%',
            prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/sp_slider_prev_02.png" alt="前へ"></a>',
            nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/sp_slider_next_02.png" alt="次へ"></a>',
          }
        }
      ]
    });
  });
  
  //acc-slider
  $(function(){
      var acSlider02 = $(".p-acc-slider").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/area/header_slider_prev_02.png" width="22" alt="前へ"></a>',
        nextArrow: '<a href="#" class="slick-next"><img src="/images_static/area/header_slider_next_02.png" width="22" alt="次へ"></a>'
        });
      $(".p-asset06 dt").on("click", function() {
        acSlider02.slick('setPosition');
      });
      $(".area-facility-block h5").on("click", function() {
        acSlider02.slick('setPosition');
      });
      var acSlider03 = $(".p-acc-slider02").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        prevArrow: '<a href="#" class="slick-prev"><img src="/images_static/common/slider_prev_03.png" alt="前へ"></a>',
        nextArrow: '<a href="#" class="slick-next"><img src="/images_static/common/slider_next_03.png" alt="次へ"></a>'
        });
      $(".p-asset06 dt").on("click", function() {
        acSlider03.slick('setPosition');
      });
  });

  $(function(){
      var width = window.innerWidth;
      var point = 736;
      if (width <= point) {
      var acSlider03 = $('.p-asset09-slider .block').slick({
        dots: true,
        arrows: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '20px',
      });
      $(".plan-meal-head").on("click", function() {
        $(this).next().slideToggle();
        $(this).toggleClass('active');
        acSlider03.slick('setPosition');
        $('.plan-meal .p-asset09 .menu').autoHeight({
          reset: 'reset',
          height: 'height'
        });
      });
    }
  });
  
  $(function(){
      var width = window.innerWidth;
      var point = 736;
      if (width > point) {
        $('.plan-meal .p-asset09 .menu').autoHeight();
    }
  });
  
  //popup
  $(function(){
    $('.magazine-open-popup').magnificPopup({
      type:'inline',
      items: {src: '#magazine-form-popup'}
    });
  });
  
  //p-help
  $(function () {
    $('.p-help-popup').hide();
    $('.p-help').on('click', function(){
      $(this).children('.p-help-popup').fadeToggle();
      $('.p-help-popup').not($(this).children()).hide();
    });
    $('.p-help .close').on('click', function(){
      $(this).children('.p-help-popup').fadeToggle();
    });
  });
  
  //info-search
  $(function () {
    $('.info-search-form .cat > p').on('click', function() {
      $('.cat-cont').fadeToggle();
      $(this).parent().toggleClass('active');
    });
  });
  
  //area header-menu
  $(function () {
    $('.header-menu-btn').on('click', function() {
      $('.header-menu-box').fadeToggle();
    });
    $(document).on('click touchend', function(event) {
      if (!$(event.target).closest('.header-menu-box').length && !$(event.target).closest('.header-menu-btn').length) {
        $('.header-menu-box').hide();
      }
    });
  });
  
  //autoheight common
  $(function () {
    $('.p-asset01 h3').not('.res-top .room-plan h3,.room-plan02 h3,.event-detail h3').autoHeight();
    $('.p-asset01 p').not('.p-asset01-cover p, .room-plan02 p,.event-detail p').autoHeight();
    $('.p-asset05 .text').autoHeight();
    $('.area-top-plan .copy').autoHeight();
    $('.room-plan02 h3').autoHeight();
    $('.room-plan02 .copy').autoHeight();
    $('.room-plan02 p').autoHeight();
    $('.area-top-service .service-slider-02 .text h3').autoHeight();
    $('.area-top-service .service-slider-02 .text p').autoHeight();
    $('.area-top-facil .service-slider-02 .text h3').autoHeight();
    $('.area-top-facil .service-slider-02 .text p').autoHeight();
    $('.plan-pickup .copy').autoHeight();
    $('.room-plan .copy').autoHeight();
    $('.stay-detail .p-asset08 .text p').autoHeight();
    $('.stay-detail .p-asset09 .name').autoHeight();
    $('.stay-detail .p-asset09 .menu').autoHeight();
    $('.stay-detail .p-asset09 .desc').autoHeight();
    $('.stay-detail .p-asset01 .copy').autoHeight();
    $('.res-top .res-plan .p-asset01 .copy').autoHeight();
    $('.res-top .room-plan .p-asset01 h3').autoHeight();
    $('.mypage-recinfo h3').autoHeight({reset:'reset'});
    $('.mypage-recinfo .box').autoHeight();
    $('.mypage-recplan h3').autoHeight({reset:'reset'});
    $('.mypage-recplan .box').autoHeight();
    $('.recommended-facil .service-slider-02 .text h3').autoHeight();
    $('.recommended-facil .service-slider-02 .text p').autoHeight();
    $('.event-block .bottom').autoHeight({column:2});
    $('.height-group01').autoHeight({reset:'reset'});
    $('.height-group02').autoHeight({reset:'reset'});
    $('.height-group03').autoHeight({reset:'reset'});
    $('.height-group04').autoHeight({reset:'reset'});
    $('.height-group05').autoHeight({reset:'reset'});
  });
  $(window).load(function(){
    $('.service-slider-03 .text').autoHeight();
  });
  
  //autoheight pc only
  $(function() {
    var width = window.innerWidth;
    var point = 736;
    if (width > point) {
      $(function () {
        $('.stay-top .price-list').autoHeight();
      });
      $(".room-list-cont dt").on("click", function() {
        $('.room-list-cont .p-asset06 .box').autoHeight({
          reset: 'reset',
          height: 'height',
          column: 2
        });
      });
      $(".res-shop .shop-data .tab").on("click", function() {
        $('.res-shop .p-asset12 .name').autoHeight({
          reset: 'reset',
          height: 'height',
          column: 2
        });
        $('.res-shop .p-asset12 .desc').autoHeight({
          reset: 'reset',
          height: 'height',
          column: 2
        });
      });
      $('.p-asset02 .middle .lead').autoHeight({column:2});
      $('.service-slider-wrap .text h3').autoHeight();
      $('.service-slider-wrap .text p').autoHeight();
      $('.stay-top .room-list-cont .desc').autoHeight();
      $('.stay-detail .p-asset10 .name').autoHeight();
      $('.stay-detail .p-asset10 .desc').autoHeight();
      $('.res-list-cont .p-asset02 .text').autoHeight({column:2});
      $('.res-list-cont .p-asset02 .middle').autoHeight({column:2});
      $('.res-shop .p-asset12 .name').autoHeight({column:2});
      $('.res-shop .p-asset12 .desc').autoHeight({column:2,height:'height'});
      $('.area-access-fun .bottom').autoHeight();
      $('.area-facility-block .bottom').autoHeight();
      $('.wedding-report-list #tab-body01 .middle').autoHeight();
      $('.wedding-report-list .tab').on("click", function() {
        $('.wedding-report-list #tab-body02 .middle').autoHeight();
      });
      $('.ski-course-status-cont .course-cont .area01 .body').autoHeight({column:2});
      $('.ski-course-status-cont .course-cont .area02 .body').autoHeight({column:2});
      $('.ski-course-status-cont .course-cont .area03 .body').autoHeight({column:2});
      $(".golf .golf-search dt").on("click", function() {
        $('.golf-search .refine-list .lead').autoHeight({column: 2});
        /*$('.golf-search .refine-list .tag').autoHeight({column: 2});*/
      });
    }
  });
  
  //slick-arrow
  $(function(){
    $('.slick-next').mousedown(function() {
      $(this).siblings('.slick-prev').css('opacity','.4');
    }).mouseup(function(){
      $('.slick-prev').css('opacity','1');
    });
  });
  
  //map
  if($('body').hasClass('.map')){
  var timer = false;
    $(window).resize(function() {
        if (timer !== false) {
            clearTimeout(timer);
        }
        timer = setTimeout(function() {
          $height = $('body').height() - $('.map .refine-map-body .info').height() - 60;
          $('#Map').css('height', $height);
        }, 200);
    });
  }

  //res-shop more
  $(function(){
    $('.res-shop .shop-plan .more a').click(function() {
      $('.p-tab-head li:first-child,#lv01-tab-body01').removeClass('active');
      $('.p-tab-head li:last-child,#lv01-tab-body02').addClass('active');
    });
  });
  
  //mypage
  var width = window.innerWidth;
  var point = 736;
  if (width < point) {
    $(function () {
      $('.mypage-club .num').each(function(){
        $(this).insertAfter($(this).parent('.right'));
      });
      $('.mypage-menu .h4-type01').each(function(){
        $(this).insertBefore($(this).parent('.box'));
      });
      $('.mypage-menu .box').wrapInner('<div class="bg"></div>');
    });
  }
  
  //ski course
  $(function () {
    $('.ski-course-status-head a').click(function(e) {
      e.preventDefault();
      var target = $(this).attr('href');
      if (! $(target).length) return false;
      $('.box', $(target).closest('.p-tab-body')).removeClass('active');
      $(target).addClass('active');
    });
    $('.ski-course-status-head a').click(function(e) {
      $('.ski-course-status-cont .tab').removeClass('active');
    });
    $('.ski-course-status-head .course a').click(function(e) {
      e.preventDefault();
      $('.ski-course-status-cont .course.tab').addClass('active');
    });
    $('.ski-course-status-head .lift a').click(function(e) {
      e.preventDefault();
      $('.ski-course-status-cont .lift.tab').addClass('active');
    });
    $('.ski-course-status-head .park a').click(function(e) {
      e.preventDefault();
      $('.ski-course-status-cont .park.tab').addClass('active');
    });
  });
  
  //object-fit
  $(function () {
    objectFitImages('.ofi');
  });
  
  //more
  
  $(function(){
    var n = $('.event-block .box').length;
    var Num = 12;
    $('.event-block .box:gt(11)').hide();
    if(n <= Num){
        $('#more-btn').hide();
    }
    $('#more-btn').click(function(){
        Num +=Num;
    $('.event-block .box:lt('+Num+')').fadeIn();
      if(n <= Num){
          $('#more-btn').hide();
      }
      return false;
    })
  });
  
  $(window).load(function(){
    $('.searchBox').attr("type", "text");
    $('.inputtext').attr("type", "text");
  });

})(jQuery);

/*
 * jquery-auto-height.js
 *
 * Copyright (c) 2010 Tomohiro Okuwaki (http://www.tinybeans.net/blog/)
 * Licensed under MIT Lisence:
 * http://www.opensource.org/licenses/mit-license.php
 * http://sourceforge.jp/projects/opensource/wiki/licenses%2FMIT_license
 *
 * Since:   2010-04-19
 * Update:  2013-08-16
 * version: 0.04
 * Comment:
 *
 * jQuery 1.2 <-> 1.10.2
 *
 */

 (function($){
    $.fn.autoHeight = function(options){
        var op = $.extend({

            column  : 0,
            clear   : 0,
            height  : 'minHeight',
            reset   : '',
            descend : function descend (a,b){ return b-a; }

        },options || {}); // optionsに値があれば上書きする

        var self = $(this);
        var n = 0,
            hMax,
            hList = new Array(),
            hListLine = new Array();
            hListLine[n] = 0;

        // 要素の高さを取得
        self.each(function(i){
            if (op.reset == 'reset') {
                $(this).removeAttr('style');
            }
            var h = $(this).height();
            hList[i] = h;
            if (op.column > 1) {
                // op.columnごとの最大値を格納していく
                if (h > hListLine[n]) {
                    hListLine[n] = h;
                }
                if ( (i > 0) && (((i+1) % op.column) == 0) ) {
                    n++;
                    hListLine[n] = 0;
                };
            }
        });

        // 取得した高さの数値を降順に並べ替え
        hList = hList.sort(op.descend);
        hMax = hList[0];

        // 高さの最大値を要素に適用
        var ie6 = typeof window.addEventListener == "undefined" && typeof document.documentElement.style.maxHeight == "undefined";
        if (op.column > 1) {
            for (var j=0; j<hListLine.length; j++) {
                for (var k=0; k<op.column; k++) {
                    if (ie6) {
                        self.eq(j*op.column+k).height(hListLine[j]);
                    } else {
                        self.eq(j*op.column+k).css(op.height,hListLine[j]);
                    }
                    if (k == 0 && op.clear != 0) {
                        self.eq(j*op.column+k).css('clear','both');
                    }
                }
            }
        } else {
            if (ie6) {
                self.height(hMax);
            } else {
                self.css(op.height,hMax);
            }
        }
    };
})(jQuery);


$(function() {
    $(".header-nav .stay-menu a").click(function() {
        location.href = $(this).attr("href")
    });
    $('.header-nav li.stay a').on('click', function() {
        var menu = this;
        $('.header-nav li.stay a').each(function (i, element){
            if (element != menu && $(element).hasClass('active')) {
                $(element).removeClass('active');
                $(element).next().hide();
            }
        });
        return false;
    });
})