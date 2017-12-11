$(document).ready(function(){
    $('.flip__item:not(.flip__item3)').click(function () {
        $('.front').addClass('flip');
    });
    $('.flip__item1').click(function(){
        $('.back1').addClass('active');
    });
    $('.flip__item2').click(function(){
        $('.back2').addClass('active');
    });
    $('.flip__item4').click(function(){
        $('.back4').addClass('active');
    });

    $('.back__top').click(function(){
        $('.front').removeClass('flip flip1 flip2 flip4');
        $(this).parent().removeClass('active');
    });

    var intervalPlus;
    var intervalMinus;
    var i = 0;
    var j = 0;
    var number =+ $('.diseases__numbers').html();

    $(window).scroll(function () {

        var scrollTop = $(this).scrollTop();
        var positionTop = $('.numbers__wrap').offset().top - $(window).height() + $('.numbers__wrap').height();
        var positionTopFixed = $('.diseases__product').height() + $('.top__content').height() + $('.top__title').height() + $('.prod_prefooter').height() + 220 + 60;


        if(window.matchMedia('(min-width: 992px)').matches) {
            if (scrollTop > positionTopFixed && scrollTop < positionTop + 250) {
                $('.information_fixed').css('position', 'fixed');
            } else {
                $('.information_fixed').css('position', 'static');
            }
        }
        if(window.matchMedia('(max-width: 991px)').matches) {
            if (scrollTop > positionTopFixed && scrollTop < positionTop - 220) {
                $('.information_fixed').css('position', 'fixed');
            } else {
                $('.information_fixed').css('position', 'static');
            }
        }

        //INTERVAL NUMBERS
        if(scrollTop > positionTop) {
            i++;
            if(i == 1){
                clearInterval(intervalMinus);
                intervalPlus = setInterval(counterPlus, 50);
                j = 0;
            }
        } else {
            j++;
            if(j == 1){
                clearInterval(intervalPlus);
                intervalMinus = setInterval(counterMinus, 50);
                i = 0;
            }
        }
    });

    //MODAL
    $('.diseases__modal-item1').on('click', function () {
        $('.modal_components').modal('show');
    });
    $('.diseases__modal-item2').on('click', function () {
        $('.modal_no_steroids').modal('show');
    });
    $('.diseases__modal-item3').on('click', function () {
        $('.modal_tested').modal('show');
    });
    $('.diseases__modal-item4').on('click', function () {
        $('.modal_results').modal('show');
    });

    $('.long_desc_img-center').parent().parent('p').css('text-align', 'center');
    $('.long_desc_img-center').parent('p').css('text-align', 'center');

    //ACCORDION FOR MOBILE
    if(window.matchMedia('(max-width: 767px)').matches) {
        // accordion($('.diseases__tab-mob'));
        $('.diseases__tab-mob').addClass('active')
        accordion($('.bottom__tab-mob'));
    }

    function counterPlus(){
        $('.diseases__numbers').html(number);
        if (number < 7000){
            number++;
        } else {
            $('.diseases__numbers').append('<span>+</span>');
        }
    }
    function counterMinus(){
        $('.diseases__numbers').html(number);
        if (number > 6933){
            number--;
        }
    }
    function accordion(item){
        item.click(function () {
            if ( !$(this).hasClass('active') ){
                item.removeClass('active').next('div').slideUp(100);
                $(this).addClass('active');
                $(this).next('div').slideDown(300);
            } else{
                $(this).removeClass('active').next('div').slideUp(100);
            }
        });
    }

});
