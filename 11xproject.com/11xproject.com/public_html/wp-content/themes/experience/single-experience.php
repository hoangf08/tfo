<?php get_header(); ?>
10
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
        <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/icon_closed.svg" />
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
              <?php
              $experience_groups = get_post_meta(get_the_ID(), '_experience_groups', true);
              foreach ($experience_groups as $index => $group):
                if (isset($group['display']) && $group['display'] == 1 && isset($group['spring']) && $group['spring'] == 1):
                  ?>
                  <li class="lp_subnav-link">
                    <a href="#lp_contents03_<?php echo $index; ?>">
                      <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                    </a>
                  </li>
                  <?php
                endif;
              endforeach;
              ?>
            </ul>
          </li>
          <li class="lp_nav-item">
            <a class="lp_nav-link" href="#lp_contents04">
              <h6>Summer</h6>
            </a>
            <ul class="lp_subnav-item">
              <?php
              foreach ($experience_groups as $index => $group):
                if (isset($group['display']) && $group['display'] == 1 && isset($group['summer']) && $group['summer'] == 1):
                  ?>
                  <li class="lp_subnav-link">
                    <a href="#lp_contents04_<?php echo $index; ?>">
                      <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                    </a>
                  </li>
                  <?php
                endif;
              endforeach;
              ?>
            </ul>
          </li>
          <li class="lp_nav-item">
            <a class="lp_nav-link" href="#lp_contents05">
              <h6>Autumn</h6>
            </a>
            <ul class="lp_subnav-item">
              <?php
              foreach ($experience_groups as $index => $group):
                if (isset($group['display']) && $group['display'] == 1 && isset($group['autumn']) && $group['autumn'] == 1):
                ?>
              <li class="lp_subnav-link">
                <a href="#lp_contents05_<?php echo $index; ?>">
                  <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                </a>
              </li>
              <?php
              endif;
              endforeach;
              ?>
            </ul>
          </li>
          <li class="lp_nav-item">
            <a class="lp_nav-link" href="#lp_contents06">
              <h6>Winter</h6>
            </a>
            <ul class="lp_subnav-item">
              <?php
              foreach ($experience_groups as $index => $group):
                if (isset($group['display']) && $group['display'] == 1 && isset($group['winter']) && $group['winter'] == 1):
                ?>
              <li class="lp_subnav-link">
                <a href="#lp_contents06_<?php echo $index; ?>">
                  <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                </a>
              </li>
              <?php
              endif;
              endforeach;
              ?>
            </ul>
          </li>
          <li class="lp_nav-item">
            <a class="lp_nav-link" href="#lp_contents07">
              <h6>All Seasons</h6>
            </a>
            <ul class="lp_subnav-item">
              <?php
              foreach ($experience_groups as $index => $group):
                if (isset($group['display']) && $group['display'] == 1 && isset($group['common']) && $group['common'] == 1):
                ?>
              <li class="lp_subnav-link">
                <a href="#lp_contents07_<?php echo $index; ?>">
                  <?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>
                </a>
              </li>
              <?php
              endif;
              endforeach;
              ?>
            </ul>
          </li>
        </ul>
      </nav>

      <p class="mb-2"><a href="#lp_guide" class="btn-button lp_nav-link" title="ホテル概要・アクセス">ホテル概要・アクセス</a></p>
      <p class="mb-0"><a href="https://www.princehotels.co.jp/nagoya/plan/all/" class="btn-button lp_nav-link"
          target="_blank" title="ご予約はこちら">ご予約はこちら</a></p>
    </div>
  </div>
  <div class="lp_overlay"></div>
</header><!-- .header -->
<main class="main">
  <section id="lp_contents01" class="s__slideshow">
    <div class="slideshow text-center">
      <ul class="swiper-wrapper">
        <?php
        foreach ($experience_groups as $index => $group):
          if (isset($group['display']) && $group['display'] == 1 && isset($group['show_in_slide']) && $group['show_in_slide'] == 1):
        ?>
        <li class="swiper-slide">
          <a href="#lp_contents<?php 
            if(isset($group['spring']) && $group['spring'] == 1) echo '03_' . $index;
            else if(isset($group['summer']) && $group['summer'] == 1) echo '04_' . $index; 
            else if(isset($group['autumn']) && $group['autumn'] == 1) echo '05_' . $index;
            else if(isset($group['winter']) && $group['winter'] == 1) echo '06_' . $index;
            else if(isset($group['common']) && $group['common'] == 1) echo '07_' . $index;
            ?>">
            <img src="<?php echo esc_url($group['slide_image']); ?>" class="img-fluid" alt="<?php echo isset($group['pc_title']) ? esc_attr($group['pc_title']) : ''; ?>" />
          </a>
        </li>
        <?php
          endif;
        endforeach;
        ?>
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
            <?php echo get_post_meta($post_id, '_top_name', true); ?>
          </h1>
        </div>
        <div class="intro__text mw-600">
          <h4 class="text-center">
            <?php echo get_post_meta($post_id, '_top_feature', true); ?>
          </h4>
          <p class="mb-0">
            <?php echo get_post_meta($post_id, '_top_text', true); ?>
          </p>
        </div>
        <div class="intro__experiences">
          <h4 class="text-center mb-3">
            季節ごとの体験
          </h4>
          <ul class="list-inline list__contents">
            <li class="item color1">
              <a href="#lp_contents03" title="春のおすすめ">
                <span class="badge spring">
                  <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/icon_spring.svg" alt="春のおすすめ" />
                </span>
                <h5 class="mb-0">春のおすすめ</h5>
              </a>
            </li>
            <li class="item color2">
              <a href="#lp_contents04" title="夏のおすすめ">
                <span class="badge summer">
                  <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/icon_summer.svg" alt="夏のおすすめ" />
                </span>
                <h5 class="mb-0">夏のおすすめ</h5>
              </a>
            </li>
            <li class="item color3">
              <a href="#lp_contents05" title="秋のおすすめ">
                <span class="badge autumn">
                  <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/icon_autumn.svg" alt="秋のおすすめ" />
                </span>
                <h5 class="mb-0">秋のおすすめ</h5>
              </a>
            </li>
            <li class="item color4">
              <a href="#lp_contents06" title="冬のおすすめ">
                <span class="badge winter">
                  <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/icon_winter.svg" alt="冬のおすすめ" />
                </span>
                <h5 class="mb-0">冬のおすすめ</h5>
              </a>
            </li>
          </ul>
          <div class="intro__experiences--allseasons">
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
          <?php
          if ($experience_groups) {
            $index = 1;
            foreach ($experience_groups as $group) {
              if ($group['spring'] == 1 && $group['display'] == 1) {
                ?>
                <div id="lp_contents03_<?php echo $index; ?>" class="lp-cont__list--item">
                  <div class="lp-cont__title text-center">
                    <h4 class="mb-2">
                      <?php echo nl2br($group['pc_title']); ?>
                    </h4>
                  </div>
                  <ul class="lp-cont__image">
                    <?php 
                    if (!empty($group['additional_images'])) {
                      foreach ($group['additional_images'] as $image) {
                        if (!empty($image)) {
                          ?>
                          <li class="lp-cont__image--item">
                            <img src="<?php echo $image; ?>" class="img-fluid" alt="" />
                          </li>
                          <?php
                        }
                      }
                    }
                    ?>
                  </ul>
                  <div class="lp-cont__content mw-600">
                    <div class="lp-cont__content--text">
                      <p class="mb-3">
                        <?php echo nl2br($group['content']); ?>
                      </p>
                    </div>
                    <?php if (!empty($group['link'])) : ?>
                    <div class="lp-cont__content--link text-center">
                      <a href="<?php echo $group['link']; ?>" class="btn btn-button w-100 mb-2" target="_blank" 
                        title="<?php echo $group['public_url_title']; ?>">
                        <?php echo $group['public_url_title']; ?>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
                $index++;
              }
            }
          }
          ?>
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
          <?php
          if ($experience_groups) {
            $index = 1;
            foreach ($experience_groups as $group) {
              if ($group['summer'] == 1 && $group['display'] == 1) {
                ?>
                <div id="lp_contents04_<?php echo $index; ?>" class="lp-cont__list--item">
                  <div class="lp-cont__title text-center">
                    <h4 class="mb-2">
                      <?php echo nl2br($group['pc_title']); ?>
                    </h4>
                  </div>
                  <ul class="lp-cont__image">
                    <?php 
                    if (!empty($group['additional_images'])) {
                      foreach ($group['additional_images'] as $image) {
                        if (!empty($image)) {
                          ?>
                          <li class="lp-cont__image--item">
                            <img src="<?php echo $image; ?>" class="img-fluid" alt="" />
                          </li>
                          <?php
                        }
                      }
                    }
                    ?>
                  </ul>
                  <div class="lp-cont__content mw-600">
                    <div class="lp-cont__content--text">
                      <p class="mb-3">
                        <?php echo nl2br($group['content']); ?>
                      </p>
                    </div>
                    <?php if (!empty($group['link'])) : ?>
                    <div class="lp-cont__content--link text-center">
                      <a href="<?php echo $group['link']; ?>" class="btn btn-button w-100 mb-2" target="_blank" 
                        title="<?php echo $group['public_url_title']; ?>">
                        <?php echo $group['public_url_title']; ?>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
                $index++;
              }
            }
          }
          ?>
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
          <?php
          if ($experience_groups) {
            $index = 1;
            foreach ($experience_groups as $group) {
              if ($group['autumn'] == 1 && $group['display'] == 1) {
                ?>
                <div id="lp_contents05_<?php echo $index; ?>" class="lp-cont__list--item">
                  <div class="lp-cont__title text-center">
                    <h4 class="mb-2">
                      <?php echo nl2br($group['pc_title']); ?>
                    </h4>
                  </div>
                  <ul class="lp-cont__image">
                    <?php 
                    if (!empty($group['additional_images'])) {
                      foreach ($group['additional_images'] as $image) {
                        if (!empty($image)) {
                          ?>
                          <li class="lp-cont__image--item">
                            <img src="<?php echo $image; ?>" class="img-fluid" alt="" />
                          </li>
                          <?php
                        }
                      }
                    }
                    ?>
                  </ul>
                  <div class="lp-cont__content mw-600">
                    <div class="lp-cont__content--text">
                      <p class="mb-3">
                        <?php echo nl2br($group['content']); ?>
                      </p>
                    </div>
                    <?php if (!empty($group['link'])) : ?>
                    <div class="lp-cont__content--link text-center">
                      <a href="<?php echo $group['link']; ?>" class="btn btn-button w-100 mb-2" target="_blank" 
                        title="<?php echo $group['public_url_title']; ?>">
                        <?php echo $group['public_url_title']; ?>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
                $index++;
              }
            }
          }
          ?>
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
          <?php
          if ($experience_groups) {
            $index = 1;
            foreach ($experience_groups as $group) {
              if ($group['winter'] == 1 && $group['display'] == 1) {
                ?>
                <div id="lp_contents06_<?php echo $index; ?>" class="lp-cont__list--item">
                  <div class="lp-cont__title text-center">
                    <h4 class="mb-2">
                      <?php echo nl2br($group['pc_title']); ?>
                    </h4>
                  </div>
                  <ul class="lp-cont__image">
                    <?php 
                    if (!empty($group['additional_images'])) {
                      foreach ($group['additional_images'] as $image) {
                        if (!empty($image)) {
                          ?>
                          <li class="lp-cont__image--item">
                            <img src="<?php echo $image; ?>" class="img-fluid" alt="" />
                          </li>
                          <?php
                        }
                      }
                    }
                    ?>
                  </ul>
                  <div class="lp-cont__content mw-600">
                    <div class="lp-cont__content--text">
                      <p class="mb-3">
                        <?php echo nl2br($group['content']); ?>
                      </p>
                    </div>
                    <?php if (!empty($group['link'])) : ?>
                    <div class="lp-cont__content--link text-center">
                      <a href="<?php echo $group['link']; ?>" class="btn btn-button w-100 mb-2" target="_blank" 
                        title="<?php echo $group['public_url_title']; ?>">
                        <?php echo $group['public_url_title']; ?>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
                $index++;
              }
            }
          }
          ?>
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
          <?php
          if ($experience_groups) {
            $index = 1;
            foreach ($experience_groups as $group) {
              if ($group['common'] == 1 && $group['display'] == 1) {
                ?>
                <div id="lp_contents07_<?php echo $index; ?>" class="lp-cont__list--item">
                  <div class="lp-cont__title text-center">
                    <h4 class="mb-2">
                      <?php echo nl2br($group['pc_title']); ?>
                    </h4>
                  </div>
                  <ul class="lp-cont__image">
                    <?php 
                    if (!empty($group['additional_images'])) {
                      foreach ($group['additional_images'] as $image) {
                        if (!empty($image)) {
                          ?>
                          <li class="lp-cont__image--item">
                            <img src="<?php echo $image; ?>" class="img-fluid" alt="" />
                          </li>
                          <?php
                        }
                      }
                    }
                    ?>
                  </ul>
                  <div class="lp-cont__content mw-600">
                    <div class="lp-cont__content--text">
                      <p class="mb-3">
                        <?php echo nl2br($group['content']); ?>
                      </p>
                    </div>
                    <?php if (!empty($group['link'])) : ?>
                    <div class="lp-cont__content--link text-center">
                      <a href="<?php echo $group['link']; ?>" class="btn btn-button w-100 mb-2" target="_blank" 
                        title="<?php echo $group['public_url_title']; ?>">
                        <?php echo $group['public_url_title']; ?>
                      </a>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
                <?php
                $index++;
              }
            }
          }
          ?>
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
        <p class="mb-0">
          <a href="https://www.princehotels.co.jp/nagoya/plan/all/" class="btn btn-button bg-white w-100"
            target="_blank" title="ご予約はこちら">
            ご予約はこちら
          </a>
        </p>
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
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/img_spot01.jpg" class="img-fluid"
              alt="グローバルゲート">
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
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/img_spot02.jpg" class="img-fluid"
              alt="向野橋（こうやばし）">
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
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/img_spot03.jpg" class="img-fluid"
              alt="レゴランド®・ジャパン・リゾート">
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
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/img_spot04.jpg" class="img-fluid"
              alt="オアシス２１＆中部電力 MIRAI TOWER （栄エリア）">
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
          <a href="https://www.princehotels.co.jp/nagoya/" title="名古屋プリンスホテル スカイタワー" target="_blank">
            <img src="./<?php echo get_template_directory_uri(); ?>/common/img/logo.png" width="160"
              alt="名古屋プリンスホテル スカイタワー" />
          </a>
        </div>
        <div class="footertop__text">
          <h4 class="mb-2">名古屋プリンスホテル スカイタワー</h4>
          <!-- <p class="text-left mb-4">
              ホテルの位置する「ささしまライブ24」は、名古屋駅より1駅。中川運河の船出の場所として、古くから親しまれてきました。私たちはこの地でお客さまの特別な一日に寄り添い、何度も訪れたくなるホテルを目指しています。時間帯で変わりゆく景色、滞在シーンを彩る眺望はここにしかないパノラマエクスペリエンス。思いを込めたおもてなしが、ドラマチックなご滞在をお約束いたします。
            </p> -->
          <p class="mb-0">
            <a href="https://www.princehotels.co.jp/nagoya/plan/all/" target="_blank" title="ご予約はこちら"
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
                <a href="https://www.princehotels.co.jp/nagoya/" title="ホテルWebサイト" target="_blank"
                  class="btn btn-button">ホテルWebサイト</a>
              </li>
              <li>
                <a href="https://www.princehotels.co.jp/nagoya/access/" title="アクセス詳細はこちら" target="_blank"
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
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/footercenter_01.jpg" class="img-fluid pc"
              alt="" />
            <img src="<?php echo get_template_directory_uri(); ?>/common/img/footercenter_01_sp.jpg"
              class="img-fluid sp" alt="" />
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
    <img src="<?php echo get_template_directory_uri(); ?>/common/img/svg/arrow-top.svg" class="TOP" />
  </a>
</div>
<!-- .pageTop -->

<?php get_footer(); ?>