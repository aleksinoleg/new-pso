
//right mobile menu for home page
// $(window).scroll(function() {
//     var scroll = $(window).scrollTop();
//
//     if(scroll > 2170) {
//         $('.right_side_close').fadeOut();
//     } else {
//         $('.right_side_close').fadeIn();
//     }
// });

$(document).ready(function() {

    //leaf button
    $('.menu-leaf_close').click(function() {
        $('.menu-leaf_close').hide();
        $('.menu-leaf_activ').show();
    });

    $('.menu-leaf_activ').click(function() {
        $('.menu-leaf_activ').hide();
        $('.menu-leaf_close').show();
    });
});

$(document).ready(function() {

    $('.menu-leaf_close').click(function () {
        $('.left_side').show();
        $('.left_side').animate({
            opacity: '1'
        }, 500);
        // $('.right_side_close').show();

        toggleMenuRight();
        mask();
    });

    $('.menu-leaf_activ').click(function () {
        $('.left_side').hide();
        $('.left_side').animate({
            opacity: '0'
        }, 500);
        $('.right_side_close').hide();

        mask();
    });

    $('.right_side_close').click(function () {
        $('.left_side').hide();
        $('.left_side').animate({
            opacity: '0'
        }, 500);

        $('.menu-leaf_activ').hide();
        $('.menu-leaf_close').show();
    });
});

$('.menu-open').click(function(event) {
    toggleMenuLeft();
    mask();
});

$(window).scroll(function() {
    var scroll = $(window).scrollTop();

    if(scroll > 250) {
        $('.left_side_mask').css({
            "position": "fixed",
            // "top": "0"
        });
    } else {
        $('.left_side_mask').css({
            "position": "absolute",
            // "top": "258px"
        });
    }
});

$('.left_side_mask').click(function () {
   $('.left_side').hide();
    $('.left_side_mask').hide();
    $('.menu-leaf_activ').hide();
    $('.menu-leaf_close').show();
});

//Functions
//TOGGLE MENU
function toggleMenuLeft() {

    if ( $('.menu').css("left") == "-300px" ) {
        $('.left_side').css("display", "none");
        $('.menu-leaf_activ').hide();
        $('.menu-leaf_close').show();
    }
}
function toggleMenuRight() {

    if( $('.left_side').css("display") == "block" ) {
        $('.menu').css("left", "-300px");
        $('.menu-open').show();
        $('.menu-close').hide();
    }
}
//Mask for right mobile menu
function mask() {
    if ( $('.left_side').css("display") == "block" ) {
        $('.left_side_mask').show();
    } else {
        $('.left_side_mask').hide();
    }
}

