<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package actel
 */

get_header();
?>

<div class="con_title">
	<h2 class="ttl"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/tl-member.png" alt="MEMBER" width="500"></span><span class="jp">会員募集</span></h2>
</div>

<div class="con_member">
  <section class="box_member">
     <h3 class="mincho">メンバーズ会員のご案内</h3>
      <div class="m-pic2"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-tittle.png" alt="無料会員登録はこちらから"></div>
		</section>
  <section class="box_member2">
      <div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-pic1.png" alt="会員募集１"></div>
      <!--<div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-arrow.png" alt="矢印" class="arrow"></div>-->
      <div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-pic2.png" alt="会員募集２"></div>
      <!--<div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-arrow.png" alt="矢印" class="arrow"></div>-->
      <div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-pic3.png" alt="会員募集３"></div>
      <div class="m-pic3"><a href="https://hotel-actel.com/?tripla_booking_widget_open=signUp " target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-pic1-button.png" alt="無料会員登録はこちらから"></a></div>
      <div class="m-pic"><img src="<?php bloginfo( 'template_url' ); ?>/images/member/member-pic4.png" alt="初回限定"></div>
		</section>
</div>

<?php
get_footer();
