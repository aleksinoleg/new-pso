/*      AJAX REQUEST FOR STATES     */
//registry form
$('#country_r').change(function () {
    var id = $('#country_r option:selected').attr('data-id');
    $('.states_select').load('/admin/getStates_shipping/' + id);
}).trigger("change");
    //for mobile
    $('#country_r_mob').change(function () {
        var id = $('#country_r_mob option:selected').attr('data-id');
        $('.states_select_mob').load('/admin/getStates_shipping/' + id);
    }).trigger("change");

//order form
$('#ship_country').change(function () {
    var id = $('#ship_country option:selected').attr('data-id');
    $('.ship_states_select').load('/admin/getStates_shipping/' + id);
    $('.bill_states_select').load('/admin/getStates/' + id);
}).trigger("change");
$('#bill_country').change(function () {
    var id = $('#bill_country option:selected').attr('data-id');
    $('.bill_states_select').load('/admin/getStates/' + id);
}).trigger("change");
// $('#submit_shipping_form').click(function () {
//     $('#shipping_form').submit();
// });

//SECOND STEP
$('#reg_form input[type="submit"]').click(function (e) {
    var i = 0;//counter
    var j = 0;//counter
    var n = 0;//counter
    $('.reg_form_desk .wrap_in').each(function () {
        var value = $(this).children('input').is(':valid');
        if (value == false){
            i++;
            $(this).addClass('error');
        } else {
            $(this).removeClass('error');
        }
    });
    //for mobile
    // $('.reg_form_mob .wrap_in').each(function () {
    //     var value = $(this).children('input').is(':valid');
    //     if (value == false){
    //         j++;
    //     }
    // });
    if(i == 0){
        e.preventDefault();
        
        var name, last_name, email_r, password_r, lang_reg, country_reg;
        name = $('.name_reg').val();
        last_name = $('.last_name_reg').val();
        email_r = $('.email_reg').val();
        lang_reg = $('.lang_reg').val();
        country_reg = $('.country_reg').val();
        $('#ship_country').val(country_reg);
        $('#bill_country').val(country_reg);
        // console.log(country_reg);
        password_r = '';

        $.ajax({
            method: "POST",
            url: "/admin/customer_register_shipping",
            data: { name: name, last_name: last_name, email_r: email_r, password_r: password_r, lang_reg: lang_reg }
        });
        

        $('#ship_last_name').val(last_name);
        $('#bill_last_name').val(last_name);


        $('.shipping__first-stage').removeClass('active');
        $('.shipping__first-stage').addClass('old-active');
        $('.shipping__second-stage').addClass('active');
        $('.shipping__registry').hide();
        $('.shipping__order').show();

        //same data for shipping order form
        var userName = $(this).parent('#reg_form').children('.f_name').children('#name').val();
        var userEmail = $(this).parent('#reg_form').children('.email').children('#email_r').val();
        var userPhone = $(this).parent('#reg_form').children('.phone').children('#phone_r').val();
        var userCountry = $(this).parent('#reg_form').children('.country_select_r').children('.country').children('.country_select').children('option:selected').val();
        var userState = $(this).parent('#reg_form').children('.states').children('.shipping_form_label').children('#ship_state').children('option:selected').val();

        function sameData(name, phone){
            name.val(userName);
            phone.val(userPhone);
        }
        function sameCountry(country, state){
           country.each(function () {
                if ($(this).val() == userCountry){
                    $(this).attr('selected', 'selected');
                }
                if($(this).val() == 'US'){
                    state.each(function (){
                        if ($(this).val() == userState){
                            $(this).attr('selected', 'selected');
                        }
                    });
                }
            });
        }
        function changeData(that){
            var billName = that.attr('name') + '_billing';
            var billId = $('input[name ="' + billName + '"]').attr('id');
            var billSelector = $('input#' + billId);
            billSelector.val(that.val());
        }

        $('.shipping__order #ship_email').val(userEmail);//email
        sameData($('#ship_full_name'), $('#ship_phone'));
        sameCountry($('#ship_country option'), $('.ship_states_select select option'));

        //if billing order form
        if( $('.form_bill_to').css('display') == 'none') {
            var columnHeight = $('.form_ship_to').height();
            $('.form_order').css('height', columnHeight).addClass('bottom_btn');

            sameData($('#bill_full_name'), $('#bill_phone'));
            sameCountry($('#bill_country option'), $('.bill_states_select select option'));
        }

        // same data for bill order form when change ship order form
        $('.form_ship_to .form-group input').change(function () {
            changeData($(this));
        });
        // for country
        $('.form_ship_to .country_select select').change(function () {

            $('.form_bill_to .country_select select option').each(function () {
                if ($(this).val() == $('.form_ship_to .country_select select option:selected').val()) {
                    $(this).attr('selected', 'selected');
                }
                $('.bill_states_select').load('/admin/getStates/' + id);
            });
        });
        //for state
        $('.ship_states_select select').change(function () {
            $('.bill_states_select select option').each(function () {
                if ($(this).val() == $('.ship_states_select select option:selected').val()) {
                    $(this).attr('selected', 'selected');
                }
            });
        });
    }
});

//if different data for billing order form
$('#checkbox_same_data').click(function () {
    
    if ($(this).is(':checked') == true){
        $('.form_bill_to').show();
        $('.form_order').css('height', 'auto').removeClass('bottom_btn');
        $('.shipping__bill-title_mob').show();

        $('#bill_full_name').val('');
        $('#bill_last_name').val('');
        $('#bill_address').val('');
        $('#bill_zip').val('');
        $('#bill_city').val('');
        $('#bill_country').val('');
        $('#state').val('');
        $('#bill_phone').val('');
        
    } else {
        $('.form_bill_to').hide();
        var columnHeight = $('.form_ship_to').height();
        $('.form_order').css('height', columnHeight).addClass('bottom_btn');
        $('.shipping__bill-title_mob').hide();

        $('#bill_full_name').val($('#ship_full_name').val());
        $('#bill_last_name').val($('#ship_last_name').val());
        $('#bill_address').val($('#ship_address').val());
        $('#bill_zip').val($('#ship_zip').val());
        $('#bill_city').val($('#ship_city').val());
        $('#bill_country').val($('#ship_country').val());
        $('#state').val($('#ship_state').val());
        $('#bill_phone').val($('#ship_phone').val());
        
    }
});

//THIRD STEP
$('.form_order .submit_order').click(function (e) {
    var k = 0;//counter
    $('.form_ship_to .form-group:not(.country_select):not(.checkbox_mob)').each(function () {
        var orderValueShip = $(this).children('.shipping_form_label').children('input').is(':valid');
        if (orderValueShip == false){
            k++;
            $(this).addClass('error');
        } else{
            $(this).removeClass('error');
        }
    });

    $('.form_bill_to .form-group:not(.country_select):not(.states_select)').each(function () {
        var orderValueBill = $(this).children('.shipping_form_label').children('input').is(':valid');
        if (orderValueBill == false){
            k++;
            $(this).addClass('error');
        } else{
            $(this).removeClass('error');
        }
    });

    if(k == 0){
        e.preventDefault();

        $('.take_val').each(function () {
            var str = '<input type="hidden" name="'+$(this).attr("name")+'" value="'+$(this).val()+'">';
            $('.hidden_inputs').append(str);
        });

        $('.shipping__second-stage').addClass('old-active');
        $('.shipping__second-stage').removeClass('active');
        $('.shipping__third-stage').addClass('active');
        $('.shipping__order').hide();
        $('.shipping__payment').show();
    }
});

//checkbox therm of use
$('#submit_shipping_form').click(function (e) {
    var check = $('#terms_check').is(':checked');
    if(check == false) {
        $('.form-group_terms-of-use').addClass('has-error');
    }else{
        $('#shipping_form_last').submit();
    }
});

$('#forget_pass_form').submit(function (e) {
    $('.shipping_auth_email_error').hide();
    $('.shipping_pass_recover').hide();
    e.preventDefault();
    if($('#email_l').val().length == 0){
        $('.shipping_auth_email').css({'border':'1px solid red','margin-bottom':'11px'});
        $('.shipping_auth_email input').css({'margin-bottom':'0'});
        $('.shipping_auth_email_error').show();
    }else{
        var lang = $('.lang_auth').val();
        $.ajax({
            method: "POST",
            url: "/admin/forget_pass_shipping",
            data: { email: $('#email_l').val(), lang: lang }
        }).done(function (a) {
            if(a=='success'){
                $('.shipping_pass_recover').show();
            }else{
                $('.shipping_auth_email').css({'border':'1px solid red','margin-bottom':'11px'});
                $('.shipping_auth_email input').css({'margin-bottom':'0'});
                $('.shipping_auth_email_error').show();
            }
        })
    }
});

$('.shipping_auth').submit(function (e) {
    e.preventDefault();
    $.ajax({
        method: "POST",
        url: "/admin/customer_auth_shipping",
        data: { email: $('#email_l').val(), password: $('#password_l').val() }
    }).done(function (a) {
        if(a!='fail'){
            $('.shipping__first-stage').removeClass('active');
            $('.shipping__first-stage').addClass('old-active');
            $('.shipping__second-stage').addClass('active');
            $('.shipping__registry').hide();
            $('.shipping__order').show();

            if( $('.form_bill_to').css('display') == 'none') {
                var columnHeight = $('.form_ship_to').height();
                $('.form_order').css('height', columnHeight).addClass('bottom_btn');
            }

            $('#ship_email').val(a['email']);
            $('#ship_full_name').val(a['ship_first_name']);
            $('#ship_last_name').val(a['ship_last_name']);
            $('#ship_address').val(a['ship_address']);
            $('#ship_zip').val(a['ship_zip']);
            $('#ship_city').val(a['ship_city']);
            $('#ship_country').val(a['ship_country']);
            $('#ship_state').val(a['ship_state']);
            $('#ship_phone').val(a['ship_phone']);

            $('#bill_full_name').val(a['bill_first_name']);
            $('#bill_last_name').val(a['bill_last_name']);
            $('#bill_address').val(a['bill_address']);
            $('#bill_zip').val(a['bill_zip']);
            $('#bill_city').val(a['bill_city']);
            $('#bill_country').val(a['bill_country']);
            $('#state').val(a['bill_state']);
            $('#bill_phone').val(a['bill_phone']);
        }else{
            $('.shipping_auth_email').css({'border':'1px solid red','margin-bottom':'11px'});
            $('.shipping_auth_email input').css({'margin-bottom':'0'});
            $('.shipping_auth_email_pass_error').show();
        }
    })
});
