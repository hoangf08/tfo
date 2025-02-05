<?php $page = 'facilities'; $page_jp = '館内施設'; include "../config/include.php"; ?>

<!-- *** stylesheet *** -->
<?php include "../templates/common_css.php"; ?>
<link href="../css/<?php echo $page; ?>.css" rel="stylesheet" type="text/css" media="all">
<link href="../css/photoswipe.css" rel="stylesheet">
<link href="../css/default-skin.css" rel="stylesheet">
<!-- *** javascript *** -->
<?php include "../templates/common_js.php"; ?>
</head>

<body id="<?php echo $page; ?>">
<?php include "../templates/header.php"; ?>
<div id="contents">
	<ul id="topicpath">
		<li><a href="<?php echo location; ?>">HOME</a></li>
		<li><?php echo $page_jp; ?></li>
	</ul>

	<div class="con_intr">
		<div class="box_intr">
			<p class="txt_catch">ゆったりとした広さと<br><span>近</span>代和風の<br class="view_sp">内装でおもてなし</p>
			<p class="txt">
				地元の伝統文化と近代の設備が融合した館内で<br>
				より良いとき時間をお過ごしいただけます。</p>
		</div>
	</div><!-- /.con_intr-->

	<div class="box_map">
		<p class="photo	view_pc-tab">
			<img src="#" data-img="images/img_map.png" alt="館内MAP" class="load_pc-tab">
         </p>
		<p class="photo photoswipe view_sp" data-pswp-uid="20">
            <a href="images/img_map.jpg" data-size="720x480">
            	<img src="#" data-img="images/img_map.png" alt="館内MAP" class="load_sp">
            </a>
        </p>
	</div>

	<div class="box_pnav view_pc-tab">
		<ul class="pnav">
			<li class="bottom"><a href="#yamasiro">
				<p class="img"><img src="#" data-img="./images/pnav_01.jpg" alt="山代夢広場" class="load_pc-tab"></p>
				<p class="st">山代夢広場</p>
			</a></li>
			<li class="bottom"><a href="#lobby">
				<p class="img"><img src="#" data-img="./images/pnav_02.jpg" alt="ロビー" class="load_pc-tab"></p>
				<p class="st">ロビー</p>
			</a></li>
			<li class="bottom"><a href="#garden">
				<p class="img"><img src="#" data-img="./images/pnav_03.jpg" alt="日本庭園" class="load_pc-tab"></p>
				<p class="st">日本庭園</p>
			</a></li>
			<li><a href="#fitness">
				<p class="img"><img src="#" data-img="./images/pnav_04.jpg" alt="フィットネス＆SPA" class="load_pc-tab"></p>
				<p class="st">フィットネス<br class="view_pc-tab">＆SPA</p>
			</a></li>
			<li><a href="#esthetic">
				<p class="img"><img src="#" data-img="./images/pnav_09.jpg" alt="エステサロン琥珀" class="load_pc-tab"></p>
				<p class="st">エステサロン<br class="view_pc-tab">琥珀</p>
			</a></li>
			<li class="bottom"><a href="#group">
				<p class="img"><img src="#" data-img="./images/pnav_05.jpg" alt="宴会場" class="load_pc-tab"></p>
				<p class="st">宴会場</p>
			</a></li>
			<li class="bottom"><a href="#lounge">
				<p class="img"><img src="#" data-img="./images/pnav_06.jpg" alt="ラウンジ" class="load_pc-tab"></p>
				<p class="st">ラウンジ</p>
			</a></li>
			<li class="bottom"><a href="#shop">
				<p class="img"><img src="#" data-img="./images/pnav_07.jpg" alt="売店" class="load_pc-tab"></p>
				<p class="st">売店</p>
			</a></li>
			<li class="bottom"><a href="#azumaya">
				<p class="img"><img src="#" data-img="./images/pnav_08.jpg" alt="東屋兼茶室" class="load_pc-tab"></p>
				<p class="st">東屋兼茶室</p>
			</a></li>
		</ul>
	</div><!-- /.box_pnav -->

	<div class="con_fac" id="yamasiro">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_hiroba.jpg" alt="山代夢広場" class="load_sp"></p>
			<h3><span>山</span>代夢広場</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_hiroba.jpg" alt="山代夢広場"></p>
			<div class="box_det">
				<div class="box_txt">
					<p class="txt">
						にぎわいを彩るエンターテイメントゾーン<br>山代演芸広場の舞台で日常から離れた特別な時間をお楽しみください
					</p>
				</div>
			</div>
			<div class="box_photo">
				<ul>
					<li>
						<p class="photo"><img src="images/img_hiroba02.jpg" alt="催し物・演芸会場"></p>
						<p class="st"><span>催し物・<br class="view_tab">演芸会場</span></p>
						<p class="txt">エンターテイメント空間、四季折々のイベントが開催されます。</p>
						<p class="btn"><a href="<?php echo location_event; ?>">イベント情報一覧</a></p>
					</li>
					<li>
						<p class="photo"><img src="images/img_hiroba03.jpg" alt="ゲームコーナー"></p>
						<p class="st"><span>ゲームコーナー</span></p>
						<p class="txt">最新ゲーム機から懐かしいレトロなゲーム機まで幅広く設置しています。</p>
					</li>
					<li>
						<p class="photo"><img src="images/img_hiroba04.jpg" alt="ビリヤードコーナー"></p>
						<p class="st"><span>ビリヤード<br class="view_tab">コーナー</span></p>
						<!--<p class="txt">ビリヤードコーナーの説明が入ります。ビリヤードコーナーの説明が入ります。</p>-->
					</li>
					<li>
						<p class="photo"><img src="images/img_hiroba06.jpg" alt="卓球"></p>
						<p class="st"><span>卓球コーナー</span></p>
						<p class="txt">温泉といえば卓球。いい汗かいて温泉でリラックスしてみてはいかがでしょうか。</p>
					</li>
					<li>
						<p class="photo"><img src="images/img_hiroba05.jpg" alt="カラオケ"></p>
						<p class="st"><span>カラオケ</span></p>
						<p class="txt">音響抜群のDAMカラオケになっています。お部屋は大小様々なタイプが御座います。最大35名様までご利用頂けるお部屋も御座います。</p>
						<table class="tbl_basic">
							<!-- <tr>
								<th>営業時間</th>
								<td>営業時間が入ります</td>
							</tr> -->
							<tr>
								<th>部屋数</th>
								<td>個室　24部屋<br>
									ホール　3カ所</td>
							</tr>
						</table>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="con_fac" id="lobby">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_lobby01.jpg" alt="ロビー" class="load_sp"></p>
			<h3><span>ロ</span>ビー</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_lobby01.jpg" alt="ロビー"></p>
			<div class="box_det">
				<div class="box_txt">
					<p class="txt">
						国内初となる９０×１８０cmの巨大タイルを張りつめた５００㎡のロビー。<br>
						ゆったりとした広さと近代和風の内装で、お客様を心のこもったおもてなしでお迎え致します。
					</p>
				</div>
				<div class="box_tbl">
					<table class="tbl_basic">
						<tr>
							<th>場所</th>
							<td>3階、本館北</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="box_kaga">
				<p class="photo"><img src="images/img_lobby02.jpg" alt="加賀友禅・加賀傘"></p>
				<div class="box_txt">
					<h4><span>加賀友禅・加賀傘</span></h4>
					<p class="txt">ロビーには飾り付けされた、加賀友禅と伝統の手づくり和傘がロビーに色香を漂わせ山代の温泉文化をご覧いただけます。</p>
				</div>
			</div>
		</div>
	</div>

	<div class="con_gar" id="garden">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_teien.jpg" alt="日本庭園" class="load_sp"></p>
			<h3><span>日</span>本庭園</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_teien.jpg" alt="日本庭園"></p>
			<div class="box_det">
				<p class="txt">
					本館前に広がる庭園をあずま屋で休息しながら眺めることができます。<br>
					日が沈み、本館の光で照らされる庭園もまた別の景観として楽しめます。
				</p>
				<!--<p class="btn"><a href="<?php echo location_facilities__garden; ?>">日本庭園についてはこちら</a></p>-->
			</div>
		</div>
	</div>

	<div class="con_gar" id="fitness">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_spa.jpg" alt="フィットネス＆SPA" class="load_sp"></p>
			<h3><span>フ</span>ィットネス＆SPA</h3>
		</div>
		<div class="inner">
		<p class="photo"><img src="images/img_spa.jpg" alt="フィットネス＆SPA"></p>
			<div class="box_det">
				<p class="txt">
					2020年2月10日より、700坪を超えるジムがオープンいたしました。
				</p>
				<p class="btn"><a href="<?php echo location_facilities__fitness; ?>">フィットネス＆SPAについてはこちら</a></p>
			</div>
		</div>
	</div>

	<div class="con_gar" id="esthetic">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_esthe.jpg" alt="エステサロン琥珀" class="load_sp"></p>
			<h3><span>エ</span>ステサロン琥珀</h3>
		</div>
		<div class="inner">
		<p class="photo"><img src="images/img_esthe.jpg" alt="エステサロン琥珀"></p>
			<div class="box_det">
				<p class="txt">
					2023年4月21日（金）より、営業を再開いたしました。
				</p>
				<p class="btn"><a href="<?php echo location_facilities__esthetic; ?>">エステサロン琥珀についてはこちら</a></p>
			</div>
		</div>
	</div>

	<div class="con_gar" id="group">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_enkai.jpg" alt="宴会場" class="load_sp"></p>
			<h3><span>宴</span>会場</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_enkai.jpg" alt="宴会場"></p>
			<div class="box_det">
				<p class="txt">
					少人数様から団体様までご利用頂いける和室の大小様々な宴会場が御座います。 また洋室のコンベンションホールでは立食で約300名、着席で約170名様がご利用頂けます。
				</p>
				<p class="btn"><a href="<?php echo location_group; ?>">宴会・会議についてはこちら</a></p>
			</div>
		</div>
	</div>

	<div class="con_gar" id="lounge">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_lou.jpg" alt="ラウンジ" class="load_sp"></p>
			<h3><span>ラ</span>ウンジ</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_lou.jpg" alt="ラウンジ"></p>
			<div class="box_det">
				<p class="txt">
					メインの日本庭園を眺めるロビーラウンジでゆったりティータイム。
				</p>
				<table class="tbl_basic">
					<tr>
						<th>場所</th>
						<td>3階、本館北</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="con_gar" id="shop">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_shop.jpg" alt="売店" class="load_sp"></p>
			<h3><span>売</span>店</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_shop.jpg" alt="売店"></p>
			<div class="box_det">
				<p class="txt">
					人気の酒類、九谷焼と取り揃えております。<br>
					地元の物を中心に海産物、和菓子洋菓子、九谷焼、漆器、金箔商品、加賀友禅織雑貨、酒類等をご用意いたしております。
				</p>
				<table class="tbl_basic">
					<tr>
						<th>場所</th>
						<td>3階、本館南</td>
					</tr>
					<!--<tr>
						<th>営業時間</th>
						<td>営業時間が入ります。</td>
					</tr>-->
				</table>
			</div>
		</div>
	</div>

	<div class="con_gar" id="azumaya">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><img src="#" data-img="images/img_azumaya.jpg" alt="東屋兼茶室" class="load_sp"></p>
			<h3><span>東</span>屋兼茶室</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_azumaya.jpg" alt="東屋兼茶室"></p>
			<div class="box_det">
				<p class="txt">
					伝統的な茶室で記念撮影をすることができます。
				</p>
				<table class="tbl_basic">
					<tr>
						<th>場所</th>
						<td>3階、本館南</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="wrp_over">
		<div class="con_over">
			<h3><span>設</span>備・サービス</h3>
			<div class="box_ser">
				<ul>
					<li>
						<p class="ic"><img src="images/ic_01.png" alt="宅配サービス"></p>
						<div class="box_txt">
							<p class="st"><span>宅配サービス</span></p>
							<p class="txt">お土産やお荷物を宅配でお送りいただけます。フロントにて承ります。</p>
						</div>
					</li>
					<li>
						<p class="ic"><img src="images/ic_02.png" alt="自動販売機"></p>
						<div class="box_txt">
							<p class="st"><span>自動販売機</span></p>
							<p class="txt">各階に自動販売機を設けております。ご自由にご利用ください。 </p>
						</div>
					</li>
					<li>
						<p class="ic"><img src="images/ic_04.png" alt="FAX送受信"></p>
						<div class="box_txt">
							<p class="st"><span>FAX送受信</span></p>
							<p class="txt">FAXの送受信を行うことができます。フロントにて承ります。 </p>
						</div>
					</li>
					<li>
						<p class="photo"><img src="images/img_pc.jpg" alt="パソコン/プリンターサービス"></p>
						<!-- <p class="ic"><img src="images/ic_05.png" alt="パソコン/プリンターサービス"></p> -->
						<div class="box_txt">
							<p class="st"><span>パソコン/<br class="view_tab-sp">プリンターサービス</span></p>
							<p class="txt">本館北館３階ロビーにて、パソコンとプリンターをご利用いただけます。 </p>
						</div>
					</li>
					<li>
						<p class="photo"><img src="images/img_bus.jpg" alt="送迎バス"></p>
						<!-- <p class="ic"><img src="images/ic_06.png" alt="送迎バス"></p> -->
						<div class="box_txt">
							<p class="st"><span>送迎バス</span></p>
							<p class="txt">当館では、事前ご予約のバス送迎を行っております。  </p>
						</div>
						<p class="btn"><a href="<?php echo location_access; ?>">送迎バスについてはこちら</a></p>
					</li>
				</ul>
			</div>
		</div><!-- /.con_over -->
	</div><!-- /.wrp_over -->


</div><!-- /#contents -->
<?php include "../templates/search.php"; ?>
<?php include "../templates/footer.php"; ?>
<script src="../js/photoswipe.min.js"></script>
<script src="../js/photoswipe-ui-default.min.js"></script>
<script src="../js/gallery.js"></script>
<!-- photoswipe Start -->
<div id="wrp_ps">
    <div tabindex="-1" class="pswp" role="dialog" aria-hidden="true">
        <div class="pswp__bg"></div>
        <div class="pswp__scroll-wrap">
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- スマホ用ボタン -->
            <div class="sp-button view_tab-sp">
                <ul>
                    <li class="btn_close"><img alt="Close" src="../gallery/images/ic_c.png"></li>
                    <li class="btn_share"><img alt="Share" src="../gallery/images/ic_s.png"></li>
                </ul>
            </div>
            <!-- スマホ用ボタン -->

            <div class="pswp__ui pswp__ui--hidden">
                <div class="pswp__top-bar">
                    <div class="pswp__counter"></div>
                    <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
                    <button title="Share" class="pswp__button pswp__button--share"></button>
                    <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
                    <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                          <div class="pswp__preloader__cut">
                            <div class="pswp__preloader__donut"></div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>
                <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left">
                </button>
                <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right">
                </button>
                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
