<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package actel
 */

get_header();
?>
<div class="sp-logo">
	<img src="<?php bloginfo('template_url'); ?>/images/common/logo00.png" alt="HOTEL ACTEL ホテル アクテル名古屋錦">
</div>
<div class="con_main">
	<!--
	<div id="ei-slider" class="ei-slider">
		<ul class="ei-slider-large">
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main01.jpg" alt="メインイメージ1">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main02.jpg" alt="メインイメージ2">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main03.jpg" alt="メインイメージ3">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main04.jpg" alt="メインイメージ4">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main05.jpg" alt="メインイメージ5">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main06.jpg" alt="メインイメージ6">
			</li>
			<li>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main07.jpg" alt="メインイメージ7">
			</li>
		</ul>
		<ul class="ei-slider-thumbs">
			<li class="ei-slider-element">Current</li>
			<li>
				<a href="#">Slide 1</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main01.jpg" alt="サムネイル1">
			</li>
			<li>
				<a href="#">Slide 2</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main02.jpg" alt="サムネイル2">
			</li>
			<li>
				<a href="#">Slide 3</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main03.jpg" alt="サムネイル3">
			</li>
			<li>
				<a href="#">Slide 4</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main04.jpg" alt="サムネイル4">
			</li>
			<li>
				<a href="#">Slide 5</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main05.jpg" alt="サムネイル5">
			</li>
			<li>
				<a href="#">Slide 6</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main06.jpg" alt="サムネイル6">
			</li>
			<li>
				<a href="#">Slide 7</a>
				<img src="<?php bloginfo('template_url'); ?>/images/home/img_main07.jpg" alt="サムネイル7">
			</li>
		</ul>
	</div>
-->
	<div class="mv">
		<div id="ei-slider" class="ei-slider" dir="rtl">
			<ul class="ei-slider-large">
				<li>
					<img src="<?php bloginfo('template_url'); ?>/images/home/lobby_08.jpg" alt="ロビー">
				</li>
				<li>
					<img class="pc" src="<?php bloginfo('template_url'); ?>/images/home/mv03.jpg" alt="メインイメージ1">
					<img class="sp" src="<?php bloginfo('template_url'); ?>/images/home/mv04.jpg" alt="メインイメージ1">
				</li>
				<li>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main07.jpg" alt="メインイメージ7">
				</li>
				<li>
					<img class="pc" src="<?php bloginfo('template_url'); ?>/images/home/img_main03.jpg" alt="メインイメージ3">
					<img class="sp" src="<?php bloginfo('template_url'); ?>/images/home/img_main03_sp.jpg" alt="メインイメージ3">
				</li>
				<li>
					<img class="pc" src="<?php bloginfo('template_url'); ?>/images/home/img_main06.jpg" alt="メインイメージ6">
					<img class="sp" src="<?php bloginfo('template_url'); ?>/images/home/img_main06_sp.jpg" alt="メインイメージ6">
				</li>
				<li>
					<img class="pc" src="<?php bloginfo('template_url'); ?>/images/home/img_main09.jpg" alt="メインイメージ5">
					<img class="sp" src="<?php bloginfo('template_url'); ?>/images/home/img_main09_sp.jpg" alt="メインイメージ5">
				</li>
				<li><a href="">
					<img class="pc" src="<?php bloginfo('template_url'); ?>/images/home/img_main04.jpg" alt="メインイメージ4">
					<img class="sp" src="<?php bloginfo('template_url'); ?>/images/home/img_main04_sp.jpg" alt="メインイメージ4">
				</a></li>
			</ul>
			<ul class="ei-slider-thumbs">
				<li class="ei-slider-element">Current</li>
				<li>
					<a href="#">Slide 1</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/lobby_08.jpg" alt="サムネイル1">
				</li>
				<li>
					<a href="#">Slide 2</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/mv03.jpg" alt="サムネイル2">
				</li>
				<li>
					<a href="#">Slide 3</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main07.jpg" alt="サムネイル3">
				</li>
				<li>
					<a href="#">Slide 4</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main03.jpg" alt="サムネイル4">
				</li>
				<li>
					<a href="#">Slide 5</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main06.jpg" alt="サムネイル5">
				</li>
				<li>
					<a href="#">Slide 6</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main09.jpg" alt="サムネイル6">
				</li>
				<li>
					<a href="#">Slide 7</a>
					<img src="<?php bloginfo('template_url'); ?>/images/home/img_main04.jpg" alt="サムネイル7">
				</li>
			</ul>
		</div>
		<!--
		<div class="inbox">
			<img src="<?php bloginfo('template_url'); ?>/images/common/logo00.png" alt="HOTEL ACTEL ホテル アクテル名古屋錦">
			<p>名古屋。にぎわい煌めく<br class="sp">街の旅を楽しむ。<span>磨かれ続ける歴史と文化が息づく、名古屋の街で、心豊かな時の記憶を奏でる。</span></p>
		</div>
		-->
	</div>
</div>


<section class="con_topics">
	<div class="con_inner">
		<div id="search-bar">
		</div>
		<p class="btn-blue btn01 btn00"><a class="small" href="member_agreement/">会員規約<span>membership agreement</span></a></p>
		<p style="text-align: center; padding-top: 10px; font-weight: bold;"><b>2019年10月31日 17時00分より予約システムを変更しております。</b></p>
		<p style="text-align: center;">※2019年10月31日 17時00分までにご予約されたお客様のご予約の変更、キャンセルは下記よりご確認ください。</p>
		<div class="yoyaku_btn view_pc">
			<div class="yoyaku_btn_left">
				<a href="https://www.489pro.com/asp/489/henkou_login.asp?yaid=23000060&lan=JPN" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/common/change_btn.png" alt="チェンジ">
				</a>
			</div>
			<div class="yoyaku_btn_right">
				<a href="https://www.489pro.com/asp/489/cancel_login.asp?yaid=23000060&lan=JPN" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/common/cancel_btn.png" alt="キャンセル">
				</a>
			</div>
		</div>
		<div class="yoyaku_btn view_sp">
			<div class="yoyaku_btn_left">
				<a href="https://www.489pro.com/asp/489/henkou_login.asp?yaid=23000060&lan=JPN&sp=YES" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/common/change_btn.png" alt="チェンジ">
				</a>
			</div>
			<div class="yoyaku_btn_right">
				<a href="https://www.489pro.com/asp/489/cancel_login.asp?yaid=23000060&lan=JPN&sp=YES" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/common/cancel_btn.png" alt="キャンセル">
				</a>
			</div>
		</div>
	</div>
	<!--
  <div class="pdf en">
	<a href="">Information on the 6th anniversary plan<span>【期間限定】6周年プランのご案内</span></a>
  </div>
-->

<section class="con_info con_topics">
	<div class="con_inner">
		<h2 class="st_high"><span class="en">Information</span><span>お知らせ</span></h2>
		<div class="wrap_post">
			<?php query_posts('posts_per_page=10'); ?>
			<?php if (have_posts()) : ?>
				<ul>
					<?php while (have_posts()) : the_post(); ?>
						<li>
							<a href="<?php echo esc_url(get_permalink()); ?>" rel="bookmark">
								<p class="date"><?php echo get_the_date(); ?></p>
								<?php
								$cat = get_the_category();
								$cat_name = $cat[0]->cat_name;
								if ($cat[0]->slug == 'important') {
									$cat_important = ' cate-important';
								} else {
									$cat_important = '';
								}
								?>
								<p class="cate<?php echo $cat_important; ?>"><span><?php echo $cat_name; ?></span></p>
								<?php the_title('<p class="title">', '</p>'); ?>
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			<?php
			else :
				get_template_part('template-parts/content', 'none');
			endif;
			?>
		</div>
		<p class="btn00"><a class="small" href="topics/">お知らせ一覧</a></p>
	</div>
</section>

	<div class="mv02">
		<img src="<?php bloginfo('template_url'); ?>/images/home/mv02.jpg" alt="名古屋城">
		<div class="txtbox">
			<p class="txt01">歴史とアート感じ、食べ歩きも思いのまま。<br>栄錦通りに向き合うにぎわいの中心で、<br>暮らすようにステイをする。</p>
			<p class="txt02">名古屋駅から栄へと中心部を走り抜ける錦通り。<br>この通りに向き合い、多くの飲食店やファッションビルが立ち並ぶ<br>にぎやかな繁華街・錦エリアのステイで名古屋の街を楽しみ尽くす。</p>
		</div>
		<div class="txtbox02 en">NAGOYA NISHIKI</div>
	</div>
</section>

<?php

$args = array(
	'numberposts' => 3,
	'category_name' => 'sale'
);
$sale_list = get_posts($args);

if ($sale_list) { ?>
	<div id="sale-list" class="con_inner">
		<?php foreach ($sale_list as $sale) {  ?>
			<div class="element">
				<?php if (has_post_thumbnail($sale->ID)) { ?>
					 <div class="sale-pic pic"><a href="<?php echo get_post_meta($sale->ID, 'saleurl', true); ?>" target="_blank"><img src="<?php echo get_the_post_thumbnail_url($sale->ID, 'full') ?>" alt="<?php echo esc_attr(get_the_title($sale->ID)) ?>"></a></div>
				<?php } else { ?>
					<div class="sale-pic pic"></div>
				<?php } ?>
				<h4 class="sale-title"><a href="<?php echo get_post_meta($sale->ID, 'saleurl', true); ?>" target="_blank"><?php echo esc_html($sale->post_title) ?></a></h4>
				<p class="sale-catchcopy"><?php echo esc_html($sale->post_content) ?></p>
			</div>
		<?php  } ?>
	</div>
<?php } ?>

<?php /*
<p class="bn_open con_inner"><a class="over" target="_blank" href="https://www.489pro.com/asp/489/menu.asp?id=23000060&lan=JPN&ty=ser&m_menu=1&dt=3"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/bn_open.png" alt="SPRING SPECIAL SALE"></a></p>
*/ ?>

<section class="con_points guestroom">
	<div class="inner_guest con_inner flex sp-flex">
		<div class="box_image">

			<!-- sliderナビゲーション追加部分（クラス名のみ追加） -->
			<div class="box_slide box_slide1">
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom01.jpg" alt="客室"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom02.jpg" alt="客室"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom03.jpg" alt="客室"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom04.jpg" alt="客室"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom05.jpg" alt="客室"></div>
			</div>
		</div>
		<div class="box_content">
			<h2 class="st_high"><span class="en">Guest Rooms</span><span class="jp">客室</span></h2>
			<p class="txt">
				シモンズベッド全室導入、シングルルーム140cm幅・ダブルルーム160cm幅のベッドをご用意。身体への負荷をさらに分散、一段階上の眠りをお届けします。ぜひ極上の目覚めを体験してください。<br>
				そしてご家族連れの方にご案内します、小学生のお子様は添い寝無料でお泊りいただけます。1ベッドにお子様１名添い寝可能ですのでご利用下さいませ。
			</p>

			<p class="btn00"><a class="small" href="guestroom/">客室詳細</a></p>
		</div>
	</div>

	<!-- sliderナビゲーション追加部分 -->
	<div class="box_slide_nav1">
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom01.jpg" alt="客室"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom02.jpg" alt="客室"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom03.jpg" alt="客室"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom04.jpg" alt="客室"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_guestroom05.jpg" alt="客室"></div>
	</div>

</section>

<section class="con_points facility">
	<div class="inner_guest con_inner flex sp-flex">
		<div class="box_image flex-order-2">

			<!-- sliderナビゲーション追加部分（クラス名のみ追加） -->
			<div class="box_slide box_slide2">
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility01.jpg" alt="館内施設"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility02.jpg" alt="館内施設"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/facility/facility02.jpg" alt="館内施設"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/facility/facility01.jpg" alt="館内施設"></div>
				<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility05.jpg" alt="館内施設"></div>
			</div>
		</div>
		<div class="box_content">
			<h2 class="st_high"><span class="en">Facility</span><span class="jp">館内施設</span></h2>
			<p class="txt">
			３階ロビーにて宿泊者無料のコーヒーサーバーがございます。ホット・アイスのブレンド・カフェラテ・カフェモカ、そしてココアがご利用いただけます。アメニティバーは、様々なアイテムを取り揃えており、ご自由にご利用いただけます。各フロアWi-Fiがご利用頂けます。無線LAN対応PCやスマートホン、タブレットもお部屋で簡単につながり、快適な接続環境でご利用いただけます。
			</p>

			<p class="btn00"><a class="small" href="recommend/">館内施設</a></p>
		</div>
	</div>

	<!-- sliderナビゲーション追加部分 -->
	<div class="box_slide_nav2">
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility01.jpg" alt="館内施設"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility02.jpg" alt="館内施設"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/facility/facility02.jpg" alt="館内施設"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/facility/facility01.jpg" alt="館内施設"></div>
		<div class="slide"><img src="<?php bloginfo('template_url'); ?>/images/home/img_facility05.jpg" alt="館内施設"></div>
	</div>
</section>

<section class="con_points refa">
	<div class="inner_guest con_inner flex sp-flex">
		<div class="box_image flex-order-2">
			<div class="img00">
				<img src="<?php bloginfo('template_url'); ?>/images/home/refa.jpg" alt="Refa">
				<div class="txtbox">
					「10秒エステ」としてCMでも話題の<br class="sp">「リファファインバブル ピュア」
				</div>
			</div>
		</div>
		<div class="box_content">
			<div class="comme">
				<p>デラックスツインルームのみ<br class="sp">ドライヤー・ストレートアイロン完備</p>
			</div>
			<h2 class="st_high"><span class="en">ReFa</span><span class="jp">シャワーヘッド全客室完備</span></h2>
			<p class="txt">
				「10秒エステ」としてCMでも話題の「リファファインバブル ピュア」<br>敏感な肌のことを考え抜いたシャワーヘッドでエステのようなバスタイムを旅先でお楽しみいただけます。
			</p>
			
		</div>
	</div>
</section>
<section class="con_points shop">
	<div class="inner_guest con_inner flex sp-flex">
		<div class="box_image flex-order-2">
			<div class="flex-shop img00">
				<a href="https://www.hotpepper.jp/strJ003341357/" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/home/shop01.jpg" alt="Gourmet">
				</a>
				<a href="https://www.hotpepper.jp/strJ001251559/" target="_blank">
					<img src="<?php bloginfo('template_url'); ?>/images/home/shop02.jpg" alt="Gourmet">
				</a>
			</div>
		</div>
		<div class="box_content">
			<h2 class="st_high"><span class="en">Gourmet</span><span class="jp">テナント飲食店</span></h2>
			<p class="txt">
			B1に酒場を再現しました空間は、日ごろの疲れを癒す、どこかアットホームな感じもする雰囲気は、他にはない魅力といえます。民本店は、料理長自慢の「大葉入り 視線麻婆豆腐」、広々とした店内には、大きな回転テーブルをご用意いたしております。天ぷらとレモンサワーのぱちぱち屋は、開放感ある店内でリーズナブルに和食を楽しめます。
			</p>
		</div>
	</div>
</section>

<?php /* <section class="con_points restaurant">
	<div class="con_inner flex sp-flex">
		<div class="box_image">
			<div class="box_slide">
				<div class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/img_restaurant01.jpg" alt="レストラン"></div>
				<div class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/img_restaurant02.jpg" alt="レストラン"></div>
				<div class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/img_restaurant03.jpg" alt="レストラン"></div>
				<div class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/img_restaurant04.jpg" alt="レストラン"></div>
				<div class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/img_restaurant05.jpg" alt="レストラン"></div>
			</div>
		</div>
		<div class="box_content">
			<h2 class="st_high"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/home/st_restaurant.svg" alt="RESTAURANT" width="374"></span><span class="jp">レストラン</span></h2>
			<p class="txt">
				B1・1～2Fはレストランフロアになっており、様々な種類の店舗をご準備してお待ちしています。<br>
				サムギョプサル専門店「BUTAMAJIN」、餃子＆ビアバー「ChaoVia」、ダーツ＆カラオケ「MEE NAGOYA」。<br>
				これらの店舗にお部屋のカードキーをお見せいただくと、1ドリンクサービス（ビア＆カクテル）しておりますぜひご利用くださいませ。
			</p>

			<p class="btn"><a class="small" href="restaurant/">レストランのご紹介</a></p>
		</div>
	</div>
</section> */ ?>

<div class="sec-flex">
	<section class="con_gallery" id="lnk_gallery">
		<div class="con_inner">
			<h2 class="st_high"><span class="en"><img src="<?php bloginfo('template_url'); ?>/images/home/st_gallery.svg" alt="PHOTO GALLERY" width="377"></span><span class="jp">フォトギャラリー</span></h2>
			<p class="img"><?php echo do_shortcode('[instagram-feed feed=1]'); ?></p>
			<!--<p class="img"><?php echo do_shortcode('[instagram-feed feed=1 num=10 cols=5 showheader=false showbutton=false showfollow=false]'); ?></p>-->
		</div>
	</section>
	<a class="inbox" href="https://www.nagoya-info.jp/" target="_blank" rel="noopener noreferrer">
		<img class="bg" src="<?php bloginfo('template_url'); ?>/images/home/concierge.jpg" alt="名古屋コンシェルジュ">
		<img class="logo" src="<?php bloginfo('template_url'); ?>/images/home/concierge.png" alt="名古屋コンシェルジュ">
		<div class="txtbox">Sightseeing<span>【公式】名古屋市観光情報「名古屋コンシェルジュ」</span></div>
	</a>
</div>
<section class="con_points g-map">
	<div class="inner_guest con_inner flex sp-flex">
		<div class="box_image">
			<div class="box_map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13045.963166604211!2d136.89856973751228!3d35.16931815323948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdf998bef3e21dee0!2zSG90ZWwgQUNURUwg5ZCN5Y-k5bGL6Yym!5e0!3m2!1sja!2sth!4v1531306545718" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
		</div>
		<div class="box_content">
			<h2 class="st_high"><span class="en">Access</span><span class="jp">アクセス</span></h2>
			<p class="txt">
				活気ある栄町に向き合い、綺麗な美しさと豊かな日常に出会う街歩きは、自分だけの発見に満ちた喜びの時間。<br>交通アクセスにも優れた宿は、心強い旅の拠点です。
			</p>

			<p class="btn00"><a class="small" href="access/">アクセス詳細</a></p>
		</div>
	</div>
</section>

<!--
<section class="con_access" id="lnk_access">
	<div class="con_inner">
		<h2 class="st_high"><span class="en"><img src="<?php bloginfo('template_url'); ?>/images/common/st_access.svg" alt="ACCESS" width="178"></span><span class="jp">アクセス</span></h2>
		<div class="box_map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13045.963166604211!2d136.89856973751228!3d35.16931815323948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdf998bef3e21dee0!2zSG90ZWwgQUNURUwg5ZCN5Y-k5bGL6Yym!5e0!3m2!1sja!2sth!4v1531306545718" width="960" height="680" frameborder="0" style="border:0" allowfullscreen></iframe></div>
		<dl>
			<dt>◆新幹線・JRでのアクセス</dt>
			<dd>「名古屋駅」よりタクシーで約10分。「名古屋駅」より地下鉄東山線「栄駅」下車、西改札口より1番出口に向かい西へ徒歩1分</dd>
		</dl>
		<dl>
			<dt>◆地下鉄でのアクセス</dt>
			<dd>地下鉄東山線「栄駅」下車、西改札口より1番出口に向かい西へ徒歩1分</dd>
		</dl>
		<dl>
			<dt>◆飛行機でのアクセス</dt>
			<dd>
				中部国際空港（セントレア）より、タクシーで約６０分。中部国際空港より「セントレアリムジン」が運行。「栄」で下車してください。<br>
				所要時間：約６０分　運賃（片道）：大人１３００円　子供６５０円<br>
				お車でのアクセス<br>
				東名高速「名古屋インター」から約３０分
			</dd>
		</dl>
		<dl>
			<dt>◆提携駐車場</dt>
			<dd>
				ジャンボパーキング（自走式立体駐車場）：名古屋市中区錦3-8-5　TEL.052-972-0505<br>
				・先着順（ご予約不可）<br>
				・ご一泊料金（15：00～翌11：00）：2,000円<br>
				・途中出庫はその都度料金が発生します。<br>
				・連泊でご利用時には日中時間に別料金が発生します。（11時～15時で打ち切り料金1500円）<br>
				※1泊目・1枚目の購入券　＞　2日目の昼、現地支払分料金　＞　2泊目・2枚目の購入券<br>
				・連泊でご利用のお客様へ<br>
				　日中11：00～15：00までの間も、お車をそのままお停めいただけますが、30分ごと250円の別途料金が<br>
				　出庫時に加算されますのでご了承ください。15：00以降は２泊目以降の宿泊駐車サービスが適用されます。<br>
				※「宿泊駐車サービス引換券」をご購入いただきますので、駐車券をフロントにてご提示ください。<br>
				※提携駐車場が満車の場合は、近隣のコインパーキングへ駐車をお願い致します。
			</dd>
		</dl>
	</div>
</section>
		-->
<div class="key-box">
	<div class="con_inner">
		<h2>名古屋栄・名古屋駅周辺エリア（ホテルアクテル・錦近く）</h2>
		<p>栄/錦/ホテル/栄1番出口から徒歩2分/オアシス21まで徒歩10分/サンシャイン栄まで徒歩3分/<br>名古屋駅まで電車（地下鉄東山線）10分・タクシー約10分/<br>バンテリンドームまで電車（地下鉄名城線）約35分・タクシー約20分/<br>ReFaシャワーヘッド完備/ReFa製品貸出しOK/シモンズベッド/女性専用フロア/アメニティーバー/手ぶらでOK/<br>美味切符プラン/ウェルカムドリンク</p>
	</div>
</div>


<?php
get_footer();
?>