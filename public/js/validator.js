function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
}

(function(){

    var app = {
        initialize : function(){
            this.setUpListeners();
        },

        setUpListeners: function(){
            $('.proceed_order_form').on('submit', app.submitForm);
            $('.proceed_order_form').on('keydown','input', app.removeError);
        },
        submitForm: function(e){
            var form = $(this);
            if(app.validateForm(form) === false){
                e.preventDefault();
                return false;
            }
        },

        validateForm: function(form){
            var inputs = form.find('.req'),
                nums = form.find('.num'),
                email = $('.email').val(),
                valid = true;
            $.each(inputs, function(index, val){
                var input = $(val),
                    val = input.val(),
                    formGroup = input.parents('.form-group');
                if(val.length != 0){
                    formGroup.addClass('has-success').removeClass('has-error');
                }else {
                    formGroup.addClass('has-error').removeClass('has-success');
                    valid = false;
                }
            });

            $.each(nums, function(index, val){
                var input = $(val),
                    val = input.val(),
                    formGroup = input.parents('.form-group'),
                    phoneno = /[^\d\.\(\)\+\-\s]/;
                if(val.match(phoneno) || val.length == 0){
                    formGroup.addClass('has-error').removeClass('has-success');
                    valid = false;
                }else {
                    formGroup.addClass('has-success').removeClass('has-error');   
                }

            });
            
            if(isValidEmailAddress(email) && email.length>0) {
                $('.email_form_group').addClass('has-success').removeClass('has-error');
            }else {
                $('.email_form_group').addClass('has-error').removeClass('has-success');
                valid = false;
            }

            if($('.terms').is(':checked')){
                $('.terms_text').css('color', '#4B8847');
            }else{
                $('.terms_text').css('color', '#f00');
                valid = false;
            }


            return valid;
        },
        removeError: function(){
            $(this).parents('.form-group').removeClass('has-error');
        }

    };
    app.initialize();
}());