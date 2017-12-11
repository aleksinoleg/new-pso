function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

$('.get_discount_first_time').on('submit', function (e){
    
    var email = $('.email-first-time-discount').val();
    if(isValidEmailAddress(email) && email.length>0) {
        $('.email-form-group').addClass('has-success').removeClass('has-error');
        $.ajax({
            type: "POST",
            url: "/checkUniqueEmail",
            data: "email="+email,
            success: function(answer){
                if(answer == 'false'){
                    e.preventDefault();
                    $('.error_email').show();
                    stop();
                }
            }
        });
        
    }else {
        $('.email-form-group').addClass('has-error').removeClass('has-success');
        e.preventDefault();
    }
});

$('.get_discount_first_time_2').on('submit', function (e){

    var email = $('.email-first-time-discount_2').val();
    if(isValidEmailAddress(email) && email.length>0) {
        $('.email-form-group_2').addClass('has-success').removeClass('has-error');
        $.ajax({
            type: "POST",
            url: "/checkUniqueEmail",
            data: "email="+email,
            success: function(answer){
                if(answer == 'false'){
                    e.preventDefault();
                    $('.error_email_2').show();
                    stop();
                }
            }
        });

    }else {
        $('.email-form-group_2').addClass('has-error').removeClass('has-success');
        e.preventDefault();
    }
});