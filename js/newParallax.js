jQuery(document).ready(function ($) {
    if (device.mobile() == false) {
        $("#jobs .title").click(function (event) {
            $("#jobs .details.active").removeClass("active");
            $("#jobs .title.active").removeClass("active");
            $("#" + this.id + "Tab").addClass("active");
            $("#jobs #" + this.id).addClass("active");
            event.preventDefault();
        });
        $("#popmenu").hide();
        $('#popmenu').bind('DOMMouseScroll mousewheel wheel', function (event) {
            var delta = getDeltaFromEvent(event);
            var t = $(this);
            if (delta > 0 && t.scrollTop() === 0) {
                event.preventDefault();
            } else {
                if (delta < 0 && (t.scrollTop() == t.get(0).scrollHeight - t.innerHeight())) {
                    event.preventDefault();
                }
            }
        });
        var originalTouch;
        $('#popmenu').bind('touchstart', function (event) {
            originalTouch = getPointFromEvent(event);
        });
        $('#popmenu').bind('touchmove', function (event) {
            var point = getPointFromEvent(event);
            delta = 1 * (point[1] - originalTouch[1]);
            var t = $(this);
            if (delta > 0 && t.scrollTop() === 0) {
                event.preventDefault();
            } else {
                if (delta < 0 && (t.scrollTop() == t.get(0).scrollHeight - t.innerHeight())) {
                    event.preventDefault();
                }
            }
        });
        $(".menuwrapper").show();
        $(".closewrapper").hide();
        $(".menu").click(function (event) {
            $("#popmenu").show();
            $(".menuwrapper").hide();
            $(".closewrapper").show();
            $(".content").hide();
            $(".sidenav").css({
                opacity: 0
            });
            event.preventDefault();
        });
        $(".close2").click(function (event) {
            $("#popmenu").hide();
            $(".menuwrapper").show();
            $(".closewrapper").hide();
            $(".content").show();
            $(".sidenav").css({
                opacity: 1
            });
            event.preventDefault();
        });
        var originalShowcaseHeight = 600;
        var originalShowcasePadding = 200;
        setTimeout(function () {
            originalShowcaseHeight = $(".showcase").outerHeight();
            originalShowcasePadding = $(".showcase .row").css('padding-top');
            if (originalShowcasePadding) {
                originalShowcasePadding = originalShowcasePadding.replace('px', '');
            }
        });
        $(window).scroll(function (event) {
            var offset = $(window).scrollTop();
            var showcaseHeight = $(".web_list_img, #news_f_k").outerHeight();
            var headerHeight = $("header").outerHeight();
            var header2Top = Math.min(0, offset - showcaseHeight);
            var hwTop = Math.max(0, Math.min(showcaseHeight - offset, showcaseHeight));
            var percentage = 1 - 0.7 * offset / (showcaseHeight - headerHeight);
            var paddingTop = Math.max(originalShowcasePadding / 2, originalShowcasePadding / 2 + originalShowcasePadding / 2 * (originalShowcaseHeight - headerHeight - offset) / (originalShowcaseHeight - headerHeight));
            $(".web_list_img .w_l_c_o, #news_f_k .f_k_op").css({
                'opacity': percentage
            });
            if (offset < 0) {
                $(".web_list_img, #news_f_k").css({
                    'height': (originalShowcaseHeight - offset)
                });
                $("main").css({
                    'top': (originalShowcaseHeight - offset)
                });
            }
        });

        function getDeltaFromEvent(event) {
            var originalEvent = event.originalEvent;
            var delta = 0;
            if (originalEvent) {
                delta = originalEvent.wheelDelta;
                if (!delta) {
                    delta = (-1 * originalEvent.deltaY);
                }
            }
            return delta;
        }

        function getPointFromEvent(event) {
            var x = event.pageX;
            if (!x) {
                if (event.originalEvent) {
                    var original = event.originalEvent;
                    if (original.touches) {
                        var touch = original.touches[0];
                        if (touch) {
                            x = touch.pageX;
                        } else {
                            x = 0;
                        }
                    } else {
                        if (original.pageX) {
                            x = original.pageX;
                        } else {
                            x = 0;
                        }
                    }
                } else {
                    x = 0;
                }
            }
            var y = event.pageY;
            if (!y) {
                if (event.originalEvent) {
                    var original = event.originalEvent;
                    if (original.touches) {
                        var touch = original.touches[0];
                        if (touch) {
                            y = touch.pageY;
                        } else {
                            y = 0;
                        }
                    } else {
                        if (original.pageY) {
                            y = original.pageY;
                        } else {
                            y = 0;
                        }
                    }
                } else {
                    y = 0;
                }
            }
            return [x, y];
        }
    }
});