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
	<h2 class="ttl"><span class="en"><img src="<?php bloginfo( 'template_url' ); ?>/images/common/st_restaurant.svg" alt="RESTAURANT" width="337"></span><span class="jp">レストラン</span></h2>
</div>
<div class="con_restaurant">
	<div class="con_inner">
		<section class="box_restaurant">
			<p style="text-align:center; padding:100px 0; width:100;">
				現在準備中です。
			</p>
		</section>
	</div>
</div>
<!--
<div class="con_restaurant">
	<div class="con_inner">
		<section class="box_restaurant">
			<h3 class="ttl">朝食ビュッフェ<span>1F</span></h3>
            <p class="txt">
                ※朝食ビュッフェ一時中止のおしらせ ＞ <a target="_blank" href="https://hotel-actel.com/topics/2020/04/02/%e3%80%90%e6%9c%9d%e9%a3%9f%e3%83%93%e3%83%a5%e3%83%83%e3%83%95%e3%82%a7%e4%b8%80%e6%99%82%e4%bc%91%e6%ad%a2%e3%81%ae%e3%81%8a%e7%9f%a5%e3%82%89%e3%81%9b%e3%80%91/">詳しくはこちら</a><br>
            </p>
			<div class="wrap_slide">
				<div class="box_slide">
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_buffet01.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_buffet01.jpg" alt="朝食ビュッフェ"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_buffet02.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_buffet02.jpg" alt="朝食ビュッフェ"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_buffet03.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_buffet03.jpg" alt="朝食ビュッフェ"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_buffet04.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_buffet04.jpg" alt="朝食ビュッフェ"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_buffet05.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_buffet05.jpg" alt="朝食ビュッフェ"></div>
				</div>
			</div>
			<p class="txt">
				・これまで総数３０品目より４５品目に種類を増やしました。<br>
				・中華業態テナントの強みを生かし中華メニューを追加しました。<br>
				・中華メニュー追加によりトッピングによるカスタマイズ性を高めたご提案。<br>
				・名古屋飯も意識し天むす・味噌カツなど追加。<br>
				・朝中華粥・朝麻婆・朝カレー等、定番から新たなモーニングの提案。<br>
				</p>
			<table class="tbl_basic align-left">
				<tr>
					<th>フロア</th>
					<td>1F</td>
				</tr>
				<tr>
					<th>営業時間</th>
					<td>06：30～10：00（最終入店 09：30）</td>
				</tr>
				<tr>
					<th>座席数</th>
					<td>88席</td>
				</tr>
			</table>

		</section>

		<section class="box_restaurant">
			<h3 class="ttl">BUTAMAJIN<span>2F</span></h3>
			<div class="wrap_slide">
				<div class="box_slide">
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_butamajin01.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_butamajin01.jpg" alt="BUTAMAJIN"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_butamajin02.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_butamajin02.jpg" alt="BUTAMAJIN"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_butamajin03.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_butamajin03.jpg" alt="BUTAMAJIN"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_butamajin04.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_butamajin04.jpg" alt="BUTAMAJIN"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_butamajin05.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_butamajin05.jpg" alt="BUTAMAJIN"></div>

				</div>
			</div>
			<p class="txt">
				「BEAUTY and PORK！」<br>
				豚肉と野菜で女性がもっとキレイに。をコンセプトに美味しくキレイに！をモットーに。<br>
				毎日、野菜とお肉にとことん向き合い、お客様に喜んで頂くことだけを考えてきました。
			</p>
			<table class="tbl_basic align-left">
				<tr>
					<th>フロア</th>
					<td>2F</td>
				</tr>
				<tr>
					<th>営業時間</th>
					<td>18:00～25:00（フード24:00ラストオーダー、ドリンク24:30ラストオーダー）</td>
				</tr>
				<tr>
					<th>直通番号</th>
					<td>052-684-7827</td>
				</tr>
				<tr>
					<th>座席数</th>
					<td>122席</td>
				</tr>
			</table>

			<p class="btn gold"><a target="_blank" href="https://butamajinnagoyasakae.owst.jp/">公式サイトはこちら<i class="icon-angle-right-triple"></i></a></p>
		</section>

		<section class="box_restaurant">
			<h3 class="ttl">ChaoVia<span>1F</span></h3>
			<div class="wrap_slide">
				<div class="box_slide">
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_chaovia01.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_chaovia01.jpg" alt="ChaoVia"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_chaovia02.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_chaovia02.jpg" alt="ChaoVia"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_chaovia03.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_chaovia03.jpg" alt="ChaoVia"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_chaovia04.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_chaovia04.jpg" alt="ChaoVia"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_chaovia05.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_chaovia05.jpg" alt="ChaoVia"></div>
				</div>
			</div>
			<p class="txt">
				「餃子とビール」という相性抜群のコンビを、いつもと違ったちょっとオシャレな、でも気取らない空間でお楽しみ頂けます。名物の羽根つきひとくち餃子を筆頭とした創作餃子をはじめ、ビールに合うおつまみをご用意しております。ビールに関しましても、生ビールだけでなんと8種類！！その他ボトルビール豊富に取り揃えております。ビールが苦手な方にもハイボール・サワー・果実酒・ワイン等取り揃えております。全国４０店舗以上展開の「チャオチャオ餃子」プロデュースの新しい「餃子ビアバル」へ是非お越し下さい。
			</p>
			<table class="tbl_basic align-left">
				<tr>
					<th>フロア</th>
					<td>1F</td>
				</tr>
				<tr>
					<th>営業時間</th>
					<td>
                        朝食バイキング   06：30～10：00（最終入店 09：30）<br>
				        17:00～27:00（フード26:00ラストオーダー、ドリンク26:30ラストオーダー）
					</td>
				</tr>
				<tr>
					<th>直通番号</th>
					<td>052-212-7876</td>
				</tr>
                <tr>
					<th>定休日</th>
					<td>
                        第1・3日曜日<br>
                        ※連休中日については、連休最終日が定休となります。</td>
				</tr>
				<tr>
					<th>座席数</th>
					<td>132席</td>
				</tr>
			</table>

			<p class="btn gold"><a target="_blank" href="https://www.gyozakeikaku.com/">公式サイトはこちら<i class="icon-angle-right-triple"></i></a></p>
		</section>

		<section class="box_restaurant">
			<h3 class="ttl">MEE NAGOYA<span>B1F</span></h3>
			<div class="wrap_slide">
				<div class="box_slide">
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_meenagoya01.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_meenagoya01.jpg" alt="MEE NAGOYA"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_meenagoya02.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_meenagoya02.jpg" alt="MEE NAGOYA"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_meenagoya03.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_meenagoya03.jpg" alt="MEE NAGOYA"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_meenagoya04.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_meenagoya04.jpg" alt="MEE NAGOYA"></div>
					<div data-thumb="<?php bloginfo( 'template_url' ); ?>/images/restaurant/thumb_meenagoya05.jpg" class="slide"><img src="<?php bloginfo( 'template_url' ); ?>/images/restaurant/img_meenagoya05.jpg" alt="MEE NAGOYA"></div>
				</div>
			</div>
			<p class="txt">
				階段を下ると、地下とは思えない天井の高い都会のワンシーンが広がる。お酒を楽しむスタンディングバーエリアとカラオケルームやダーツなどアソビが融合したエンタメバー。仲間と楽しく飲みたい、新しい出会いを求めて、待合せまでの時間つぶしに…人と人が交錯する、新しい名古屋のナイトスポット。
			</p>
			<table class="tbl_basic align-left">
				<tr>
					<th>フロア</th>
					<td>B1F</td>
				</tr>
				<tr>
					<th>営業時間</th>
					<td>4月1日より 火～土曜	18:00～25:00（Foodラストオーダー24:00 / Drinkラストオーダー24:30）</td>
				</tr>
				<tr>
					<th>定休日</th>
					<td>
						日・月曜日（日曜日が祝日の場合も定休日とさせて頂きたく存じます）<br>
					</td>
				</tr>
				<tr>
					<th>システム</th>
					<td>
						<dl>
							<dt>ワンドリンク制</dt>
							<dd>ご利用願いとして、お客様1人につき、最低1杯のドリンク注文を実施させて頂きます。</dd>
						</dl>
						<dl>
							<dt>チャージ</dt>
							<dd>男女共通→500円（税抜）</dd>
						</dl>

						※全てのお客様に対し、1クレジットダーツゲーム無料
					</td>
				</tr>
				<tr>
					<th>直通番号</th>
					<td>052-971-3110</td>
				</tr>
				<tr>
					<th>座席数</th>
					<td>102名　※個室有（10人部屋×1 、 8人部屋×1 、 4~6人部屋×2）</td>
				</tr>
			</table>

			<p class="btn gold"><a target="_blank" href="https://www.mee-nagoya.com/">公式サイトはこちら<i class="icon-angle-right-triple"></i></a></p>
		</section>
	</div>
</div>
-->
<?php
get_footer();
