<?php

$common = get_post_meta($post->ID, '_common', true);
if (!is_array($common)) {
  $common = array();
}

// Lấy dữ liệu experience groups
$experience_groups = get_post_meta($post->ID, '_experience_groups', true);
if (!is_array($experience_groups)) {
  $experience_groups = array();
}

// Lấy dữ liệu spot groups 
$spot_groups = get_post_meta($post->ID, '_spot_groups', true);
if (!is_array($spot_groups)) {
  $spot_groups = array();
}

// MENU

$list_spring_experience_menu = array();
$list_summer_experience_menu = array();
$list_autumn_experience_menu = array();
$list_winter_experience_menu = array();
$list_all_experience_menu = array();
$list_recommend_experience_menu = array();

// SLIDE

$list_experience_slide = array();

// CONTENT

$list_spring_experience_content = array();
$list_summer_experience_content = array();
$list_autumn_experience_content = array();
$list_winter_experience_content = array();
$list_all_experience_content = array();
$list_recommend_experience_content = array();

foreach ($experience_groups as $index => $experience) {
  if(!$experience['status']) {
    continue;
  }

  if($experience['slide']) {
    $list_experience_slide[] = "
      <li class='swiper-slide'>
        <a href='#lp_contents".$index."'>
          <img src='".wp_get_attachment_url($experience['slide_img'])."' class='img-fluid' alt='' />
        </a>
      </li>
      ";
  }

  $menu_item = "
    <li class='lp_subnav-link'>
      <a href='#lp_contents".$index."'>
        ".str_replace("\n", "<br>", $experience['title_pc'])."
      </a>
    </li>
    ";
  $content_item = "
    <div id='lp_contents".$index."' class='lp-cont__list--item'>
      <div class='lp-cont__title text-center'>
        <h4 class='mb-2'>
          ".str_replace("\n", "<br>", $experience['title_pc'])."
        </h4>
      </div>
      <ul class='lp-cont__image'>
        ".($experience['main_img'] ? "
        <li class='lp-cont__image--item'>
          <img src='".wp_get_attachment_url($experience['main_img'])."' class='img-fluid' alt='' />
        </li>" : '')."
        ".($experience['left_img'] ? "
        <li class='lp-cont__image--item'>
          <img src='".wp_get_attachment_url($experience['left_img'])."' class='img-fluid' alt='' />
        </li>" : '')."
        ".($experience['right_img'] ? "
        <li class='lp-cont__image--item'>
          <img src='".wp_get_attachment_url($experience['right_img'])."' class='img-fluid' alt='' />
        </li>" : '')."
      </ul>
      <div class='lp-cont__content mw-600'>
        <div class='lp-cont__content--text'>
          <p class='mb-3'>
            ".str_replace("\n", "<br>", $experience['content'])."
          </p>
        </div>
        <div class='lp-cont__content--link text-center'>
          <a href='".$experience['during_url']."' class='btn btn-button w-100 mb-2".($experience['during_url'] ? "" : "comingsoon")."' target='_blank'
            title=''>
            ".($experience['during_url'] ? $experience['during_text'] : "Coming Soon")."
          </a>
        </div>
      </div>
    </div>
    ";

  if($experience['spring']){
    $list_spring_experience_menu[] = $menu_item;
    $list_spring_experience_content[] = $content_item;
  }
  if($experience['summer']){
    $list_summer_experience_menu[] = $menu_item;
    $list_summer_experience_content[] = $content_item;
  }
  if($experience['autumn']){
    $list_autumn_experience_menu[] = $menu_item;
    $list_autumn_experience_content[] = $content_item;
  }
  if($experience['winter']){
    $list_winter_experience_menu[] = $menu_item;
    $list_winter_experience_content[] = $content_item;
  }
  if($experience['all']){
    $list_all_experience_menu[] = $menu_item;
    $list_all_experience_content[] = $content_item;
  }
  if($experience['recommend']){
    $list_recommend_experience_menu[] = $menu_item;
    $list_recommend_experience_content[] = $content_item;
  }
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="keywords" 
    content="<?php echo $common['seo_keyword']; ?>" />
  <meta name="description" content="<?php echo $common['seo_description']; ?>" />
  <title><?php echo $common['seo_title']; ?></title>
  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet">
  <!-- stylesheet -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/posts/experience/user/common/css/swiper-bundle.min.css" />
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/posts/experience/user/common/css/style.css" />

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WGDDMK3');</script>
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MZ3Z2ZS4');</script>
  <!-- End Google Tag Manager -->

  <!-- Dynamic Tag Management by Adobe head -->
  <script src="//assets.adobedtm.com/db19aef962f6cf21aa61efda5e55a418d7613c67/satelliteLib-9954c899989b16c99bd6e82bffe178382f3997e2.js"></script>
  <!-- End Dynamic Tag Management by Adobe head -->
</head>

<body id="lp_top">
  <!-- Google Tag Manager (noscript) -->
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGDDMK3" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MZ3Z2ZS4" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
  <!-- End Google Tag Manager (noscript) -->

  <header class="header">
    <div class="header__main">
      <div class="header__main--nav">
        <div class="btn__nav">
          <div class="btn__nav--bar">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </div>
      </div>
      <div class="header__main--navtoggle">
        <a href="#" class="closed" title="">
          <img src="common/img/svg/icon_closed.svg" />
        </a>
        <nav class="lp_nav">
          <ul class="lp_nav-list">
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_top">Page Top</a>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents03">
                <h6>Spring</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_spring_experience_menu); ?>
              </ul>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents04">
                <h6>Summer</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_summer_experience_menu); ?>
              </ul>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents05">
                <h6>Autumn</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_autumn_experience_menu); ?>
              </ul>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents06">
                <h6>Winter</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_winter_experience_menu); ?>
              </ul>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents07">
                <h6>All Seasons</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_all_experience_menu); ?>
              </ul>
            </li>
            <li class="lp_nav-item">
              <a class="lp_nav-link" href="#lp_contents08">
                <h6>Recommend</h6>
              </a>
              <ul class="lp_subnav-item">
                <?php echo implode("", $list_recommend_experience_menu); ?>
              </ul>
            </li>
          </ul>
        </nav>

        <p class="mb-2"><a href="#lp_guide" class="btn-button lp_nav-link" title="ホテル概要・アクセス">ホテル概要・アクセス</a></p>
        <p class="mb-0"><a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/plan/all/" class="btn-button lp_nav-link" target="_blank"
            title="ご予約はこちら">ご予約はこちら</a></p>
      </div>
    </div>
    <div class="lp_overlay"></div>
  </header><!-- .header -->
  <main class="main">
    <section id="lp_contents01" class="s__slideshow">
      <div class="slideshow text-center">
        <ul class="swiper-wrapper">
          <?php echo implode("", $list_experience_slide); ?>
        </ul>
        <div class="slideshow__button">
          <!-- If we need navigation buttons -->
          <div class="swiper_btn_box">
            <div class="swiper-btn-prev"></div>
              <!-- Pagination bullets -->
              <div class="swiper-pagination"></div>
            <div class="swiper-btn-next"></div>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents01 -->

    <section id="lp_contents02" class="section">
      <div class="container">
        <div class="intro">
          <div class="intro__title text-center">
            <h1>
              <?php echo $common['name_jp']; ?>
            </h1>
          </div>
          <div class="intro__text mw-600">
            <h4 class="text-center">
              <?php echo $common['feature']; ?>
            </h4>
            <p class="mb-0">
              <?php echo $common['summary']; ?>
            </p>
          </div>
          <div class="intro__experiences">
            <h4 class="text-center mb-3">
              季節ごとの体験
            </h4>
            <ul class="list-inline list__contents">
              <li class="item color1 <?php echo $list_spring_experience_menu ? "" : " disabled"; ?>">
                <a href="#lp_contents03" title="春のおすすめ">
                  <span class="badge spring">
                    <img src="common/img/svg/icon_spring.svg" alt="春のおすすめ" />
                  </span>
                  <h5 class="mb-0">春のおすすめ</h5>
                </a>
              </li>
              <li class="item color2 <?php echo $list_summer_experience_menu ? "" : " disabled"; ?>">
                <a href="#lp_contents04" title="夏のおすすめ">
                  <span class="badge summer">
                    <img src="common/img/svg/icon_summer.svg" alt="夏のおすすめ" />
                  </span>
                  <h5 class="mb-0">夏のおすすめ</h5>
                </a>
              </li>
              <li class="item color3 <?php echo $list_autumn_experience_menu ? "" : " disabled"; ?>">
                <a href="#lp_contents05" title="秋のおすすめ">
                  <span class="badge autumn">
                    <img src="common/img/svg/icon_autumn.svg" alt="秋のおすすめ" />
                  </span>
                  <h5 class="mb-0">秋のおすすめ</h5>
                </a>
              </li>
              <li class="item color4 <?php echo $list_winter_experience_menu ? "" : " disabled"; ?>">
                <a href="#lp_contents06" title="冬のおすすめ">
                  <span class="badge winter">
                    <img src="common/img/svg/icon_winter.svg" alt="冬のおすすめ" />
                  </span>
                  <h5 class="mb-0">冬のおすすめ</h5>
                </a>
              </li>
            </ul>
            <div class="intro__experiences--allseasons <?php echo $list_all_experience_menu ? "" : " disabled"; ?>">
              <a href="#lp_contents07" class="btn btn-outline w-100 text-center" title="通年のおすすめ">
                通年のおすすめ
              </a>
            </div>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents02 -->

    <section id="lp_contents03" class="section bg-spring">
      <div class="container">
        <div class="lp-cont">
          <div class="lp-cont__head text-center">
            <p class="subhead">
              春のおすすめ
            </p>
            <h2 class="h2">Spring</h2>
          </div>
          <div class="lp-cont__list">
            <?php echo implode("", $list_spring_experience_content); ?>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents03 -->

    <section id="lp_contents04" class="section bg-summer">
      <div class="container">
        <div class="lp-cont">
          <div class="lp-cont__head text-center">
            <p class="subhead">
              夏のおすすめ
            </p>
            <h2>Summer</h2>
          </div>
          <div class="lp-cont__list">
            <?php echo implode("", $list_summer_experience_content); ?>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents04 -->

    <section id="lp_contents05" class="section bg-autumn">
      <div class="container">
        <div class="lp-cont">
          <div class="lp-cont__head text-center">
            <p class="subhead">
              秋のおすすめ
            </p>
            <h2>Autumn</h2>
          </div>
          <div class="lp-cont__list">
            <?php echo implode("", $list_autumn_experience_content); ?>
          </div>
        </div>
      </div>
    </section><!-- #lp_content04 -->

    <section id="lp_contents06" class="section bg-winter">
      <div class="container">
        <div class="lp-cont">
          <div class="lp-cont__head text-center">
            <p class="subhead">
              冬のおすすめ
            </p>
            <h2>Winter</h2>
          </div>
          <div class="lp-cont__list">
            <?php echo implode("", $list_winter_experience_content); ?>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents06 -->

    <section id="lp_contents07" class="section">
      <div class="container">
        <div class="lp-cont">
          <div class="lp-cont__head text-center">
            <p class="subhead">
              通年のおすすめ
            </p>
            <h2>All Seasons</h2>
          </div>
          <div class="lp-cont__list">
            <?php echo implode("", $list_all_experience_content); ?>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents07 -->

    <section id="lp_contents08" class="section s__planlist">
      <div class="container">
        <div class="l__planlist mw-600 text-center">
          <h3 class="text-white">
            おすすめ宿泊プラン
          </h3>
          <div class="lp-cont__list">
            <?php
            if($list_all_experience_content){
              echo implode("", $list_all_experience_content);
            } else {
            ?>
              <p class="mb-0">
                <a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/plan/all/" class="btn btn-button bg-white w-100"
                  target="_blank" title="ご予約はこちら">
                  ご予約はこちら
                </a>
              </p>
            <?php
            }?>
          </div>
        </div>
      </div>
    </section><!-- #lp_contents08 -->

    <section id="lp_contents09" class="section s__article">
      <div class="container">
        <div class="lp_spot">
          <h4 class="text-gray-cream text-center">
            周辺の見どころ
          </h4>
          <ul class="lp_spot-list">
            <li class="lp_spot-item">
              <img src="common/img/img_spot01.jpg" class="img-fluid" alt="グローバルゲート">
              <dl class="lp_spot-detail">
                <dt>グローバルゲート</dt>
                <dd>
                  <p>
                    ホテルが入るグローバルゲートは、ライフスタイル雑貨、レストランやカフェなど様々なショップが49店舗出店。創業90年以上になる鰻の老舗問屋が営む「うなぎ四代目菊川」とタイアップした宿泊プランもご用意しています。
                  </p>
                </dd>
              </dl>
            </li>
            <li class="lp_spot-item">
              <img src="common/img/img_spot02.jpg" class="img-fluid" alt="向野橋（こうやばし）">
              <dl class="lp_spot-detail">
                <dt>向野橋（こうやばし）</dt>
                <dd>
                  <p>
                    ホテルから徒歩で約10分。夕刻には車両基地の明かりや鉄道のヘッドライト・テールライトが輝くフォトスポット。
                  </p>
                </dd>
              </dl>
            </li>
            <li class="lp_spot-item">
              <img src="common/img/img_spot03.jpg" class="img-fluid" alt="レゴランド®・ジャパン・リゾート">
              <dl class="lp_spot-detail">
                <dt>レゴランド®・ジャパン・リゾート</dt>
                <dd>
                  <p>
                    お子さま連れのご家族が1日を思いきり楽しめるテーマパーク。最寄り駅の「金城ふ頭駅」までは、乗り換えなしで約22分。
                  </p>
                </dd>
              </dl>
            </li>
            <li class="lp_spot-item">
              <img src="common/img/img_spot04.jpg" class="img-fluid" alt="オアシス２１＆中部電力 MIRAI TOWER （栄エリア）">
              <dl class="lp_spot-detail">
                <dt>オアシス２１＆中部電力 MIRAI TOWER （栄エリア）</dt>
                <dd>
                  <p>
                    名古屋の人気夜景スポット。ガラスの大屋根がシンボルの「オアシス２１」と国の重要文化財「中部電力MIRAI TOWER」。
                  </p>
                </dd>
              </dl>
            </li>
          </ul>
        </div>
      </div>
    </section><!-- lp_contents09 -->
  </main><!-- .main -->
  <footer id="lp_guide" class="footer">
    <section class="s__footertop bg-graylight">
      <div class="container">
        <div class="footertop text-center">
          <div class="footertop__logo">
            <a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/" title="名古屋プリンスホテル スカイタワー" target="_blank">
              <img src="./common/img/logo.png" width="160" alt="名古屋プリンスホテル スカイタワー" />
            </a>
          </div>
          <div class="footertop__text">
            <h4 class="mb-2">名古屋プリンスホテル スカイタワー</h4>
            <!-- <p class="text-left mb-4">
              ホテルの位置する「ささしまライブ24」は、名古屋駅より1駅。中川運河の船出の場所として、古くから親しまれてきました。私たちはこの地でお客さまの特別な一日に寄り添い、何度も訪れたくなるホテルを目指しています。時間帯で変わりゆく景色、滞在シーンを彩る眺望はここにしかないパノラマエクスペリエンス。思いを込めたおもてなしが、ドラマチックなご滞在をお約束いたします。
            </p> -->
            <p class="mb-0">
              <a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/plan/all/" target="_blank" title="ご予約はこちら"
                class="btn btn-button bg-black w-100">
                ご予約はこちら
              </a>
            </p>
          </div>
          <div class="footertop__map">
            <h4>アクセス</h4>
            <p>〒453-6131 愛知県名古屋市中村区平池町4-60-12</p>
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13046.214762548947!2d136.87615700629868!3d35.16774994713232!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6003771f8d273655%3A0x95089afb35901864!2z5ZCN5Y-k5bGL44OX44Oq44Oz44K544Ob44OG44OrIOOCueOCq-OCpOOCv-ODr-ODvA!5e0!3m2!1sja!2sjp!4v1677261032254!5m2!1sja!2sjp"
              width="780" height="450" style="border:0;" allowfullscreen="" loading="lazy"
              referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="footertop__link">
              <ul class="list-inline">
                <li>
                  <a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/" title="ホテルWebサイト" target="_blank"
                    class="btn btn-button">ホテルWebサイト</a>
                </li>
                <li>
                  <a href="https://www.princehotels.co.jp/<?php echo $common['name_url']; ?>/access/" title="アクセス詳細はこちら" target="_blank"
                    class="btn btn-button">アクセス詳細はこちら</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section><!-- .s__footertop -->

    <section class="s__footercenter">
      <div class="container">
        <div class="footercenter">
          <div class="footercenter__link text-center">
            <a href="https://www.princehotels.co.jp/experience/" class="text-center" target="_blank" title="">
              <img src="common/img/footercenter_01.jpg" class="img-fluid pc" alt="" />
              <img src="common/img/footercenter_01_sp.jpg" class="img-fluid sp" alt="" />
            </a>
          </div>
          <div class="footercenter__text">
            ※写真はイメージです。実際の内容と異なる場合がございます。
          </div>
          <div class="footercenter__listlink text-center">
            <ul class="list-inline">
              <li>
                <a href="https://www.princehotels.co.jp/" target="_blank" title="西武プリンスホテルズ＆リゾーツ">西武プリンスホテルズ＆リゾーツ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section><!-- .s__footercenter -->
    <section class="s__footercopyright">
      <div class="container">
        <p class="mb-0 text-center">
          Copyright © SEIBU PRINCE HOTELS WORLDWIDE INC. <br class="sp" />All rights reserved.
        </p>
      </div>
    </section><!-- .s__footercopyright -->
  </footer><!-- .footer -->

  <!-- pageTop -->
  <div class="pageTop">
    <a href="#">
      <img src="common/img/svg/arrow-top.svg" class="TOP" />
    </a>
  </div>
  <!-- .pageTop -->

  <script src="<?php echo get_template_directory_uri(); ?>/posts/experience/user/common/js/jquery-3.7.0.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/posts/experience/user/common/js/swiper-bundle.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/posts/experience/user/common/js/script.js"></script>

  <!-- Dynamic Tag Management by Adobe footer -->
  <script type='text/javascript'>
    var analyticsData = {
      'events': '',
      'eVar12': '名古屋プリンスホテル スカイタワー',
      'eVar13': '',
      'eVar14': ''
    }
  </script>
  <script type="text/javascript">
    _satellite.pageBottom();
  </script>
  <!-- End Dynamic Tag Management by Adobe footer -->
</body>

</html>