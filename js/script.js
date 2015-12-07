var re = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

jQuery(document).ready(function ($) {
    var currentPage = parseInt($('.current').text());
    if ($('#w_img_f').length == 0) {
        $('#w_speaker').addClass('w_not_img');
    }
    var webinarUrl = location.href,
        webinarName = $('#name_i_w_p').html();
    $('#w_soc_share').attr("data-url", webinarUrl).attr("data-title", webinarName);

    $('#scroll_to_form').click(function () {
        var formPosition = $('#box_c_i_i_w').offset().top;
        $('html, body').stop().animate({
            scrollTop: formPosition
        }, '500', 'swing');
    });

    $('#arrow_d').click(function () {
        var listPosition = $('main').offset().top;
        $('html, body').stop().animate({
            scrollTop: listPosition
        }, '500', 'swing');
    });

    $('#w_send_button').click(function (e) {
        if (!re.test($('#webinar_email').val())) {
            $('.w_error').addClass('active');
            setTimeout(function () {
                $('.w_error').removeClass('active');
            }, 3500);
        }else{
            var name = $('#webinar_n_sn').val();
            var mail = $('#webinar_email').val();
            var webinar = $(this).attr('webinar');
            $.ajax({
                url: myajax, //url, к которому обращаемся
                type: "POST",
                data: "action=record_webinar&email=" + mail + "&name=" + name + "&webinar=" + webinar,
                success: function(data){
                    $('#box_c_i_i_w').html('<span class="textDelivery">Спасибо, ваша заявка принята!</span>');
                }
            });
        }
        e.preventDefault();
    });

    $(document).scroll(function () {
        if ($(document).scrollTop() >= 300) {
            $('#up_button').addClass('active');
        } else {
            $('#up_button').removeClass('active add_bottom');
        }

        if ($(document).scrollTop() >= $(document).height()-$(window).height()-60) {
            $('#up_button').addClass('add_bottom');
        } else {
            $('#up_button').removeClass('add_bottom');
        }

        if ($(document).width() < 1000) {
            return;
        } else {
            if ($(document).scrollTop() >= $('.aside_wrapper').height()) {
                $('.aside_wrapper').addClass('fix_bottom');
            } else {
                $('.aside_wrapper').removeClass('fix_bottom');
            }
        }
    });

    $('#up_button').click(function () {
        $('html, body').stop().animate({
            scrollTop: 0
        }, '500', 'swing');
    });
    $('#map').click(function () {
        $('#popUpCity').removeClass('disable');
    });

    $('#closeCityChoose').click(function () {
        $('#popUpCity').addClass('disable');
    });

    $('#popUpCity span').click(function () {
        $('#map').html($(this).html());
        $(this).addClass('active').siblings().removeClass('active');
        $('#popUpCity').addClass('disable');
    });

    $('#mail_delivery').on('click',function(){
        $.ajax({
            url: myajax, //url, к которому обращаемся
            type: "POST",
            data: "action=delivery&email=" + $('#subscribe').val(),
            success: function(data){
                $('.subscribe_inner').html('<span class="textDelivery">Спасибо, ваша заявка принята!</span>');
            }
        });
    });

    $('.load_more').on('click',function(){
       // var currentPage = parseInt($('.current').text());
        if(isNaN(currentPage)){
            currentPage = 1;
        }
        //alert(page);
        $.ajax({
            url: myajax, //url, к которому обращаемся
            type: "POST",
            data: "action=morePosts&page=" + currentPage,
            success: function(data){
                $('.pages_control').before(data);
                currentPage++;
            }
        });
    });



    $('.page_item').on('click', function(){
        var a = $(this).children();
        var link = a.attr('href');
        document.location.href = link;
    });
});