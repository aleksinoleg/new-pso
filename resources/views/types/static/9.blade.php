<?
        $cart = session()->get('cart');
if (!isset($cart) || count($cart) == 0) {
    header("Location: /" . $L->lang . '/');
    die();
}

$arr = session('cart');
$cartCount = 0;
foreach ($arr as $key=>$item){
    $cartCount += $item['quantity'];
}

?>
@extends('layouts.default_wrapper')

@section('header')
    <link href="/css/styl/cart.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/media_basket.min.css">
@endsection

@section('content')


{{--    {{session()->forget('discount_api')}}--}}

{{--{{dd(session('cart'))}}--}}

    @if(session()->has('free_soap_error'))
        <div class="modal fade modal_free_soap_error">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body relative">

                        <div class="relative">
                            <button type="button" style="
                            position: absolute;
                            top: 0;
                            right: 13px;
                            height: 38px;
                            width: 38px;
                            background: #4884a9;
                            padding: 0;
                            cursor: pointer;
                            color: #fff;
                            border: none;
                            font-size: 30px;
                            "
                                    data-dismiss="modal"
                                    aria-hidden="true">
                                &times;<br>
                            </button>
                        </div>

                        <div class="" style="
                        font-size: 24px;
                        font-weight: bold;
                        text-align: center;
                        padding: 20px;
                        ">
                            {!! $L->__('modal_free_soap_error_text_buy_something') !!}
                        </div>
                        <div class="flex">
                            <div class="margin_auto">
                                <a class="btn btn-primary" href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                    {{$L->__('go_to_the_store')}}
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    @endif



@if(session()->has('low_price')&& session('low_price')==1)
        <div class="modal fade modal_low_price">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body relative">

                        <div class="relative">
                            <button type="button" style="
                            position: absolute;
                            top: 0;
                            right: 13px;
                            height: 38px;
                            width: 38px;
                            background: #4884a9;
                            padding: 0;
                            cursor: pointer;
                            color: #fff;
                            border: none;
                            font-size: 30px;
                            "
                                    data-dismiss="modal"
                                    aria-hidden="true">
                                &times;<br>
                            </button>
                        </div>

                        <div class="" style="
                        font-size: 24px;
                        font-weight: bold;
                        text-align: center;
                        padding: 33px;
                        ">
                            {!! $L->__('low_price_text_error_1') !!}
                        </div>
                        <div class="flex">
                            <div class="margin_auto">
                                <a class="btn btn-primary" href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                    {{$L->__('go_to_the_store')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?
        session(['low_price'=>0]);
        ?>
@endif
<div class="modal fade modal_low_price_2">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body relative">

                <div class="relative">
                    <button type="button" style="
                            position: absolute;
                            top: 0;
                            right: 13px;
                            height: 38px;
                            width: 38px;
                            background: #4884a9;
                            padding: 0;
                            cursor: pointer;
                            color: #fff;
                            border: none;
                            font-size: 30px;
                            "
                            data-dismiss="modal"
                            aria-hidden="true">
                        &times;<br>
                    </button>
                </div>

                <div class="" style="
                        font-size: 24px;
                        font-weight: bold;
                        text-align: center;
                        padding: 33px;
                        ">
                    {!! $L->__('low_price_text_error_2') !!}
                </div>
                <div class="flex">
                    <div class="margin_auto">
                        <a class="btn btn-primary" href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                            {{$L->__('go_to_the_store')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container full_height">
        <div class="row">
            <div class="breadcrumbs">
                <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">{{$L->__('Home')}}</a>
                > {{$page->link_name}}
            </div>
            <div class="pull-left your_basket relative">
                {!!$img->__('title-menu.png')!!}
                @if ($L->lang == 'ru')
                    <div class="absolute your_basket_text" style="font-size: 24px;">{{$L->__('YOUR BASKET')}}</div>
                @else
                    <div class="absolute your_basket_text">{{$L->__('YOUR BASKET')}}</div>
                @endif
            </div>
            <div class="social_section pull-right">
                <div class="float_left soc_item"><a
                            href="{{$L->__('link_soc_1')}}"
                            target="_blank">{!!$img->__('google.jpg', 'hover_dark')!!}</a></div>
                <div class="float_left soc_item"><a
                            href="{{$L->__('link_soc_2')}}"
                            target="_blank">{!!$img->__('facebook.jpg', 'hover_dark')!!}</a></div>
                <div class="float_left soc_item"><a
                            href="{{$L->__('link_soc_3')}}"
                            target="_blank">{!!$img->__('youtube.jpg', 'hover_dark')!!}</a></div>
                <div class="float_left soc_item"><a
                            href="{{$L->__('link_soc_4')}}"
                            target="_blank">{!!$img->__('twitter_small.jpg', 'hover_dark')!!}</a></div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
            <div class="float_left basket_left_section">
                <div class="cart_table_head">
                    <div class="float_left cart_prod_name">{{$L->__('PRODUCT NAME')}}</div>
                    <div class="float_left cart_unit_price">{{$L->__('UNIT PRICE')}}</div>
                    <div class="float_left cart_quantity_basket">{{$L->__('QUANTITY')}}</div>
                    <div class="float_left cart_subtotal">{{$L->__('SUBTOTAL')}}</div>
                    <div class="float_left cart_dell"></div>
                    <div class="clearfix"></div>
                </div>
                <form action="/proceed_order" method="post" id="proceed_order">
                    {{csrf_field()}}
                    <input type="hidden" name="link" value="{{$L->__('link_buy_products')}}">
                    <input type="hidden" name="lang" value="{{$L->lang}}">
                    @foreach($cart as $key=>$item)

                        <div class="cart_table_row">
                            <div class="float_left cart_prod_name">
                                <div class="cart_prod_name_img float_left">
                                    {!!$img->__($item['prod_id'].'_basket.jpg')!!}
                                </div>
                                <div class="cart_prod_name_text float_left">
                                    <div class="flex">
                                        <div class="margin_auto">
                                            {{$item['product']->link_name}}
                                        </div>
                                    </div>

                                </div>
                                <div class="cart_prod_name_description float_left">

                                </div>
                            </div>
                            <div class="float_left cart_unit_price">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="float_left cart_unit_price cart_unit_price_mob">{{$L->__('UNIT PRICE')}}</div>
                                        {{$item['currency']}}. <span class="unit_price">
                                        @if(session()->has('free_soap')&&$item['prod_id']==1002&&$item['price']==0)
                                                {{sprintf("%01.2f",0)}}
                                            @else
                                                {{sprintf("%01.2f",$item['product']->prices[0]->price)}}
                                            @endif
                                    </span>
                                    </div>
                                </div>

                            </div>
                            <div class="float_left cart_quantity_basket">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="float_left cart_quantity_basket cart_quantity_basket_mob">{{$L->__('QUANTITY')}}</div>
                                        @if(session()->has('free_soap')&&$item['prod_id']==1002||$item['prod_id']==2002) @else{!!$img->__('arrow_left_basket.png','arrow_left_basket','data-key='.$key)!!}@endif
                                        <input type="text" class="quantity_input" value="{{$item['quantity']}}"
                                               name="prod_id['{{$item['prod_id']}}']" readonly>
                                        @if(session()->has('free_soap')&&$item['prod_id']==1002||$item['prod_id']==2002) @else{!!$img->__('arrow_right_basket.png','arrow_right_basket','data-key='.$key)!!}@endif
                                    </div>
                                </div>
                            </div>
                            <div class="float_left cart_subtotal">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="float_left cart_subtotal cart_subtotal_mob">{{$L->__('SUBTOTAL')}}</div>
                                        {{$item['currency']}}.

                                        <span class="sub_total" data-id="{{substr($item['prod_id'],0,1)}}">
                                            {{sprintf("%01.2f",$item['price']*$item['quantity'])}}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="float_left cart_dell">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div>
                                            <a href="/admin/dellCart/{{$item['prod_id']}}">{!!$img->__('delete.png', 'cart_dell_img')!!}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    @endforeach
                </form>
                <div class="basket__btn basket__checkout">
                    <div class="margin_auto relative">
                        {!!$img->__('button_buy.png', 'submit_proceed_order')!!}
                        @if($L->lang == 'it' || $L->lang == 'ru')
                            <div class="submit_proceed_order_text submit_proceed_order_text_it">{{$L->__('BUY PRODUCTS')}}</div>
                        @else
                            <div class="submit_proceed_order_text">{{$L->__('BUY PRODUCTS')}}</div>
                        @endif
                    </div>
                </div>
                <div class="basket__btn basket__more-products">
                    <div class="margin_auto">
                        <div class="add_more_prods relative">
                            <div class="add_more_prods_l1"></div>
                            <div class="add_more_prods_l2"></div>
                            @if($L->lang == 'fr' || $L->lang == 'de' || $L->lang == 'ru')
                                <div class="add_more_prods_text add_more_prods_text_lang">
                                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                        {{$L->__('ADD MORE PRODUCTS')}}
                                    </a>
                                </div>
                            @elseif($L->lang == 'es')
                                <div class="add_more_prods_text add_more_prods_text_lang_es">
                                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                        {{$L->__('ADD MORE PRODUCTS')}}
                                    </a>
                                </div>
                            @elseif($L->lang == 'it')
                                <div class="add_more_prods_text add_more_prods_text_lang_it">
                                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                        {{$L->__('ADD MORE PRODUCTS')}}
                                    </a>
                                </div>
                            @else
                                <div class="add_more_prods_text">
                                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                        {{$L->__('ADD MORE PRODUCTS')}}
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="float_left basket_right_section">
                <div id="review_your_cart">
                    {{$L->__('REVIEW YOUR CART')}}
                </div>
                <div id="quantity_of_products">
                    {{$L->__('QUANTITY OF PRODUCTS')}}
                </div>
                <div class="flex">
                    <div class="margin_auto">
                        <div id="quantity_of_products_num">
                            {{$cartCount}}
                        </div>
                    </div>
                </div>
                <div class="cart_order_total">
                    {{$L->__('Order total:')}} &nbsp;
                    <span id="currency">{{$L->currency}}</span>
                    <span id="value"></span>
                </div>
                @if(session()->has('discount')||session()->has('discount_api'))
                    @if(session('discount')=='false')
                        <div id="promo_section">
                            <div id="promo_l1">{{$L->__('PROMOTION CODE')}}{!!$img->__('info.png', 'info_promo_code')!!}</div>
                            <div id="promo_l2">
                                {{$L->__('if you have a promotion code please enter here...')}}
                                <p class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>
                            </div>
                            <div class="flex">
                                <div class="margin_auto relative">
                                    <div class="code_incorrect" id="check_promo_code">
                                        <input class="promo_code" type="text" name="promo_code"
                                               placeholder="{{$L->__('CODE INCORRECT')}}">
                                        {!!$img->__('bonus_code.png', 'submit_check_promo_code')!!}
                                        {{--<p class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div id="promo_section">
                            <div class="code_accepted">
                                {{$L->__('Your code accepted')}}
                                @if(session()->has('discount_api'))
                                    <p>{{$L->__('Your discount is')}} {{session('discount_api')->value}} {{(session('discount_api')->unit=='euro')?'&euro;':session('discount_api')->unit}}</p>
                                @else
                                    <p>{{$L->__('Your discount is')}} {{session('discount')->rate}} %</p>
                                @endif

                                <p style="margin: auto" class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>
                            </div>
                        </div>
                    @endif
                @else
                    <div id="promo_section">
                        <div id="promo_l1">{{$L->__('PROMOTION CODE')}}{!!$img->__('info.png', 'info_promo_code')!!}</div>
                        <div id="promo_l2">
                            {{$L->__('if you have a promotion code please enter here...')}}
                            <p class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>
                        </div>
                        <div class="flex">
                            <div class="margin_auto relative">
                                <div id="check_promo_code">
                                    <input class="promo_code" type="text" name="promo_code"
                                           placeholder="{{$L->__('ENTER CODE')}}">
                                    {!!$img->__('bonus_code.png', 'submit_check_promo_code')!!}
                                    {{--<p class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <?$extraShippingCost = 0;?>
                @if(count($cart)==1)
                    <?$item = array_shift($cart)?>
                    @if(in_array($item['prod_id'],["2002","2003"]))
                        <div style="width: 100%; color: #fff; font-size: 16px; padding: 5px 10px; text-align: center">
                            {{$L->__('shipping_cost_is_2_euro')}}
                        </div>
                        <?$extraShippingCost += 2.95;?>
                    @endif
                @endif
            </div>
            <div class="clearfix"></div>
            <div class="prod_prefooter">
                <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6  no_padding relative">
                    <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                        <div class="free_delivery_img float_left">
                            {!!$img->__('delivery.png')!!}
                        </div>
                        <div class="free_delivery_text float_left">
                            @if ($L->lang == 'ru')
                                <div class="free_delivery_text_l1" style="font-size: 16px;">
                                    {{$L->__('FREE DELIVERY')}}
                                </div>
                            @else
                                <div class="free_delivery_text_l1">
                                    {{$L->__('FREE DELIVERY')}}
                                </div>
                            @endif
                            <div class="free_delivery_text_l2">
                                {{$L->__('order over $20 (rpr $2.95)')}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item result_section col-lg-3 col-sm-6 relative">
                    <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">
                        <div class="result_img float_left">
                            {!!$img->__('back-money.png')!!}
                        </div>
                        <div class="result_text float_left">
                            <div class="result_text_l1">
                                {{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span>
                            </div>
                            <div class="result_text_l2">
                                {{$L->__('or_your money back')}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item contact_section col-lg-3 col-sm-6 relative">
                    <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item local_store_section col-lg-3 col-sm-6 relative">
                    {{--@if ($L->lang == 'cz')--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}" style="max-width: 100%;">--}}
                            {{--<div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                            {{--<div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">--}}
                                {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                                {{--<div class="local_store_text_l2"--}}
                                     {{--style="font-size: 17px;">{{$L->__('STORE FINDER')}}</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</a>--}}
                    {{--@else--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}">--}}
                            {{--<div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                            {{--<div class="local_store_text float_left">--}}
                                {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                                {{--<div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div>--}}
                        {{--</a>--}}
                    {{--@endif--}}
                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                        <div class="l2_3_2">
                            <div class="float_left">{!! $img->__('online.png', 'l2_3_2_img') !!}{!! $img->__('online_mob.png', 'l2_3_2_img_mob') !!}</div>
                            <div class="float_left l2_3_2_text">
                                <span class="l2_3_2_text_1">{{$L->__('Online')}}</span>
                                <span class="l2_3_2_text_2">{{$L->__('STORE_1')}}</span>
                            </div>
                        </div>
                    </a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>


@endsection

@section('footer')
    <script>
        function getTotalCost() {
        <?if(session()->has('discount') && session('discount') != 'false'){?>
            var rate = <?=session('discount')->rate?>;
            var unit ='%';
        <?}elseif(session()->has('discount_api')){?>
            var rate = <?=session('discount_api')->value?>;
            var unit ='<?=session('discount_api')->unit?>';
                    <?}else{?>
            var rate = 0;
            var unit ='%';
                    <?}?>

            var a = 0;
            var b;

            if(unit!='%'){

                $('.sub_total').each(function () {
                    a += parseFloat($(this).text());
                });
                if(a>49){
                    a=a-rate;
                }else{
                    $('.modal_low_price_2').modal('show');
                }

            }else {
                $('.sub_total').each(function () {
                    if ($(this).attr('data-id') != 3) {
                        b = parseFloat($(this).text());
                        b = b - b * rate / 100;
                        a += b;
                    } else {
                        a += parseFloat($(this).text());
                    }
                });
            }

            a = a +<?=$extraShippingCost?>;
//            a = a -a*rate/100;
            a = a.toFixed(2);

            $('#value').text(a);
        }
        getTotalCost();

        $('.arrow_left_basket').click(function () {
            var v = parseInt($(this).parent().children('.quantity_input').val());
            if (v > 1) {
                var key = $(this).attr('data-key');
                removeOneTo(key);

                $(this).parent().children('.quantity_input').val(v - 1);
                var sub_total = (v - 1) * parseFloat($(this).parent().parent().parent().parent().children('.cart_unit_price').children('.flex').children('.margin_auto').children('.unit_price').text());
                sub_total = sub_total.toFixed(2);
                $(this).parent().parent().parent().parent().children('.cart_subtotal').children('.flex').children('.margin_auto').children('.sub_total').text(sub_total);
                var totalQuantity = parseInt($('#quantity_of_products_num').text());
                $('#quantity_of_products_num').text(totalQuantity - 1);
                getTotalCost();
                var a = 0;
                $('.sub_total').each(function () {
                    a += parseFloat($(this).text());
                });

            }
        });
        $('.arrow_right_basket').click(function () {
            var v = parseInt($(this).parent().children('.quantity_input').val());
            var key = $(this).attr('data-key');
            addOneTo(key);
            $(this).parent().children('.quantity_input').val(v + 1);
            var sub_total = (v + 1) * parseFloat($(this).parent().parent().parent().parent().children('.cart_unit_price').children('.flex').children('.margin_auto').children('.unit_price').text());
            sub_total = sub_total.toFixed(2);
            $(this).parent().parent().parent().parent().children('.cart_subtotal').children('.flex').children('.margin_auto').children('.sub_total').text(sub_total);
            var totalQuantity = parseInt($('#quantity_of_products_num').text());
            $('#quantity_of_products_num').text(totalQuantity + 1);
            getTotalCost();
        });

        $('.cart_dell_img').hover(function () {
            $(this).attr('src', '/img/delete_hover.png');
        }, function () {
            $(this).attr('src', '/img/delete.png');
        });

        function dell_cart(id) {
            $.ajax({
                method: "POST",
                url: "/cart_dell",
                data: {id: id}
            }).done(function () {
                location.reload();
            })
        }

        function addOneTo(key) {
            $.ajax({
                method: "POST",
                url: "/admin/addOneTo",
                data: { key: key}
            })
        }
        function removeOneTo(key) {
            $.ajax({
                method: "POST",
                url: "/admin/removeOneTo",
                data: { key: key}
            })
        }


        $('.submit_proceed_order, .submit_proceed_order_text').click(function () {
            $('#proceed_order').submit();
        });

        $('.modal_free_soap_error').modal('show');


    </script>

    <script>

            $('.modal_low_price').modal('show');

    </script>
    <script>
        $('.info_promo_code').hover(function () {
            $('#promo_l2').show();
        }, function () {
            $('#promo_l2').hide();
        });
    </script>

    <script src="/js/discount.js"></script>
@endsection
