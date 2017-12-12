<?php header("X-Frame-Options:sameorigin"); ?>
<?
$ip = $_SERVER['REMOTE_ADDR'];
        if(function_exists('geoip_country_code_by_name')){
            $c = geoip_country_code_by_name($ip);
        }else{
            $c = 'en';
        }
$arr = session('cart');
$cartCount = 0;
if($arr){
    foreach ($arr as $key=>$item){
        $cartCount += $item['quantity'];
    }
}
if(isset($page)){
    $real_url = $page->real_url;
    $url = $page->seo_url;
}else{
    $real_url = '/'.$L->lang.'/static/1';
    $url = '/';
}

$arr_real_url = explode('/',$real_url);

?>
<!DOCTYPE html>
<html lang="{{$page->lang or $L->lang}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-site-verification" content="xWGJhLWxECZ7t3ssvhPgkoD5LN0kjwHQSMUTf6DU3xo" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="{{$page->meta_key or ""}}" />
    <meta name="description" content="{{$page->meta_desc or ""}}" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    <title>{{$page->meta_title or ""}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styl/default_wrapper.css">
    <link rel="stylesheet" href="/css/styl/default_wrapper_992-1199.css">
    <link rel="stylesheet" href="/css/styl/default_wrapper_768-991.css">
    <link rel="stylesheet" href="/css/media_main.min.css">
    <link rel="stylesheet" href="/css/roma.css">




@yield('header')
    @if($L->lang=='ua')
        <link rel="stylesheet" href="/css/styl/ua.css">
    @endif


</head>

<body>
{{--modals--}}

<div class="modal fade modal_coupon">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body relative">
                <div class="flex">
                    <div class="margin_auto">
                        <div class="modal_close">
                            <button type="button" class="modal_coupon_close" data-dismiss="modal"
                                    aria-hidden="true">
                                &times;<br>
                                <p>{{$L->__('CLOSE')}}</p>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal_coupon_welcome">{{$L->__('WELCOME!')}}</div>
                <div class="modal_coupon_text_l1">
                    {{$L->__('We want to give you a')}}
                </div>
                <div class="modal_coupon_text_l2">
                    {{$L->__('50% OFF')}}
                </div>
                <div class="modal_coupon_text_l3">
                    {{$L->__('COUPON CODE!')}}
                </div>
                <div class="modal_coupon_form">
                    <div class="error_email">{{$L->__('Your email is already used')}}</div>
                    <form action="/get_discount_first_time" method="post" class="get_discount_first_time">
                        {{csrf_field()}}
                        <input type="hidden" name="lang" value="{{$L->lang}}">
                        <div class="form-group email-form-group">
                            <input type="text" name="email" class="form-control email-first-time-discount" placeholder="{{$L->__('enter your email address')}}">
                        </div>
                        <input type="submit" class="submit" value="{{$L->__('SEND ME A COUPON')}}">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-tel" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-body-tel">
                <div class="modal-tel__close">{{$L->__('Close_tel')}}<span></span></div>
                <div class="modal-tel__body">
                    <span></span>
                    {!! $img->__($L->lang.'_call.png', 'modal-tel__number') !!}
                    {!!$L->__('Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda blanditiis')!!}</div>
                <div class="modal-tel__call">
                    <a href="{{$L->__('tel:+442036702190')}}">{{$L->__('Call to acation')}}</a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="first_time_mob" style="display: none">
    <span class="first">{{$L->__('First time here?')}}</span>
    <span class="click">{{$L->__('Click')}}<span class="save">{{$L->__('to save!')}}</span></span>
    <div class="clearfix"></div>
</div>
<div class="home_page_header_section">
    <div class="header_section_l1">
        <div class="container">
            <div class="row">
                <div class="l1_1">
                    <div class="pull-right basket_section">
                        <div class="float_left">{!! $img->__('bag.png', 'l1_1_basket') !!}</div>
                            @if ($L->lang != 'en')
                                @if($L->lang == 'ru')
                                    <div class="float_left l1_1_text l1_1_text_ru">
                                        <a href="/{{(isset($cartCount))?$L->lang.'/'.$L->__('link_cart'):''}}">
                                            {{(isset($cartCount))? $cartCount.' '.$L->__('items in the cart'):$L->__('no items in the cart')}}
                                        </a>
                                    </div>
                                @else
                                    <div class="float_left l1_1_text">
                                        <a href="/{{(isset($cartCount))?$L->lang.'/'.$L->__('link_cart'):$L->lang.'/'}}">
                                            {{(isset($cartCount))? $cartCount.' '.$L->__('items in the cart'):$L->__('no items in the cart')}}
                                        </a>
                                    </div>
                                @endif
                            @else
                                <div class="float_left l1_1_text">
                                    <a href="/{{(isset($cartCount))?$L->lang.'/'.$L->__('link_cart'):''}}">
                                        {{(isset($cartCount))? $cartCount.' '.$L->__('items in the cart'):$L->__('no items in the cart')}}
                                    </a>
                                </div>
                            @endif
                        <div class="clearfix"></div>
                    </div>
                    <div class="pull-right login">
                        <a href="{{url($L->lang.'/'.$L->__('my-account'))}}">
                            @if(session()->has('customer'))
                                {{session('customer')->bill_first_name}}
                            @else
                                {{$L->__('Login / Sign in')}}
                            @endif
                        </a>
                    </div>
                    <div class="pull-left header-phone-mobile"></div>
                    <div class="pull-left header-links">
                        <div class="header-icon header-phone">
                            @if($c=='US')
                                <a href="{{$L->__('tel:+442036702190_usa')}}">{!! $img->__('usa_contact_blue.png') !!}</a>
                            @else
                                <a href="{{$L->__('tel:+442036702190')}}">{!! $img->__($L->lang.'_icon_header.png') !!}</a>
                            @endif
                        </div>
                        <div class="header-icon header-icon-bg header-faq"><a href="{{url($L->lang.'/'.$L->__('FAQ'))}}">{{$L->__('FAQs')}}</a></div>
                        <div class="header-icon header-icon-bg header-contact"><a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('Contact Us')}}</a></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="l1_2">
                   <div class="float_left">
                       @if($c=='US'&&$L->lang=='en')
                           {!! $img->__('usa.png', 'l1_2_lang') !!}
                       @else
                           {!! $img->__($L->lang.'.png', 'l1_2_lang') !!}
                       @endif

                   </div>
                    <div class="float_left l1_2_text">
                        {{$L->__('Language')}}
                        <span class="caret"></span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="lang_menu" style="z-index: 99;">
                        @if($url=='/')
                            <a href="{{url('/')}}">
                                <div class="float_left lang_img_en lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('English')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/fr').'/'}}">
                                <div class="float_left lang_img_fr lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('French')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/de').'/'}}">
                                <div class="float_left lang_img_de lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Deutch')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/es').'/'}}">
                                <div class="float_left lang_img_es lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Español')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/it').'/'}}">
                                <div class="float_left lang_img_it lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Italiano')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/cz').'/'}}">
                                <div class="float_left lang_img_cz lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Jazyk')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/ru').'/'}}">
                                <div class="float_left lang_img_ru lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Русский')}} </div>
                                <div class="clearfix"></div>
                            </a>
                            <a href="{{url('/ua').'/'}}">
                                <div class="float_left lang_img_ua lang_img"></div>
                                <div class="float_left l1_2_text">{{$L->__('Українська')}} </div>
                                <div class="clearfix"></div>
                            </a>
                        @else
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="en">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_en lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('English')}} </div>
                            </button>
                        </form>

                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="fr">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_fr lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('French')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="de">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_de lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Deutch')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="es">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_es lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Español')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="it">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_it lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Italiano')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="cz">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_cz lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Jazyk')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="ru">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_ru lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Русский')}} </div>
                            </button>
                        </form>
                        <form action="/admin/page-to-page" method="post" style="line-height: 10px">
                            <input type="hidden" name="type" value="{{$arr_real_url[2]}}">
                            <input type="hidden" name="num" value="{{$arr_real_url[3]}}">
                            <input type="hidden" name="lang" value="ua">
                            {{csrf_field()}}
                            <button type="submit" style="background: transparent; border: none; padding: 0">
                                <div class="float_left lang_img_ua lang_img"></div>
                                <div style="margin: 15px 0 0 0" class="float_left l1_2_text">{{$L->__('Українська')}} </div>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="header_section_l2">
        <div class="container">
            <div class="row">
                <div class="l2_1 flex float_left">
                    <div class="margin_auto">
                        <a href="@if(session('def_lang')==$L->lang)/@else/{{$L->lang}}/@endif">
                            {!!$img->__($L->lang.'_logo.jpg', 'logo')!!}
                        </a>
                        <a href="@if(session('def_lang')==$L->lang)/@else/{{$L->lang}}/@endif">
                            {!!$img->__($L->lang.'_logo_tab.png', 'logo_tab')!!}
                        </a>
                    </div>
                </div>
                <div class="l2_2 flex float_left">
                    <div class="margin_auto">
                        {!!$img->__($L->lang.'_slogan.png', 'slogan')!!}
                        {!!$img->__($L->lang.'_slogan_tab.png', 'slogan_tab')!!}
                        {!!$img->__($L->lang.'_slogan_mob.png', 'slogan_mob')!!}
                    </div>
                </div>
                <div class="clearfix visible-sm"></div>
                <div class="l2_3 flex float_left">
                    <div class="margin_auto">
                        <a href="{{url($L->lang.'/'.$L->__('localstores'))}}">
                            <div class="l2_3_1">
                                <div class="float_left">{!! $img->__('localsrore.png', 'l2_3_1_img') !!}{!! $img->__('localsrore_mob.png', 'l2_3_1_img_mob') !!}</div>
                                <div class="float_left l2_3_1_text">
                                    <div class="l2_3_1_text_1">{{$L->__('Where to bay locally?')}}</div>
                                    @if ($L->lang == 'cz')
                                        <div class="l2_3_1_text_2 l2_3_1_text_2_cz">{{$L->__('STORE FINDER')}}</div>
                                    @else
                                        <div class="l2_3_1_text_2">{{$L->__('STORE FINDER')}}</div>
                                    @endif
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                            <div class="l2_3_2">
                                <div class="float_left">{!! $img->__('online.png', 'l2_3_2_img') !!}{!! $img->__('online_mob.png', 'l2_3_2_img_mob') !!}</div>
                                <div class="float_left l2_3_2_text">
                                    <span class="l2_3_2_text_1">{{$L->__('Online')}}</span>
                                    <span class="l2_3_2_text_2">{{$L->__('STORE_1')}}</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<div class="home_page_menu_section">
    <div class="menu-mobile">{!!$img->__('menu_1_tab.png', 'menu-open')!!}</div>
    <div class="menu-mobile">{!!$img->__('menu_1_tab_activ.png', 'menu-close')!!}</div>
    <div class="about-us-mobile">
        {!!$img->__('about.png', 'about-us_img')!!}
        {!!$img->__('about_mob.png', 'about-us_img_mob')!!}
        <a href="{{url($L->lang.'/'.$L->__('about-us'))}}">
            @if ($L->lang == 'es')
                <div class="absolute about_text" style="top:2px;">{{$L->__('ABOUT')}}<br/>{{$L->__('US')}}</div>
            @else
                <div class="absolute about_text">{{$L->__('ABOUT US')}}</div>
            @endif
        </a>
    </div>
    <div class="menu-mobile right_menu">
        {!!$img->__('menu_2_tab.png', 'menu-leaf menu-leaf_close')!!}{!!$img->__('menu_2_tab_activ.png', 'menu-leaf menu-leaf_activ')!!}
        {!!$img->__('menu_bag.png', 'menu-box menu-box_close')!!}{!!$img->__('menu_bag_activ.png', 'menu-box menu-box_activ')!!}
    </div>
    <div class="menu_line_1"></div>
    <div class="menu_line_2"></div>
    <div class="container relative">
        <div class="absolute menu">
            <div class="float_left menu_hover menu_btn" data-id="id_1">
                <a href="{{url($L->__('cat_1_link'))}}">{{$L->__('Cat_1')}}</a><a href="{{url($L->__('cat_1_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                        {{--<a href="{{url($L->__('1001_link'))}}"><li class="sub-item">{{$L->__('1001_name')}}</li></a>--}}
                        {{--<a href="{{url($L->__('1002_link'))}}"><li class="sub-item">{{$L->__('1002_name')}}</li></a>--}}
                        {{--<a href="{{url($L->__('1003_link'))}}"><li class="sub-item">{{$L->__('1003_name')}}</li></a>--}}

                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_1" data-id="id_1">
                <div class="relative">
                    <a href="{{url($L->__('cat_1_link'))}}">
                            <div class="sec_1 float_left">
                                <div class="sub_sec_1 float_left">
                                    {!!$img->__('1001_1.jpg', 'sec_prod_img')!!}
                                </div>
                                <div class="sub_sec_2 float_left">
                                    <div class="flex">
                                        <div class="margin_auto">
                                            <div class="sec_prod_l1">{{$L->__('1001_name')}}</div>
                                        </div>
                                    </div>

                                    <div class="sec_prod_l2">
                                        {!!$img->__('product-star-white.png')!!}
                                        {!!$img->__('product-star-white.png')!!}
                                        {!!$img->__('product-star-white.png')!!}
                                        {!!$img->__('product-star-white.png')!!}
                                        {!!$img->__('product-star-white.png')!!}
                                    </div>
                                    <div class="sec_prod_l3">
                                        {{$L->__('1001 product short description')}}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="sub_sec_3 relative">
                                    <div class="sub_sec_3_1"></div>
                                    <div class="sub_sec_3_2"></div>
                                    <div class="sub_sec_3_3 absolute">{{$L->__('0-0_str')}}</div>
                                </div>
                            </div>
                        </a>

                    <a href="{{url($L->__('cat_1_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1002_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1002_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1002 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('0-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_1_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('0-2_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_1_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('0_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_2">
                <a href="{{url($L->__('cat_2_link'))}}">{{$L->__('Cat_2')}}</a><a href="{{url($L->__('cat_2_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                    {{--<a href="{{url($L->__('1004_link'))}}"><li class="sub-item">{{$L->__('1004_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1005_link'))}}"><li class="sub-item">{{$L->__('1005_name')}}</li></a>--}}

                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_2" data-id="id_2">
                <div class="relative">
                    <a href="{{url($L->__('cat_2_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1004_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1004_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1004 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('1-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_2_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1005_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1005_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1005 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('1-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_2_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('1_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_3">
                <a href="{{url($L->__('cat_3_link'))}}">{{$L->__('Cat_3')}}</a><a href="{{url($L->__('cat_3_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                    {{--<a href="{{url($L->__('1002_link'))}}"><li class="sub-item">{{$L->__('1002_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1003_link'))}}"><li class="sub-item">{{$L->__('1003_name')}}</li></a>--}}


                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_3" data-id="id_3">
                <div class="relative">
                    <a href="{{url($L->__('cat_3_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1002_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1002_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1002 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('2-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_3_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('2-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_3_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('2_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_4">
                <a href="{{url($L->__('cat_4_link'))}}">{{$L->__('Cat_4')}}</a><a href="{{url($L->__('cat_4_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                    {{--<a href="{{url($L->__('1001_link'))}}"><li class="sub-item">{{$L->__('1001_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1002_link'))}}"><li class="sub-item">{{$L->__('1002_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1003_link'))}}"><li class="sub-item">{{$L->__('1003_name')}}</li></a>--}}

                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_4" data-id="id_4">
                <div class="relative">
                    <a href="{{url($L->__('cat_4_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1006_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1006_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1006 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('3-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_4_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1002_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1002_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1002 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('3-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_4_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('3-2_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_4_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('3_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_5">
                <a href="{{url($L->__('cat_5_link'))}}">{{$L->__('Cat_5')}}</a><a href="{{url($L->__('cat_5_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                    {{--<a href="{{url($L->__('1001_link'))}}"><li class="sub-item">{{$L->__('1001_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1002_link'))}}"><li class="sub-item">{{$L->__('1002_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1003_link'))}}"><li class="sub-item">{{$L->__('1003_name')}}</li></a>--}}

                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_5" data-id="id_5">
                <div class="relative">
                    <a href="{{url($L->__('cat_5_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1006_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1006_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1006 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('4-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_5_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1002_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1002_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1002 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('4-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_5_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('4-2_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_5_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('4_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_6">
                <a href="{{url($L->__('cat_6_link'))}}">{{$L->__('Cat_6')}}</a><a href="{{url($L->__('cat_6_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
                {{--<ul class="sub-menu">--}}

                    {{--<a href="{{url($L->__('1001_link'))}}"><li class="sub-item">{{$L->__('1001_name')}}</li></a>--}}
                    {{--<a href="{{url($L->__('1003_link'))}}"><li class="sub-item">{{$L->__('1003_name')}}</li></a>--}}


                {{--</ul>--}}
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_6" data-id="id_6">
                <div class="relative">
                    <a href="{{url($L->__('cat_6_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1001_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1001_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1001 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('5-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_6_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('5-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_6_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('5_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="float_left menu_hover menu_btn" data-id="id_7">
                <a href="{{url($L->__('cat_7_link'))}}">{{$L->__('Cat_7')}}</a><a href="{{url($L->__('cat_7_link'))}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}{!!$img->__('arrow_menu_v.png', 'arrow_v')!!}</a>
            </div>
            <div class="menu_hover hidden_prods absolute" id="id_7" data-id="id_7">
                <div class="relative">
                    <a href="{{url($L->__('cat_7_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1002_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1002_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1002 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('6-0_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_7_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1006_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1006_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1006 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('6-1_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_7_link'))}}">
                        <div class="sec_1 float_left">
                            <div class="sub_sec_1 float_left">
                                {!!$img->__('1003_1.jpg', 'sec_prod_img')!!}
                            </div>
                            <div class="sub_sec_2 float_left">
                                <div class="flex">
                                    <div class="margin_auto">
                                        <div class="sec_prod_l1">{{$L->__('1003_name')}}</div>
                                    </div>
                                </div>

                                <div class="sec_prod_l2">
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                    {!!$img->__('product-star-white.png')!!}
                                </div>
                                <div class="sec_prod_l3">
                                    {{$L->__('1003 product short description')}}
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="sub_sec_3 relative">
                                <div class="sub_sec_3_1"></div>
                                <div class="sub_sec_3_2"></div>
                                <div class="sub_sec_3_3 absolute">{{$L->__('6-2_str')}}</div>
                            </div>
                        </div>
                    </a>

                    <a href="{{url($L->__('cat_7_link'))}}">
                        <div class="sec_4 float_left">
                            <div class="sec_4_1">{{$L->__('READ MORE2')}}</div>
                            <div class="sec_4_2">{{$L->__('about our')}}</div>
                            <div class="sec_4_3">{{$L->__('treatment')}}</div>
                            <div class="sec_4_4">{{$L->__('for')}}</div>
                            <div class="sec_4_5">{{$L->__('6_title')}}</div>
                        </div>
                    </a>
                    <div class="clearfix"></div>
                    <div class="plus_1 absolute">{!!$img->__('menu-plus.png')!!}</div>
                    <div class="plus_2 absolute">{!!$img->__('menu-plus.png')!!}</div>
                </div>
            </div>

            <div class="pull-right relative">
                {!!$img->__('about.png', 'about_btn')!!}
                <a href="{{url($L->lang.'/'.$L->__('about-us'))}}">
                    <div class="absolute about_text">{{$L->__('ABOUT US')}}</div>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>

@yield('content')

<footer>
    <div class="footer_l0">
        <ul>
            <li><a href="@if(session('def_lang')==$L->lang)/@else/{{$L->lang}}/@endif">{{$L->__('PsoEasy')}}</a></li>
            <li><a href="{{url($L->lang.'/'.$L->__('about-us'))}}">{{$L->__('About Us1')}}</a></li>
            <li><a href="{{url($L->lang.'/'.$L->__('FAQ'))}}">{{$L->__('FAQs')}}</a></li>
            <li><a href="{{url($L->lang.'/'.$L->__('online-store'))}}">{{$L->__('Online Store')}}</a></li>
            <li><a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('Contact Us')}}</a></li>
            <div class="clearfix"></div>
        </ul>
    </div>
    <div class="footer_l1">
        <div class="container no_padding">
            <div class="footer_l1_1 float_left">
                {!!$img->__($L->lang.'_logo-footer.png', 'dsp-big')!!}
                {!!$img->__($L->lang.'_logo_footer_tab.png', 'dsp-small')!!}
                {!!$img->__($L->lang.'_logo_footer_mob.png', 'dsp-xsmall')!!}
            </div>
            @if($L->lang == 'it' || $L->lang == 'ru')
                <div class="footer_l1_2 float_left" style="margin-top: 10px;">
                    <p>{{$L->__('EMS_Worldwide_or_Worldwide_registered_mail')}}</p>
                    {!!$img->__('ems.png')!!}
                </div>
            @else
                <div class="footer_l1_2 float_left">
                    <p>{{$L->__('EMS_Worldwide_or_Worldwide_registered_mail')}}</p>
                    {!!$img->__('ems.png')!!}
                </div>
            @endif
            <div class="footer_l1_3 float_left">
                <p><a href="{{url($L->lang.'/'.$L->__('privacy'))}}">{{$L->__('Privacy1')}}</a></p>
                @if($L->lang == 'it')
                    <p style="line-height: 1;"><a href="{{url($L->lang.'/'.$L->__('terms-of-use'))}}">{{$L->__('Term of use')}}</a></p>
                @else
                    <p><a href="{{url($L->lang.'/'.$L->__('terms-of-use'))}}">{{$L->__('Term of use')}}</a></p>
                @endif
            </div>
            <div class="footer_l1_4 float_left">
                <div class="float_left ssl">
                    {!!$img->__('ssl.png')!!}
                </div>
                <div class="float_left pay_pal">
                    <p>{{$L->__('Type of payment')}}</p>
                    {!!$img->__('pay.png')!!}
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="footer_l2">
        {{$L->__('Copyright')}}
    </div>
</footer>
<div class="lang_mask"></div>
<p id="back-top">
    <a href="#top"><span></span></a>
</p>
{{--<div class="first_time">--}}
    {{--{!!$img->__($L->lang.'_pop-up-small.png', 'pop-modal-click')!!}--}}
    {{--{!!$img->__($L->lang.'_popup-close-small.png', 'pop-close-click')!!}--}}
{{--</div>--}}

<div id="boxUserFirstInfo" style="display: none;">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-xs-12">
               <p>{{$L->__('CookieText')}}
                   <a href="{{url($L->lang.'/'.$L->__('privacy'))}}">{{$L->__('Privacy1')}}</a>
               </p>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="cookies_btn">
                    <span class="cookies_link accept-cookies">{{$L->__('Accept cookies')}}</span>
                    <span class="cookies_link decline-cookies">{{$L->__('Decline cookies')}}</span>
                </div>
            </div>
       </div>
    </div>
</div>

<!-- JavaScripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery.cookie.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/default_wrapper.js"></script>
<script src="/js/form-validator.js"></script>

{{--for lang menu--}}
<script>
    var thatUrl = '<?=url($L->lang)."/"?>';
    $('.l1_2 .lang_menu a').each(function () {
        var thatHref = $(this).attr('href');
        if(thatUrl !== thatHref){
            $(this).show();
        } else {$(this).hide();}

        if(thatUrl == 'https://www.psoeasy.com/en/'){
            $('.l1_2 .lang_menu a:first-of-type').hide();
        } else{
            $('.l1_2 .lang_menu a:first-of-type').show();
        }
    });
</script>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-76173220-1', 'auto');
    ga('send', 'pageview');
</script>
<script>
    var language = '<?=$L->lang?>';
    if (language == 'ru') {
        select('.social_block a');
        select('.social_section a');
//        select('.smm_contact a');
        select('.local_social a');
    }

    function select (selector) {
        $(selector).click(function(event) {
//            return false;
            event.preventDefault();
        });

        $(selector).each(function(){
            $(this).attr('href', '').removeAttr('target');
        });
    }

</script>
<script>
    $('.modal_free_soap_expired').modal('show');
</script>
@yield('footer')
</body>
</html>
