<?php
// Thêm meta box cho post type experience
function add_custom_meta_box()
{
  add_meta_box(
    'custom_meta_box',
    'Thông tin chi tiết',
    'custom_meta_box_html',
    'experience'
  );
}
add_action('add_meta_boxes', 'add_custom_meta_box');
// HTML cho meta box
function custom_meta_box_html($post)
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

  <style>
    /* 
    MARK: RESET
    */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
      pointer-events: none;
      user-select: none
    }

    ul,
    ol,
    li {
      list-style: none;
    }

    a {
      text-decoration: none;
    }

    input,
    textarea {
      width: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 5px;
    }

    label {
      width: fit-content;
      display: block;
      margin-bottom: 5px;
      flex-shrink: 0;
    }

    input[type="checkbox"] {
      width: fit-content;
      appearance: none;
      -webkit-appearance: none;
      width: 20px;
      height: 20px;
      border: 2px solid #ccc;
      border-radius: 4px;
      background-color: white;
      cursor: pointer;
      position: relative;
      transition: all 0.3s ease;
    }

    input[type="checkbox"]:checked {
      background-color: #4CAF50;
      border-color: #4CAF50;
    }

    input[type="checkbox"]:checked::after {
      content: "";
      position: absolute;
      left: 6px;
      top: 2px;
      width: 5px;
      height: 10px;
      border: solid white;
      border-width: 0 2px 2px 0;
      transform: rotate(45deg);
    }

    input[type="checkbox"]:focus {
      outline: none;
      box-shadow: 0 0 0 2px rgba(76, 175, 80, 0.3);
    }

    input[type="checkbox"]:hover {
      border-color: #999;
    }

    /* MARK: VARIABLE
    */

    :root {}

    /* 
    MARK: CUSTOM COMMON
    */
    body {
      font-size: 16px;
    }

    .inner {
      width: 100%;
      margin-top: 20px;
    }

    .container {
      width: 100%;
      background: #f9f9f9;
      border-radius: 10px;
      padding: 10px;
      display: grid;
      grid-template-columns: repeat(8, 1fr);
      gap: 10px;
    }

    .svg-sumary {
      display: none;
    }

    .reverse {}

    .title {
      font-size: 1.2rem;
      font-weight: bold;
      grid-column: span 8;
    }

    .item {
      width: 100%;
      grid-column: span 8;
      margin-top: 10px;
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(0, 5fr);
      gap: 10px;
      align-items: center;
      justify-content: center;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .half {
      grid-column: span 4;
      display: grid;
      grid-template-columns: minmax(0, 1fr) minmax(0, 2fr);
      gap: 20px;
    }

    .eight {
      grid-column: span 1;
      display: flex;
      flex-direction: column;
    }

    /* MARK: CUSTOM TEXT
    */

    .text {}

    /* MARK: CUSTOM OTHER
    */

    .list-item {}

    .list-item::marker {}

    .other {}

    /* 
    *-t\d : text
    *-i\d : image
    *-u\d : url
    *-o\d : other
    *-l\d : list
    *-g\d : group
    */

    /* MARK: EXPERIENCE
    */

    .layout-container {
      display: grid;
      grid-template-columns: 1fr 5fr;
      gap: 10px;
      grid-template-areas:
        "sumary-list sumary-list"
        "actived-list detail"
    }

    .sumary-list {
      grid-area: sumary-list;
      display: flex;
      gap: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      overflow-x: auto;
      scrollbar-width: none;
    }

    .actived-list {
      grid-area: actived-list;
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .detail {
      grid-area: detail;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .actived-item {
      display: flex;
      flex-direction: column;
      gap: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .actived-title {
      font-size: 1.2rem;
      font-weight: bold;
      display: flex;
      align-items: center;
      gap: 10px;
      justify-content: center;
      width: 100%;
      height: 100%;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
    }

    .list-item {
      display: flex;
      flex-direction: column;
      gap: 10px;
      justify-content: center;
      align-items: center;
    }

    .list-images {
      width: 200px;
      aspect-ratio: 100/57;
      border-radius: 5px;
      overflow: hidden;
      position: relative;
    }

    .list-others {
      position: absolute;
      display: flex;
      height: 100%;
      flex-direction: column;
      flex-wrap: wrap;
      top: 4px;
      left: 4px;
      gap: 4px;
    }

    .experience-season {
      flex-wrap: wrap-reverse;
      left: unset;
      right: 4px;
    }

    .list-o {
      background: #fff;
      border-radius: 4px;
      padding: 1px;
    }






    .spot-images {
      width: 200px;
      height: 114px;
    }
  </style>

  <!-- MARK: COMMON
-->
  <div class="inner common">
    <div class="container">
      <h3 class="title">一般情報</h3>
      <div class="item common-description">
        <label for="common-description">SEO Description</label>
        <input type="text" name="common-description" id="common-description">
      </div>
      <div class="item common-keywords">
        <label for="common-keywords">SEO Keywords</label>
        <input type="text" name="common-keywords" id="common-keywords">
      </div>
      <div class="item common-title">
        <label for="common-title">SEO Title</label>
        <input type="text" name="common-title" id="common-title">
      </div>
      <div class="item half common-name-jp">
        <label for="common-name-jp">名称（日本語）</label>
        <input type="text" name="common-name-jp" id="common-name-jp">
      </div>
      <div class="item half common-name-en">
        <label for="common-name-en">名称（英語）</label>
        <input type="text" name="common-name-en" id="common-name-en">
      </div>
      <div class="item common-feature">
        <label for="common-feature">特徴</label>
        <textarea name="common-feature" id="common-feature"></textarea>
      </div>
      <div class="item common-intro">
        <label for="common-intro">概要</label>
        <textarea name="common-intro" id="common-intro"></textarea>
      </div>
      <div class="item common-home-url">
        <label for="common-home-url">ホームURL</label>
        <input type="text" name="common-home-url" id="common-home-url">
      </div>
    </div>
  </div>

  <!-- MARK: EXPERIENCES
-->
  <div class="inner experiences">
    <div class="container layout-container">
      <div class="sumary-list">
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_01.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０１</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_02.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０２</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_03.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０３</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_04.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０４</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_05.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０５</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_06.jpg" alt="" class="list-i">
            <div class="list-others experience-actives">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#slider-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#unslider-svg"></use>
              </svg>
            </div>
            <div class="list-others experience-season">
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#spring-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#summer-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#autumn-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#winter-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#all-seasons-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#recommend-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０６</strong>
          </div>
        </div>
      </div>
      <div class="actived-list">
        <div class="actived-item list-spring-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#spring-svg"></use>
            </svg>
            春
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#spring-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-spring-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０１</strong>
            </div>
          </div>
          <div class="list-item experience-spring-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０１</strong>
            </div>
          </div>
        </div>
        <div class="actived-item list-summer-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#summer-svg"></use>
            </svg>
            夏
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#summer-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-summer-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０2</strong>
            </div>
          </div>
          <div class="list-item experience-summer-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０２</strong>
            </div>
          </div>
        </div>
        <div class="actived-item list-autumn-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#autumn-svg"></use>
            </svg>
            秋
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#autumn-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-autumn-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０３</strong>
            </div>
          </div>
          <div class="list-item experience-autumn-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０３</strong>
            </div>
          </div>
        </div>
        <div class="actived-item list-winter-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#winter-svg"></use>
            </svg>
            冬
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#winter-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-winter-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０４</strong>
            </div>
          </div>
          <div class="list-item experience-winter-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０４</strong>
            </div>
          </div>
        </div>
        <div class="actived-item list-all-seasons-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#all-seasons-svg"></use>
            </svg>
            通年
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#all-seasons-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-all-seasons-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０５</strong>
            </div>
          </div>
          <div class="list-item experience-all-seasons-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０５</strong>
            </div>
          </div>
        </div>
        <div class="actived-item list-recommend-experience">
          <h5 class="actived-title">
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#recommend-svg"></use>
            </svg>
            春
            <svg width="24" height="24" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
              <use href="#recommend-svg"></use>
            </svg>
          </h5>
          <div class="list-item experience-recommend-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０６</strong>
            </div>
          </div>
          <div class="list-item experience-recommend-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
              <div class="list-others">
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#slider-svg"></use>
                </svg>
                <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <use href="#unslider-svg"></use>
                </svg>
              </div>
            </div>
            <div class="list-text">
              <strong class="list-title">体験０６</strong>
            </div>
          </div>
        </div>
      </div>
      <div class="detail container">
        <h3 class="title">体験情報</h3>
        <div class="item eight experience-status">
          <label for="experience-status">ステータス</label>
          <input type="checkbox" name="experience-status" id="experience-status">
        </div>
        <div class="item eight experience-slider">
          <label for="experience-slider">スライダー</label>
          <input type="checkbox" name="experience-slider" id="experience-slider">
        </div>
        <div class="item eight experience-spring">
          <label for="experience-spring">春</label>
          <input type="checkbox" name="experience-seasons" id="experience-spring">
        </div>
        <div class="item eight experience-summer">
          <label for="experience-summer">夏</label>
          <input type="checkbox" name="experience-seasons" id="experience-summer">
        </div>
        <div class="item eight experience-autumn">
          <label for="experience-autumn">秋</label>
          <input type="checkbox" name="experience-seasons" id="experience-autumn">
        </div>
        <div class="item eight experience-winter">
          <label for="experience-winter">冬</label>
          <input type="checkbox" name="experience-seasons" id="experience-winter">
        </div>
        <div class="item eight experience-all">
          <label for="experience-all">通年</label>
          <input type="checkbox" name="experience-seasons" id="experience-all">
        </div>
        <div class="item eight experience-recommend">
          <label for="experience-recommend">おすすめ</label>
          <input type="checkbox" name="experience-recommend" id="experience-recommend">
        </div>
        <div class="item list-images-slider">
          
        </div>
        <div class="item half list-title-pc">
          <label for="list-title-pc">タイトル（PC）</label>
          <textarea name="list-title-pc" id="list-title-pc"></textarea>
        </div>
        <div class="item half list-title-sp">
          <label for="list-title-sp">タイトル（SP）</label>
          <textarea name="list-title-sp" id="list-title-sp"></textarea>
            </div>
        <div class="item list-images-main">
          <label for="list-images-main">メイン画像</label>
          <div class="wp-media-buttons">
              <button type="button" class="button add_media" id="list-images-main-button">
                  <span class="wp-media-buttons-icon"></span> メディアを追加
              </button>
              <input type="hidden" name="list-images-main" id="list-images-main-input" value="">
              <div id="list-images-main-preview" class="media-preview"></div>
          </div>
          <script>
          jQuery(document).ready(function($) {
              var mediaUploader;
              $('#list-images-main-button').click(function(e) {
                  e.preventDefault();
                  if (mediaUploader) {
                      mediaUploader.open();
                      return;
                  }
                  mediaUploader = wp.media({
                      title: 'メイン画像を選択',
                      button: {
                          text: '選択'
                      },
                      multiple: false
                  });
                  
                  mediaUploader.on('select', function() {
                      var attachment = mediaUploader.state().get('selection').first().toJSON();
                      $('#list-images-main-input').val(attachment.id);
                      $('#list-images-main-preview').html('<img src="' + attachment.url + '" style="max-width:100%;height:auto;">');
                  });
                  mediaUploader.open();
              });
          });
          </script>
        </div>
        <div class="item half list-images-left">
          <label for="list-images-left">左画像</label>
          <input type="file" accept="image/*" name="list-images-left" id="">
        </div>
        <div class="item half list-images-right">
          <label for="list-images-right">右画像</label>
          <input type="file" accept="image/*" name="list-images-right" id="">
        </div>
        <div class="item experience-content">
          <label for="experience-content">説明</label>
          <textarea name="experience-content" id="experience-content"></textarea>
        </div>
        <div class="item experience-start-sale">
          <label for="experience-start-sale">開始日</label>
          <input type="date" name="experience-date" id="experience-start-sale">
        </div>
        <div class="item experience-end-sale">
          <label for="experience-end-sale">終了日</label>
          <input type="date" name="experience-date" id="experience-end-sale">
        </div>
        <div class="item experience-link-before-sale-title">
          <label for="experience-link-before-sale-title">販売前のタイトル</label>
          <textarea name="experience-link-before-sale" id="experience-link-before-sale-title"></textarea>
        </div>
        <div class="item experience-link-sale-period-title">
          <label for="experience-link-sale-period-title">販売期間のタイトル</label>
          <textarea name="experience-link-sale-period" id="experience-link-sale-period-title"></textarea>
        </div>
        <div class="item experience-link-after-sale-title">
          <label for="experience-link-after-sale-title">販売後のタイトル</label>
          <textarea name="experience-link-after-sale" id="experience-link-after-sale-title"></textarea>
        </div>
        <div class="item experience-link-before-sale-url">
          <label for="experience-link-before-sale-url">販売前のURL</label>
          <input type="text" name="experience-link-before-sale" id="experience-link-before-sale-url">
        </div>
        <div class="item experience-link-sale-period-url">
          <label for="experience-link-sale-period-url">販売期間のURL</label>
          <input type="text" name="experience-link-sale-period" id="experience-link-sale-period-url">
        </div>
        <div class="item experience-link-after-sale-url">
          <label for="experience-link-after-sale-url">販売後のURL</label>
          <input type="text" name="experience-link-after-sale-url" id="experience-link-after-sale-url">
        </div>
      </div>
    </div>
  </div>

  <!-- MARK: SPOTS
-->
  <div class="inner spots">
    <div class="layout-container">
      <div class="sumary-list">
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_01.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０１</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_02.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０２</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_03.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０３</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_04.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０4</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_05.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０5</strong>
          </div>
        </div>
        <div class="list-item">
          <div class="list-images">
            <img src="slideshow_06.jpg" alt="" class="list-i">
            <div class="list-others">
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#show-svg"></use>
              </svg>
              <svg class="list-o" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <use href="#hide-svg"></use>
              </svg>
            </div>
          </div>
          <div class="list-text">
            <strong class="list-title">体験０６</strong>
          </div>
        </div>
      </div>
      <div class="actived-list">
        <div class="actived-item list-spring-experience">
          <div class="list-item">
            <div class="list-images">
              <img src="slideshow_01.jpg" alt="" class="list-i">
            </div>
            <div class="list-text">
              <strong class="list-title">体験０１</strong>
            </div>
          </div>
          <div class="list-item">
            <div class="list-images">
              <img src="slideshow_02.jpg" alt="" class="list-i">
            </div>
            <div class="list-text">
              <strong class="list-title">体験０２</strong>
            </div>
          </div>
          <div class="list-item">
            <div class="list-images">
              <img src="slideshow_03.jpg" alt="" class="list-i">
            </div>
            <div class="list-text">
              <strong class="list-title">体験０３</strong>
            </div>
          </div>
          <div class="list-item">
            <div class="list-images">
              <img src="slideshow_04.jpg" alt="" class="list-i">
            </div>
            <div class="list-text">
              <strong class="list-title">体験０４</strong>
            </div>
          </div>
        </div>
      </div>
      <div class="container detail">
        <h3 class="title">周辺の見どころ</h3>
        <div class="item spot-status">
          <label for="spot-status">ステータス</label>
          <input type="text" name="spot-status" id="">
        </div>
        <div class="item spot-image">
          <label for="spot-image">スライダー画像</label>
          <input type="file" accept="image/*" name="spot-image" id="">
        </div>
        <div class="item spot-title">
          <label for="spot-title">タイトル</label>
          <input type="text" name="spot-title" id="">
        </div>
        <div class="item spot-description">
          <label for="spot-description">説明</label>
          <textarea name="spot-description" id="spot-description"></textarea>
        </div>
        <div class="item spot-link-title">
          <label for="spot-link-title">URLタイトル</label>
          <textarea name="spot-link-title" id="spot-link-title"></textarea>
        </div>
        <div class="item spot-link-url">
          <label for="spot-link-url">URL</label>
          <input type="text" name="spot-link-url" id="spot-link-url">
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="svg-sumary">
    <!-- MARK: SHOW SVG
    -->
    <svg width="800" height="800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="show-svg">
        <g id="Edit / Show">
          <g id="Vector">
            <path d="M3.5868 13.7788C5.36623 15.5478 8.46953 17.9999 12.0002 17.9999C15.5308 17.9999 18.6335 15.5478 20.413 13.7788C20.8823 13.3123 21.1177 13.0782 21.2671 12.6201C21.3738 12.2933 21.3738 11.7067 21.2671 11.3799C21.1177 10.9218 20.8823 10.6877 20.413 10.2211C18.6335 8.45208 15.5308 6 12.0002 6C8.46953 6 5.36623 8.45208 3.5868 10.2211C3.11714 10.688 2.88229 10.9216 2.7328 11.3799C2.62618 11.7067 2.62618 12.2933 2.7328 12.6201C2.88229 13.0784 3.11714 13.3119 3.5868 13.7788Z" stroke="#00A651" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M10 12C10 13.1046 10.8954 14 12 14C13.1046 14 14 13.1046 14 12C14 10.8954 13.1046 10 12 10C10.8954 10 10 10.8954 10 12Z" stroke="#00A651" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          </g>
        </g>
      </symbol>
    </svg>
    <!-- MARK: HIDE SVG
    -->
    <svg width="800" height="800" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="hide-svg">
        <g id="Edit / Hide">
          <path id="Vector" d="M3.99989 4L19.9999 20M16.4999 16.7559C15.1473 17.4845 13.6185 17.9999 11.9999 17.9999C8.46924 17.9999 5.36624 15.5478 3.5868 13.7788C3.1171 13.3119 2.88229 13.0784 2.7328 12.6201C2.62619 12.2933 2.62616 11.7066 2.7328 11.3797C2.88233 10.9215 3.11763 10.6875 3.58827 10.2197C4.48515 9.32821 5.71801 8.26359 7.17219 7.42676M19.4999 14.6335C19.8329 14.3405 20.138 14.0523 20.4117 13.7803L20.4146 13.7772C20.8832 13.3114 21.1182 13.0779 21.2674 12.6206C21.374 12.2938 21.3738 11.7068 21.2672 11.38C21.1178 10.9219 20.8827 10.6877 20.4133 10.2211C18.6338 8.45208 15.5305 6 11.9999 6C11.6624 6 11.3288 6.02241 10.9999 6.06448M13.3228 13.5C12.9702 13.8112 12.5071 14 11.9999 14C10.8953 14 9.99989 13.1046 9.99989 12C9.99989 11.4605 10.2135 10.9711 10.5608 10.6113" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </g>
      </symbol>
    </svg>
    <!-- MARK: SLIDER SVG
    -->
    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="slider-svg">
        <path d="M3.5 5.06006V18.9401C3.5 19.3501 3.16 19.6901 2.75 19.6901C2.34 19.6901 2 19.3501 2 18.9401V5.06006C2 4.65006 2.34 4.31006 2.75 4.31006C3.16 4.31006 3.5 4.65006 3.5 5.06006Z" fill="#00A651" />
        <path d="M22 5.06006V18.9401C22 19.3501 21.66 19.6901 21.25 19.6901C20.84 19.6901 20.5 19.3501 20.5 18.9401V5.06006C20.5 4.65006 20.84 4.31006 21.25 4.31006C21.66 4.31006 22 4.65006 22 5.06006Z" fill="#00A651" />
        <path opacity="0.4" d="M7.59961 21.25H16.3996C18.0596 21.25 19.3996 19.91 19.3996 18.25V5.75C19.3996 4.09 18.0596 2.75 16.3996 2.75H7.59961C5.93961 2.75 4.59961 4.09 4.59961 5.75V18.25C4.59961 19.91 5.93961 21.25 7.59961 21.25Z" fill="#00A651" />
      </symbol>
    </svg>
    <!-- MARK: UNSLIDER SVG
    -->
    <svg width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="unslider-svg">
        <path d="M3.5 5.06006V18.9401C3.5 19.3501 3.16 19.6901 2.75 19.6901C2.34 19.6901 2 19.3501 2 18.9401V5.06006C2 4.65006 2.34 4.31006 2.75 4.31006C3.16 4.31006 3.5 4.65006 3.5 5.06006Z" fill="#FF0000" />
        <path d="M22 5.06006V18.9401C22 19.3501 21.66 19.6901 21.25 19.6901C20.84 19.6901 20.5 19.3501 20.5 18.9401V5.06006C20.5 4.65006 20.84 4.31006 21.25 4.31006C21.66 4.31006 22 4.65006 22 5.06006Z" fill="#FF0000" />
        <path opacity="0.4" d="M7.59961 21.25H16.3996C18.0596 21.25 19.3996 19.91 19.3996 18.25V5.75C19.3996 4.09 18.0596 2.75 16.3996 2.75H7.59961C5.93961 2.75 4.59961 4.09 4.59961 5.75V18.25C4.59961 19.91 5.93961 21.25 7.59961 21.25Z" fill="#FF0000" />
        <path d="M4 4L20 20" stroke="#FF0000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </symbol>
    </svg>
    <!-- MARK: SPRING SVG
    -->
    <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="spring-svg">
        <circle cx="51.5" cy="51.5" r="51.5" fill="#EE8593" />
        <path d="M70.3158 58.4268C74.8589 56.9553 77.5994 52.5594 77.2315 47.9796C77.2112 47.7693 77.1231 47.5712 76.9805 47.4153C76.8378 47.2594 76.6484 47.154 76.4406 47.1151C76.4406 47.1151 74.8037 46.7657 74.4358 46.6921C74.2519 46.6553 74.1783 46.4162 74.2887 46.2875C74.5278 46.03 75.6681 44.7425 75.6681 44.7425C75.9624 44.4298 76.0176 43.9332 75.7969 43.5653C73.4242 39.6476 68.6237 37.698 64.0622 39.1878C62.7564 39.6109 61.616 40.3834 60.6228 41.3582C61.2481 40.1075 61.616 38.8016 61.616 37.4221C61.616 32.64 58.2869 28.6671 53.8174 27.6187C53.6093 27.5769 53.3934 27.6004 53.1991 27.686C53.0049 27.7716 52.8418 27.9151 52.7322 28.0969C52.7322 28.0969 51.8862 29.55 51.7022 29.881C51.6103 30.0466 51.3528 30.0282 51.2792 29.8994C51.0953 29.5868 50.2492 28.0969 50.2492 28.0969C50.0285 27.7291 49.5871 27.5084 49.1824 27.6187C44.7314 28.6487 41.3839 32.6216 41.3839 37.4037C41.3839 38.7832 41.7701 40.0891 42.3771 41.3398C41.3839 40.365 40.2619 39.6109 38.956 39.1878C34.3946 37.698 29.594 39.6476 27.2214 43.5653C27.0006 43.9332 27.0558 44.4114 27.3501 44.7425C27.3501 44.7425 28.4721 45.9932 28.7296 46.2691C28.8583 46.3978 28.7664 46.6553 28.6008 46.6921L26.5776 47.1151C26.1546 47.2071 25.8235 47.5566 25.7867 47.9796C25.5915 50.2459 26.1686 52.5115 27.4242 54.4082C28.6797 56.3049 30.54 57.7212 32.7024 58.4268C34.0267 58.8498 35.3878 58.905 36.7856 58.6842C35.5349 59.328 34.4314 60.1741 33.6221 61.296C30.808 65.1585 31.1758 70.3269 34.1739 73.8032C34.4497 74.1342 34.928 74.2262 35.3326 74.0423C35.3326 74.0423 36.8592 73.3617 37.2087 73.1962C37.3742 73.1226 37.5765 73.2698 37.5581 73.4353L37.3374 75.4953C37.3006 75.9184 37.5214 76.3598 37.926 76.5253C42.1564 78.291 47.1776 77.0403 49.9917 73.1778C50.801 72.0559 51.2608 70.7868 51.4999 69.4073C51.739 70.7868 52.1989 72.0742 53.0081 73.1778C55.8222 77.0403 60.8435 78.291 65.0739 76.5253C65.4785 76.3598 65.6992 75.9367 65.6624 75.4953C65.6624 75.4953 65.4785 73.8216 65.4417 73.4537C65.4233 73.2698 65.6256 73.1226 65.7912 73.1962L67.6856 74.0423C68.0719 74.2262 68.5685 74.1342 68.8444 73.8032C71.8424 70.3269 72.2103 65.1585 69.3962 61.296C68.5869 60.1741 67.4833 59.3464 66.2326 58.6842C67.6305 58.905 68.9915 58.8498 70.3158 58.4268ZM54.8732 56.3208L56.2582 58.2336C56.3195 58.2263 56.3826 58.2226 56.4476 58.2226C56.8443 58.223 57.2302 58.3516 57.5478 58.5893C57.8654 58.827 58.0976 59.161 58.2099 59.5414C58.3221 59.9219 58.3083 60.3285 58.1706 60.7005C58.0329 61.0725 57.7786 61.39 57.4456 61.6056C57.1127 61.8213 56.7189 61.9235 56.3231 61.8971C55.9274 61.8706 55.5507 61.7169 55.2494 61.4589C54.9481 61.2009 54.7383 60.8524 54.6513 60.4654C54.5642 60.0784 54.6046 59.6736 54.7665 59.3114L53.3834 57.4004C52.7958 57.6663 52.1582 57.8036 51.5133 57.8029C50.8684 57.8023 50.2311 57.6638 49.6441 57.3967L48.2499 59.3151C48.4145 59.685 48.4524 60.0989 48.3578 60.4926C48.2632 60.8863 48.0413 61.2377 47.7266 61.4925C47.4119 61.7472 47.022 61.891 46.6172 61.9015C46.2125 61.912 45.8156 61.7887 45.4881 61.5506C45.1606 61.3126 44.9207 60.9731 44.8058 60.5849C44.6909 60.1967 44.7073 59.7814 44.8524 59.4034C44.9976 59.0254 45.2634 58.7059 45.6086 58.4944C45.9539 58.2829 46.3593 58.1913 46.7619 58.2336L48.1579 56.3153C47.7229 55.8393 47.3946 55.2758 47.1951 54.6627C46.9956 54.0495 46.9294 53.4007 47.001 52.7599L44.7479 52.0297C44.447 52.3007 44.0651 52.4647 43.6615 52.4965C43.2578 52.5283 42.855 52.426 42.5154 52.2055C42.1758 51.985 41.9185 51.6585 41.7834 51.2769C41.6482 50.8952 41.6428 50.4796 41.7679 50.0945C41.893 49.7094 42.1417 49.3764 42.4754 49.1471C42.8091 48.9178 43.2091 48.8049 43.6134 48.8261C44.0178 48.8473 44.4038 49.0014 44.7117 49.2643C45.0196 49.5273 45.2321 49.8845 45.3162 50.2806L47.5675 51.0107C47.887 50.449 48.3226 49.9619 48.8453 49.5819C49.368 49.2019 49.9658 48.9379 50.5987 48.8073V46.4456C50.248 46.2432 49.974 45.9307 49.819 45.5566C49.6641 45.1826 49.6369 44.7678 49.7417 44.3767C49.8465 43.9856 50.0774 43.6401 50.3986 43.3936C50.7199 43.1471 51.1134 43.0135 51.5183 43.0135C51.9232 43.0135 52.3168 43.1471 52.638 43.3936C52.9592 43.6401 53.1901 43.9856 53.2949 44.3767C53.3997 44.7678 53.3725 45.1826 53.2176 45.5566C53.0627 45.9307 52.7886 46.2432 52.438 46.4456V48.8073C53.7347 49.074 54.829 49.8925 55.4654 51.0071L57.7002 50.2824C57.7837 49.8862 57.9957 49.5285 58.3032 49.2651C58.6107 49.0016 58.9966 48.847 59.4009 48.8252C59.8053 48.8034 60.2056 48.9157 60.5396 49.1446C60.8736 49.3735 61.1228 49.7062 61.2484 50.0912C61.3741 50.4762 61.3691 50.8919 61.2344 51.2738C61.0996 51.6556 60.8427 51.9824 60.5033 52.2033C60.1639 52.4242 59.7611 52.5269 59.3573 52.4956C58.9536 52.4642 58.5715 52.3004 58.2703 52.0297L56.0338 52.7581C56.0522 52.9224 56.0614 53.0885 56.0614 53.2565C56.0614 54.4373 55.6107 55.5133 54.8732 56.3208Z" fill="white" />
      </symbol>
    </svg>
    <!-- MARK: SUMMER SVG
    -->
    <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="summer-svg">
        <circle cx="51.5" cy="51.5" r="51.5" fill="#009DEF" />
        <g clip-path="url(#clip0_812_8)">
          <path d="M78.7512 36.2885C76.9837 30.0422 71.8076 27.3851 65.8742 28.395C60.4102 29.3251 57.5558 36.1365 56.2263 40.2671C56.6218 34.7961 55.6108 27.1878 49.0835 23.6352C39.1101 18.2066 32.7978 27.9276 32.1666 29.19C31.5353 30.4525 31.5343 30.6942 33.3027 30.5787C33.8295 30.5442 38.4196 29.2523 42.924 30.0669L45.0436 28.1121L46.0259 30.8668C49.758 32.1746 52.7524 35.5261 53.2919 40.5512C50.2641 36.8289 45.5939 34.4323 40.335 34.4323C31.1911 34.4323 23.779 41.643 23.779 50.5376C23.779 51.2535 23.7939 50.7398 23.7939 50.7398C23.8195 51.077 24.0403 51.3679 24.358 51.4833C24.6755 51.5978 25.0316 51.5159 25.2673 51.2733C25.2673 51.2733 25.4517 50.9862 26.2802 50.2288C27.7399 48.8933 29.3455 47.7166 31.0657 46.7136L32.6388 43.7774L34.7614 44.9047C37.9461 43.6354 41.4198 42.9351 45.0583 42.9351C47.4579 42.9351 49.7876 43.2398 52.0096 43.8108C46.8858 43.4716 39.1632 46.1425 36.1066 52.6628C32.3192 60.7425 36.0464 67.1555 36.585 67.6574C37.0269 68.0688 37.5615 67.7482 37.7064 67.0311C38.0229 65.464 38.8929 62.5347 40.4907 59.2492L39.8456 56.6435L41.622 57.0981C43.8481 53.1726 47.1078 49.0509 51.7187 46.2746C48.1552 54.1254 45.222 65.5989 49.6919 80.8599H60.6693C60.6693 80.8599 49.5251 70.0659 55.3167 47.9315C56.5753 49.5579 58.1769 51.9181 59.5135 54.7931L61.2029 55.0062L60.4483 57.028C61.3735 59.5036 62.0393 62.2692 62.1319 65.229C62.1556 65.9845 62.6113 66.5438 62.844 66.0487C66.4106 58.4483 65.289 50.6693 60.2896 46.1304C63.4418 47.1699 66.018 49.7047 68.0251 52.6043L70.4188 53.1182L69.973 55.8167C71.6527 59.0103 72.6833 62.1724 73.0513 63.9852C73.1961 64.6993 73.5749 65.1648 74.0317 64.3522C76.7528 59.5096 77.104 50.2166 72.1863 45.1293C68.3733 41.1862 61.6458 40.9266 57.5025 42.0195C60.2226 37.446 67.5005 37.1058 67.5005 37.1058C67.5005 37.1058 68.6515 34.4549 68.9041 34.0761C69.1565 33.6974 70.5452 36.6583 70.5452 36.6583L77.8734 39.6517C77.8734 39.6517 78.8143 40.2949 78.9977 39.2019C79.1082 38.5421 79.1752 37.5252 78.7512 36.2885Z" fill="white" />
        </g>
        <defs>
          <clipPath id="clip0_812_8">
            <rect width="58.86" height="58.86" fill="white" transform="translate(22 22)" />
          </clipPath>
        </defs>
      </symbol>
    </svg>
    <!-- MARK: AUTUMN SVG
      -->
    <svg width="104" height="103" viewBox="0 0 104 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="autumn-svg">
        <ellipse cx="52" cy="51.5" rx="52" ry="51.5" fill="#D4832A" />
        <path d="M63.8867 63.6729C70.5898 63.0839 77.5829 58.886 77.5829 58.886C77.5829 58.886 69.9527 55.9728 63.2497 56.5618C62.8134 56.6002 62.3919 56.6443 61.9833 56.6936C62.8883 55.6952 63.826 54.5581 64.789 53.2729C70.3173 45.8948 72.3577 34.9144 72.3577 34.9144C72.3577 34.9144 62.8141 39.787 57.2161 46.8801C57.224 46.4434 57.2281 45.9984 57.2281 45.5437C57.2283 34.7611 52.2915 23 52.2915 23C52.2915 23 47.3546 34.7611 47.3546 45.5435C47.3546 45.9982 47.3589 46.4431 47.3667 46.8798C41.7685 39.7869 32.2252 34.9143 32.2252 34.9143C32.2252 34.9143 34.2656 45.8947 39.7938 53.2728C40.7568 54.558 41.6945 55.6951 42.5995 56.6935C42.1912 56.6442 41.7695 56.6002 41.3332 56.5617C34.6301 55.9728 27 58.886 27 58.886C27 58.886 33.9931 63.0839 40.6961 63.6729C42.4279 63.8252 43.9575 63.8517 45.2795 63.775C42.3496 66.7065 40.5883 71.0559 40.5883 71.0559C40.5883 71.0559 45.7108 69.6156 48.9675 66.7114C49.9377 65.8462 50.7089 65.0337 51.2915 64.2937C51.5295 66.1936 51.7976 69.0884 51.7589 72.2871C51.7091 76.4095 50.7931 80.7009 50.7839 80.7438C50.6763 81.2424 50.9971 81.7328 51.5005 81.8394C51.566 81.8535 51.6316 81.86 51.6963 81.86C52.1265 81.86 52.513 81.5633 52.6068 81.13C52.646 80.948 53.5708 76.6208 53.6228 72.3094C53.6628 69.0081 53.3943 66.0651 53.1503 64.1111C53.7475 64.8994 54.5648 65.7743 55.6155 66.7114C58.8721 69.6156 63.9946 71.0559 63.9946 71.0559C63.9946 71.0559 62.2335 66.7065 59.3035 63.775C60.6255 63.8516 62.1551 63.8251 63.8868 63.6729H63.8867Z" fill="white" />
      </symbol>
    </svg>
    <!-- MARK: SVG WINTER
    -->
    <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="winter-svg">
        <circle cx="51.5" cy="51.5" r="51.5" fill="#718EAF" />
        <g clip-path="url(#clip0_171_872)">
          <path d="M51.5 80.9284C51.0122 80.9284 50.5443 80.7347 50.1994 80.3897C49.8545 80.0448 49.6607 79.577 49.6607 79.0891V74.3328L47.2843 76.7128C46.939 77.0577 46.4707 77.2512 45.9827 77.2509C45.4946 77.2505 45.0266 77.0563 44.6818 76.711C44.3369 76.3656 44.1433 75.8974 44.1437 75.4093C44.144 74.9212 44.3382 74.4532 44.6836 74.1084L49.6607 69.1313V65.1363L47.2843 67.5164C47.1133 67.6871 46.9104 67.8225 46.687 67.9149C46.4637 68.0072 46.2243 68.0546 45.9827 68.0545C45.4946 68.0541 45.0266 67.8599 44.6818 67.5145C44.3369 67.1692 44.1433 66.7009 44.1437 66.2128C44.144 65.7248 44.3382 65.2568 44.6836 64.9119L49.6607 59.9348V54.6855L45.114 57.3083L43.2931 64.1137C43.2303 64.347 43.1222 64.5657 42.9748 64.7572C42.8275 64.9487 42.6439 65.1094 42.4345 65.23C42.2252 65.3505 41.9941 65.4287 41.7545 65.46C41.5149 65.4912 41.2715 65.475 41.0381 65.4122C40.8048 65.3494 40.5861 65.2413 40.3946 65.094C40.2031 64.9467 40.0424 64.7631 39.9218 64.5537C39.8013 64.3443 39.7231 64.1132 39.6918 63.8736C39.6606 63.634 39.6768 63.3906 39.7396 63.1573L40.6114 59.9128L37.1536 61.9065L35.329 68.7119C35.2022 69.1831 34.8933 69.5847 34.4704 69.8282C34.0476 70.0717 33.5452 70.1373 33.074 70.0104C32.6028 69.8836 32.2013 69.5748 31.9577 69.1519C31.7142 68.729 31.6487 68.2267 31.7755 67.7555L32.6473 64.511L28.5273 66.8873C28.1051 67.1274 27.605 67.1907 27.1363 67.0634C26.6676 66.9362 26.2682 66.6287 26.0254 66.2081C25.7825 65.7874 25.7159 65.2878 25.84 64.8183C25.9642 64.3487 26.269 63.9473 26.688 63.7017L30.808 61.3253L27.5562 60.4535C27.3228 60.3907 27.1042 60.2826 26.9126 60.1353C26.7211 59.9879 26.5605 59.8043 26.4399 59.595C26.3193 59.3856 26.2411 59.1545 26.2099 58.9149C26.1786 58.6753 26.1948 58.4319 26.2576 58.1985C26.3204 57.9652 26.4286 57.7465 26.5759 57.555C26.7232 57.3635 26.9068 57.2028 27.1162 57.0823C27.3256 56.9617 27.5567 56.8835 27.7963 56.8522C28.0359 56.821 28.2793 56.8372 28.5126 56.9L35.3106 58.7209L38.7685 56.7271L35.524 55.8553C35.2871 55.7962 35.0643 55.6906 34.8687 55.5446C34.673 55.3986 34.5084 55.2151 34.3844 55.0048C34.2604 54.7945 34.1795 54.5617 34.1464 54.3198C34.1133 54.0779 34.1288 53.8319 34.1918 53.596C34.2547 53.3601 34.3641 53.1392 34.5133 52.946C34.6626 52.7528 34.8488 52.5913 35.0612 52.4708C35.2735 52.3504 35.5077 52.2734 35.7501 52.2444C35.9925 52.2153 36.2382 52.2349 36.473 52.3018L43.2784 54.1227L47.8214 51.4999L43.2747 48.877L36.473 50.6979C36.2382 50.7649 35.9925 50.7844 35.7501 50.7554C35.5077 50.7263 35.2735 50.6494 35.0612 50.5289C34.8488 50.4084 34.6626 50.2469 34.5133 50.0537C34.3641 49.8605 34.2547 49.6396 34.1918 49.4037C34.1288 49.1679 34.1133 48.9218 34.1464 48.6799C34.1795 48.4381 34.2604 48.2052 34.3844 47.9949C34.5084 47.7846 34.673 47.6011 34.8687 47.4551C35.0643 47.3091 35.2871 47.2035 35.524 47.1444L38.7721 46.2726L35.3143 44.2788L28.5089 46.0997C28.0408 46.2164 27.5455 46.1445 27.1299 45.8994C26.7143 45.6543 26.4116 45.2558 26.2871 44.7896C26.1626 44.3235 26.2263 43.8271 26.4643 43.4074C26.7024 42.9878 27.0959 42.6785 27.5598 42.5462L30.808 41.6744L26.688 39.298C26.4772 39.1782 26.2921 39.0177 26.1435 38.826C25.9949 38.6343 25.8856 38.4151 25.8221 38.181C25.7585 37.9469 25.7419 37.7026 25.7732 37.462C25.8044 37.2215 25.883 36.9895 26.0042 36.7795C26.1255 36.5694 26.2872 36.3854 26.4799 36.238C26.6725 36.0907 26.8925 35.9829 27.127 35.9209C27.3615 35.8589 27.6059 35.8439 27.8463 35.8768C28.0866 35.9096 28.3181 35.9897 28.5273 36.1124L32.6473 38.4888L31.7755 35.2406C31.6588 34.7724 31.7308 34.2772 31.9758 33.8616C32.2209 33.4459 32.6194 33.1433 33.0856 33.0188C33.5517 32.8943 34.0481 32.9579 34.4678 33.196C34.8874 33.4341 35.1967 33.8275 35.329 34.2915L37.1499 41.0932L40.6077 43.087L39.7396 39.8388C39.6229 39.3706 39.6949 38.8754 39.9399 38.4598C40.185 38.0442 40.5835 37.7415 41.0497 37.617C41.5158 37.4925 42.0122 37.5561 42.4319 37.7942C42.8515 38.0323 43.1608 38.4257 43.2931 38.8897L45.114 45.6914L49.6607 48.3142V43.0649L44.6836 38.0878C44.3382 37.7429 44.144 37.275 44.1437 36.7869C44.1433 36.2988 44.3369 35.8306 44.6818 35.4852C45.0266 35.1398 45.4946 34.9456 45.9827 34.9453C46.4707 34.9449 46.939 35.1385 47.2843 35.4834L49.6607 37.8634V33.8685L44.6836 28.8914C44.5126 28.7206 44.3769 28.5178 44.2842 28.2946C44.1916 28.0714 44.1438 27.8321 44.1437 27.5904C44.1435 27.3488 44.1909 27.1094 44.2832 26.8861C44.3756 26.6628 44.511 26.4598 44.6818 26.2888C44.8525 26.1178 45.0553 25.9821 45.2785 25.8894C45.5017 25.7968 45.741 25.749 45.9827 25.7488C46.2243 25.7487 46.4637 25.7961 46.687 25.8884C46.9104 25.9808 47.1133 26.1162 47.2843 26.2869L49.6607 28.667V23.9106C49.6607 23.4228 49.8545 22.9549 50.1994 22.61C50.5443 22.2651 51.0122 22.0713 51.5 22.0713C51.9878 22.0713 52.4556 22.2651 52.8006 22.61C53.1455 22.9549 53.3393 23.4228 53.3393 23.9106V28.667L55.7193 26.2869C56.0647 25.9421 56.5329 25.7485 57.021 25.7488C57.5091 25.7492 57.977 25.9434 58.3219 26.2888C58.6668 26.6341 58.8603 27.1024 58.86 27.5904C58.8596 28.0785 58.6654 28.5465 58.3201 28.8914L53.3393 33.8685V37.8634L55.7193 35.4834C56.0647 35.1385 56.5329 34.9449 57.021 34.9453C57.5091 34.9456 57.977 35.1398 58.3219 35.4852C58.6668 35.8306 58.8603 36.2988 58.86 36.7869C58.8596 37.275 58.6654 37.7429 58.3201 38.0878L53.3393 43.0649V48.3142L57.886 45.6914L59.7069 38.886C59.7697 38.6527 59.8778 38.434 60.0251 38.2425C60.1724 38.051 60.356 37.8903 60.5654 37.7698C60.7748 37.6492 61.0059 37.571 61.2455 37.5397C61.4851 37.5085 61.7285 37.5247 61.9618 37.5875C62.1952 37.6503 62.4138 37.7584 62.6054 37.9058C62.7969 38.0531 62.9576 38.2367 63.0781 38.4461C63.1987 38.6554 63.2769 38.8865 63.3081 39.1261C63.3394 39.3657 63.3232 39.6091 63.2604 39.8425L62.3922 43.087L65.8501 41.0932L67.671 34.2878C67.7978 33.8166 68.1066 33.4151 68.5295 33.1715C68.9524 32.928 69.4547 32.8625 69.9259 32.9893C70.3972 33.1161 70.7987 33.4249 71.0422 33.8478C71.2858 34.2707 71.3513 34.773 71.2245 35.2443L70.3563 38.4888L74.4763 36.1124C74.8986 35.8723 75.3986 35.809 75.8673 35.9363C76.3361 36.0635 76.7354 36.371 76.9783 36.7917C77.2211 37.2123 77.2878 37.7119 77.1636 38.1814C77.0395 38.651 76.7346 39.0524 76.3156 39.298L72.1956 41.6744L75.4438 42.5462C75.915 42.673 76.3166 42.9819 76.5601 43.4048C76.8036 43.8277 76.8692 44.33 76.7423 44.8012C76.6155 45.2724 76.3067 45.6739 75.8838 45.9175C75.4609 46.161 74.9586 46.2265 74.4874 46.0997L67.6894 44.2788L64.2315 46.2726L67.4797 47.1444C67.9509 47.2713 68.3525 47.5801 68.596 48.003C68.8395 48.4259 68.9051 48.9282 68.7782 49.3994C68.6514 49.8706 68.3426 50.2722 67.9197 50.5157C67.4968 50.7592 66.9945 50.8248 66.5233 50.6979L59.7253 48.877L55.1786 51.4999L59.7253 54.1227L66.527 52.3018C66.9982 52.1754 67.5003 52.2415 67.9228 52.4853C68.3454 52.7292 68.6537 53.1309 68.7801 53.6022C68.9064 54.0734 68.8404 54.5755 68.5965 54.998C68.3527 55.4206 67.9509 55.7289 67.4797 55.8553L64.2315 56.7271L67.6894 58.7209L74.4911 56.9C74.9623 56.7737 75.4644 56.8397 75.8869 57.0836C76.3095 57.3274 76.6178 57.7292 76.7442 58.2004C76.8705 58.6716 76.8045 59.1737 76.5606 59.5963C76.3168 60.0188 75.915 60.3272 75.4438 60.4535L72.1956 61.3253L76.3156 63.7017C76.7346 63.9473 77.0395 64.3487 77.1636 64.8183C77.2878 65.2878 77.2211 65.7874 76.9783 66.2081C76.7354 66.6287 76.3361 66.9362 75.8673 67.0634C75.3986 67.1907 74.8986 67.1274 74.4763 66.8873L70.3563 64.511L71.2245 67.7591C71.2914 67.9939 71.3109 68.2397 71.2819 68.4821C71.2529 68.7245 71.1759 68.9587 71.0555 69.171C70.935 69.3833 70.7735 69.5696 70.5803 69.7188C70.3871 69.8681 70.1661 69.9774 69.9303 70.0404C69.6944 70.1034 69.4484 70.1188 69.2065 70.0857C68.9646 70.0527 68.7317 69.9718 68.5215 69.8478C68.3112 69.7238 68.1277 69.5592 67.9816 69.3635C67.8356 69.1679 67.73 68.9451 67.671 68.7082L65.8501 61.9065L62.3922 59.9128L63.2604 63.1609C63.3771 63.6291 63.3051 64.1243 63.06 64.54C62.815 64.9556 62.4164 65.2582 61.9503 65.3827C61.4841 65.5072 60.9878 65.4436 60.5681 65.2055C60.1485 64.9674 59.8392 64.574 59.7069 64.11L57.886 57.312L53.3393 54.6855V59.9348L58.3201 64.9119C58.6654 65.2568 58.8596 65.7248 58.86 66.2128C58.8603 66.7009 58.6668 67.1692 58.3219 67.5145C57.977 67.8599 57.5091 68.0541 57.021 68.0545C56.5329 68.0548 56.0647 67.8612 55.7193 67.5164L53.3393 65.1363V69.1313L58.3201 74.1084C58.6654 74.4532 58.8596 74.9212 58.86 75.4093C58.8603 75.8974 58.6668 76.3656 58.3219 76.711C57.977 77.0563 57.5091 77.2505 57.021 77.2509C56.5329 77.2512 56.0647 77.0577 55.7193 76.7128L53.3393 74.3328V79.0891C53.3393 79.577 53.1455 80.0448 52.8006 80.3897C52.4556 80.7347 51.9878 80.9284 51.5 80.9284Z" fill="white" />
        </g>
        <defs>
          <clipPath id="clip0_171_872">
            <rect width="58.8571" height="58.8571" fill="white" transform="translate(22.0713 22.0713)" />
          </clipPath>
        </defs>
      </symbol>
    </svg>
    <!-- MARK: ALL SEASONS SVG
    -->
    <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="all-seasons-svg">
        <circle cx="51.5" cy="51.5" r="51.5" fill="#7C7C7C" />
        <rect x="42.3337" y="24" width="18.3335" height="18.3335" fill="white" />
        <rect x="24" y="42.3337" width="18.3335" height="18.3335" fill="white" />
        <rect x="60.6667" y="42.3337" width="18.3335" height="18.3335" fill="white" />
        <rect x="42.3337" y="60.6667" width="18.3335" height="18.3335" fill="white" />
      </symbol>
    </svg>
    <!-- MARK: RECOMMEND SVG
      -->
    <svg width="103" height="103" viewBox="0 0 103 103" fill="none" xmlns="http://www.w3.org/2000/svg">
      <symbol id="recommend-svg">
        <circle cx="51.5" cy="51.5" r="51.5" fill="#FFD700" />
        <path d="M48.8905 45.4577C50.0514 43.3748 50.6321 42.3333 51.5 42.3333C52.3679 42.3333 52.9486 43.3748 54.1095 45.4577L54.41 45.9965C54.74 46.5884 54.905 46.8844 55.1621 47.0796C55.4194 47.2749 55.7398 47.3475 56.3803 47.4923L56.9638 47.6243C59.2186 48.1345 60.3458 48.3895 60.614 49.2521C60.8823 50.1147 60.1137 51.0132 58.5767 52.8108L58.1788 53.2758C57.742 53.7866 57.5236 54.0419 57.4256 54.3579C57.3272 54.674 57.3603 55.0145 57.4263 55.696L57.4863 56.3166C57.7187 58.7146 57.8351 59.9139 57.1327 60.4469C56.4305 60.9799 55.375 60.4939 53.2639 59.522L52.7178 59.2704C52.1178 58.9942 51.8179 58.856 51.5 58.856C51.1821 58.856 50.8822 58.9942 50.2822 59.2704L49.7361 59.522C47.625 60.4939 46.5694 60.9799 45.8672 60.4469C45.165 59.9139 45.2812 58.7146 45.5136 56.3166L45.5737 55.696C45.6398 55.0145 45.6728 54.674 45.5746 54.3579C45.4763 54.0419 45.2579 53.7866 44.8211 53.2758L44.4234 52.8108C42.8863 51.0132 42.1178 50.1147 42.386 49.2521C42.6542 48.3895 43.7815 48.1345 46.0362 47.6243L46.6196 47.4923C47.2602 47.3475 47.5806 47.2749 47.8379 47.0796C48.095 46.8844 48.26 46.5884 48.59 45.9965L48.8905 45.4577Z" stroke="white" stroke-width="3.4375" />
        <path d="M40.0417 31.6492C43.4124 29.6993 47.326 28.5833 51.5 28.5833C64.1564 28.5833 74.4167 38.8435 74.4167 51.5C74.4167 64.1564 64.1564 74.4167 51.5 74.4167C38.8435 74.4167 28.5833 64.1564 28.5833 51.5C28.5833 47.326 29.6993 43.4124 31.6492 40.0417" stroke="white" stroke-width="3.4375" stroke-linecap="round" />
      </symbol>
    </svg>
  </div>

<?php
}
// Lưu dữ liệu meta box
function save_custom_meta_box($post_id)
{
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
  if (get_post_type($post_id) !== 'experience') return;
  if (!current_user_can('edit_post', $post_id)) return;

  // Lưu experience groups nếu có
  if (isset($_POST['common'])) {
    update_post_meta($post_id, '_common', $_POST['common']);
  }
  // Lưu experience groups nếu có
  if (isset($_POST['experience_groups'])) {
    update_post_meta($post_id, '_experience_groups', $_POST['experience_groups']);
  }

  // Lưu area groups nếu có
  if (isset($_POST['area_groups'])) {
    update_post_meta($post_id, '_area_groups', $_POST['area_groups']);
  }
}
add_action('save_post', 'save_custom_meta_box');
?>