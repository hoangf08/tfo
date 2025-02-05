<?php $page = 'hotspring'; $page_jp = '温泉'; include "../config/include.php"; ?>

<!-- *** stylesheet *** -->
<?php include "../templates/common_css.php"; ?>
<link href="../css/<?php echo $page; ?>.css" rel="stylesheet" type="text/css" media="all">

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
			<p class="txt_catch">湯に浸かりながら望む<br class="view_sp">外の景色<br>100％<span>自</span>家源泉の天然温泉</p>
			<p class="txt">加賀百万石自家源泉100％の天然温泉に浸かっていただけます。<br>ゆっくりと温泉浴をお愉しみください。</p>
		</div>
	</div><!-- /.con_intr-->

	<div class="box_pnav view_pc-tab">
		<div class="main">
			<h4><span>本館</span></h4>
            <h4 style="color:#fff; font-size: 14px;">※本館南大浴場はご利用頂けない日がございます。</h4>
			<ul class="pnav">
				<li><a href="#hot01">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav01.jpg" class="load_pc-tab" alt="本館北大浴場【男湯】 加賀浴殿"></p>-->
					<p class="st"><span>本館北大浴場【男湯】</span>加賀浴殿</p>
				</a></li>
				<li><a href="#hot02">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav02.jpg" class="load_pc-tab" alt="本館北大浴場【女湯】 千代女の湯"></p>-->
					<p class="st"><span>本館北大浴場【女湯】</span>千代女の湯</p>
				</a></li>
				<li><a href="#hot03">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav03.jpg" class="load_pc-tab" alt="本館南大浴場【男湯】 加宝の湯"></p>-->
					<p class="st"><span>本館南大浴場【男湯】</span>加宝の湯</p>
				</a></li>
				<li><a href="#hot04">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav04.jpg" class="load_pc-tab" alt="本館南大浴場【女湯】 鏡花の湯"></p>-->
					<p class="st"><span>本館南大浴場【女湯】</span>鏡花の湯</p>
				</a></li>
			</ul>
		</div>
		<div class="kanade">
			<h4><span>別邸「奏」</span></h4>
            <h4 style="color:#fff; font-size: 14px;">※別邸「奏」ご宿泊のお客様のみご利用頂けます。</h4>
			<ul class="pnav">
				<li><a href="#hot08">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav06.jpg" class="load_pc-tab" alt="別邸奏【女湯】 紅梅の湯"></p>-->
					<p class="st"><span>別邸奏</span>大浴場</p>
				</a></li>
				<li><a href="#hot05">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav05.jpg" class="load_pc-tab" alt="別邸奏【男湯】 白梅の湯"></p>-->
					<p class="st"><span>別邸奏【男湯】</span>白梅の湯</p>
				</a></li>
				<li><a href="#hot06">
					<!--<p class="img view_pc-tab"><img src="#" data-img="./images/pnav06.jpg" class="load_pc-tab" alt="別邸奏【女湯】 紅梅の湯"></p>-->
					<p class="st"><span>別邸奏【女湯】</span>紅梅の湯</p>
				</a></li>
			</ul>
		</div>
		<!-- <div class="room">
			<h4><span>客室</span></h4>
			<ul class="pnav">
				<li><a href="#hot07">
					<p class="img view_pc-tab"><img src="#" data-img="./images/pnav07.jpg" class="load_pc-tab" alt="露天風呂付客室"></p>
					<p class="st">露天風呂付客室</p>
				</a></li>
			</ul>
		</div> -->
	</div><!-- /.box_pnav -->

	<div class="con_hot" id="hot01">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot01.jpg" alt="本館北大浴場【男湯】 加賀浴殿" class="load_sp"> --></p>
			<h3><em>本館北大浴場【男湯】</em><span>加</span>賀浴殿</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_hot01.jpg" alt="本館北大浴場【男湯】 加賀浴殿"></p>
			<p class="txt">石庭庭園の風情に囲まれた解放感あふれる庭園露天で、自家源泉100％のお風呂をゆったりとお楽しみください。</p>
			<div class="box_det">
				<table class="tbl_basic">
					<tr>
						<th>営業時間</th>
						<td>15：00～24：00、5：00～10：30</td>
					</tr>
					<tr>
						<th>場所</th>
						<td>1F</td>
					</tr>
					<tr>
						<th>設備</th>
						<td>内湯・露天風呂・サウナ</td>
					</tr>
				</table>
				<ul class="box_btn">
					<li><a href="#ame">アメニティ・備品を見る</a></li>
					<li><a href="#type">泉質・効能を見る</a></li>
				</ul>
			</div>
		</div><!-- /.inner -->
	</div><!-- /.con_hot -->

	<div class="con_hot" id="hot02">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot02.jpg" alt="本館北大浴場【女湯】 千代女の湯" class="load_sp"> --></p>
			<h3><em>本館北大浴場【女湯】</em><span>千</span>代女の湯</h3>
		</div>
		<div class="inner">
			<p class="photo"><img src="images/img_hot02.jpg" alt="本館北大浴場【女湯】 千代女の湯"></p>
			<p class="txt">外庭でゆったりとした解放感あふれる旅の風情に囲まれた自家源泉100％の、本格露天風呂を存分にお楽しみください。</p>
			<div class="box_det">
				<table class="tbl_basic">
					<tr>
						<th>営業時間</th>
						<td>15：00～24：00、5：00～10：30</td>
					</tr>
					<tr>
						<th>場所</th>
						<td>1F</td>
					</tr>
					<tr>
						<th>設備</th>
						<td>内湯・露天風呂・サウナ</td>
					</tr>
				</table>
				<ul class="box_btn">
					<li><a href="#ame">アメニティ・備品を見る</a></li>
					<li><a href="#type">泉質・効能を見る</a></li>
				</ul>
			</div>
		</div><!-- /.inner -->
	</div><!-- /.con_hot -->

	<div class="con_hot" id="hot03">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot03.jpg" alt="本館南大浴場【男湯】 加宝の湯" class="load_sp"> --></p>
			<h3><em>本館南大浴場【男湯】</em><span>加</span>宝の湯</h3>
		</div>
		<div class="inner">
			<!--<p class="photo"><img src="images/img_hot03.jpg" alt="本館南大浴場【男湯】 加宝の湯"></p>-->
			<p class="txt">自家源泉100％の天然温泉の大浴場です。<br>自然の豊かさを感じながら、全身の疲れをほぐしていただけます。</p>
			<div class="box_det">
				<table class="tbl_basic">
					<tr>
						<th>営業時間</th>
						<td>15：00～24：00、5：00～10：30</td>
					</tr>
					<tr>
						<th>場所</th>
						<td>3F</td>
					</tr>
					<tr>
						<th>設備</th>
						<td>内湯・サウナ</td>
					</tr>
				</table>
				<ul class="box_btn">
					<li><a href="#ame">アメニティ・備品を見る</a></li>
					<li><a href="#type">泉質・効能を見る</a></li>
				</ul>
			</div>
		</div><!-- /.inner -->
	</div><!-- /.con_hot -->

	<div class="con_hot" id="hot04">
		<div class="box_tit obj_accordion sp_only">
			<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot04.jpg" alt="本館南大浴場【女湯】 鏡花の湯" class="load_sp"> --></p>
			<h3><em>本館南大浴場【女湯】</em><span>鏡</span>花の湯</h3>
		</div>
		<div class="inner">
			<!--<p class="photo"><img src="images/img_hot04.jpg" alt="本館南大浴場【女湯】 鏡花の湯"></p>-->
			<p class="txt">自家源泉100％の天然温泉の大浴場です。<br>自然の豊かさを感じながら、全身の疲れをほぐしていただけます。</p>
			<div class="box_det">
				<table class="tbl_basic">
					<tr>
						<th>営業時間</th>
						<td>15：00～24：00、5：00～10：30</td>
					</tr>
					<tr>
						<th>場所</th>
						<td>3F</td>
					</tr>
					<tr>
						<th>設備</th>
						<td>内湯・露天風呂・サウナ</td>
					</tr>
				</table>
				<ul class="box_btn">
					<li><a href="#ame">アメニティ・備品を見る</a></li>
					<li><a href="#type">泉質・効能を見る</a></li>
				</ul>
			</div>
		</div><!-- /.inner -->
	</div><!-- /.con_hot -->

	<div class="wrp_kanade">

		<div class="con_hot" id="hot08">
			<div class="box_tit obj_accordion sp_only">
				<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot08.jpg" alt="別邸奏 大浴場" class="load_sp"> --></p>
				<h3><em>別邸奏</em><span>大</span>浴場</h3>
			</div>
			<div class="inner">
				<p class="photo"><img src="images/img_hot08.jpg" alt="別邸奏 大浴場"></p>
				<p class="txt">自家源泉100％の天然温泉の大浴場です。<br>自然の豊かさを感じながら、全身の疲れをほぐしていただけます。</p>
				<div class="box_det">
					<table class="tbl_basic">
						<tr>
							<th>営業時間</th>
							<td>15：00～24：00、5：00～10：30</td>
						</tr>
						<tr>
							<th>場所</th>
							<td>1F</td>
						</tr>
						<tr>
							<th>設備</th>
							<td>内湯・露天風呂・サウナ</td>
						</tr>
					</table>
					<ul class="box_btn">
						<li><a href="#ame">アメニティ・備品を見る</a></li>
						<li><a href="#type">泉質・効能を見る</a></li>
					</ul>
				</div>
			</div><!-- /.inner -->
		</div><!-- /.con_hot -->

		<div class="con_hot" id="hot05">
			<div class="box_tit obj_accordion sp_only">
				<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot05.jpg" alt="別邸奏【男湯】 白梅の湯" class="load_sp"> --></p>
				<h3><em>別邸奏【男湯】</em><span>白</span>梅の湯</h3>
			</div>
			<div class="inner">
				<!--<p class="photo"><img src="images/img_hot05.jpg" alt="別邸奏【男湯】 白梅の湯"></p>-->
				<p class="txt">自家源泉100％の天然温泉の大浴場です。<br>自然の豊かさを感じながら、全身の疲れをほぐしていただけます。</p>
				<div class="box_det">
					<table class="tbl_basic">
						<tr>
							<th>営業時間</th>
							<td>15：00～24：00、5：00～10：30</td>
						</tr>
						<tr>
							<th>場所</th>
							<td>1F</td>
						</tr>
						<tr>
							<th>設備</th>
							<td>内湯・露天風呂・サウナ</td>
						</tr>
					</table>
					<ul class="box_btn">
						<li><a href="#ame">アメニティ・備品を見る</a></li>
						<li><a href="#type">泉質・効能を見る</a></li>
					</ul>
				</div>
			</div><!-- /.inner -->
		</div><!-- /.con_hot -->

		<div class="con_hot" id="hot06">
			<div class="box_tit obj_accordion sp_only">
				<p class="pho view_sp"><!-- <img src="#" data-img="images/img_hot06.jpg" alt="別邸奏【女湯】 紅梅の湯" class="load_sp"> --></p>
				<h3><em>別邸奏【女湯】</em><span>紅</span>梅の湯</h3>
			</div>
			<div class="inner">
				<!--<p class="photo"><img src="images/img_hot06.jpg" alt="別邸奏【女湯】 紅梅の湯"></p>-->
				<p class="txt">自家源泉100％の天然温泉の大浴場です。<br>自然の豊かさを感じながら、全身の疲れをほぐしていただけます。</p>
				<div class="box_det">
					<table class="tbl_basic">
						<tr>
							<th>営業時間</th>
							<td>15：00～24：00、5：00～10：30</td>
						</tr>
						<tr>
							<th>場所</th>
							<td>1F</td>
						</tr>
						<tr>
							<th>設備</th>
							<td>内湯・露天風呂・サウナ</td>
						</tr>
					</table>
					<ul class="box_btn">
						<li><a href="#ame">アメニティ・備品を見る</a></li>
						<li><a href="#type">泉質・効能を見る</a></li>
					</ul>
				</div>
			</div><!-- /.inner -->
		</div><!-- /.con_hot -->
	</div><!-- /.wrp_kanade -->



	<!-- <div class="con_room" id="hot07">
		<p class="photo"><img src="images/img_hot07.jpg" alt="露天風呂付客室"></p>
		<div class="box_room">
			<p class="st"><span>露天風呂付客室</span></p>
			<p class="txt">贅を尽くした空間と広縁の前に広がる日本庭園が楽しめる205㎡の昭和天皇もお泊りになったお部屋です。<br>こちらのお部屋でも露天風呂をご利用いただけます。</p>
			<ul>
				<li><a href="<?php echo location_rooms__main; ?>#room05">本館の露天風呂付客室はこちら</a></li>
				<li><a href="<?php echo location_rooms__kanade; ?>#room03">別邸「奏」の露天風呂付客室はこちら</a></li>
			</ul>
		</div>
	</div>/.con_room -->

	<div class="wrp_over">
		<div class="con_over">
			<h3><span>温</span>泉概要</h3>
			<!-- <p class="photo"><img src="images/img_ame.jpg" alt="アメニティ・備品"> -->
			<div class="box_det" id="ame">
				<p class="st"><span>アメニティ・備品</span></p>
				<p class="photo"><img src="images/img_ame.jpg" alt="アメニティ・備品">
				<table class="tbl_basic">
					<tr>
						<th>男湯</th>
						<td>【浴場内】シャンプー・リンス・ボディーソープ・洗顔	<br class="view_pc">【洗面所】アフターシェーブローション・乳液・ヘアトニック・ヘアリキッド・洗顔・ヘアブラシ・ドライヤー・フェイスタオル・バスタオル</td>
					</tr>
					<tr>
						<th>女湯</th>
						<td>【浴場内】シャンプー・リンス・ボディーソープ・洗顔 <br class="view_pc">【洗面所】アフターシェーブローション・乳液・ヘアトニック・ヘアリキッド・洗顔・ヘアブラシ・ドライヤー・フェイスタオル・バスタオル</td>
					</tr>
				</table>
			</div>
			<div class="box_over" id="type">
				<p class="st"><span>泉質・効能</span></p>
				<p class="photo"><img src="images/img_eff.jpg" alt="泉質・効能">
				<table class="tbl_basic">
					<tr>
						<th>源泉名</th>
						<td>加賀百万石源泉</td>
					</tr>
					<tr>
						<th>効能</th>
						<td>関節痛、変形性関節症、腰痛、神経痛、五十肩、打撲、<br class="view_pc">捻挫等の慢性期、切り傷、皮膚乾燥症、冷え性、抹消循環障害、<br class="view_pc">胃腸機能低下、自律神経異常、疲労回復、健康増進</td>
					</tr>
				</table>
			</div>
		</div><!-- /.con_over -->
	</div><!-- /.wrp_over -->

</div><!-- /#contents -->
<?php include "../templates/search.php"; ?>
<?php include "../templates/footer.php"; ?>
</body>
</html>
