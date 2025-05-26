// --------------------------------------------------
//  スムーズスクロール
// --------------------------------------------------
$('a[href^="#"]').click(function () {
  const speed = 1000;
  let href = $(this).attr("href");
  let target = $(href == "#" || href == "" ? "html" : href);
  let position = target.offset().top;
  $("body,html").animate({
    scrollTop: position
  }, speed, "swing");
  return false;
});

// --------------------------------------------------
//  page topボタン
// --------------------------------------------------
$(function () {
  var topBtn = $('.pageTop');
  topBtn.hide();
  // ボタンの表示設定
  $(window).scroll(function () {
    if ($(this).scrollTop() > 80) {
      // 画面を指定pxスクロールしたら、ボタンを表示する
      topBtn.fadeIn();
    } else {
      // 画面が指定pxより上なら、ボタンを表示しない
      topBtn.fadeOut();
    }
  });
});

// --------------------------------------------------
//  toggle
// --------------------------------------------------
$(function () {
  $('.toggle').on('click', function () {
    $('body').toggleClass('is-open');
    $('.filter').toggleClass('overlay');
  });
  $(document).on('click', '.overlay', function () {
    $('body').removeClass('is-open');
    $('.filter').removeClass('overlay');
  });
  $('.lp_gnav a').on('click', function () {
    $('body').removeClass('is-open');
    $('.filter').removeClass('overlay');
  });
});

// --------------------------------------------------
//  要素のフェードイン（必要無ければ消す）
// --------------------------------------------------
$(function () {
  $(window).scroll(function () {
    $(".fadeBlock").each(function () {
      var scroll = $(window).scrollTop();
      var blockPosition = $(this).offset().top;
      var windowHeihgt = $(window).height();
      if (scroll > blockPosition - windowHeihgt + 240) {
        $(this).addClass("fadeIn");
      }
    });
  });
});

// --------------------------------------------------
//  slide
// --------------------------------------------------
$(function () {
  $('.kvSlide').slick({
    autoplay: true,
    autoplaySpeed: 3000,
    arrows: false,
    pauseOnFocus: false,
    pauseOnHover: false,
    pauseOnDotsHover: false,
  });
});

// --------------------------------------------------
//  TOPの記事一覧 タブ切り替え設定
// --------------------------------------------------

$(document).ready(function() {
      var searchBox = '.search-box'; // 絞り込む項目を選択するエリア
      var listItem = '.list .list_item';   // 絞り込み対象のアイテム
      var hideClass = 'is-hide';     // 絞り込み対象外の場合に付与されるclass名
      var itemsToShow = 6;           // 初期表示するアイテム数

      // 初期表示時にフィルタリングを実行
      search_filter();

      // 絞り込み項目を変更した時のイベント
      $(searchBox + ' input').change(function() {
        search_filter();
      });

      // リセットボタンのクリックイベント
      $('#resetBtn').click(function() {
        // 全てのチェックを外す
        $(searchBox + ' input[type="checkbox"]').prop('checked', false);
        // 全てをチェックする（全てのラジオボタンに対しては直接操作）
        $(searchBox + ' input[type="radio"]').prop('checked', function() {
          return this.value === '';
        });
        // フィルタリングを実行
        search_filter();
        // もっと見るボタンを再度表示
        $('#loadMoreBtn').show();
      });

      // もっと見るボタンのクリックイベント
      $('#loadMoreBtn').click(function() {
        loadMoreItems();
      });

      /**
       * リストの絞り込みを行う
       */
      function search_filter() {
        // 非表示状態を解除
        $(listItem).removeClass(hideClass);

        // 選択されている項目を取得
        var kindData = $('[name="kind"]:checked').val();
        var colorData = get_selected_input_items('color');
        const experienceTags = get_selected_experience_tags(colorData);

        // リスト内の各アイテムをチェック
        $(listItem).each(function() {
          // エリアタグの選択状態による絞り込み処理
          let isShowKind = true;
          if (kindData && $(this).data('kind') !== kindData) isShowKind = false;
          
          // 体験タグの選択状態による絞り込み処理
          let isShowExperience = true;
          if (experienceTags.length > 0) isShowExperience = exist_experience_tags(experienceTags, $(this).find('.top-tag')[0].children);

          if (!isShowKind || !isShowExperience ) {
            $(this).addClass(hideClass);
          }
        });

        // 最初の6件の表示を制限
        var visibleCount = 0;
        $(listItem).each(function() {
          if (!$(this).hasClass(hideClass)) {
            visibleCount++;
            if (visibleCount > itemsToShow) {
              $(this).addClass(hideClass);
            }
          }
        });

        // もっと見るボタンの表示制御
        var hiddenItems = $(listItem + '.' + hideClass);
        if (hiddenItems.length > 0) {
          var shouldShowLoadMore = false;
          hiddenItems.each(function() {
            if ((!kindData || $(this).data('kind') === kindData) && (colorData.length === 0 || colorData.indexOf($(this).data('color')) !== -1)) {
              shouldShowLoadMore = true;
            }
          });
          if (shouldShowLoadMore) {
            $('#loadMoreBtn').show(); // もっと見るボタンを表示
          } else {
            $('#loadMoreBtn').hide(); // もっと見るボタンを非表示
          }
        } else {
          $('#loadMoreBtn').hide(); // もっと見るボタンを非表示
        }
      }

      /**
       * inputで選択されている値の一覧を取得する
       * @param  {String} name 対象にするinputのname属性の値
       * @return {Array}       選択されているinputのvalue属性の値
       */
      function get_selected_input_items(name) {
        var searchData = [];
        $('[name="' + name + '"]:checked').each(function() {
          searchData.push($(this).val());
        });
        return searchData;
      }

      /**
       * もっと見るボタンでアイテムを追加表示する
       */
      function loadMoreItems() {
        var itemsToShowFiltered = []; // 絞り込まれたアイテムを保持する配列

        // 選択されている絞り込み条件を取得
        var kindData = $('[name="kind"]:checked').val();
        var colorData = get_selected_input_items('color');

        // 表示されていないアイテムを絞り込み条件に基づいて取得
        $(listItem + '.' + hideClass).each(function() {
          if ((!kindData || $(this).data('kind') === kindData) && (colorData.length === 0 || colorData.indexOf($(this).data('color')) !== -1)) {
            itemsToShowFiltered.push($(this));
          }
        });

        // itemsToShowの数だけ表示する
        for (var i = 0; i < itemsToShow; i++) {
          if (itemsToShowFiltered[i]) {
            itemsToShowFiltered[i].removeClass(hideClass);
          }
        }

        // 表示されていないアイテムがなくなったらボタンを非表示にする
        if (itemsToShowFiltered.length <= itemsToShow) {
          $('#loadMoreBtn').hide();
        }
      }

      // 体験タグの選択状態による絞り込み処理
      /**
       * 選択した体験タグのリストを取得
       * @param  {Array} searchData 選択されているinputのvalue属性の値
       * @return {Array}            選択した体験タグのリスト
       */
      function get_selected_experience_tags(searchData) {
        // searchDataの各要素に対応するlabel要素のtextContentを取得する
        let experienceTags = searchData.map((item) => {
            return document.querySelector(`label[for="${item}"]`).textContent;
        });

        return experienceTags;
      }

      /**
       * 体験タグの存在判定
       * @param  {Array}             selectTags 選択した体験タグのリスト
       * @param  {HTMLAllCollection} targetTags 記事に付与されている体験タグのリスト
       * @return {boolean}
       */
      function exist_experience_tags(experienceTags, articleTags) {
        // 記事に付与されている体験タグのリストを取得
        let articleTagsBuf = [];
        Array.prototype.forEach.call(articleTags, (item) => {
            articleTagsBuf.push(item.textContent);
        });

        // 選択した体験タグが記事に付与されている体験タグを全て含むか判定
        let result = experienceTags.every((value) => {
            return articleTagsBuf.includes(value);
        });
        
        return result;
      }
    });
