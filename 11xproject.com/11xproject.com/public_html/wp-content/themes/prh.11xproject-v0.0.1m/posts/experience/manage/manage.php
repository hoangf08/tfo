<?php
// Import CSS từ thư mục css
function enqueue_experience_manage_styles() {
  wp_enqueue_style('experience-manage-style', get_template_directory_uri() . '/posts/experience/manage/css/style.css', array(), '1.0.8');
}
add_action('admin_enqueue_scripts', 'enqueue_experience_manage_styles');

// Thêm meta box cho post type experience
function add_experience_meta_box()
{
  add_meta_box(
    'experience_meta_box',
    'Experience',
    'experience_meta_box_html',
    'experience'
  );
}
add_action('add_meta_boxes', 'add_experience_meta_box');
// HTML cho meta box
function experience_meta_box_html($post)
{
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

  // Lấy dữ liệu area groups 
  $area_groups = get_post_meta($post->ID, '_area_groups', true);
  if (!is_array($area_groups)) {
    $area_groups = array();
  }
?>
<!-- <style>
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
  }
  button {
    cursor: pointer;
  }

  .btn {
    border: none;
  }
  .hide {
    display: none;
  }
  .form-img {
    width: 320px;
    aspect-ratio: 16/9;
    background: #ccc;
    position: relative;
    border-radius: 8px;
    overflow: hidden;
  }
  .img-upload-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #6366f1;
    color: white;
    padding: 8px 16px;
    border-radius: 4px;
    font-weight: 500;
    transition: all 0.3s ease;
  }
  .img-upload-btn:hover {
    background-color: #4f46e5;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }
  .full-size-btn {
    width: 100%;
    height: 100%;
    background: transparent;
    border-radius: 8px;
    border: none;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 600;
    color: #ffffff;
    text-shadow: 0px 1px 3px rgba(0, 0, 0, 0.6);
    transition: all 0.2s ease;
    background-color: rgba(0, 0, 0, 0.2);
  }
  .full-size-btn:hover {
    background-color: rgba(0, 0, 0, 0.3);
  }
  .img-remove-btn {
    position: absolute;
    top: 8px;
    right: 8px;
    background-color: #ef4444;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-weight: 500;
    transition: all 0.3s ease;
  }
  .img-remove-btn:hover {
    background-color: #dc2626;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
  }
</style> -->
<div id="common" class="wrapper">
  <h2 class="text-xl">一般情報</h2>
  <div class="block column gap-8 p-8">
    <div class="form_item form_text">
      <input type="text" name="" required>
      <label for="">SEO デスクリプション</label>
    </div>
    <div class="form_item form_text">
      <input type="text" name="" required>
      <label for="">SEO キーワード</label>
    </div>
    <div class="form_item form_text">
      <input type="text" name="" required>
      <label for="">SEO タイトル</label>
    </div>
    <div class="box row">
      <div class="form_item form_text">
        <input type="text" name="" required>
        <label for="">名称（日本語）</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="" required>
        <label for="">名称（英語）</label>
      </div>
      <div class="form_item form_text">
        <input type="text" name="" required>
        <label for="">名称（URL）</label>
      </div>
    </div>
    <div class="form_item form_text">
      <textarea name="" id="textarea1" required placeholder=" "></textarea>
      <label for="textarea1">特徴を入力してください</label>
    </div>
    <div class="form_item form_text">
      <textarea name="" id="textarea2" required placeholder=" "></textarea>
      <label for="textarea2">概要を入力してください</label>
    </div>
  </div>
</div>
<div id="experience" class="wrapper">
  <h2 class="text-xl">体験</h2>
  <div class="container column-4x1_3">
    <div class="block col-span-2">
      <h3 class="center">リスト</h3>
      <div class="group gap-y-10">
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
              <div class="box absolute left top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
              </div>
              <div class="box absolute right top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
              </div>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
              <div class="box absolute left top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
              </div>
              <div class="box absolute right top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
              </div>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
              <div class="box absolute left top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
              </div>
              <div class="box absolute right top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
              </div>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
              <div class="box absolute left top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
              </div>
              <div class="box absolute right top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
              </div>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
              <div class="box absolute left top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
              </div>
              <div class="box absolute right top column">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/spring.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/summer.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/autumn.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/winter.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/all.svg" alt="">
                <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/recommend.svg" alt="">
              </div>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
      </div>
    </div>
    <div class="block">
      <h3 class="center">プレビュー</h3>
      <div id="spring-group" class="border-t mt-10">
        <strong>春</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
      <div id="summer-group" class="border-t mt-10">
        <strong>夏</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
      <div id="autumn-group" class="border-t mt-10">
        <strong>秋</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
      <div id="winter-group" class="border-t mt-10">
        <strong>冬</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
      <div id="all-group" class="border-t mt-10">
        <strong>通年</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
      <div id="recommend-group" class="border-t mt-10">
        <strong>おすすめ</strong>
        <div class="group column">
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
          <div class="card">
            <figure>
              <div class="aspect-16x9">
                <picture>
                  <img src="" alt="">
                </picture>
                <div class="box absolute left top column">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/slide.svg" alt="">
                  <img class="icon" src="<?php echo get_template_directory_uri(); ?>/posts/experience/manage/svg/unslide.svg" alt="">
                </div>
              </div>
            </figure>
            <span class="title">タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
          </div>
        </div>
      </div>
    </div>
    <div id="experience-forms">
      <div class="block flex justify-between">
        <h3 class="center">体験フォーム</h3>
        <button class="btn add_btn float-right" id="add_experience_btn" type="button">Thêm Experience</button>
      </div>
      <div class="block column gap-8 p-8 border-none">
        <div class="box row">
          <label class="form_item form_checkbox"><input type="checkbox" name="a"><span>ステータス</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="b"><span>スライダー</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="c"><span>春</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="d"><span>夏</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="e"><span>秋</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="e"><span>冬</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="f"><span>通年</span></label>
          <label class="form_item form_checkbox"><input type="checkbox" name="g"><span>おすすめ</span></label>
        </div>
        <div class="box grid grid-cols-3 gap-2">
          <div class="form_item form_img col-start-2 slide_experience_img">
            <img class="img_preview" src="" />
            <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Slide</button>
            <button class="img_remove_btn hidden" type="button">Xóa ảnh Slide</button>
            <input type="hidden" name="experience[INDEX][left_experience_img]">
          </div>
        </div>
        <div class="box grid grid-cols-3 gap-2">
          <div class="form_item form_img left_experience_img">
            <img class="img_preview" src="" />
            <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Left</button>
            <button class="img_remove_btn hidden" type="button">Xóa ảnh Left</button>
            <input type="hidden" name="experience[INDEX][left_experience_img]">
          </div>
          <div class="form_item form_img main_experience_img">
            <img class="img_preview" src="" />
            <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Main</button>
            <button class="img_remove_btn hidden" type="button">Xóa ảnh Main</button>
            <input type="hidden" name="experience[INDEX][left_experience_img]">
          </div>
          <div class="form_item form_img right_experience_img">
            <img class="img_preview" src="" />
            <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Right</button>
            <button class="img_remove_btn hidden" type="button">Xóa ảnh Right</button>
            <input type="hidden" name="experience[INDEX][left_experience_img]">
          </div>
        </div>
        <div class="box row">
          <div class="form_item form_text">
            <textarea name="" required placeholder=" "></textarea>
            <label for="textarea1">テキスト（PC）</label>
          </div>
          <div class="form_item form_text">
            <textarea name="" required placeholder=" "></textarea>
            <label for="textarea2">テキスト（SP）</label>
          </div>
        </div>
        <div class="form_item form_text">
          <textarea name="" required placeholder=" "></textarea>
          <label for="textarea2">テキスト（SP）</label>
        </div>
        <div class="box row">
          <div class="form_item form_datetime">
            <input type="datetime" name="" required>
            <label for="">販売開始日時</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売前のテキスト</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売中のテキスト</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売後のテキスト</label>
          </div>
        </div>
        <div class="box row">
          <div class="form_item form_datetime">
            <input type="datetime" name="" required>
            <label for="">販売終了日時</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売前のURL</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売中のURL</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">販売後のURL</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="spot" class="wrapper">
  <h2 class="text-xl">スポット</h2>
  <div class="container row">
    <div class="block">
      <h3 class="center">リスト</h3>
      <div class="group gap-y-10 grid-cols-2">
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
        <div class="card column">
          <figure>
            <div class="aspect-16x9">
              <picture>
                <img src="" alt="">
              </picture>
            </div>
          </figure>
          <span>タイトル<br>タイトル<br>タイトル<br>タイトル<br></span>
        </div>
      </div>
    </div>
    <div id="spot-forms">
      <div class="block flex justify-between">
        <h3 class="center">スポットフォーム</h3>
        <button class="btn add_btn float-right" id="add_spot_btn" type="button">Thêm Spot</button>
      </div>
      <div class="block column gap-8 p-8 border-none">
        <div class="box row">
          <label class="form_item form_checkbox flex-shrink-4"><input type="checkbox" name="a"><span>ステータス</span></label>
          <div class="form_item form_text">
            <textarea name="" required placeholder=" "></textarea>
            <label for="textarea1">スポット名</label>
          </div>
        </div>
        <div class="box grid gap-2 grid-cols-spot-img-template-columns">
          <div class="form_item form_img spot_img flex-shrink-0">
            <img class="img_preview" src="" />
            <button class="img_upload_btn full_size_btn" type="button">Chọn ảnh Spot</button>
            <button class="img_remove_btn hidden" type="button">Xóa ảnh Spot</button>
            <input type="hidden" name="spot[INDEX][spot_img]">
          </div>
          <div class="form_item form_text">
            <textarea name="" required placeholder=" "></textarea>
            <label for="textarea2">テキスト（SP）</label>
          </div>
        </div>
        <div class="box row">
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">公式名</label>
          </div>
          <div class="form_item form_text">
            <input type="text" name="" required>
            <label for="">公式URL</label>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
  var countExperience = <?php echo count($experience_groups); ?>;
  
  // Sử dụng event delegation cho các nút
  $('#experience-forms').on('click', '.img-upload-btn', function(e){
    e.preventDefault();
    uploadImage($(this));
  });
  
  $('#experience-forms').on('click', '.img-remove-btn', function(){
    removeImage($(this));
  });
  
  $('#add_experience_btn').on('click', function(){
    addExperience();
  });
  
  $('#experience-forms').on('click', '.delete_experience_btn', function(){
    deleteExperience($(this));
  });
  
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
    // Xác định thẻ img cùng hàng với nút vừa nhấn
    var parentFormImg = currentBtn.closest('.form-img');
    var imgUploadBtn = parentFormImg.find('.img-upload-btn');
    var imgPreview = parentFormImg.find('.img-preview');
    var imgRemoveBtn = parentFormImg.find('.img-remove-btn');
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
        imgUploadBtn.removeClass('full-size-btn');
        // Hiển thị nút xóa ảnh
        imgRemoveBtn.removeClass('hide');
        // Cập nhật giá trị của input hidden
        inputElement.val(attachment.id);
    });
    frame.open();
  };

  function removeImage(currentBtn){
    var parentFormImg = currentBtn.closest('.form-img');
    var imgPreview = parentFormImg.find('.img-preview');
    var imgUploadBtn = parentFormImg.find('.img-upload-btn');
    var inputElement = parentFormImg.find('input[type="hidden"]');
    imgPreview.attr('src', '');
    imgUploadBtn.addClass('full-size-btn');
    currentBtn.addClass('hide');
    inputElement.val('');
  }
  
  function addExperience(){
    // Lấy template
    var template = $('#experience-template').html().replace(/INDEX/g, countExperience++);
    var experienceForms = $('#experience-forms');
    
    // Chèn experience mới vào container
    experienceForms.append(template);
    
    return false;
  }

  function deleteExperience(currentBtn){
    var parentForm = currentBtn.closest('.form');
    parentForm.remove();
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
      $experience['is_active'] = $group['is_experience_active'];
      $experience['slide_img'] = $group['slide_experience_img'];
      $experience['main_img'] = $group['main_experience_img'];
      $experience['left_img'] = $group['left_experience_img'];
      $experience['right_img'] = $group['right_experience_img'];
      $experience_groups[$index] = $experience;
    }
    
    // Sắp xếp lại mảng để đảm bảo các index là liên tục
    $experience_groups = array_values($experience_groups);
    
    update_post_meta($post_id, '_experience_groups', $experience_groups);
  }

  // Lưu area groups nếu có
  if (isset($_POST['area_groups'])) {
    update_post_meta($post_id, '_area_groups', $_POST['area_groups']);
  }
}
add_action('save_post_experience', 'save_experience_meta_box');
?>