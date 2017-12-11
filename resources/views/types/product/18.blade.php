<?$page->long_desc = explode('***',$page->long_desc);?>
@extends('layouts.default_wrapper')

@section('header')
    <link href="/css/styl/product.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/media_product.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="social_block social_block_hidden">
                <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
            </div>
            <div class="static_pages_menu relative">
                <div class="static_pages_menu_l1"></div>
                <div class="static_pages_menu_l2"></div>
                <div class="static_pages_menu_list absolute">
                    <div class="static_pages_menu_item float_left relative">
                        <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">{{$L->__('PsoEasy')}}</a>
                        <div class="static_pages_menu_hover absolute"></div>
                    </div>
                    <div class="static_pages_menu_item float_left relative">
                        <a href="{{url($L->lang.'/'.$L->__($page->prod_id.'_hiw_link'))}}">{{$L->__('How it Works')}}</a>
                        <div class="static_pages_menu_hover absolute"></div>
                    </div>
                    <div class="static_pages_menu_item float_left relative">
                        <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('Contact Us')}}</a>
                        <div class="static_pages_menu_hover absolute"></div>
                    </div>
                    <div class="static_pages_menu_item float_left relative">
                        <a href="{{url($L->lang.'/'.$L->__($page->prod_id.'_ss_link'))}}">{{$L->__('Success stories')}}</a>
                        <div class="static_pages_menu_hover absolute"></div>
                    </div>
                    <div class="static_pages_menu_item float_left relative">
                        <a href="{{url($L->lang.'/'.$L->__('FAQ'))}}">{{$L->__('FAQs')}}</a>
                        <div class="static_pages_menu_hover absolute"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="column_1 float_left">
                <div class="breadcrumbs">
                    <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="prod_title prod_title_desc prod_review_head_section_tab">
                    {{--<h1 style="margin: 0">{{$page->title}}</h1>--}}
                    <span itemprop="name" style="font-size: 28px; line-height: 1.2;">{{$page->title}}</span>
                </div>
                <div class="prod_slider">
                    <div id="carousel_prods" class="carousel slide carousel_prods clinical_slider" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="item active">
                                {!!$img->__($page->prod_id.'_1.jpg', 'magnif')!!}
                                {{--<div class="free_shipping">{!!$img->__('free_shipping.png')!!}</div>--}}
                            </div>
                            <div class="item">
                                {!!$img->__($page->prod_id.'_2.jpg', 'magnif')!!}
                                {{--<div class="free_shipping">{!!$img->__('free_shipping.png')!!}</div>--}}
                            </div>
                            <div class="item">
                                {!!$img->__($page->prod_id.'_3.jpg', 'magnif')!!}
                                {{--<div class="free_shipping">{!!$img->__('free_shipping.png')!!}</div>--}}
                            </div>

                        </div>
                        <div class="indicators relative">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel_prods" data-slide-to="0" class="active">{!!$img->__($page->prod_id.'_1_small.jpg')!!}</li>
                                <li data-target="#carousel_prods" data-slide-to="1">{!!$img->__($page->prod_id.'_2_small.jpg')!!}</li>
                                <li data-target="#carousel_prods" data-slide-to="2">{!!$img->__($page->prod_id.'_3_small.jpg')!!}</li>
                            </ol>
                        </div>

                        <a class="carousel_prods_left absolute" href="#carousel_prods" data-slide="prev">
                            {!!$img->__('product-left.png','no_hover_left')!!}
                            {!!$img->__('product-left_hover.png','carousel_prods_left_hover')!!}
                        </a>
                        <a class="carousel_prods_right absolute" href="#carousel_prods" data-slide="next">
                            {!!$img->__('product-right.png', 'no_hover_right')!!}
                            {!!$img->__('product-right_hover.png','carousel_prods_right_hover')!!}
                        </a>
                    </div>
                </div>
                <div class="order_total_mob">
                    <div class="order_total">
                        {{$L->__('Order total')}}: <span>{{$L->currency}}</span><span class="price"> {{$page->prices[0]->price}}</span>
                    </div>
                    <div class="flex">
                        <div class="margin_auto relative add_to_basket">
                            {!!$img->__('button_buy.png')!!}
                            <div class="button_buy_text absolute">{{$L->__('ADD TO BASKET')}}</div>
                        </div>
                    </div>
                </div>
                @if(file_exists('./img/'.$L->lang.'/'.$page->prod_id.'_1_before_after.jpg'))
                    <div class="left_banner relative">
                        <div class="left_banner_wrap">
                            {!!$img->__($page->prod_id.'_1_before_after.jpg')!!}
                            <div class="left_banner_before absolute">{{$L->__('Before')}}</div>
                            <div class="left_banner_after absolute">{{$L->__('One week of use')}}</div>
                        </div>
                    </div>
                @endif
                <div class="clinically_tested clinically_tested_tab">
                    <a href="{{$L->__('clinically-tested')}}">
                        {!!$img->__($L->lang.'_tested.png')!!}</a>
                    <div class="prod_code_wrap">
                        <div class="prod_code prod_code_mob">
                            {{$L->__('Product code:')}}<span>{{$page->prod_id}}</span>
                        </div>
                        <div class="availability availability_mob">
                            {{$L->__('Availability')}}: <span style="color: #305C07">{{$L->__('In stock')}}</span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="short_desc">
                    <div class="short_desc_title">
                        {{$L->__($page->prod_id.'_short_desc_title')}}
                    </div>
                    {{$page->short_desc}}
                </div>
            </div>
            <div class="column_2 float_left relative">
                <div class="prod_title prod_title_desc">
                    <h1 style="margin: 0">{{$page->title}}</h1>
                </div>

                <div class="clinically_tested clinically_tested_desc" style="margin-top: 0;"><a href="{{$L->__('clinically-tested')}}">{!!$img->__($L->lang.'_tested.png')!!}</a></div>
                <div class="prod_code">
                    {{$L->__('Product code:')}}<span>{{$page->prod_id}}</span>
                </div>
                <div class="availability">
                    {{$L->__('Availability')}}: <span style="color: #305C07">{{$L->__('In stock')}}</span>
                </div>
                <div class="long_desc">
                    <div class="long_desc_title">
                        {{$L->__($page->prod_id.'_long_desc_title')}}
                    </div>
                    {!! $page->long_desc[0] !!}

                </div>
            </div>
            <div class="column_3 float_left">
                <div class="social_section pull-right">
                    <div class="float_left soc_item"><a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg', 'hover_dark')!!}</a></div>
                    <div class="float_left soc_item"><a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg', 'hover_dark')!!}</a></div>
                    <div class="float_left soc_item"><a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg', 'hover_dark')!!}</a></div>
                    <div class="float_left soc_item"><a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg', 'hover_dark')!!}</a></div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="cart_section" style="height: 210px">
                    <div class="right_side_close">×</div>
                    <div class="clearfix"></div>
                    @if($L->lang == 'ru')
                        <div class="cart_title" style="font-size: 19px;">{{$L->__('REVIEW YOUR CART')}}</div>
                    @else
                        <div class="cart_title">{{$L->__('REVIEW YOUR CART')}}</div>
                    @endif
                    <form action="/cart" method="post" class="add_to_basket_form">
                        <input type="hidden" name="quantity" value="1">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$page->prod_id}}" name="prod_id">
                        <input type="hidden" value="{{$L->__('link_cart')}}" name="link">
                        <input type="hidden" value="{{$page->prices[0]->price}}" name="price">
                        <input type="hidden" value="{{$L->currency}}" name="currency">
                        <input type="hidden" value="{{$L->lang}}" name="lang">
                        <div class="cart_quantity">

                        </div>
                        <div class="order_total">
                            {{$L->__('Order total')}}: <span>{{$L->currency}}</span><span class="price"> {{$page->prices[0]->price}}</span>
                        </div>
                        <div class="flex">
                            <div class="margin_auto relative add_to_basket">
                                {!!$img->__('button_buy.png')!!}
                                <div class="button_buy_text absolute">{{$L->__('ADD TO BASKET')}}</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="blue_icons_section">
                    <div class="blue_icon">
                        <div class="blue_icon_img float_left">{!!$img->__('delivery_product.jpg')!!}</div>
                        <div class="blue_icon_text float_left">
                            @if ($L->lang == 'ru')
                                <div class="delivery_text_l1" style="font-size: 16px;">{{$L->__('FREE DELIVERY')}}</div>
                            @else
                                <div class="delivery_text_l1">{{$L->__('FREE DELIVERY')}}</div>
                            @endif
                            <div class="delivery_text_l2">{{$L->__('order over $20 (rpr $2.95)')}}</div>
                            <div class="delivery_text_l3"><a href="{{url($L->lang.'/'.$L->__('delivery'))}}">{{$L->__('More details1')}}</a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="blue_icon">
                        <div class="blue_icon_img float_left">{!!$img->__('back_money_product.jpg')!!}</div>
                        <div class="blue_icon_text float_left">
                            <div class="result_text_l1">{{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span></div>
                            <div class="result_text_l2">{{$L->__('or_your money back')}}</div>
                            <div class="result_text_l3"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{{$L->__('More details1')}}</a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="blue_icon ">
                        <div class="blue_icon_img relative contact_blue">{!!$img->__($L->lang.'_contact_blue.png')!!}
                            <div class="absolute link_contact"><a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('More details1')}}</a></div></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="prod_youtube">
                    <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                            frameborder="0" allowfullscreen>
                    </iframe>
                </div>
                <div class="prod_right_banner"><a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">
                        {{--{!!$img->__($L->lang.'_money-back-new.jpg')!!}--}}
                        {!!$img->__($L->lang.'_money-back-new_mob.jpg', 'money-back-new-mob')!!}
                    </a></div>
            </div>
            <div class="clearfix"></div>

            <div class="prod_tabs_section_right float_left"></div>
            <div class="clearfix"></div>
            <div class="prod_prefooter">
                <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                    <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                        <div class="free_delivery_img float_left">
                            {!!$img->__('delivery.png')!!}
                        </div>
                        <div class="free_delivery_text float_left">
                            @if ($L->lang == 'ru')
                                <div class="free_delivery_text_l1" style="font-size: 15px;">
                                    {{$L->__('FREE DELIVERY')}}
                                </div>
                            @elseif($L->lang == 'ua')
                                <div class="free_delivery_text_l1" style="font-size: 15px;">
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
                        <div class="clearfix"></div></a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item result_section col-lg-3 col-sm-6 relative">
                    <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}"><div class="result_img float_left">
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
                        <div class="clearfix"></div></a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item contact_section col-lg-3 col-sm-6 relative">
                    <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="prod_prefooter_item local_store_section col-lg-3 col-sm-6 relative">
                    {{--@if ($L->lang == 'cz')--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"  style="max-width: 100%;"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                            {{--<div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">--}}
                                {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                                {{--<div class="local_store_text_l2" style="font-size: 17px;">{{$L->__('STORE FINDER')}}</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div></a>--}}
                    {{--@else--}}
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                            {{--<div class="local_store_text float_left">--}}
                                {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                                {{--<div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>--}}
                            {{--</div>--}}
                            {{--<div class="clearfix"></div></a>--}}
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
    <div class="margin_auto relative right_side_btn">
        {!!$img->__('button_buy.png')!!}
        <div class="button_buy_text absolute">{{$L->__('ADD TO BASKET')}}</div>
    </div>
@endsection

@section('footer')
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.loupe.min.js"></script>
    <script src="/js/product.js"></script>
    <script>
        $('.magnif').loupe({
            width: 200,
            height: 150,
            loupe: 'loupe'
        });
    </script>
    <script>
        $('.static_pages_menu_item').hover(function () {
            $(this).children('.static_pages_menu_hover').show();
        },function () {
            $(this).children('.static_pages_menu_hover').hide();
        });
        $('.carousel_prods').carousel({
            interval: false
        });
    </script>
    <script>
        $('#cart_quantity').change(function () {
            var price = $('#cart_quantity').val()*parseFloat({{$page->prices[0]->price}});
            $('.price').text(price.toFixed(2));
            $('input[name="price"]').val(price.toFixed(2));
        })
    </script>
    <script>
        $('.add_to_basket').click(function () {
            $('.add_to_basket_form').submit();
        })
    </script>
    <script>
        $('.read_more_desc').click(function () {
            $('.nav-tabs li').each(function () {
                $(this).removeClass('active');
            });
            $('.desc_button').addClass('active')
        })
    </script>
@endsection