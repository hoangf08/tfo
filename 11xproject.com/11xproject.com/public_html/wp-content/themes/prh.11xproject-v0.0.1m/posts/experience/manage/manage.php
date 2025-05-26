<?php
// Import CSS từ thư mục css
function enqueue_experience_manage_styles() {
  wp_enqueue_style('experience-manage-style', get_template_directory_uri() . '/posts/experience/manage/css/style.css', array(), '1.0.38', 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_experience_manage_styles');

// Thêm meta box cho post type experience
function add_experience_meta_box() {
  add_meta_box(
    'experience_meta_box',
    'Experience',
    'experience_meta_box_html',
    'experience'
  );
}
add_action('add_meta_boxes', 'add_experience_meta_box');
// HTML cho meta box
function experience_meta_box_html($post) {
  // Lấy dữ liệu common
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

  $list_experience_contents = [];
  $spring_experience_contents = [];
  $summer_experience_contents = [];
  $autumn_experience_contents = [];
  $winter_experience_contents = [];
  $all_experience_contents = [];
  $recommend_experience_contents = [];
  $form_experience_contents = [];

  $list_spot_contents = [];
  $form_spot_contents = [];

  // MARK: LIST EXPERIENCE
  foreach ($experience_groups as $index => $experience) {
    $list_experience_contents[] = "
      <div class='card column".($index == 0 ? " select" : "").($experience['slide'] ? " slide_active" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
        <figure>
          <div class='aspect-16x9'>
            <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
            <div class='box absolute left top column'>
              <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
            </div>
            <div class='box absolute right top column'>
                <img class='icon spring-icon".($experience['spring'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/spring.svg' alt=''>
                <img class='icon summer-icon".($experience['summer'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/summer.svg' alt=''>
                <img class='icon autumn-icon".($experience['autumn'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/autumn.svg' alt=''>
                <img class='icon winter-icon".($experience['winter'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/winter.svg' alt=''>
                <img class='icon all-icon".($experience['all'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/all.svg' alt=''>
                <img class='icon recommend-icon".($experience['recommend'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/recommend.svg' alt=''>
            </div>
          </div>
        </figure>
        <span>".$experience['title_pc']."</span>
      </div>";
    if (isset($experience['spring'])) {
      $spring_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
              <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    if (isset($experience['summer'])) {
      $summer_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
                <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    if (isset($experience['autumn'])) {
      $autumn_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
                <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    if (isset($experience['winter'])) {
      $winter_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
                <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    if (isset($experience['all'])) {
      $all_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
                <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    if (isset($experience['recommend'])) {
      $recommend_experience_contents[] = "
        <div class='card".($index == 0 ? " select" : "").($experience['status'] ? "" : " disabled")."' index='".$index."'>
          <figure>
            <div class='aspect-16x9'>
              <img src='".wp_get_attachment_url($experience['slide_img'])."' alt=''>
              <div class='box absolute left top column'>
                <img class='icon slide-icon".($experience['slide'] ? "" : " hidden")."' src='".get_template_directory_uri()."/posts/experience/manage/svg/slide.svg' alt=''>
              </div>
            </div>
          </figure>
          <span class='title'>".$experience['title_pc']."</span>
        </div>";
    }
    $form_experience_contents[] = "
      <div class='block column gap-8 p-8 border-none ".($index == 0 ? " select" : "")."' index='".$index."'>
        <div class='box row'>
          <label class='form_item form_checkbox'>
            <input type='checkbox' name='experience[".$index."][status]' ".($experience['status'] ? "checked" : "").">
            <span>ステータス</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type='checkbox' name='experience[".$index."][slide]' ".($experience['slide'] ? "checked" : "").">
            <span>スライダー</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='spring' type='checkbox' name='experience[".$index."][spring]' ".($experience['spring'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][spring_order]' value='".$experience['spring_order']."'>
            <span>春</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='summer' type='checkbox' name='experience[".$index."][summer]' ".($experience['summer'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][summer_order]' value='".$experience['summer_order']."'>
            <span>夏</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='autumn' type='checkbox' name='experience[".$index."][autumn]' ".($experience['autumn'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][autumn_order]' value='".$experience['autumn_order']."'>
            <span>秋</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='winter' type='checkbox' name='experience[".$index."][winter]' ".($experience['winter'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][winter_order]' value='".$experience['winter_order']."'>
            <span>冬</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='all' type='checkbox' name='experience[".$index."][all]' ".($experience['all'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][all_order]' value='".$experience['all_order']."'>
            <span>通年</span>
          </label>
          <label class='form_item form_checkbox'>
            <input type-plan='recommend' type='checkbox' name='experience[".$index."][recommend]' ".($experience['recommend'] ? "checked" : "").">
            <input type='hidden' name='experience[".$index."][recommend_order]' value='".$experience['recommend_order']."'>
            <span>おすすめ</span>
          </label>
        </div>
        <div class='box grid grid-cols-3 gap-2'>
          <div class='form_item form_img col-start-2 slide_experience_img'>
            <img class='img_preview' src='".wp_get_attachment_url($experience['slide_img'])."' />
            <button class='img_upload_btn ".($experience['slide_img'] ? "" : "full_size_btn")."' type='button'>Chọn ảnh Slide</button>
            <button class='img_remove_btn ".($experience['slide_img'] ? "" : "hidden")."' type='button'>Xóa ảnh Slide</button>
            <input type='hidden' name='experience[".$index."][slide_img]' value='".$experience['slide_img']."'>
          </div>
        </div>
        <div class='box grid grid-cols-3 gap-2'>
          <div class='form_item form_img left_experience_img'>
            <img class='img_preview' src='".wp_get_attachment_url($experience['left_img'])."' />
            <button class='img_upload_btn ".($experience['left_img'] ? "" : "full_size_btn")."' type='button'>Chọn ảnh Left</button>
            <button class='img_remove_btn ".($experience['left_img'] ? "" : "hidden")."' type='button'>Xóa ảnh Left</button>
            <input type='hidden' name='experience[".$index."][left_img]' value='".$experience['left_img']."'>
          </div>
          <div class='form_item form_img main_experience_img'>
            <img class='img_preview' src='".wp_get_attachment_url($experience['main_img'])."' />
            <button class='img_upload_btn ".($experience['main_img'] ? "" : "full_size_btn")."' type='button'>Chọn ảnh Main</button>
            <button class='img_remove_btn ".($experience['main_img'] ? "" : "hidden")."' type='button'>Xóa ảnh Main</button>
            <input type='hidden' name='experience[".$index."][main_img]' value='".$experience['main_img']."'>
          </div>
          <div class='form_item form_img right_experience_img'>
            <img class='img_preview' src='".wp_get_attachment_url($experience['right_img'])."' />
            <button class='img_upload_btn ".($experience['right_img'] ? "" : "full_size_btn")."' type='button'>Chọn ảnh Right</button>
            <button class='img_remove_btn ".($experience['right_img'] ? "" : "hidden")."' type='button'>Xóa ảnh Right</button>
            <input type='hidden' name='experience[".$index."][right_img]' value='".$experience['right_img']."'>
          </div>
        </div>
        <div class='box row'>
          <div class='form_item form_text'>
            <textarea name='experience[".$index."][title_pc]' required placeholder=' '>".$experience['title_pc']."</textarea>
            <label for='textarea1'>タイトル（PC）</label>
          </div>
          <div class='form_item form_text'>
            <textarea name='experience[".$index."][title_sp]' required placeholder=' '>".$experience['title_sp']."</textarea>
            <label for='textarea2'>タイトル（SP）</label>
          </div>
        </div>
        <div class='form_item form_text'>
          <textarea name='experience[".$index."][content]' required placeholder=' '>".$experience['content']."</textarea>
          <label for='textarea2'>内容</label>
        </div>
        <div class='box row'>
          <div class='form_item form_datetime'>
            <input type='datetime-local' name='experience[".$index."][start_date]' required value='".$experience['start_date']."'>
            <label for=''>販売開始日時</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][before_text]' required value='".$experience['before_text']."'>
            <label for=''>販売前のテキスト</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][during_text]' required value='".$experience['during_text']."'>
            <label for=''>販売中のテキスト</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][after_text]' required value='".$experience['after_text']."'>
            <label for=''>販売後のテキスト</label>
          </div>
        </div>
        <div class='box row'>
          <div class='form_item form_datetime'>
            <input type='datetime-local' name='experience[".$index."][end_date]' required value='".$experience['end_date']."'>
            <label for=''>販売終了日時</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][before_url]' required value='".$experience['before_url']."'>
            <label for=''>販売前のURL</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][during_url]' required value='".$experience['during_url']."'>
            <label for=''>販売中のURL</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='experience[".$index."][after_url]' required value='".$experience['after_url']."'>
            <label for=''>販売後のURL</label>
          </div>
        </div>
      </div>";
  }

  // MARK: LIST SPOT
  foreach ($spot_groups as $index => $spot) {
    $list_spot_contents[] = "
      <div class='card column".($index == 0 ? " select" : "").($spot['status'] ? "" : " disabled")."' index='".$index."'>
        <figure>
          <div class='aspect-16x9'>
            <img src='".wp_get_attachment_url($spot['img'])."' alt=''>
          </div>
        </figure>
        <span>".$spot['name']."</span>
      </div>";
    $form_spot_contents[] = "
      <div class='block column gap-8 p-8 border-none".($index == 0 ? " select" : "")."' index='".$index."'>
        <div class='box row'>
          <label class='form_item form_checkbox flex-shrink-4'><input type='checkbox' name='spot[".$index."][status]' ".($spot['status'] ? "checked" : "")."><span>ステータス</span></label>
          <div class='form_item form_text'>
            <textarea name='spot[".$index."][name]' required placeholder=' '>".$spot['name']."</textarea>
            <label for='textarea1'>スポット名</label>
          </div>
        </div>
        <div class='box grid gap-2 grid-cols-spot-img-template-columns'>
          <div class='form_item form_img spot_img flex-shrink-0'>
            <img class='img_preview' src='".wp_get_attachment_url($spot['img'])."' />
            <button class='img_upload_btn ".($spot['img'] ? "" : "full_size_btn")."' type='button'>Chọn ảnh Spot</button>
            <button class='img_remove_btn ".($spot['img'] ? "" : "hidden")."' type='button'>Xóa ảnh Spot</button>
            <input type='hidden' name='spot[".$index."][img]' value='".$spot['img']."'>
          </div>
          <div class='form_item form_text'>
            <textarea name='spot[".$index."][intro]' required placeholder=' '>".$spot['intro']."</textarea>
            <label for='textarea2'>説明文</label>
          </div>
        </div>
        <div class='box row'>
          <div class='form_item form_text'>
            <input type='text' name='spot[".$index."][site_name]' required value='".$spot['site_name']."'>
            <label for=''>公式名</label>
          </div>
          <div class='form_item form_text'>
            <input type='text' name='spot[".$index."][site_url]' required value='".$spot['site_url']."'>
            <label for=''>公式URL</label>
          </div>
        </div>
      </div>";
  }

  // MARK: MAIN HTML
?>
<div id="common" class="wrapper">
  <h2 class="text-xl">一般情報</h2>
  <div class="block column gap-8 p-8">
    <div class="form_item form_text">
      <input type="text" name="common[seo_description]" required value="<?php echo $common['seo_description']; ?>">
      <label for="">SEO デスクリプション</label>
    </div>
    <div class="form_item form_text">
      <input type="text" name="common[seo_keywords]" required value="<?php echo $common['seo_keywords']; ?>">
      <label for="">SEO キーワード</label>
    </div>
    <div class="form_item form_text">
      <input type="text" name="common[seo_title]" required value="<?php echo $common['seo_title']; ?>">
      <label for="">SEO タイトル</label>
    </div>
    <div class="box row">
      <div class="form_item form_text">
        <input type="text" name="common[name_jp]" required value="<?php echo $common['name_jp']; ?>">
        <label for="">名称（日本語）</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="common[name_en]" required value="<?php echo $common['name_en']; ?>">
        <label for="">名称（英語）</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="common[name_url]" required value="<?php echo $common['name_url']; ?>">
        <label for="">名称（URL）</label>
      </div>
    </div>
    <div class="form_item form_text">
      <textarea name="common[feature]" id="textarea1" required placeholder=" "><?php echo $common['feature']; ?></textarea>
      <label for="textarea1">特徴を入力してください</label>
    </div>
    <div class="form_item form_text">
      <textarea name="common[summary]" id="textarea2" required placeholder=" "><?php echo $common['summary']; ?></textarea>
      <label for="textarea2">概要を入力してください</label>
    </div>
  </div>
</div>
<div id="experience" class="wrapper">
  <h2 class="text-xl">体験</h2>
  <div class="container column-4x1_3">
    <div class="block col-span-2">
      <h3 class="center">リスト</h3>
      <div class="group gap-y-10" id="experience-list">
        <?php echo implode('', $list_experience_contents); ?>
      </div>
    </div>
    <div id="type-plan-list" class="block">
      <h3 class="center">プレビュー</h3>
      <div id="spring-group" class="border-t mt-10">
        <strong>春</strong>
        <div class="group column">
          <?php echo implode('', $spring_experience_contents); ?>
        </div>
      </div>
      <div id="summer-group" class="border-t mt-10">
        <strong>夏</strong>
        <div class="group column">
          <?php echo implode('', $summer_experience_contents); ?>
        </div>
      </div>
      <div id="autumn-group" class="border-t mt-10">
        <strong>秋</strong>
        <div class="group column">
          <?php echo implode('', $autumn_experience_contents); ?>
        </div>
      </div>
      <div id="winter-group" class="border-t mt-10">
        <strong>冬</strong>
        <div class="group column">
          <?php echo implode('', $winter_experience_contents); ?>
        </div>
      </div>
      <div id="all-group" class="border-t mt-10">
        <strong>通年</strong>
        <div class="group column">
          <?php echo implode('', $all_experience_contents); ?>
        </div>
      </div>
      <div id="recommend-group" class="border-t mt-10">
        <strong>おすすめ</strong>
        <div class="group column">
          <?php echo implode('', $recommend_experience_contents); ?>
        </div>
      </div>
    </div>
    <div id="experience-forms">
      <div class="block flex gap-4">
        <h3 class="center">体験フォーム</h3>
        <button class="btn add_btn float-right ml-auto" id="add-experience-btn" type="button">Thêm Experience</button>
        <button class="btn delete_btn float-right" id="delete-experience-btn" type="button">Xóa Experience</button>
      </div>
      <?php echo implode('', $form_experience_contents); ?>
    </div>
  </div>
</div>
<div id="spot" class="wrapper">
  <h2 class="text-xl">スポット</h2>
  <div class="container row">
    <div class="block">
      <h3 class="center">リスト</h3>
      <div class="group gap-y-10 grid-cols-2" id="spot-list">
        <?php echo implode('', $list_spot_contents); ?>
      </div>
    </div>
    <div id="spot-forms">
      <div class="block flex justify-between">
        <h3 class="center">スポットフォーム</h3>
        <button class="btn add_btn float-right ml-auto" id="add-spot-btn" type="button">Thêm Spot</button>
        <button class="btn delete_btn float-right" id="delete-spot-btn" type="button">Xóa Spot</button>
      </div>
      <?php echo implode('', $form_spot_contents); ?>
    </div>
  </div>
</div>

<?php 
// MARK: TEMPLATE
?>

<div id="list-item-experience-template" class="hidden">
  <div class="card column select" index="INDEX">
    <figure>
      <div class="aspect-16x9">
        <img src="" alt="">
        <div class="box absolute left top column">
          <img class="icon slide-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
        </div>
        <div class="box absolute right top column">
          <img class="icon spring-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
          <img class="icon summer-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
          <img class="icon autumn-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
          <img class="icon winter-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
          <img class="icon all-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
          <img class="icon recommend-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
        </div>
      </div>
    </figure>
    <span>New Experience</span>
  </div>
</div>

<div id="season-item-experience-template" class="hidden">
  <div class="card" index="INDEX">
    <figure>
      <div class="aspect-16x9">
        <img src="" alt="">
        <div class="box absolute left top column">
          <img class="icon slide-icon hidden" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
        </div>
      </div>
    </figure>
    <span class="title">New Experience</span>
  </div>
</div>

<div id="form-experience-template" class="hidden">
  <div class="block column gap-8 p-8 border-none select" index="INDEX">
    <div class="box row">
      <label class="form_item form_checkbox">
        <input type="checkbox" name="TYPE[INDEX][status]" checked>
        <span>ステータス</span>
      </label>
      <label class="form_item form_checkbox">
        <input type="checkbox" name="TYPE[INDEX][slide]">
        <span>スライダー</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="spring" type="checkbox" name="TYPE[INDEX][spring]">
        <input type='hidden' name='TYPE[INDEX][spring_order]' value='-1'>
        <span>春</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="summer" type="checkbox" name="TYPE[INDEX][summer]">
        <input type='hidden' name='TYPE[INDEX][summer_order]' value='-1'>
        <span>夏</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="autumn" type="checkbox" name="TYPE[INDEX][autumn]">
        <input type='hidden' name='TYPE[INDEX][autumn_order]' value='-1'>
        <span>秋</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="winter" type="checkbox" name="TYPE[INDEX][winter]">
        <input type='hidden' name='TYPE[INDEX][winter_order]' value='-1'>
        <span>冬</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="all" type="checkbox" name="TYPE[INDEX][all]">
        <input type='hidden' name='TYPE[INDEX][all_order]' value='-1'>
        <span>通年</span>
      </label>
      <label class="form_item form_checkbox">
        <input type-plan="recommend" type="checkbox" name="TYPE[INDEX][recommend]">
        <input type='hidden' name='TYPE[INDEX][recommend_order]' value='-1'>
        <span>おすすめ</span>
      </label>
    </div>
    <div class="box grid grid-cols-3 gap-2">
      <div class="form_item form_img col-start-2 slide_experience_img">
        <img class="img_preview" src="" />
        <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Slide</button>
        <button class="img_remove_btn hidden" type="button">Xóa ảnh Slide</button>
        <input type="hidden" name="TYPE[INDEX][slide_img]">
      </div>
    </div>
    <div class="box grid grid-cols-3 gap-2">
      <div class="form_item form_img left_experience_img">
        <img class="img_preview" src="" />
        <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Left</button>
        <button class="img_remove_btn hidden" type="button">Xóa ảnh Left</button>
        <input type="hidden" name="TYPE[INDEX][left_img]">
      </div>
      <div class="form_item form_img main_experience_img">
        <img class="img_preview" src="" />
        <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Main</button>
        <button class="img_remove_btn hidden" type="button">Xóa ảnh Main</button>
        <input type="hidden" name="TYPE[INDEX][main_img]">
      </div>
      <div class="form_item form_img right_experience_img">
        <img class="img_preview" src="" />
        <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Right</button>
        <button class="img_remove_btn hidden" type="button">Xóa ảnh Right</button>
        <input type="hidden" name="TYPE[INDEX][right_img]">
      </div>
    </div>
    <div class="box row">
      <div class="form_item form_text">
        <textarea name="TYPE[INDEX][title_pc]" required placeholder=" ">New Experience</textarea>
        <label for="textarea1">タイトル（PC）</label>
      </div>
      <div class="form_item form_text">
        <textarea name="TYPE[INDEX][title_sp]" required placeholder=" "></textarea>
        <label for="textarea2">タイトル（SP）</label>
      </div>
    </div>
    <div class="form_item form_text">
      <textarea name="TYPE[INDEX][content]" required placeholder=" "></textarea>
      <label for="textarea2">内容</label>
    </div>
    <div class="box row">
      <div class="form_item form_datetime">
        <input type="datetime-local" name="TYPE[INDEX][start_date]" required>
        <label for="">販売開始日時</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][before_text]" required>
        <label for="">販売前のテキスト</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][during_text]" required>
        <label for="">販売中のテキスト</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][after_text]" required>
        <label for="">販売後のテキスト</label>
      </div>
    </div>
    <div class="box row">
      <div class="form_item form_datetime">
        <input type="datetime-local" name="TYPE[INDEX][end_date]" required>
        <label for="">販売終了日時</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][before_url]" required>
        <label for="">販売前のURL</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][during_url]" required>
        <label for="">販売中のURL</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][after_url]" required>
        <label for="">販売後のURL</label>
      </div>
    </div>
  </div>
</div>

<div id="list-item-spot-template" class="hidden">
  <div class="card column select" index="INDEX">
    <figure>
      <div class="aspect-16x9">
        <img src="" alt="">
      </div>
    </figure>
    <span>New Spot</span>
  </div>
</div>

<div id="form-spot-template" class="hidden">
  <div class="block column gap-8 p-8 border-none select" index="INDEX">
    <div class="box row">
      <label class="form_item form_checkbox flex-shrink-4"><input type="checkbox" name="TYPE[INDEX][status]" checked><span>ステータス</span></label>
      <div class="form_item form_text">
        <textarea name="TYPE[INDEX][name]" required placeholder=" ">New Spot</textarea>
        <label for="textarea1">スポット名</label>
      </div>
    </div>
    <div class="box grid gap-2 grid-cols-spot-img-template-columns">
      <div class="form_item form_img spot_img flex-shrink-0">
        <img class="img_preview" src="" />
        <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Spot</button>
        <button class="img_remove_btn hidden" type="button">Xóa ảnh Spot</button>
        <input type="hidden" name="spotTYPE[INDEX][img]">
      </div>
      <div class="form_item form_text">
        <textarea name="TYPE[INDEX][intro]" required placeholder=" "></textarea>
        <label for="textarea2">説明文</label>
      </div>
    </div>
    <div class="box row">
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][site_name]" required>
        <label for="">公式名</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="TYPE[INDEX][site_url]" required>
        <label for="">公式URL</label>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
jQuery(document).ready(function($) {
var countExperience = <?php echo count($experience_groups); ?>;
var countSpot = <?php echo count($spot_groups); ?>;
  
<?php 
// MARK: EXPERIENCE SCRIPT
?>

  // Sử dụng event delegation cho các nút
  $('#experience-forms, #spot-forms').on('click', '.img_upload_btn', function(e){
    e.preventDefault();
    uploadImage($(this));
  });
  
  // Xóa ảnh
  $('#experience-forms, #spot-forms').on('click', '.img_remove_btn', function(){
    removeImage($(this));
  });

  // Thêm experience
  $('#add-experience-btn').on('click', function(){
    addExperience();
  });
  
  // Xóa experience
  $('#delete-experience-btn').on('click', function(){
    deleteExperience();
  });

  // Select experience card
  $('#experience-list').on('click', '.card:not(.select)', function() {
    var index = $(this).attr('index');
    $(this).addClass('select');
    $(this).siblings().removeClass('select');
    $('#experience-forms > .column.select').removeClass('select');
    $('#experience-forms > .column[index="'+index+'"]').addClass('select');
    $('#type-plan-list .card.select').removeClass('select');
    $('#type-plan-list .card[index="'+index+'"]').addClass('select');
  });

  // Update experience card title
  $('#experience-forms').on('input', 'textarea[name*="[title_pc]"]', function() {
    var index = $(this).closest('.block.column').attr('index');
    var title = $(this).val();
    
    // Cập nhật title cho card trong experience list
    $('#experience-list .card[index="' + index + '"] span').text(title);
    
    // Cập nhật title cho tất cả các card trong season list
    $('#type-plan-list .card[index="' + index + '"] span').text(title);
  });

  // Update status plan
  $('#experience-forms').on('change', 'input[name*="[status]"]', function() {
    var index = $(this).closest('.block.column').attr('index');
    var isChecked = $(this).is(':checked');
    if(isChecked) {
      $('#experience-list .card[index="' + index + '"], #type-plan-list .card[index="' + index + '"]').removeClass('disabled');
    } else {
      $('#experience-list .card[index="' + index + '"], #type-plan-list .card[index="' + index + '"]').addClass('disabled');
    }
  });

  // Update slide plan
  $('#experience-forms').on('change', 'input[name*="[slide]"]', function() {
    var index = $(this).closest('.block.column').attr('index');
    var isChecked = $(this).is(':checked');
    if(isChecked) {
      $('#experience-list .card[index="' + index + '"]').addClass('slide_active');
      $('.card[index="' + index + '"] .slide-icon').removeClass('hidden');
    } else {
      $('#experience-list .card[index="' + index + '"]').removeClass('slide_active');
      $('.card[index="' + index + '"] .slide-icon').addClass('hidden');
    }
  });

  // Update item to type plan list
  $('#experience-forms').on('change', 'input[type-plan]', function() {
    // var input = $(this).find('input[type-plan]');
    var parent = $(this).closest('.block.column');
    var isChecked = $(this).is(':checked');
    console.log(isChecked);
    var index = parent.attr('index');
    var typePlan = $(this).attr('type-plan');
    var imgSrc = parent.find('.slide_experience_img .img_preview').attr('src');
    var title = parent.find('textarea[name*="[title_pc]"]').val();
    if(isChecked) {
      $(this).next('input[name*="' + typePlan + '_order"]').val($('#' + typePlan + '-group .card').length);
      $('#type-plan-list .card.select').removeClass('select');
      $('#experience-list .card[index="' + index + '"] .' + typePlan + '-icon').removeClass('hidden');
      addItemTypePlanList(index, typePlan, imgSrc, title);
      $('#type-plan-list .card[index="' + index + '"]').addClass('select');
    } else {
      deleteItemTypePlanList(index, typePlan);
      $('#experience-list .card[index="' + index + '"] .' + typePlan + '-icon').addClass('hidden');
    }
  });

  // Select type plan card
  $('#type-plan-list').on('click', '.card:not(.select)', function(){
    var index = $(this).attr('index');
    $('#type-plan-list .select').removeClass('select');
    $('#type-plan-list .card[index="'+index+'"]').addClass('select');
    $('#experience-forms > .column.select').removeClass('select');
    $('#experience-forms > .column[index="'+index+'"]').addClass('select');
    $('#experience-list .card.select').removeClass('select');
    $('#experience-list .card[index="'+index+'"]').addClass('select');
  });

  // Enable drag and drop sorting for experience list
  $('#experience-list').sortable({
    update: function(event, ui) {
      // Update the order of the experience forms based on the new order
      $('#experience-list .card').each(function(index) {
        var cardIndex = $(this).attr('index');
        $('#experience-forms .block.column[index="' + cardIndex + '"]').attr('data-order', index);
      });

      // Sort the forms in the experience-forms container based on the new order
      var sortedForms = $('#experience-forms .block').sort(function(a, b) {
        return $(a).data('order') - $(b).data('order');
      });
      $('#experience-forms').html(sortedForms);
    }
  });

  // Enable drag and drop sorting for type plan groups
  $('#type-plan-list .group').sortable({
    connectWith: '#type-plan-list .group',
    update: function(event, ui) {
      var group = $(this).closest('.group');
      var parent = group.parent();
      var typePlan = parent.attr('id').replace('-group', '');
      
      // Update the order of the items in the group
      group.find('.card').each(function(index) {
        var cardIndex = $(this).attr('index');
        var orderInput = $('#experience-forms .block.column[index="' + cardIndex + '"] input[name*="[' + typePlan + '_order]"]');
        orderInput.val(index);
      });
    }
  });

  function addItemTypePlanList(index, typePlan, imgSrc, title) {
    var cardTemplate = $('#season-item-experience-template').html();
    var card = $(cardTemplate.replace(/INDEX/g, index));
    card.find('img:first').attr('src', imgSrc);
    card.find('.title').text(title);

    if(typePlan == 'spring') {
      $('#spring-group > .group').append(card);
    } else if(typePlan == 'summer') {
      $('#summer-group > .group').append(card);
    } else if(typePlan == 'autumn') {
      $('#autumn-group > .group').append(card);
    } else if(typePlan == 'winter') {
      $('#winter-group > .group').append(card);
    } else if(typePlan == 'all') {
      $('#all-group > .group').append(card);
    } else if(typePlan == 'recommend') {
      $('#recommend-group > .group').append(card);
    }
  }

  function deleteItemTypePlanList(index, typePlan) {
    if(typePlan == 'spring') {
      $('#spring-group .card[index="' + index + '"]').remove();
    } else if(typePlan == 'summer') {
      $('#summer-group .card[index="' + index + '"]').remove();
    } else if(typePlan == 'autumn') {
      $('#autumn-group .card[index="' + index + '"]').remove();
    } else if(typePlan == 'winter') {
      $('#winter-group .card[index="' + index + '"]').remove();
    } else if(typePlan == 'all') {
      $('#all-group .card[index="' + index + '"]').remove();
    } else if(typePlan == 'recommend') {
      $('#recommend-group .card[index="' + index + '"]').remove();
    }
  }
  
  function uploadImage(currentBtn){
    var frame;
    if(frame){
        frame.open();
        return;
    }
    frame = wp.media({
        title: 'Chọn ảnh',
        button: { text: 'Chọn ảnh' },
        multiple: false
    });
    // Tìm parent .block.column để lấy index
    var parentBlock = currentBtn.closest('.block.column');
    var index = parentBlock.attr('index');
    // Xác định thẻ img cùng hàng với nút vừa nhấn
    var parentFormImg = currentBtn.closest('.form_img');
    var imgUploadBtn = parentFormImg.find('.img_upload_btn');
    var imgPreview = parentFormImg.find('.img_preview');
    var imgRemoveBtn = parentFormImg.find('.img_remove_btn');
    var inputElement = parentFormImg.find('input[type="hidden"]');

    console.log(imgUploadBtn);
    console.log(imgPreview);
    console.log(imgRemoveBtn);
    // Thiết lập callback khi chọn ảnh
    frame.on('select', function(){
        var attachment = frame.state().get('selection').first().toJSON();
        // Cập nhật ảnh preview
        imgPreview.attr('src', attachment.url);
        // Thêm class full-size-btn vào nút chọn ảnh
        imgUploadBtn.removeClass('full_size_btn');
        // Hiển thị nút xóa ảnh
        imgRemoveBtn.removeClass('hidden');
        // Cập nhật giá trị của input hidden
        inputElement.val(attachment.id);
        // Cập nhật ảnh cho #experience-list nếu là slide image
        if(parentFormImg.hasClass('slide_experience_img')) {
            $('#experience-list > .card[index="'+index+'"] img:first').attr('src', attachment.url);
            $('#type-plan-list .card[index="'+index+'"] img').attr('src', attachment.url);
        }
        if(parentFormImg.hasClass('spot_img')) {
            $('#spot-list > .card[index="'+index+'"] img').attr('src', attachment.url);
        }
    });
    frame.open();
  };

  function removeImage(currentBtn){
    // Tìm parent .block.column để lấy index
    var parentBlock = currentBtn.closest('.block.column');
    var index = parentBlock.attr('index');
    // Xác định thẻ img cùng hàng với nút vừa nhấn
    var parentFormImg = currentBtn.closest('.form_img');
    var imgPreview = parentFormImg.find('.img_preview');
    var imgUploadBtn = parentFormImg.find('.img_upload_btn');
    var inputElement = parentFormImg.find('input[type="hidden"]');
    imgPreview.attr('src', '');
    imgUploadBtn.addClass('full_size_btn');
    currentBtn.addClass('hidden');
    inputElement.val('');
    if(parentFormImg.hasClass('slide_experience_img')) {
        $('#experience-list > .card[index="'+index+'"] img:first').attr('src', '');
    }
    if(parentFormImg.hasClass('spot_img')) {
        $('#spot-list > .card[index="'+index+'"] img').attr('src', '');
    }
  }
  
  function addExperience(){
    // Lấy list item template
    var listItemTemplate = $('#list-item-experience-template').html().replace(/INDEX/g, countExperience);
    var experienceList = $('#experience-list');

    experienceList.find('.select').removeClass('select');

    experienceList.append(listItemTemplate);

    // Lấy season item template
    var seasonItemTemplate = $('#season-item-experience-template').html().replace(/INDEX/g, countExperience);
    var seasonForms = $('#all-group');
    seasonForms.append(seasonItemTemplate);

    // Lấy form template
    var formTemplate = $('#form-experience-template').html().replace(/TYPE/g, 'experience').replace(/INDEX/g, countExperience);
    var formExperience = $('#experience-forms');
    formExperience.find('.select').removeClass('select');
    formExperience.append(formTemplate);

    countExperience++;
  }

  function deleteExperience(){
    // Xóa class active từ tất cả các block
    var $form = $('#experience-forms .column.select');
    var index = $form.attr('index');
    $form.remove();
    $('#experience-list > .card[index="'+index+'"]').remove();
    $('#type-plan-list .card[index="'+index+'"]').remove();
    // Tìm thẻ .block.column đầu tiên trong #experience-forms
    $('#experience-forms .block.column:first').addClass('select');
    $('#experience-list .card:first').addClass('select');
  }

  <?php 
// MARK: SPOT SCRIPT
?>

  // Thêm spot
  $('#add-spot-btn').on('click', function(){
    addSpot();
  });
  
  // Xóa spot
  $('#delete-spot-btn').on('click', function(){
    deleteSpot();
  });

  // Select spot card
  $('#spot-list').on('click', '.card:not(.select)', function(){
    var index = $(this).attr('index');
    $(this).addClass('select');
    $(this).siblings().removeClass('select');
    $('#spot-forms > .column.select').removeClass('select');
    $('#spot-forms > .column[index="'+index+'"]').addClass('select');
  });

  // Update spot card title
  $('#spot-forms').on('input', 'textarea[name*="[name]"]', function() {
    var index = $(this).closest('.block.column').attr('index');
    var title = $(this).val();
    
    // Cập nhật title cho card trong spot list
    $('#spot-list .card[index="' + index + '"] span').text(title);
  });

  // Update status plan
  $('#spot-forms').on('change', 'input[name*="[status]"]', function() {
    var index = $(this).closest('.block.column').attr('index');
    var isChecked = $(this).is(':checked');
    if(isChecked) {
      $('#spot-list .card[index="' + index + '"]').removeClass('disabled');
    } else {
      $('#spot-list .card[index="' + index + '"]').addClass('disabled');
    }
  });

  // Enable drag and drop sorting for spot list
  $('#spot-list').sortable({
    update: function(event, ui) {
      // Update the order of the spot forms based on the new order
      $('#spot-list .card').each(function(index) {
        var cardIndex = $(this).attr('index');
        $('#spot-forms .block.column[index="' + cardIndex + '"]').attr('data-order', index);
      });

      // Sort the forms in the spot-forms container based on the new order
      var sortedForms = $('#spot-forms .block').sort(function(a, b) {
        return $(a).data('order') - $(b).data('order');
      });
      $('#spot-forms').html(sortedForms);
    }
  });

  function addSpot(){
    // Lấy list item template
    var listItemTemplate = $('#list-item-spot-template').html().replace(/INDEX/g, countSpot);
    var spotList = $('#spot-list');

    spotList.find('.select').removeClass('select');

    spotList.append(listItemTemplate);

    // Lấy form template
    var formTemplate = $('#form-spot-template').html().replace(/TYPE/g, 'spot').replace(/INDEX/g, countSpot);
    var formSpot = $('#spot-forms');
    formSpot.find('.select').removeClass('select');
    formSpot.append(formTemplate);

    countSpot++;
  }

  function deleteSpot(){
    // Xóa class active từ tất cả các block
    var $form = $('#spot-forms .column.select');
    var index = $form.attr('index');
    $form.remove();
    $('#spot-list > .card[index="'+index+'"]').remove();
    // Tìm thẻ .block.column đầu tiên trong #spot-forms
    $('#spot-forms .block.column:first').addClass('select');
    $('#spot-list .card:first').addClass('select');
  }


});
</script>

<?php
}
// Lưu meta khi lưu bài viết
function save_experience_meta_box($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (get_post_type($post_id) !== 'experience') return;
    if (!current_user_can('edit_post', $post_id)) return;

    // Lưu experience groups nếu có
  if (isset($_POST['common'])) {
    update_post_meta($post_id, '_common', $_POST['common']);
  }
  
  // Lưu experience groups nếu có
  if (isset($_POST['experience'])) {
    $experience_groups = array();
    
    foreach ($_POST['experience'] as $index => $group) {
      // Lưu trạng thái status cho từng experience
      $experience['status'] = $group['status'];
      $experience['slide'] = $group['slide'];
      $experience['spring'] = $group['spring'];
      $experience['spring_order'] = $group['spring_order'];
      $experience['summer'] = $group['summer'];
      $experience['summer_order'] = $group['summer_order'];
      $experience['autumn'] = $group['autumn'];
      $experience['autumn_order'] = $group['autumn_order'];
      $experience['winter'] = $group['winter'];
      $experience['winter_order'] = $group['winter_order'];
      $experience['all'] = $group['all'];
      $experience['all_order'] = $group['all_order'];
      $experience['recommend'] = $group['recommend'];
      $experience['recommend_order'] = $group['recommend_order'];
      $experience['slide_img'] = $group['slide_img'];
      $experience['main_img'] = $group['main_img'];
      $experience['left_img'] = $group['left_img'];
      $experience['right_img'] = $group['right_img'];
      $experience['title_pc'] = $group['title_pc'];
      $experience['title_sp'] = $group['title_sp'];
      $experience['content'] = $group['content'];
      $experience['start_date'] = $group['start_date'];
      $experience['before_text'] = $group['before_text'];
      $experience['during_text'] = $group['during_text'];
      $experience['after_text'] = $group['after_text'];
      $experience['end_date'] = $group['end_date'];
      $experience['before_url'] = $group['before_url'];
      $experience['during_url'] = $group['during_url'];
      $experience['after_url'] = $group['after_url'];
      $experience_groups[$index] = $experience;
    }
    
    // Sắp xếp lại mảng để đảm bảo các index là liên tục
    $experience_groups = array_values($experience_groups);
    
    update_post_meta($post_id, '_experience_groups', $experience_groups);
  } else {
    update_post_meta($post_id, '_experience_groups', array());
  }
  
  // Lưu spot groups nếu có
  if (isset($_POST['spot'])) {
    $spot_groups = array();
    
    foreach ($_POST['spot'] as $index => $group) {
      // Lưu trạng thái status cho từng spot
      $spot['status'] = $group['status'];
      $spot['img'] = $group['img'];
      $spot['name'] = $group['name'];
      $spot['intro'] = $group['intro'];
      $spot['site_name'] = $group['site_name'];
      $spot['site_url'] = $group['site_url'];
      $spot_groups[$index] = $spot;
    }
    
    // Sắp xếp lại mảng để đảm bảo các index là liên tục
    $spot_groups = array_values($spot_groups);
    
    update_post_meta($post_id, '_spot_groups', $spot_groups);
  } else {
    update_post_meta($post_id, '_spot_groups', array());
  }

}
add_action('save_post_experience', 'save_experience_meta_box');



?>