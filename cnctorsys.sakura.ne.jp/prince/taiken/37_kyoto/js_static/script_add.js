    $(function () {
        //予約URLのSP変換
        /**
         * pcのURL : spのURL
         * という形式で定義する。
         * */
        var lodgingUrlList = {
            //日付指定無しプラン検索（プラン一覧）
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/search_category.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/sp_search_category.cgi',
            //SPC会員予約（プラン一覧）
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/member_check.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/sp_member_check.cgi'
        };
        var restaurantUrlList = {
            //空席照会
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/shokai.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/sp_shokai.cgi',
            //メニュー一覧
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/menu_list.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/sp_menu_list.cgi',
            //SPC会員予約（空席照会）
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/member_check.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/sp_shokai.cgi',
            //SPC会員予約（メニュー一覧）
            'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/member_check.cgi' : 'https://rsv.princehotels.co.jp/cgi-bin/ihonex/stay/sp_member_check.cgi',
            //リクエスト予約
            "https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/request_reserve.cgi" : "https://rsv.princehotels.co.jp/cgi-bin/ihonex/rest/sp_request_reserve.cgi"
        };
        
        var width = window.innerWidth;
        var point = 736;
        //spのとき
        if (width <= point) {
            //sp用のURLに変換
            $('a.lodging-changeable-spurl').each(function () {
                var nowHref = $(this).attr("href") + "";
                //URを検索しspのURLに変換
                for (var pcUrl in lodgingUrlList) {
                    if (nowHref.indexOf(pcUrl) === 0) {
                        var spUrl = lodgingUrlList[pcUrl];
                        $(this).attr("href", nowHref.replace(pcUrl, spUrl));
                        break;
                    }
                }
            });
            $('a.restaurant-changeable-spurl').each(function () {
                var nowHref = $(this).attr("href") + "";
                //URを検索しspのURLに変換
                for (var pcUrl in restaurantUrlList) {
                    if (nowHref.indexOf(pcUrl) === 0) {
                        var spUrl = restaurantUrlList[pcUrl];
                        $(this).attr("href", nowHref.replace(pcUrl, spUrl));
                        break;
                    }
                }
            });
        }
    });

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

    // 空室検索パラメータを組立て、別ウィンドウに空室検索リダイレクト（redirect-reserve-search）ページを開く。
    function reserveSearch(hid, form, area, checkkin, checkout, search_ninzu, rooms) {
        var search_hid = (hid === 'ph') ? '' : hid ;
        var chkin =  checkkin.match(/\d+/g);
        var chkin_yy = chkin[0];
        var chkin_mm = chkin[1];
        var chkin_dd = chkin[2];
        var chkout =  checkout.match(/\d+/g);
        var chkout_yy = chkout[0]
        var chkout_mm = chkout[1];
        var chkout_dd = chkout[2];
        var targetUrl = "/redirect-reserve-search"
                    + "?hid=" + hid
                    + "&form=" + form
                    + "&search:area=" + area
                    + "&search:hid=" + search_hid
                    + "&&chkin_yy=" + chkin_yy + "&chkin_mm=" + chkin_mm + "&chkin_dd=" + chkin_dd
                    + "&chkout_yy=" + chkout_yy + "&chkout_mm=" + chkout_mm + "&chkout_dd=" + chkout_dd
                    + "&search:ninzu=" + search_ninzu
                    + "&rooms=" + rooms + '&search=1';
        
　　　　// psiのhidリスト
        psi_hid_list = ['800'];
        // psiの地域リスト
        psi_area_list = ['20'];

        if ($.inArray(hid ,psi_hid_list) != -1) {
          // hidがpsiのhidリストに含まれる場合、psi=1のパラメータを追加
        	targetUrl = targetUrl + "&psi=1";
        } else if ($.inArray(area ,psi_area_list) != -1) {
          // 地域がpsiの地域のリストに含まれる場合、psi=1のパラメータを追加
        	targetUrl = targetUrl + "&psi=1";
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
        var post = function(hostname, href, blank) {
            if (hostname != "rsv.princehotels.co.jp") {
                return true;
            }

            var form = document.createElement("form");
            form.setAttribute("action", "/redirect-reserve/");
            form.setAttribute("method", "post");
            if (blank) {
                form.setAttribute("target", "_blank");
            }
            form.style.display = "none";
            document.body.appendChild(form);

            var input = document.createElement('input');
            input.setAttribute('type', 'text');
            input.setAttribute('name', 'href');
            input.setAttribute('value', href);
            form.appendChild(input);

            form.submit();

            return false;
        }

        $("a").click(function() {
            var hostname = $(this)[0].hostname;
            var href = $(this).attr("href");
            var blank = false;
            return post(hostname, href, blank);
        })

        $("a").mousedown(function() {
            if (event.which != 2) {
                return false;
            }
            var hostname = $(this)[0].hostname;
            var href = $(this).attr("href");
            var blank = true;
            return post(hostname, href, blank);
        })
    }
