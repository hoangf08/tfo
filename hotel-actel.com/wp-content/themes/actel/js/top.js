$(function() {
  
	$('#ei-slider').eislideshow({
		
		autoplay			: true,
		
	});

	// sliderナビゲーション追加変更部分
	
  $(".con_points .box_slide1").slick({
    arrows: false,
    autoplay: true,
    speed: 1000,
    asNavFor: ".box_slide_nav1",
  });
  $(".box_slide_nav1").slick({
    arrows: false,
    slidesToShow: 5,
    asNavFor: ".con_points .box_slide1",
    focusOnSelect: true,
  });
  $(".con_points .box_slide2").slick({
    arrows: false,
    autoplay: true,
    speed: 1000,
    asNavFor: ".box_slide_nav2",
  });
  $(".box_slide_nav2").slick({
    arrows: false,
    slidesToShow: 5,
    asNavFor: ".con_points .box_slide2",
    focusOnSelect: true,
  });
});