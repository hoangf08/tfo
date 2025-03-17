<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package actel
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&family=Zen+Old+Mincho&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<link href="<?php bloginfo( 'template_url' ); ?>/css/default.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/common.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/slick.css" rel="stylesheet" type="text/css" media="all">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/style.css" rel="stylesheet" type="text/css" media="all">
	<?php if ( is_front_page() && is_home() ) : ?>
	<link href="<?php bloginfo( 'template_url' ); ?>/css/jquery.eislideshow.css" rel="stylesheet" type="text/css" media="all">
	<link href="<?php bloginfo( 'template_url' ); ?>/css/top.css" rel="stylesheet" type="text/css" media="all">
	<?php endif ?>
	<?php if ( is_page(686) ) : ?>
		<link href="<?php bloginfo( 'template_url' ); ?>/css/faq.css" rel="stylesheet" type="text/css" media="all">
	<?php endif ?>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.easing.1.3.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/common.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/search.js"></script>
  <script src="<?php bloginfo( 'template_url' ); ?>/js/tripla-search-plans.js"></script>
	<?php if ( is_front_page() && is_home() ) : ?>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery.eislideshow.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/top.js"></script>
	<?php endif ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-127389216-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
 
  gtag('config', 'UA-127389216-1');
</script>
  
<script src="https://tripla.jp/sdk/javascript/tripla.min.js" data-triplabot-code="71afbdb9e80cbf3992cb335bef8fe43b" data-triplabot-draggable="true"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="header">
		<div class="con_header">
			<div class="he_inner con_inner flex ai-center jc-between sp-flex">
				<div class="menu_header">
					<ul class="flex sp-flex">
						<li class="menu"><a class="trigger_menu btn_menu" href="javascript:void(0);"><img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/common/ic_menu.svg" alt="menu" width="20"><img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/common/ic_close.svg" alt="menu" width="20"></a></li>
					</ul>
				</div>
        <div class="menu_header2 view_sp">
          <ul class="flex sp-flex">
            <!--<li class="w109"><a href="http://tripla-hotel.com/?page_id=2545" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/login.svg" alt="ログイン"></a></li>-->
            <li class="w109"><a href="https://hotel-actel.com/?tripla_booking_widget_open=signUp" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/member_btn.svg" alt="無料会員登録"></a></li>
          </ul>
        </div>
			</div>
		</div>
    <div id="fixmenu-sp-wrap">
      <ul class="fixmenu-sp">
        <?php /*
        <li><a href="#" data-triplabot-open-message="1" ><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20190522/header-icon-tel.jpg" alt="電話" ></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>access/" class="bl"><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20190522/header-icon-map.jpg" alt="MAP"></a></li>
        <li><a href="javascript:void(0);" class="bl trigger_menu"><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20190522/header-icon-menu.jpg" alt="メニュー"></a></li>
        */ ?>
        <li><a href="tel:0529628080"><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20191127/header-icon-tel2.png" alt="電話" ></a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>access/" class="bl"><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20191127/header-icon-map2.png" alt="MAP"></a></li>
        <li><a href="javascript:void(0);" class="bl trigger_menu"><img class="fixmenu-icon" src="<?php bloginfo( 'template_url' ); ?>/images/header/20191127/header-icon-menu2.png" alt="メニュー"></a></li>
      </ul>
    </div>
    
    
		<nav class="gnav">
			<div class="wrap">
				<div class="con_inner">
					<ul class="flex">
            <li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_top.png" alt="トップ" width="60">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_top_o.png" alt="トップ" width="60">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>topics/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_topics.svg" alt="トピックス" width="70">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_topics_o.svg" alt="トピックス" width="70">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>guestroom/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_guestroom.svg" alt="客室" width="100">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_guestroom_o.svg" alt="客室" width="100">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>recommend/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_recommend.svg" alt="おすすめポイント" width="96">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_recommend_w.svg" alt="おすすめポイント" width="96">
							</a>
						</li>
						<!--<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>restaurant/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_restaurant.svg" alt="レストラン" width="96">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_restaurant_o.svg" alt="レストラン" width="96">
							</a>
						</li>-->
						<li class="large">
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>#lnk_gallery">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_gallery.svg" alt="フォトギャラリー" width="122">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_gallery_o.svg" alt="フォトギャラリー" width="122">
							</a>
						</li>
						<li class="small">
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>access/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_access.svg" alt="アクセス" width="56">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_access_o.svg" alt="アクセス" width="56">
							</a>
						</li>
<!-- 						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>#">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_contact.svg" alt="お問い合わせ" width="70">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_contact_o.svg" alt="お問い合わせ" width="70">
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<nav class="pc gnav">
			<div class="wrap">
				<div class="con_inner">
					<ul class="flex">
            <li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_top.png" alt="トップ" width="60">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_top_o.png" alt="トップ" width="60">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>topics/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_topics.svg" alt="トピックス" width="70">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_topics_o.svg" alt="トピックス" width="70">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>guestroom/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_guestroom.svg" alt="客室" width="100">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_guestroom_o.svg" alt="客室" width="100">
							</a>
						</li>
						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>recommend/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_recommend.svg" alt="おすすめポイント" width="96">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_recommend_w.svg" alt="おすすめポイント" width="96">
							</a>
						</li>
						<!--<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>restaurant/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_restaurant.svg" alt="レストラン" width="96">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_restaurant_o.svg" alt="レストラン" width="96">
							</a>
						</li>-->
						<li class="large">
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>#lnk_gallery">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_gallery.svg" alt="フォトギャラリー" width="122">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_gallery_o.svg" alt="フォトギャラリー" width="122">
							</a>
						</li>
						<li class="small">
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>access/">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_access.svg" alt="アクセス" width="56">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_access_o.svg" alt="アクセス" width="56">
							</a>
						</li>
<!-- 						<li>
							<a class="trigger_menu" href="<?php echo esc_url( home_url( '/' ) ); ?>#">
								<img class="d" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_contact.svg" alt="お問い合わせ" width="70">
								<img class="o" src="<?php bloginfo( 'template_url' ); ?>/images/header/gnav_contact_o.svg" alt="お問い合わせ" width="70">
							</a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<div class="headbox">
			<a href="https://hotel-actel.com/?tripla_booking_widget_open=search">
				<span>今予約する</span>
				<span>BOOK NOW</span>
			</a>
			<a href="https://hotel-actel.com/?tripla_booking_widget_open=signUp">
				<span>会員限定</span>
				<span>キャッシュバック</span>
			</a>
		</div>
	</header>

	

	<div id="content" class="site-content">
