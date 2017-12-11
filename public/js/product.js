// right side in small desktop
$(function() {
    $('.right_side_btn').click(function() {
        $('.column_3').addClass('active');
        $('.column_3').animate({
            opacity:'1'
        }, 100);
        $('.right_side_btn').animate({
            opacity:'0.4'
        }, 400);

        if($('.column_3').hasClass('active') == true) {
            $('.right_side_btn').hide();
            $('.right_side_close').show();
        }
    });

    $('.right_side_close').click(function () {
        $('.column_3').removeClass('active');
        $('.right_side_btn').show();
        $('.column_3').animate({
            opacity:'0.6'
        }, 100);
        $('.right_side_btn').animate({
            opacity:'1'
        }, 400);
    });

    $('.right_side_btn').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

});


// mobile menu for product page
function visible (){
    $('.static_pages_menu_item').show();
}

$(document).ready(function() {
    $('.menu-box_close').click(function() {
        $('.static_pages_menu_list').css({
            width:'300px'
        });
        $('.static_pages_menu_list').animate({
            opacity:'0.9'
        }, 500);

        setTimeout(visible, 300);

        $('.menu-box_close').hide();
        $('.menu-box_activ').show();

        toggleLeftProd();
    });

    $('.menu-box_activ').click(function() {
        $('.static_pages_menu_list').css({
            width:'0'
        });
        $('.static_pages_menu_list').animate({
            opacity:'0'
        }, 500);
        $('.static_pages_menu_item').hide();

        $('.menu-box_activ').hide();
        $('.menu-box_close').show();

    });
});


//Toggle mobile menu
$('.menu-open').click(function(event) {
    toggleRigthProd();
});


function toggleLeftProd() {

    if ($('.menu').css("left") == "0px") {
        $('.menu').css("left", "-300px");
        $('.menu-open').show();
        $('.menu-close').hide();
    }
}

function toggleRigthProd () {

    if ( $('.static_pages_menu_list').css("width") == "300px" || $('.static_pages_menu_list').css("width") == "280px") {
        $('.static_pages_menu_list').css("width", "0px");
        $('.static_pages_menu_item').hide();
        $('.menu-box_activ').hide();
        $('.menu-box_close').show();
    }
}



