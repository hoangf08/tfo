<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package actel
 */

?>

</div><!-- #content -->

<footer id="footer">
	<div class="con_inner flex jc-between ai-center sp-flex">
		<p class="logo"><a class="over" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/logo.png" alt="<?php bloginfo( 'name' ); ?>" width="227"></a></p>
		<div class="box_information flex jc-between">
			<div class="tel">
				<a class="flex ai-center" href="tel:0529628080">
					<span class="ic"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/ic_tel.svg" alt="TEL" width="25"></span>
					<span class="tel"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/txt_tel.svg" alt="052-962-8080" width="310"></span>
				</a>
			</div>
			<address>
				〒460-0003　名古屋市中区錦三丁目17-26
			</address>
		</div>
	</div>
	<div class="fnav">
		<div class="con_inner">
			<ul class="flex jc-between">
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>topics/">トピックス</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>guestroom/">客室</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>recommend/">おすすめポイント</a></li>
				<!--<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>restaurant/">レストラン</a></li>-->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>access/">アクセス</a></li>
<!-- 				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>contact/">お問合せ</a></li> -->
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>company/">会社概要</a></li>
				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>privacy/">プライバシーポリシー</a></li>
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>member_agreement/">会員規約</a></li>
<!-- 				<li><a href="<?php echo esc_url( home_url( '/' ) ); ?>sitemap/">サイトマップ</a></li> -->
			</ul>
		</div>
	</div>
	<p id="copyright">Copyright &copy; 2025 HOTEL ACTEL by All Rights Reserved.</p>
</footer>

<!--<div id="footer-btn-are" >
  <div class="footer-btn" >
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>member/"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/footer-img2.png" alt="予約するメリット" ></a>
  </div>-->
  <!-- <div class="footer-btn" >
    <a href="https://hotel-actel.com/topics/2019/05/22/%E5%85%AC%E5%BC%8F%E3%83%9B%E3%83%BC%E3%83%A0%E3%83%9A%E3%83%BC%E3%82%B8%E3%81%A7%E4%BA%88%E7%B4%84%E3%81%99%E3%82%8B%E3%83%A1%E3%83%AA%E3%83%83%E3%83%88/" ><img src="<?php bloginfo( 'template_url' ); ?>/images/common/footer-img.png" alt="予約するメリット" ></a>
  </div> -->
<!--</div>-->
</div><!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript"> var _fout_queue = _fout_queue || {}; if (_fout_queue.segment === void 0) _fout_queue.segment = {}; if (_fout_queue.segment.queue === void 0) _fout_queue.segment.queue = []; _fout_queue.segment.queue.push({ 'user_id': 29356 }); (function() { var el = document.createElement('script'); el.type = 'text/javascript'; el.async = true; el.src = (('https:' == document.location.protocol) ? 'https://' : 'http://') + 'js.fout.jp/segmentation.js'; var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(el, s); })(); </script>
	<?php if ( is_page(686) ) : ?>
		<script src="<?php bloginfo( 'template_url' ); ?>/js/faq.js"></script>
	<?php endif ?>
</body>
</html>
