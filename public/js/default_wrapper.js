// show/hide products in menu
$('.menu_hover').mouseenter(function () {
    var id = $(this).attr('data-id');
    $('#'+id).show();
}).mouseleave(function () {
    var id = $(this).attr('data-id');
    $('#'+id).hide();
});

// {{--hover effect on modal icons--}}
$('.modal_icon_wrap').mouseenter(function () {
    $(this).find('.hide_on_hover').hide();
    $(this).find('.show_on_hover').show();
}).mouseleave(function () {
    $(this).find('.show_on_hover').hide();
    $(this).find('.hide_on_hover').show();
});

// {{--show modals--}}
$('.components').on('click', function () {
    $('.modal_components').modal('show');
});
$('.minerals').on('click', function () {
    $('.modal_minerals').modal('show');
});
$('.steroids').on('click', function () {
    $('.modal_no_steroids').modal('show');
});
$('.tested').on('click', function () {
    $('.modal_tested').modal('show');
});
$('.results').on('click', function () {
    $('.modal_results').modal('show');
});
$('.proofing').on('click', function () {
    $('.modal_proofing').modal('show');
});
$('.pop-modal-click').on('click', function () {
    $('.modal_coupon').modal('show');
});
$('.first_time_mob').on('click', function () {
    $('.modal_coupon').modal('show');
});

// {{--back-top--}}
$("#back-top").hide();
$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('#back-top').fadeIn();
        } else {
            $('#back-top').fadeOut();
        }
    });
    $('#back-top a').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});

// {{--left side in small desktop--}}
$(window).on("resize load", function () {
    if($(window).width() > 974){
        $('.left_side_close').hide();
        if($('.left_side_btn').css('display')=='block'){
            $('.left_side_btn').css({'display':'none'})
        }
        if($('.left_side').css('left')=='-270px'){
            $('.left_side').css({'left':'0px'})
        }
        $('.left_side').css({'z-index':'1'})
    }else{
        $('.left_side_close_visible').show();
        if($('.left_side_close').css('display')=='none'){
            $('.left_side').css({'left':'-270px'});
            $('.left_side_btn').css({'display':'block'})
        }
    }
});

$('.left_side_btn').click(function () {
    $('.left_side').show();
    $('.left_side').animate({
        left: '0px'
    }, 200).css({'background':'#ffffff', 'z-index':'15'});
    $(this).hide();
    $('.left_side_close').show().addClass('left_side_close_visible');
});
$('.left_side_close').click(function () {
    $('.left_side').animate({
        left: '-270px'
    }, 200);
    $(this).hide().removeClass('left_side_close_visible');
    $('.left_side_btn').show();
});

//DESKTOP MAIN MENU
var amount, amount_prod, i;

amount = $('.menu').children('.hidden_prods').length;

    for (i = 1; i <= amount; i++) {

        amount_prod = $(".hidden_prods#id_" + i + " > .relative > a").length;

        if (amount_prod == 3) {
          $(".hidden_prods#id_" + i).addClass('two_prods');
        } else if (amount_prod == 4) {
            $(".hidden_prods#id_" + i).addClass('three_prods');
        }
    }

jQuery(document).ready(function($) {

    //slide menu
    $('.menu-open').click(function(event) {

        $('.menu').animate({
            'left':'0'
        }, 300);
        $('.menu .menu_btn').animate({
            'opacity':'0.9',
            'visibility': 'visible'
        }, 500);

        $('.menu-open').hide();
        $('.menu-close').show();
    });

    $('.menu-close').click(function(event) {

        $('.menu').animate({
            'left':'-300px',
        }, 300);
        $('.menu .menu_btn').animate({
            'opacity':'0.1',
            'visibility': 'hidden'
        }, 600);

        $('.menu .menu_btn').removeClass('active');

        $('.menu-open').show();
        $('.menu-close').hide();
    });
});

//Button About us to left
$(window).on("load resize", function () {

    if ($('.right_menu').css('display') == 'none') {

        $('.about-us-mobile').css({
            'right': '0',
            'margin-right': '0'
        });
    } else {
        $('.about-us-mobile').css({
            'right': '50%',
            'margin-right': '-115px'
        });

        if($(window).width() < 424){
            $('.about-us-mobile').css({
                'right': '62px',
                'margin-right': '0'
            });
        }
    }
});

$('.pop-close-click').css('z-index', '22');
$('.pop-close-click').click(function () {
    $('.first_time').hide();
    $('.modal_coupon').css({
        'display':'none!important'
    });
});

$(function() {
    //for mob get discount
    function getValue () {
        var error = $('.error_email').css('display');
        if (error == 'block') {
            $('.modal_coupon_text_l2').hide();
        } else {
            $('.modal_coupon_text_l2').show();
        }
    }
    $('.get_discount_first_time input[type = "submit"]').click(function () {
        setTimeout(getValue, 300);
    });

    //language menu
    langMenu('.l1_2');
    langMenu('.lang_mask');
    function langMenu (selector) {
        $(selector).click(function () {
            $('.l1_2 .lang_menu').slideToggle(300);
            $('.l1_2 .l1_2_text .caret').toggleClass('active');
            $('.lang_mask').toggleClass('active');
        });
    }

    //Cookies
    //How much time is left before the end of the day
    var date = new Date();
    var minLeft = 1440 - (date.getHours() * 60 + date.getMinutes());
    date.setTime(date.getTime() + (minLeft * 60 * 1000));
    //Show First banner
    // if ($.cookie('banner') == 'true') {
    //     $('#boxUserFirstInfo').hide();
    // } else {
    //     $('#boxUserFirstInfo').show()
    // }
    // $('.cookies_link').click(function () {
    //     $('#boxUserFirstInfo').hide();
    //     $.cookie('banner', 'true', {
    //         expires : date
    //     });
    // });
    // $('#boxUserFirstInfo').css('z-index', '999');

    //modal tel
    $('.header-phone-mobile').click(function(){
       $('.modal-tel').modal('show');
    });
    $('.modal-tel__close').click(function(){
        $('.modal-tel').modal('hide');
    })

});




