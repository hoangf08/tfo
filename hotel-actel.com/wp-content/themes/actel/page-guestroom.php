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
	<h2 class="ttl"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/st_guestroom.svg" alt="GUEST ROOM" width="368"></span><span class="jp">ゲストルーム</span></h2>
</div>

<div class="con_guestroom_list">
	<div class="con_inner">
		<div class="wrp">
			<div class="box_guestroom">
				<div class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/img_deluxetwin.jpg" alt="DELUXE TWIN ROOM"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/st_deluxetwinroom.svg" alt="DELUXE TWIN ROOM" width="398"></span></div>
				<h3 class="st_mid">デラックスツインルーム【禁煙】</h3>
				<p class="txt">
					25㎡～/独立式バス・トイレ<br>
					デラックスツインルームはシモンズ製6.5ピロートップの120㎝幅シングルベット×２をご用意、ゆとりをもった室内空間をご利用いただけます。バス・トイレ・洗面は分離、50インチ液晶テレビ・ソファーとテーブルも設置した、部屋で過ごす時間も楽しめるワイドツインのお部屋です。<br>
					※Wi-Fi接続サービス（無料）・VOD（ビデオオンデマンド）・加湿機能付空気清浄機を全室導入しております。
				</p>

				<p class="btn gold"><a href="deluxetwin/">詳細はこちら<i class="icon-angle-right-double"></i></a></p>
			</div>

			<div class="box_guestroom">
				<div class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/img_twin.jpg" alt="TWIN ROOM"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/st_twin.svg" alt="TWIN ROOM" width="240"></span></div>
				<h3 class="st_mid">ツインルーム【禁煙】</h3>
				<p class="txt">
					約19㎡～/独立式バス・トイレ<br>
					ツインルームはお一人ごと快適に過ごしていただけますように、シモンズ製6.5ピロートップの120㎝幅シングルベット×２を採用しております。バス・トイレ・洗面を独立させ50インチ液晶テレビを設置した、お互いに気をつかわず空間共有していただけるツインタイプのお部屋です。<br>
					※Wi-Fi接続サービス（無料）・VOD（ビデオオンデマンド）・加湿機能付空気清浄機を全室導入しております。
				</p>

				<p class="btn gold"><a href="twin/">詳細はこちら<i class="icon-angle-right-double"></i></a></p>
			</div>

			<div class="box_guestroom">
				<div class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/img_double.jpg" alt="DOUBLE ROOM"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/st_double.svg" alt="DOUBLE ROOM" width="298"></span></div>
				<h3 class="st_mid">ダブルルーム【禁煙】</h3>
				<p class="txt">
					約16㎡～/ユニット式バス・トイレ<br>
					ダブルルームはシモンズ製6.5ピロートップのクイーンサイズベッドをご用意しました。お二人でも余裕をもってご利用いただけるサイズとなっております。40インチ液晶テレビをお部屋に備え快適に使えるダブルタイプのお部屋です。<br>
					※Wi-Fi接続サービス（無料）・VOD（ビデオオンデマンド）・加湿機能付空気清浄機を全室導入しております。
				</p>

				<p class="btn gold"><a href="double/">詳細はこちら<i class="icon-angle-right-double"></i></a></p>
			</div>

			<div class="box_guestroom">
				<div class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/img_single.jpg" alt="SINGLE ROOM"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/st_single.svg" alt="SINGLE ROOM" width="282"></span></div>
				<h3 class="st_mid">シングルルーム【禁煙】</h3>
				<p class="txt">
					約13㎡～/ユニット式バス・トイレ<br>
					シングルルームはシモンズ製6.5ピロートップのダブルサイズベッドをご用意、ひとつ上の寝心地をご提供いたします。40インチ液晶テレビをお部屋に備え機能的に使えるシングルタイプのお部屋です。<br>
					※Wi-Fi接続サービス（無料）・VOD（ビデオオンデマンド）・加湿機能付空気清浄機を全室導入しております。
				</p>

				<p class="btn gold"><a href="single/">詳細はこちら<i class="icon-angle-right-double"></i></a></p>
			</div>

<!-- 			<div class="box_guestroom">
				<div class="img"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/img_universaltwin.jpg" alt="UNIVERSAL TWIN ROOM"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/guestroom/st_universaltwinroom.svg" alt="UNIVERSAL TWIN ROOM" width="446"></span></div>
				<h3 class="st_mid">ユニバーサルツインルーム【禁煙】</h3>
				<p class="txt">
					約24㎡～/専用手すり付きバス・トイレ<br>
					ユニバーサルツインルームは、シモンズ製6.5ピロートップの110㎝幅シングルベッド×２、専用のバス・トイレなど、高齢者や車椅子をご利用のお客様に快適にお過ごしいただけるよう、工夫をこらし機能的な50インチ液晶テレビを備えたツインタイプのお部屋です。<br>
					※Wi-Fi接続サービス（無料）・VOD（ビデオオンデマンド）・加湿機能付空気清浄機を全室導入しております。
				</p>

				<p class="btn gold"><a href="universaltwin/">詳細はこちら<i class="icon-angle-right-double"></i></a></p>
			</div> -->
		</div>
	</div>
</div>

<?php
get_footer();
