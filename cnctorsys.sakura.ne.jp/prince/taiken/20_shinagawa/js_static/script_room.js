(function ($) {
    $(function() {
        var width = window.innerWidth;
        var point = 736;
        if (width >= point) {
            $(window).load(function () {
                $('.room-list-cont .box').autoHeight({
                    reset: 'reset',
                    height: 'height',
                    column: 2
                });
            });
        }
    });
})(jQuery);