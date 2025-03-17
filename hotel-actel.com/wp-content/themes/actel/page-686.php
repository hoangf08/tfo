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
	<h2 class="ttl"><span class="en"></span><span class="jp">FAQ</span></h2>
</div>

<div class="con_guestroom_list">
	<div class="con_inner">
		<div class="wrp">
			<div class="dropdown-button">FAQを選択</div>
			<ul class="faq-select">
				<li class="active" data-target="faq-room">寝室・客室</li>
				<li data-target="faq-facility">館内施設・設備</li>
				<li data-target="faq-bath">入浴・風呂</li>
				<li data-target="faq-access">アクセス・駐車場</li>
				<li data-target="faq-child">お子様連れでのご利用</li>
				<li data-target="faq-activity">アクティビティ</li>
				<li data-target="faq-area">周辺情報</li>
				<li data-target="faq-other">その他</li>
			</ul>
			<div id="faq-room" class="faq-content active">
				<h2>寝室・客室</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>ベッド・その他寝具について</h3>
						<p class="faq-answer">当ホテルでは、すばらしい眠りをもたらす品質の高さで世界に選ばれてきたシモンズ社製のベッドを採用しております。ベッドの幅はシングルルーム140㎝、ダブルルーム160㎝、ツインルーム120㎝でございます。掛け布団は羽毛布団を全室にご用意しており、ご希望のお客様へは貸出品として毛布のご用意もございます。枕はお好みでお選びいただけるようやわらかめ、かため2種類を設置しております。アレルギー等をお持ちの方はご相談くださいませ。</p>
					</li>
	
					<li class="faq-item">
						<h3>バリアフリー対応はしていますか？</h3>
						<p class="faq-answer">バリアフリー対応部屋を1室ご用意しております。</p>
					</li>
	
					<li class="faq-item">
						<h3>ファミリーで利用できるお部屋はありますか？</h3>
						<p class="faq-answer">ファミリーの方にはやグループの方には隣接したお部屋をご案内させていただいております。ご予約の際にお申し付けくださいませ。</p>
					</li>
	
					<li class="faq-item">
						<h3>禁煙ルームはありますか？</h3>
						<p class="faq-answer">全室禁煙の禁煙フロアとさせていただいております。喫煙される際は3階ロビーに喫煙ブースがございますのでそちらをご利用下さい。</p>
					</li>
	
					<li class="faq-item">
						<h3>お風呂とトイレが別のお部屋はありますか？</h3>
						<p class="faq-answer">スタンダードツインルーム・デラックスツインルームはバスとトイレが別のセパレートタイプとなっております。</p>
					</li>
	
					<li class="faq-item">
						<h3>貴重品の保管について教えてください</h3>
						<p class="faq-answer">客室内金庫（無料）がございます。</p>
					</li>
	
					<li class="faq-item">
						<h3>客室内の備品を教えてください（冷蔵庫など）</h3>
						<p class="faq-answer">●空調冷暖房（全館･温度は各部屋で調整していただけます）●金庫●冷蔵庫●テレビ（地上波、ＢＳ）●VOD（有料）●ユニットバス●シャワートイレ●ドライヤー●電話●空気清浄機●バスタオル●フェイスタオル●ガウン●シャンプー・トリートメント・ボディソープ・ハンドソープ●アメニティ（ブラシ・歯ブラシ・綿棒・かみそり・コットン・ボディタオル）</p>
					</li>
	
					<li class="faq-item">
						<h3>客室内のアメニティグッズを教えてください</h3>
						<p class="faq-answer">バスタオル・フェイスタオル・ガウン・シャンプー・トリートメント・ボディソープ・ハンドソープ・ブラシ・歯ブラシ・綿棒・かみそり・コットン・ボディタオルをご用意しています。<br>
						その他貸出品もございますのでフロントまでお気軽にお申し付けください。</p>
					</li>
	
					<li class="faq-item">
						<h3>インターネット接続はできますか？</h3>
						<p class="faq-answer">全客室にて高速無線ＬＡＮを使ったインターネット接続サービスを無料でご利用頂けます。 ＰＣは備え付けておりませんのでご持参下さい。</p>
					</li>
	
					<li class="faq-item">
						<h3>お部屋からはどのような景色が見えますか？</h3>
						<p class="faq-answer">客室数に限りがございますが、サンシャイン栄の観覧車や中部電力 MIRAI TOWER(旧・名古屋テレビ塔)の見えるお部屋もございます。しかしながら、景色をお楽しみいただけないお部屋が多くなっており、ご希望に添えない場合もございますので、ご了承くださいませ。</p>
					</li>
	
					<li class="faq-item">
						<h3>チェックアウトの時間は延長できますか？</h3>
						<p class="faq-answer">当日の予約状況によりチェックアウトの延長をお受けできない場合もございます。 11時～13時までは、1時間1,000円 13時以降は、デイユース料金、又は通常宿泊料金を頂戴しております。</p>
					</li>
	
					<li class="faq-item">
						<h3>チェックインの時間を早めることはできますか？</h3>
						<p class="faq-answer">当日の予約状況により通常より早くのチェックインをお受けできない場合もございます。 13時～15時は、1時間1,000円 13時以前は、デイユース料金、又は通常宿泊料金を頂戴いたしております。</p>
					</li>
				</ul>
			</div>

			<div id="faq-facility" class="faq-content">
				<h2>館内施設・設備</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>トイレは和式洋式？</h3>
						<p class="faq-answer">館内は全て洋式のシャワートイレとなっております。</p>
					</li>
	
					<li class="faq-item">
						<h3>飲み物・タバコの自動販売機はありますか？</h3>
						<p class="faq-answer">ジュース類・ビール等の自動販売機は3階１ヶ所ございます。 タバコの自動販売機はございません。</p>
					</li>
	
					<li class="faq-item">
						<h3>ランドリーサービスについて</h3>
						<p class="faq-answer">ランドリーサービスはございません。 3階にコインランドリーを設置しております。 また、各階エレベーター前にズボンプレッサーをご用意しております。</p>
					</li>
	
					<li class="faq-item">
						<h3>製氷機はありますか？</h3>
						<p class="faq-answer">3階ロビーに製氷機がございますので、ご自由にご利用くださいませ。</p>
					</li>
	
					<li class="faq-item">
						<h3>FAX送受信について</h3>
						<p class="faq-answer">有料にてFAX送受信を承ります。 当館へ受信される場合は宿泊者名をご記入頂きますようにお伝え願います。</p>
					</li>
				</ul>
			</div>

			<div id="faq-bath" class="faq-content">
				<h2>入浴・風呂</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>大浴場はありますか？</h3>
						<p class="faq-answer">大浴場はございません。 全客室バス・トイレ付きとなっておりますので、客室内バスルームをご利用くださいませ。</p>
					</li>
				</ul>
			</div>

			<div id="faq-access" class="faq-content">
				<h2>アクセス・駐車場</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>送迎はありますか？</h3>
						<p class="faq-answer">恐れ入りますが、送迎サービスはございません。</p>
					</li>
	
					<li class="faq-item">
						<h3>タクシー手配について</h3>
						<p class="faq-answer">フロントにて承っております。</p>
					</li>
	
					<li class="faq-item">
						<h3>路線バスの時刻表を教えてください</h3>
						<p class="faq-answer">各ホームページにて時刻表をご参照ください。 また、フロントでも時刻表のご用意がございます。</p>
					</li>
	
					<li class="faq-item">
						<h3>ホテルへのアクセス方法（空港から）</h3>
						<p class="faq-answer">
							【中部国際空港】<br>
							空港バスにて約50分 大人￥1,300<br>
							栄で下車後、徒歩5分程で到着いたします。<br>
							名鉄で金山駅まで約25分 大人 ￥1,170<br>
							金山駅から栄駅へは地下鉄名城線をご利用くださいませ。<br>
							【名古屋空港】<br>
							空港バスにて約20分 大人￥600<br>
							栄で下車後、徒歩5分程で到着いたします。
						</p>
					</li>
	
					<li class="faq-item">
						<h3>ホテルへのアクセス方法（公共交通機関編）</h3>
						<p class="faq-answer">名古屋市営地下鉄東山線、名城線栄駅にて下車後1番出口を出ていただき、錦通りを西に向かい、一つ目の交差点を左折していただくと右手にございます。徒歩2分程です。</p>
					</li>
	
					<li class="faq-item">
						<h3>ホテルへのアクセス（マイカー編）最寄ＩＣからは？</h3>
						<p class="faq-answer">若宮大通「丸田町」交差点を右折＞空港線「東新町北」交差点を左折＞錦通「錦通伊勢町」交差点を右折</p>
					</li>
	
					<li class="faq-item">
						<h3>アクセス方法（マイカー編）</h3>
						<p class="faq-answer">東名高速「名古屋インター」から約30分<br>
							上社JCT＞高針JCT>名古屋高速２号東山線「吹上西」出口＞若宮大通「丸田町」交差点を右折＞空港線「東新町北」交差点を左折＞錦通「錦通伊勢町」交差点を右折
						</p>
					</li>
	
					<li class="faq-item">
						<h3>駐車場はありますか？</h3>
						<p class="faq-answer">
							提携駐車場をご案内しております。<br>
							ジャンボパーキング(名古屋市中区錦3丁目8-5)<br>
							ご宿泊のお客様は１泊￥2,000/１台でお停めいただけます。提携時間は15時より翌11時となっており、それ以降のお時間は30分￥250の別途料金が発生いたします。提携駐車場のご利用時はホテルでのご精算となりますので、駐車券をフロントまでお持ちくださいませ。</p>
					</li>
				</ul>
			</div>

			<div id="faq-child" class="faq-content">
				<h2>お子様連れでのご利用</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>ミルクのお湯が欲しいのですが。</h3>
						<p class="faq-answer">お部屋に電気ケトルをご用意しております。</p>
					</li>

					<li class="faq-item">
						<h3>子ども用のパジャマはありますか？</h3>
						<p class="faq-answer">申し訳ございません。 お子様用パシャマのご用意がございません。</p>
					</li>

					<li class="faq-item">
						<h3>子供用品販売店が近隣にありますか？</h3>
						<p class="faq-answer">栄駅地下街に子供用ミルクやオムツを扱うドラッグストアがございます。 また、徒歩5分程でデパートがございます。</p>
					</li>

					<li class="faq-item">
						<h3>子ども料金の詳細を教えてください</h3>
						<p class="faq-answer">小学生以下のお子様で添い寝でのご利用の場合、料金は頂戴しておりません。中学生以上のお子様は、大人１名様と同様に料金を頂戴しております。</p>
					</li>

					<li class="faq-item">
						<h3>子供と一緒に添い寝はできますか？</h3>
						<p class="faq-answer">小学生以下のお子様はベッド1台につき、1名様まで添い寝無料ご宿泊いただけます。</p>
					</li>

					<li class="faq-item">
						<h3>子連れでも宿泊できますか？</h3>
						<p class="faq-answer">ご宿泊可能です。 小学生以下のお子様はベッド1台につき、1名様まで添い寝無料ご宿泊いただけます。</p>
					</li>
				</ul>
			</div>

			
			<div id="faq-activity" class="faq-content">
				<h2>アクティビティ</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>マッサージ手配は出来ますか？</h3>
						<p class="faq-answer">26時までマッサージの手配を承っております。 45分、60分、90分のコースがございます。</p>
					</li>
				</ul>
			</div>

			<div id="faq-area" class="faq-content">
				<h2>周辺情報</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>ご気分が悪くなった方は</h3>
						<p class="faq-answer">ご宿泊中にご気分が悪くなった場合などフロントにご相談ください。ご案内させていただきます。</p>
					</li>

					<li class="faq-item">
						<h3>地域の名物は何ですか？</h3>
						<p class="faq-answer">ひつまぶしやあんかけスパゲティ、味噌カツ、手羽先など名古屋めしと呼ばれる人気のグルメが多くごさいます。</p>
					</li>

					<li class="faq-item">
						<h3>周辺に食事の出来る場所はありますか？</h3>
						<p class="faq-answer">当館から徒歩圏内に、お食事処が多数ございます。名古屋名物のひつまぶしなど、是非ご賞味ください。詳しくはフロントスタッフにお尋ねくださいませ。</p>
					</li>

					<li class="faq-item">
						<h3>近くにコンビニはありますか？</h3>
						<p class="faq-answer">当館を出て左に進まれますと、徒歩1分程のところにデイリーヤマザキがございます。 また、右に進まれますと、徒歩3分程のところにファミリーマートがございます。</p>
					</li>

					<li class="faq-item">
						<h3>周辺の利便施設は？</h3>
						<p class="faq-answer">コンビニエンスストアが徒歩1分、ドン・キホーテが徒歩2分程の距離にございます。 また、最寄りの栄駅の地下街にはクリーニング店、ドラッグストア、本屋などの施設がございます。</p>
					</li>

					<li class="faq-item">
						<h3>桜の見頃はいつ頃ですか？</h3>
						<p class="faq-answer">例年3月下旬が見頃となります。 鶴舞公園や名古屋城など人気の見所がございます。</p>
					</li>

					<li class="faq-item">
						<h3>紅葉の見頃はいつ頃ですか？</h3>
						<p class="faq-answer">例年11月中旬～12月上旬までが見頃となります。 名城公園や東山動植物園など人気の見所がございます。</p>
					</li>

					<li class="faq-item">
						<h3>周辺の観光スポットについて教えてください</h3>
						<p class="faq-answer">名古屋城や大須観音など人気の観光スポットがございます。 詳しくはフロントスタッフにお声がけくださいませ。</p>
					</li>
				</ul>
			</div>

			<div id="faq-other" class="faq-content">
				<h2>その他</h2>
				<ul class="faq-list">
					<li class="faq-item">
						<h3>新聞はありますか？</h3>
						<p class="faq-answer">3階ロビーにご用意しております。 ご用意している新聞は中日新聞、中日スポーツ、日本経済新聞、朝日新聞、ジャパンタイムズの5種、各1部ずつでございます。</p>
					</li>

					<li class="faq-item">
						<h3>英語は通じますか？</h3>
						<p class="faq-answer">英語対応可能です。毎年多くの外国人の方にご来館いただいておりまして長期滞在の方もおられます。英会話のできるスタッフもしくは翻訳ソフトを用いてのご対応をさせていただきます。</p>
					</li>

					<li class="faq-item">
						<h3>携帯電話は通じますか？</h3>
						<p class="faq-answer">通話可能でございます。</p>
					</li>

					<li class="faq-item">
						<h3>食べ物や飲み物の持ち込みはできますか？</h3>
						<p class="faq-answer">ロビーでのご飲食はご遠慮いただいておりますが、客室でしたらご自由にお持込みいただけます。</p>
					</li>

					<li class="faq-item">
						<h3>貸出備品を具体的に教えてください。</h3>
						<p class="faq-answer">ご希望の場合は、フロントへお申し付けください。 ●アイロン●アイロン台●爪切り●ヘアアイロン●体温計●氷枕●氷のう●栓抜き●ソーイングセット●充電器●毛布●電圧変換プラグ●電気スタンド　など</p>
					</li>

					<li class="faq-item">
						<h3>車椅子の貸出はありますか？</h3>
						<p class="faq-answer">申し訳ございません。 車椅子の貸出を行っておりません。ご了承くださいませ。</p>
					</li>

					<li class="faq-item">
						<h3>車椅子でも利用できる設備はありますか？</h3>
						<p class="faq-answer">トイレ、浴室など、バリアフリーに対応した客室が1室ございます。</p>
					</li>

					<li class="faq-item">
						<h3>荷物発送について（当館からの発送）</h3>
						<p class="faq-answer">ヤマト運輸がご利用可能です。 販売用の段ボールも取り扱っております。 配送料金はフロントにてご確認くださいませ。</p>
					</li>

					<li class="faq-item">
						<h3>荷物発送について（当館への事前発送）</h3>
						<p class="faq-answer">事前にご連絡の上、お送りいただきましたお荷物は貴重品や冷凍・冷蔵品、危険物以外はチェックインまでお預かりさせていただきます。<br>
						発送の際は、チェックイン日とご宿泊様のお名前を必ずご記入いただきますようお願いいたします。</p>
					</li>

					<li class="faq-item">
						<h3>チェックイン前アウト後に荷物を預かってくれますか？</h3>
						<p class="faq-answer">チェックイン前、チェックアウト後それぞれ原則として当日中に限りお預かり可能でございます。 フロントにてお申し付けくださいませ。</p>
					</li>

					<li class="faq-item">
						<h3>お金をおろせるところはありますか？</h3>
						<p class="faq-answer">近隣コンビニにATMがございます。</p>
					</li>

					<li class="faq-item">
						<h3>クレジットカードは使えますか？</h3>
						<p class="faq-answer">ＶＩＳＡ，ＪＣＢなど各種クレジットカードご利用可能です。</p>
					</li>

					<li class="faq-item">
						<h3>キャンセル料を教えてください</h3>
						<p class="faq-answer">前日までは無料でキャンセルを承っております。 ご宿泊当日のキャンセルは宿泊代金の80％、連絡のない不泊につきましては100％を頂戴しております。</p>
					</li>

					<li class="faq-item">
						<h3>宿泊料金のご精算方法について</h3>
						<p class="faq-answer">当ホテルではチェックイン時にお支払いいただく事前精算となっております。</p>
					</li>

					<li class="faq-item">
						<h3>早朝出発の清算方法は？</h3>
						<p class="faq-answer">２４時間フロントスタッフが常駐しておりますので、何時でも承ります。</p>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
