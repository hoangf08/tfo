    $(function () {
        convertIBEUrl();
    });

    function convertIBEUrl() {
        // 予約URLのSP変換
        var cgiList = [
            'search_category.cgi',   // 日付指定無しプラン検索（プラン一覧）
            'member_check.cgi',      // SPC会員予約（プラン一覧/メニュー一覧）
            'shokai.cgi',            // 空席照会
            'menu_list.cgi',         // メニュー一覧
            "request_reserve.cgi",   // リクエスト予約
        ];
        var width = window.innerWidth;
        var point = 736;
        // spのとき
        if (width <= point) {
            $('a.lodging-changeable-spurl').each(function () {
                var href = $(this).attr("href") + "";
                for (var i in cgiList) {
                    var cgi = cgiList[i];
                    href = href.replace("sp_"+cgi, cgi); // sp_sp_~にならないように。
                    href = href.replace(cgi, "sp_"+cgi);
                }
                $(this).attr("href", href);
            });
            $('a.restaurant-changeable-spurl').each(function () {
                var href = $(this).attr("href") + "";
                for (var i in cgiList) {
                    var cgi = cgiList[i];
                    href = href.replace("sp_"+cgi, cgi);
                    href = href.replace(cgi, "sp_"+cgi);
                }
                $(this).attr("href", href);
            });
        }
    }

    /**
     * slider の点が不要なときも表示されるときの対応
     * @param {type} list
     * @return {undefined}
     */
    function editSlicDots(list) {
        for (var i = 0; i < list.length; i++) {
            $(list[i]).each(function () {
    //            console.log(list[i]);

                //sliderの数を取得
                var cnt = 0;
                $(this).find('.slick-slide').each(function () {
                    var slickIndex = $(this).attr("data-slick-index");
                    if (slickIndex >= 0) {
                        cnt++;
                    }
                });

                //スライド表示数を取得(pcのとき)
                var slideToShow = $(this).slick('slickGetOption', 'slidesToShow');

                //sp専用の設定がある時
                var responsive = $(this).slick('slickGetOption', 'responsive');
                if (responsive != null) {
                    //画面幅を取得
                    var width = window.innerWidth;
                    //ブレイクポイントと比較
                    if (width <= responsive[0]['breakpoint']) {
                        //spのとき
                        slideToShow = responsive[0]['settings']['slidesToShow'];
                    }
                }
    //            console.log(list[i] + ", cnt: " + cnt + ", slideToShow: " + slideToShow);
                //点を表示しなくていいときの処理
                if (cnt <= slideToShow) {
                    $(this).find('.slick-dots').empty();
    //                $(this).slick('slickSetOption', 'dots', false, true);
                }
            });
        }
    }
    $(function() {
        /**
         * sliderの定義リスト
         * @type {Array}
         */
        var sliderList = [
            '.recommended-slider',
            '.p-asset01-slider',
            '.p-asset01-slider-02',
            '.p-asset03-slider',
            '.p-asset05-slider',
            '.p-header-slider',
            '.p-hotel-header-slider',
            '.service-slider',
            '.service-slider-02',
            '.bnr-slider',
            '.mv-slider',
            '.mv-slider02',
            '.brand-slider',
            '.footer-bnr-slider',
            ".p-acc-slider",
            ".slick-slider",
        ];

        //pc,spの時両方
        editSlicDots(sliderList);
    });
    $(window).load(function () {
        var spSliderList = [
            '.p-asset08-slider .block',
            '.p-asset09-slider .block',
            '.service-slider-03',
        ];
        //spのときのみ
        var width = window.innerWidth;
        var point = 736;
        if (width <= point) {
            editSlicDots(spSliderList);
        }
    });
    $(function(){
    if($('header').hasClass('header-home')) {
            $(window).scroll(function () {
            if($(window).scrollTop() > 768) {
                $('header section.home-alert').css({'cssText': 'display: none !important;'});
            } else {
                $('header section.home-alert').css({'cssText': 'display: block; !important;'});
            }
            });
        }
    });

    $(function() {
        $('.res-top .res-list .p-asset02 .middle').autoHeight();
        $('.res-top .res-list .p-asset02 .text').autoHeight();
    });

    $(function() {
        var tripLengthOffice = $(".area-top .share-block").children('div .bnr').length;
        var tripLengthRes = $(".res-shop .share-block").children('div .bnr').length;

        var officeShareBlock = $("body.area-top").find('.share-block');
        if(tripLengthOffice == 2){
            $(officeShareBlock[1]).width(805);
        }else if(tripLengthOffice == 1){
            $(officeShareBlock[1]).width(610);
        }else{
            $(officeShareBlock[1]).width(440);
        }

        var resShareBlock = $("body.res-shop").find('.share-block');
        if(tripLengthRes == 1){
            $(resShareBlock[1]).width(610);
        }else{
            $(resShareBlock[1]).width(440);
        }
    });

    $(function() {
        $(".res-shop .shop-data .tab").off("click");
        $(".res-shop .shop-data .tab").on("click", function() {
            $('.res-shop #lv01-tab-body01 .p-asset12 .name').autoHeight({
            reset: 'reset',
            height: 'height'
            });
            $('.res-shop #lv01-tab-body01 .p-asset12 .desc').autoHeight({
            reset: 'reset',
            height: 'height'
            });
            $('.res-shop #lv01-tab-body02 .p-asset12 .name').autoHeight({
            reset: 'reset',
            height: 'height'
            });
            $('.res-shop #lv01-tab-body02 .p-asset12 .desc').autoHeight({
            reset: 'reset',
            height: 'height'
            });
        });
    });

    $(function() {
        var newsOfficeTabNum =  $("body.area-top .info-block .p-tab-head").children('li').length;
        if(newsOfficeTabNum==9){
            $("body.area-top .p-tab-head").width(1380);
            $("body.area-top .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsOfficeTabNum==8){
            $("body.area-top .p-tab-head").width(1240);
            $("body.area-top .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsOfficeTabNum==7){
            $("body.area-top .p-tab-head").width(1240);
            $("body.area-top .info-block .p-tab-width li").css({'cssText': 'width: 170px;'});
        }else if(newsOfficeTabNum==6){
            $("body.area-top .p-tab-head").width(1240);
            $("body.area-top .info-block .p-tab-width li").css({'cssText': 'width: 200px;'});
        }else{
            $("body.area-top .p-tab-head").width(1240);
            $("body.area-top .info-block .p-tab-width li").css({'cssText': 'width: 239px;'});
        }
    });

    $(function() {
        var newsOfficeTabNum =  $("body.area.info .info-list .p-tab-head").children('li').length;
        if(newsOfficeTabNum==9){
            $("body.area.info .p-tab-head").width(1380);
            $("body.area.info .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsOfficeTabNum==8){
            $("body.area.info .p-tab-head").width(1240);
            $("body.area.info .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsOfficeTabNum==7){
            $("body.area.info .p-tab-head").width(1240);
            $("body.area.info .info-block .p-tab-width li").css({'cssText': 'width: 170px;'});
        }else if(newsOfficeTabNum==6){
            $("body.area.info .p-tab-head").width(1240);
            $("body.area.info .info-block .p-tab-width li").css({'cssText': 'width: 200px;'});
        }else{
            $("body.area.info .p-tab-head").width(1240);
            $("body.area.info .info-block .p-tab-width li").css({'cssText': 'width: 239px;'});
        }
    });

    $(function() {
        var newsAreaHomeTabNum =  $("body.area-home.info .info-list .p-tab-head").children('li').length;

        if(newsAreaHomeTabNum==9){
            $("body.area-home.info .p-tab-head").width(1380);
            $("body.area-home.info .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsAreaHomeTabNum==8){
            $("body.area-home.info .p-tab-head").width(1240);
            $("body.area-home.info .info-block .p-tab-width li").css({'cssText': 'width: 149px;'});
        }else if(newsAreaHomeTabNum==7){
            $("body.area-home.info .p-tab-head").width(1240);
            $("body.area-home.info .info-block .p-tab-width li").css({'cssText': 'width: 170px;'});
        }else if(newsAreaHomeTabNum==6){
            $("body.area-home.info .p-tab-head").width(1240);
            $("body.area-home.info .info-block .p-tab-width li").css({'cssText': 'width: 200px;'});
        }else{
            $("body.area-home.info .p-tab-head").width(1240);
            $("body.area-home.info .info-block .p-tab-width li").css({'cssText': 'width: 239px;'});
        }
    });

    $(function() {
        $("body.golf.area.info .p-tab-head").width(970);
        $("body.golf.area.info .info-block .p-tab-width li").css({'cssText': 'width: 239px;'});
    });

    //scroll down
    $(function(){

    $('body.home .mv .mv-scroll a[href^=#]').on('click',function() {
    var speed = 800;
    var href= $(this).attr('href');
    var target = $(href == '#' || href == '' ? 'html' : href);
    var position = target.offset().top;
    $('html, body').animate({scrollTop: $(document).height()}, speed, 'swing');
    return false;
    });
    });

    /*$(function() {
        $("body.golf.area .mv-nav .dots ul:first").remove();
    });*/

    /**
     * androidでaタグのhoverが消えない対応

    var touch = 'ontouchstart' in document.documentElement || navigator.maxTouchPoints > 0 || navigator.msMaxTouchPoints > 0;

    if (touch) { // remove all :hover stylesheets
        try { // prevent exception on browsers not supporting DOM styleSheets properly
            for (var si in document.styleSheets) {
                var styleSheet = document.styleSheets[si];
                if (!styleSheet.rules) continue;

                for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                    if (!styleSheet.rules[ri].selectorText) continue;

                    if (styleSheet.rules[ri].selectorText.match(':hover')) {
                        styleSheet.deleteRule(ri);
                    }
                }
            }
        } catch (ex) {}
    }*/

    $(function() {
        $('.header-access > p').on('click', function() {
            $('.header-access-cont').fadeToggle();
            $(this).parent().toggleClass('active');
            $('.header-tel,.header-login').removeClass('active');
            $('.header-tel-cont,.header-login-cont').hide();
            $('.header-reserve,.header-login').removeClass('active');
            $('.header-reserve-cont,.header-login-cont').hide();
        });
        $('.header-tel > p').on('click', function() {
            $('.header-access,.header-login').removeClass('active');
            $('.header-access-cont,.header-login-cont').hide();
        });
        $('.header-reserve > p').on('click', function() {
            $('.header-access,.header-login').removeClass('active');
            $('.header-access-cont,.header-login-cont').hide();
        });
        $('.header-login > p').on('click', function() {
            $('.header-access,.header-reserve').removeClass('active');
            $('.header-access-cont,.header-reserve-cont').hide();
        });
    })

    // 空室検索パラメータを組立て、別ウィンドウに空室検索リダイレクト（redirect-reserve-searchまたはredirect-reserve-search-synxisまたは他サイト）ページを開く。
    function reserveSearch(hid, form, area, checkkin, checkout, search_ninzu_adult, search_ninzu_child, promo) {
        var search_hid = (hid === 'ph') ? '' : hid ;
        var chkin =  checkkin.match(/\d+/g);
        var chkin_yy = chkin[0];
        var chkin_mm = chkin[1];
        var chkin_dd = chkin[2];
        var chkout =  checkout.match(/\d+/g);
        var chkout_yy = chkout[0]
        var chkout_mm = chkout[1];
        var chkout_dd = chkout[2];
        var targetUrl = "/redirect-reserve-search-synxis";

        // psiのhidリスト
        var psi_hid_list = ['800', '801', '802', '803', '804', '805', '806', '807'];

        // psiの地域リスト
        var psi_area_list = ['20', '21', '22', '23'];

        // i-honex、SynXisでは無いサイトで予約するホテルIDリスト
        // シーパラダイスイン、ナイスプリンスホテル嘉義
        var other_site_list = ['00000', '00001'];

        if ($.inArray(hid ,other_site_list) != -1) {
            // hidが他サイトのhidリストに含まれる場合、パラメータを組立てず直接遷移
            if (hid == '00000') {
                // シーパラダイスイン
                targetUrl = "https://www.seaparadise.co.jp/index.html";
            } else if (hid == '00001'){
                // ナイスプリンスホテル嘉義
                targetUrl = "http://www.niceprincehotel.com.tw/jp/";
            }
        } else if ($.inArray(hid ,psi_hid_list) != -1 || $.inArray(area ,psi_area_list) != -1) {
            // hidがpsiのhidリストに含まれる、または 地域がpsiの地域のリストに含まれる場合、i-honexサイト用にパラメータを組立て
            var ninzu = Number(search_ninzu_adult) + Number(search_ninzu_child);
            targetUrl = "/redirect-reserve-search"
                   + "?hid=" + hid
                   + "&form=" + form
                   + "&search:area=" + area
                   + "&search:hid=" + search_hid
                   + "&chkin_yy=" + chkin_yy + "&chkin_mm=" + chkin_mm + "&chkin_dd=" + chkin_dd
                   + "&chkout_yy=" + chkout_yy + "&chkout_mm=" + chkout_mm + "&chkout_dd=" + chkout_dd
                   + "&search:ninzu=" + ninzu
                   + "&rooms=1&search=1"
                   + "&psi=1";
        } else {
            // SynXisサイト用にパラメータを組立て
            targetUrl = targetUrl
                   + "?chain=31483"
                   + "&arrive=" + chkin_yy + "-" + chkin_mm + "-" + chkin_dd
                   + "&depart=" + chkout_yy + "-" + chkout_mm + "-" + chkout_dd
                   + "&adult=" + search_ninzu_adult
                   + "&child=" + search_ninzu_child
                   + "&locale=ja-JP";
            if (search_hid) {
                targetUrl = targetUrl + "&hotel=" + search_hid;
            } else if (area) {
                targetUrl = targetUrl + "&dest=" + area;
            }

            if (promo) {
                targetUrl = targetUrl + "&promo=" + promo;
            }
        }

        var reserveWindow = window.open(targetUrl);
        reserveWindow.focus();
    }

    // 空室検索のチェックアウトをチェックインの翌日に変更する。
    // チェックインが変更されるとチェックアウトを翌日に変更するイベントを登録する。
    function reserveDateSet(from, to) {
        $(from).datepicker().datepicker('setDate', 'today');

        // チェックアウトの初期値を「明日」にする。
        var nextDate = new Date();
        nextDate.setDate(nextDate.getDate() + 1);
        $(to).datepicker().datepicker('setDate', nextDate);

        // チェックインが変更された場合、チェックアウトを翌日にする。
        $(from).change(function() {
            var nextDate = new Date($(this).datepicker('getDate'));
            nextDate.setDate(nextDate.getDate() + 1);
            $(to).datepicker().datepicker('setDate', nextDate);
        });
    }

    // 空室検索のチェックイン日付とチェックアウト日付をオープン日当日～翌日に設定する
    // オープン日が未入力、または過去日の場合は、今日～明日に設定する
    // チェックインが変更されるとチェックアウトを翌日に変更するイベントを登録する
    function reserveDateSetByOpeningDay(from, to, openingDay) {

    	// オープン日が空、または過去の日付の場合：今日の日付を基準にする
    	// そうでない場合：オープン日を基準にする
    	if (openingDay == '' || compare2now(openingDay)) {
    		var fromDate = new Date();
    	} else {
        	var fromDate = new Date(openingDay);
    	}

    	// チェックインの日付を「オープン日当日」に設定する
        $(from).datepicker().datepicker('setDate', fromDate);
        $(from).datepicker( {
        	'dataFormat':'yy-mm-dd'
        });

        // チェックアウトの初期値を「オープン日翌日」に設定する
        var nextDate = fromDate;
        nextDate.setDate(fromDate.getDate() + 1);
        $(to).datepicker().datepicker('setDate', nextDate);

        // チェックインが変更された場合、チェックアウトを翌日にする。
        $(from).change(function() {
            var nextDate = new Date($(this).datepicker('getDate'));
            nextDate.setDate(nextDate.getDate() + 1);
            $(to).datepicker().datepicker('setDate', nextDate);
        });
    }

    function compare2now(datestr){

    	if(datestr=='') {
    		return true;
    	}

    	// 現在の日付＆時刻を取得
	    var today = new Date();
	    // 時間を0:00にする
	    today.setHours(0);
	    today.setMinutes(0);
	    today.setSeconds(0);
	    today.setMilliseconds(0);

	    // 文字列から年月日を抜き出し、数値型に変換
	    var vYear = parseInt( datestr.substr( 0, 4 ),10);
	    var vMonth = parseInt( datestr.substr( 5, 2 ),10 ) -1;
	    var vDay = parseInt( datestr.substr( 8, 2 ),10 );
	    var adate = new Date( vYear, vMonth, vDay );

	    if( adate.getTime() < today.getTime() ){
	    	return true;
	    } else {
	    	return false;
	    }
    }

    $(function() {
        $('body.info .more a').on({
            'mouseenter': function() {
                $("body.info .more a").css({'cssText': 'background-color: #222 !important;'});
            },
            'mouseleave': function() {
                $("body.info .more a").css({'cssText': 'background-color: #fff !important;'});
            }
        });
        $("body.info .more a").on("click", function() {
            $("body.info .more a").css({'cssText': 'background-color: #fff !important;color: #222 !important;'});
        });
        $('body.wedding.info .more a').on({
            'mouseenter': function() {
                $("body.wedding.info .more a").css({'cssText': 'background-color: #907A0F !important;'});
            },
            'mouseleave': function() {
                $("body.wedding.info .more a").css({'cssText': 'background-color: #fff !important;'});
            }
        });
        $("body.wedding.info .more a").on("click", function() {
            $("body.wedding.info .more a").css({'cssText': 'background-color: #fff !important;color: #907A0F !important;'});
        });
    })

    function registerReserveLinkEvent() {
        var post = function(hostname, href, blank, isGetLink) {
            if (hostname != "rsv.princehotels.co.jp") {
                if (hostname != "rsv.seibuprince.com") {
                    return true;
                }
            }

            var form = document.createElement("form");
            if (hostname == "rsv.princehotels.co.jp") {
                form.setAttribute("action", "/redirect-reserve/");
                form.setAttribute("method", isGetLink ? "get" : "post");
                if (blank) {
                    form.setAttribute("target", "_blank");
                    form.setAttribute("rel", "noopener");
                }
                form.style.display = "none";
                document.body.appendChild(form);

                var input = document.createElement('input');
                input.setAttribute('type', 'text');
                input.setAttribute('name', 'href');
                input.setAttribute('value', href);
                form.appendChild(input);

            } else {
                params = new URL(href)
                form.setAttribute("action", "/redirect-reserve-synxis/" + params.search);
                form.setAttribute("method", "post");
                if (blank) {
                    form.setAttribute("target", "_blank");
                    form.setAttribute("rel", "noopener");
                }
                form.style.display = "none";
                document.body.appendChild(form);
            }
            form.submit();

            return false;
        }

        $("a").click(function() {
            var hostname = $(this)[0].hostname;
            var href = $(this).attr("href");
            //var blank = false;
            var blank = true;
            var isGetLink = $(this).attr("data-get-link") != void 0;
            return post(hostname, href, blank, isGetLink);
        })

        $("a").mousedown(function() {
            if (event.which != 2) {
                return false;
            }
            var hostname = $(this)[0].hostname;
            var href = $(this).attr("href");
            var blank = true;
            var isGetLink = $(this).attr("data-get-link") != void 0;
            return post(hostname, href, blank, isGetLink);
        })
    }

$(function() {
    $(".header-nav .stay-menu a").click(function() {
        location.href = $(this).attr("href")
    });
    $('.header-nav li.stay a').on('click', function() {
        var menu = this;
        $('.header-nav li.stay a').each(function (i, element){
            if (element != menu && $(element).hasClass('active')) {
                $(element).removeClass('active');
                $(element).next().hide();
            }
        });
        return false;
    });
})
// レストランのヘッダーナビのpadding設定
// $(window).load(function () {
//     if ($("body.res-detail .header-nav").length > 0) {
//         pageWidth = 1260;
//         widthSum = 0;
//         $("body.res-detail .header-nav li").css('width', "auto");
//         $("body.res-detail .header-nav li").each(function(){
//             widthSum += $(this).width()+1;
//         });
//         liLeng = $("body.res-detail .header-nav li").length;
//         pad = Math.floor((pageWidth - widthSum) / (liLeng * 2));
//         $("body.res-detail .header-nav li").each(function(){
//             $(this).css('padding', "0 "+ pad +"px");
//         });
//     }
// });
// 言語のプルダウンが開いている状態で画面のいずれかをクリックでプルダウンを閉じる
$(function() {
    isOpen = false;
    $("body").click(function() {
        if ($('.header-lang.open').length > 0){
            if (isOpen) {
                $('.lang-active').parent('.header-lang').removeClass('open');
                $('.lang-active').next().fadeOut();
            }
            isOpen = !isOpen;
        } else {
            isOpen = false;
        }
    });
})

// HOME 提携ホテルで要素数が1つのときに中央寄せにする
$(window).load(function() {
    var width = $("body.home section.bnr-block").width();
    if ($("body.home section.bnr-block div.box").length == 1 && width <= 736) {
        $("body.home section.bnr-block div.slick-track").css("min-width", width);
    }
});

$(function() {
    // 事業所ウエディングTOP スライドショー
    if ($('body.wedding-top.area').length > 0) {
        setSlidePointer('body.wedding-top.area section.wedding-info div.wedding-info-party');
        setSlidePointer('body.wedding-top.area section.wedding-info div.wedding-info-gallery');
    }
});

// スライドショー ポインター修正
function setSlidePointer(partySlide) {
    points = $(partySlide +' li[role="presentation"]').length;
    pointer = partySlide +' div.wedding-report-slider';
    mousedown = false;
    moveSlickPointer(points, pointer);
    if (points > 2) {
        $(partySlide +' div.wedding-report-slider li[role="presentation"]').on('click', function(){
            point = $(partySlide +' li[role="presentation"]').length;
            buttonId = $(partySlide +' div.wedding-report-slider li[role="presentation"]').index(this);
            buttonId = ('00' + buttonId).slice(-2);
            viewPointerString(buttonId, partySlide +' p.wedding-report-text-', point);
        });
    }
    $(partySlide +' div.wedding-report-slider').on('touchstart mousedown', function(){
        mousedown = true;
    });
    $('body').on('touchend mouseup', function(){
        if (mousedown) {
            point = $(partySlide +' li[role="presentation"]').length;
            activebButtonId = $(partySlide +' div.wedding-report-slider div.slick-slide:not(.slick-cloned)').index($(partySlide +' div.wedding-report-slider div.slick-slide.slick-active'));
            activebButtonId = ('00' + activebButtonId).slice(-2);
            viewPointerString(activebButtonId, partySlide +' p.wedding-report-text-', point);
        }
    });
}

//パーティ・ハネムーンレポート詳細 コンバージョンリンク
$(function() {
    if ($('body.stay-detail.area').length > 0) {
        if ($('div.stay-detail.wedding.wedding-top.area:not(.sp-fixed-block)').length > 0) {
            var width = $(window).width();
            var point = 736;
            if (width > point) {
                sec   = $('.stay-detail.wedding.wedding-top.area section.wedding-menu');
                nav02 = $('.stay-detail.area .wedding-fix'),
                offset02 = nav02.offset(),
                x = offset02.left;
                y = 240;
                sec.css('display', 'none');
                sec.css('visibility', 'visible');

                $(window).scroll(function () {
                    if($(window).scrollTop() > y) {
                        sec.css('display', 'block');
                        x = offset02.left;
                        nav02.addClass('fixed').css('left',x+'px');
                    } else {
                        sec.css('display', 'none');
                        nav02.removeClass('fixed').css('left','');
                    }
                });
            }
        }
    }
});

// スライダーのポイント数に合わせて矢印の位置を修正する
function moveSlickPointer(points, pointer) {
    var width = window.innerWidth;
    var maxSpWidth = 736;
    var move = '';
    if (points > 6 && width > maxSpWidth) {
        move = 248 - (points - 6) * 6 +'px';
    } else if (points > 12 && width <= maxSpWidth) {
        move = 30 - (points - 12) +'%';
    }
    if (move != '') {
        $(pointer +' a.slick-prev').css('left', move);
        $(pointer +' a.slick-next').css('right', move);
    }
}

// スライダー変更時に対応したテキストを出力する
function viewPointerString(buttonId, strclass, points) {
    for (var i = 0; i < points; i++) {
        sliderStrId = ('00' + i).slice(-2);
        updateClass = strclass +''+ sliderStrId;
        if (sliderStrId == buttonId) {
            $(updateClass).css('display', 'block');
        } else {
            $(updateClass).css('display', 'none');
        }
    }
}


// 事業所アクセス 地図アプリで見る
$(function() {
    $('body.area.area-access section.area-access-map div.shop-access-map p.sp-fix a').on('touchend', function(){
        return accessMapAplication(this);
    });
    // 事業所レストラン店舗TOP 地図アプリで見る
    $('body.area.res-shop section.shop-data div.shop-access div.bottom p.sp-fix a').on('touchend', function(){
        return accessMapAplication(this);
    });
});
// 地図アプリで見る
function accessMapAplication(selecter) {
    var width = $(window).width();
    var point = 736;
    var isIOS = /iP(hone|(o|a)d)/.test(navigator.userAgent);
    if (width <=point && isIOS) {
        location.href = $(selecter).attr("href");
        return false;
    } else {
        return true;
    }
}

$(function() {
    // add 1561
    var $eventDetailPlan = $('.event-detail-plan');
    if ($eventDetailPlan.length > 0) {
        // 画像のロードを待たないといけないが、画像がない場合のタイムアウトなどを考えると
        // ちょっとまってから行うことでも対応ができそうなため、この方法を採用した
        setTimeout(function() {
            $eventDetailPlan.find('.p-asset01').each(function(i, elem) {
                var $elems = $(elem).find('.height-group01');
                $elems.css("min-height", "");
                $elems.tile();
            });
        }, 1000);
    }

    // add 1560
    $('.mv-slider, .mv-slider02').show();
});

$(function() {
    $('.login-ncrm-form').submit(function() {
        event.preventDefault();

        var $form = $(this);
        $.ajax({
            url: $form.attr('action'),
            type: $form.attr('method'),
            data: $form.serialize(),
            success: function(data, status, xhr) {
                redirectUrl = xhr.getResponseHeader('Location');
                location.href = redirectUrl;
            },
            error: function(xhr, textStatus, error) {
                if(xhr.status === 401){
                    var errObj = JSON.parse(xhr.responseText);

                    var ERROR_WEAK_MSG = 'セキュリティ強化のため、パスワードポリシーを変更いたしました。<a target="_blank" style="color: red;" href="https://club.seibugroup.jp/mypage/remind/?show">こちら</a>からパスワードの変更を行ってください。';
                    var ERROR_001_MSG = 'ログインに失敗しました。お客さま番号とログインパスワードをご確認の上、再度ログインしてください。';
                    var ERROR_002_MSG = 'ログインに失敗しました。お客さま番号とログインパスワードをご確認の上、再度ログインしてください。';
                    var ERROR_003_MSG = 'お使いいただけないカードです。カード状態を西武プリンスクラブデスクへお問合せください。';
                    var ERROR_050_MSG = '一定時間アクセスがなかったためセッションタイムアウト又は、不正な画面遷移のためエラーが発生しました。トップページより再度ログインしてください。';
                    var ERROR_201_MSG = '一定回数ログインに失敗したため、アカウントがロックされました。<a target="_blank" style="color: red;" href="https://club.seibugroup.jp/mypage/remind/?show">こちら</a>からパスワードの変更を行ってください。';
                    var ERROR_202_MSG = 'ログインに失敗しました。お客さま番号とログインパスワードをご確認の上、再度ログインしてください。';
                    var ERROR_204_MSG = 'ログインに失敗しました。お客さま番号とログインパスワードをご確認の上、再度ログインしてください。';
                    var ERROR_DEFAULT_MSG = 'ログインに失敗しました。';

                    if(errObj.resultCode == "000" && errObj.isWeak == "2"){
                        $(".login-ncrm-form-err-msg").html(ERROR_WEAK_MSG);
                    }else{
                        switch(errObj.resultCode){
                            case "001":
                            	$(".login-ncrm-form-err-msg").html(ERROR_001_MSG);
                            	break;
                            case "002":
                            	$(".login-ncrm-form-err-msg").html(ERROR_002_MSG);
                            	break;
                            case "003":
                            	$(".login-ncrm-form-err-msg").html(ERROR_003_MSG);
                            	break;
                            case "050":
                            	$(".login-ncrm-form-err-msg").html(ERROR_050_MSG);
                            	break;
                            case "201":
                            	$(".login-ncrm-form-err-msg").html(ERROR_201_MSG);
                            	break;
                            case "202":
                            	$(".login-ncrm-form-err-msg").html(ERROR_202_MSG);
                            	break;
                            case "204":
                            	$(".login-ncrm-form-err-msg").html(ERROR_204_MSG);
                            	break;
                            default:
                            	$(".login-ncrm-form-err-msg").html(ERROR_DEFAULT_MSG);
                        }
                    }
                }
            }
        });
    return false;
    });
});

//別ウィンドウにコースの空き枠検索リダイレクト（golf-redirect-course-search）ページを開く。
function courseSearch(url) {
     var targetUrl = "/golf-redirect-course-search?" + url;

     var reserveWindow = window.open(targetUrl);
     reserveWindow.focus();
}

//別ウィンドウにゴルフコースの空き枠表示リダイレクト（golf-redirect-course）ページを開く。
function courseEmpty(url) {
    var targetUrl = "/golf-redirect-course?redirectUrl=" + url;

    var reserveWindow = window.open(targetUrl);
    reserveWindow.focus();
}
