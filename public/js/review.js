$(function(){
    var wrapper_a = $( ".file_upload_after" ),
        inp_a = wrapper_a.find( "input" ),
        btn_a = wrapper_a.find( ".button" ),
        lbl_a = wrapper_a.find( "mark" );

    // Crutches for the :focus style:
    inp_a.focus(function(){
        wrapper_a.addClass( "focus" );
    }).blur(function(){
        wrapper_a.removeClass( "focus" );
    });

    var file_api_a = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp_a.change(function(){
        var file_name_a;
        if( file_api_a && inp_a[ 0 ].files[ 0 ] )
            file_name_a = inp_a[ 0 ].files[ 0 ].name;
        else
            file_name_a = inp_a.val().replace( "C:\\fakepath\\", '' );

        if( ! file_name_a.length )
            return;

        $('.file_name_after').text(file_name_a);
        lbl_a.hide();
        btn_a.hide();
        $('.del_file_a').show();
        $('.del_file_sec_a').show();
    }).change();

});
$( window ).resize(function(){
    $( ".file_upload_after input" ).triggerHandler( "change" );
});

$(function(){
    var wrapper_b = $( ".file_upload_before" ),
        inp_b = wrapper_b.find( "input" ),
        btn_b = wrapper_b.find( ".button" ),
        lbl_b = wrapper_b.find( "mark" );

    // Crutches for the :focus style:
    inp_b.focus(function(){
        wrapper_b.addClass( "focus" );
    }).blur(function(){
        wrapper_b.removeClass( "focus" );
    });

    var file_api_b = ( window.File && window.FileReader && window.FileList && window.Blob ) ? true : false;

    inp_b.change(function(){
        var file_name_b;
        if( file_api_b && inp_b[ 0 ].files[ 0 ] )
            file_name_b = inp_b[ 0 ].files[ 0 ].name;
        else
            file_name_b = inp_b.val().replace( "C:\\fakepath\\", '' );

        if( ! file_name_b.length )
            return;

        $('.file_name_before').text(file_name_b);
        lbl_b.hide();
        btn_b.hide();
        $('.del_file_b').show();
        $('.del_file_sec_b').show();
    }).change();

});
$( window ).resize(function(){
    $( ".file_upload_before input" ).triggerHandler( "change" );
});

$('.del_file_sec_b').hover(function () {
    $('.del_file_b').hide();
    $('.del_file_b_hover').show();
},function () {
    $('.del_file_b_hover').hide();
    $('.del_file_b').show();
});

$('.del_file_sec_a').hover(function () {
    $('.del_file_a').hide();
    $('.del_file_a_hover').show();
},function () {
    $('.del_file_a_hover').hide();
    $('.del_file_a').show();
});



$('.del_file_sec_b').click(function () {
    var wrapper_b = $( ".file_upload_before" ),
        btn_b = wrapper_b.find( ".button" ),
        lbl_b = wrapper_b.find( "mark" );
    $('.select_file_b')[0].value = '';
    $('.file_name_before').text('');
    lbl_b.show();
    btn_b.show();
    $('.del_file_b').hide();
    $('.del_file_sec_b').hide();
});
$('.del_file_sec_a').click(function () {
    var wrapper_a = $( ".file_upload_after" ),
        btn_a = wrapper_a.find( ".button" ),
        lbl_a = wrapper_a.find( "mark" );
    $('.select_file_a')[0].value = '';
    $('.file_name_after').text('');
    lbl_a.show();
    btn_a.show();
    $('.del_file_a').hide();
    $('.del_file_sec_a').hide();
});
