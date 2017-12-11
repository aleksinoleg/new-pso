(function () {

    var app = {
        initialize: function () {
            this.setUpListeners();
        },


        setUpListeners: function () {
            $('.valid').on('submit', app.submitForm);
            $('.valid').on('keydown','input', app.removeError);
        },

        submitForm: function (e) {

            var form = $(this);

            if (app.validateForm(form) === false) {
                e.preventDefault();
                return false;
            }
        },

        validateForm: function (form) {
            var inputs = form.find('.req'),
                nums = form.find('.num'),
                valid = true;


            $.each(inputs, function (index, val) {
                var input = $(val),
                    val = input.val(),
                    formGroup = input.parents('.form-group');

                if (val.length != 0) {
                    formGroup.addClass('has-success').removeClass('has-error');
                } else {
                    formGroup.addClass('has-error').removeClass('has-success');
                    valid = false;
                }

            });

            $.each(nums, function(index, val){
                var input = $(val),
                    val = input.val(),
                    formGroup = input.parents('.form-group'),
                    phoneno = /[^\d\.]/;

                if(val.match(phoneno) || val.length == 0){
                    formGroup.addClass('has-error').removeClass('has-success');
                    valid = false;
                }else {
                    formGroup.addClass('has-success').removeClass('has-error');
                }

            });
            return valid;
        },
        removeError: function(){
            $(this).parents('.form-group').removeClass('has-error');
        }

    };

    app.initialize();
}());
