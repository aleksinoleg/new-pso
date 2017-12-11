@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/registry.min.css">
    <link rel="stylesheet" href="/css/onlinestore.min.css">
    <style>
        .order_prod_img{
            width: 100px;
            height:100px;
        }
    </style>
@endsection

@section('content')
    @if(session()->has('customer'))
        @include('types.static.6-2')
    @else
        @include('types.static.6-1')
    @endif

@endsection

@section('footer')
    <script>
        /*      AJAX REQUEST FOR STATES     */
        $('#ship_country').change(function () {
            var id = $('#ship_country option:selected').attr('data-id');
            $('.ship_states_select').load('/admin/getStates_c/' + id);
        }).trigger("change");
        $('#submit_shipping_form').click(function () {
            $('#shipping_form').submit();
        });

        $('#ship_country_2').change(function () {
            var id = $('#ship_country_2 option:selected').attr('data-id');
            $('.ship_states_select_2').load('/admin/getStates_shipping_c/' + id);
        }).trigger("change");
    </script>
    <script>
        $('#email_l').on('change', function(){
            $('.hidden_email').val($('#email_l').val());
        }).trigger('change');
    </script>

    <script>
        $('.question_btn').click(function () {
            $(this).parent().children('.tip_question').show(500);
        });
        $('.close_btn').click(function () {
            $(this).parent('.tip_question').hide(500);
        });
    </script>
@endsection
