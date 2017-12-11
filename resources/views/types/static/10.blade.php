<?$customer = (session()->has('customer')) ? session('customer') : ''?>
<?
        $order_cost = 0;
$cart = session()->get('cart');
$arr = session('cart');
$cartCount = 0;
foreach ($arr as $key=>$item){
    $cartCount += $item['quantity'];
};
if (!isset($cart) || count($cart) == 0) {
    header("Location: /" . $L->lang . '/');
    die();
}

$countries = \App\Country::all();
?>
@extends('layouts.default_wrapper')
{{--{{dd(session('cart'))}}--}}
{{--{{dd($cart)}}--}}
@section('header')
    <link rel="stylesheet" href="/css/styl/product.css">
    <link rel="stylesheet" href="/css/review.min.css">
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link href="/css/shipping.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/registry.min.css">
    <link href="/css/styl/cart.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/new_shipping.min.css">
    <style>
        .shipping_auth_email_error, .shipping_pass_recover, .shipping_auth_email_pass_error{
            color: red;
            font-size: 18px;
            text-align: center;
            font-weight: bold;
            display: none;
        }

        @media only screen and (max-width: 720px){
            .nav-tabs > li{
                width: 100%;
            }
        }
    </style>

    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window,document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
        fbq('set', 'autoConfig', false, 'FB_PIXEL_ID');
        fbq('init', '1417451905005848');
    </script>
    <noscript>
        <img height="1" width="1"
             src="https://www.facebook.com/tr?id=1417451905005848&ev=PageView
&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

@endsection

@section('content')

    <div class="modal fade paypal_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body relative">
                    <div class="text-center">
                        {!! $img->__('logo_pop_up_payment.jpg') !!}
                        <button type="button" style="
                            position: absolute;
                            top: 0;
                            right: 0px;
                            height: 38px;
                            width: 38px;
                            background: #4884a9;
                            padding: 0;
                            cursor: pointer;
                            color: #fff;
                            border: none;
                            font-size: 30px;
                            "
                                data-dismiss="modal" aria-hidden="true">&times;</button>
                        <div style="color: #007191; font-size: 32px; font-weight: bold; margin: 15px 0; font-family: 'Century Gothic Regular Bold'">
                            {{$L->__('paypal_modal_text_1')}}
                        </div>
                        <div style="color: #333333; font-size: 18px; font-weight: bold; margin: 0; ">
                            <p style="margin: 0">{{$L->__('paypal_modal_text_2')}}</p>
                            <p style="margin: 0">{{$L->__('paypal_modal_text_3')}}</p>
                        </div>
                        <div style="position: absolute; bottom: 10px; right: 0; width: 100%; text-align: center">
                            {!! $img->__('paypal_modal.jpg') !!}
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <?$post = old();
    //    session()->forget('customer');
    //    $s_cart = serialize($cart);
    ?>

    @if(session()->has('trialEmail'))
        <div class="container">
            <div class="modal fade modal_email_used" style="padding-right: 0!important;">
                <div class="modal-dialog" style="width: auto;">
                    <div class="modal-content" style="width: 100%; max-width: 767px">
                        <div class="modal-body relative" style="width: auto;">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="modal_review_logo">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="thx_rev" style="width:100%; height: 70%; display: table">
                                <div class="margin_auto"
                                     style="font-size: 16px; display: table-cell; vertical-align: middle">
                                    <p>{!!$L->__('free_pack_email_error_1')!!}</p>
                                    <p>{{$L->__('free_pack_email_error_2')}}</p>
                                    <p><a href="/{{$L->lang}}/cart">{{$L->__('to_cart')}}</a>
                                        <a href="/{{$L->lang}}/{{$L->__('customer_service_link')}}"
                                           style="padding: 0 30px;background: #4884A9; color: #fff; border: none">
                                            {{$L->__('customer_service_btn')}}
                                        </a></p>

                                    @if(isset($post['quantity']) && count($post['quantity'])>1)
                                        <p>{{$L->__('free_pack_email_error_3')}}</p>

                                        <form action="/finish_order" method="post">
                                            {{csrf_field()}}

                                            @foreach($post as $n=>$v)
                                                @if($n!='_token')
                                                    @if($n=='quantity')
                                                        @foreach($v as $id=>$q)
                                                            @if($id!="'2002'")
                                                                <input type="hidden" name="quantity[{{$id}}]"
                                                                       value="{{$q}}">
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <input type="hidden" name="{{$n}}" value="{{$v}}">
                                                    @endif
                                                @endif
                                            @endforeach
                                            <input type="submit" value="{{$L->__('buy')}}"
                                                   style="padding: 0 50px;background: #4884A9; color: #fff; border: none">
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?
        session()->forget('trialEmail')
        ?>
    @endif
    <div class="container">
        <div class="row shipping_content">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> >
                <a href="{{$L->__('link_cart')}}">{{$L->__('Cart')}}</a> >
                {{$page->link_name}}
            </div>
            <div class="col-xs-12">
                <div class="shipping__stages">
                    <div class="shipping__stage shipping__first-stage active">
                        <div class="shipping__number">
                            <span>1</span>
                            <div class="shipping__circle"></div>
                        </div>
                        <span>{{$L->__('Shipping info')}}</span>
                        <div class="shipping__step"></div>
                    </div>
                    <div class="shipping__stage shipping__second-stage">
                        <div class="shipping__number">
                            <span>2</span>
                            <div class="shipping__circle"></div>
                        </div>
                        <span>{{$L->__('Shipping method')}}</span>
                        <div class="shipping__step"></div>
                    </div>
                    <div class="shipping__stage shipping__third-stage">
                        <div class="shipping__number">
                            <span>3</span>
                            <div class="shipping__circle"></div>
                        </div>
                        <span>{{$L->__('payment_1')}}</span>
                    </div>
                </div>
            </div>
            {{--basket--}}
            <div class="pull-right col-md-4 col-sm-5 col-xs-12">
                <div class="basket_right_section shipping__basket_right_section">
                    <div id="review_your_cart">
                        {{$L->__('REVIEW YOUR CART')}}
                    </div>
                    <div id="proceed_order">
                        @foreach($cart as $key=>$item)

                            <div class="shipping__product">
                                {!!$img->__($item['prod_id'].'_basket.jpg')!!}
                                <span>{{$item['product']->link_name}}</span>
                                        <span class="price_sec">
                                            <span class="quantity">{{$item['quantity']}}</span>
                                            <span style="width: auto">{{$item['currency']}}</span>&nbsp;
                                            <span style="width: 40px" class="sub_total" data-id="{{substr($item['prod_id'],0,1)}}">
                                                {{sprintf("%01.2f",$item['price']*$item['quantity'])}}
                                            </span>
                                        </span>
                                <div class="clearfix"></div>
                            </div>
                            <? $order_cost += $item['price']*$item['quantity'] ?>
                        @endforeach
                    </div>
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

                    @if(session()->has('discount')||session()->has('discount_api'))
                        @if(session('discount')!='false')

                            <div id="promo_section">
                                <div class="code_accepted" style="margin-top: 5px">
                                    @if(session()->has('discount_api'))
                                        <p>{{$L->__('Your discount is')}} {{session('discount_api')->value}} {{session('discount_api')->unit}}</p>
                                    @else
                                        <p>{{$L->__('Your discount is')}} {{session('discount')->rate}} %</p>
                                    @endif

                                    <p style="margin: auto" class="dis_expl">*{{$L->__('discount_only_for_prods')}}</p>
                                </div>
                            </div>
                        @endif
                    @endif

                    <div id="quantity_of_products">
                        {{$L->__('quantity_of_products')}}
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
                    <a href="{{url($L->lang.'/'.'cart')}}"
                       class="shipping__correct">{{$L->__('Correct your choice >>')}}</a>
                </div>
            </div>
            {{--end basket--}}
            <div class="col-md-8 col-sm-7 col-xs-12">
                <div class="row">
                    {{--registry form--}}
                    <div class="shipping__registry">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active">
                                <a href="#home" aria-controls="home" role="tab" data-toggle="tab">{{$L->__('New customers')}}</a>
                                <span class="sign plus">+</span>
                                <span class="sign minus">-</span>
                            </li>
                            <li role="presentation" class="nav_profile_desk">
                                <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{$L->__('Registered customers')}}</a>
                                <span class="sign plus">+</span>
                                <span class="sign minus">-</span>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                <div class="registry_form form shipping__form shipping__submit">
                                    <form action="{{url('/admin/customer_register_shipping')}}" method="post"
                                          id="reg_form"
                                          class="reg_form_desk">

                                        <input type="hidden" class="lang_reg" name="lang_reg" value="{{$L->lang}}">


                                        {{csrf_field()}}
                                        <label for="name">{{$L->__('First name (*)')}}</label>
                                        <div class="wrap_in f_name">
                                            <input class="name_reg" type="text" name="name" id="name" required>
                                        </div>

                                        <label for="last_name">{{$L->__('Last name (*)')}}</label>
                                        <div class="wrap_in l_name">
                                            <input class="last_name_reg" type="text" name="last_name" id="last_name"
                                                   required>
                                        </div>

                                        <label for="email_r">{{$L->__('Email address (*)')}}</label>
                                        <div class="wrap_in email">
                                            <input class="email_reg" type="email" name="email_r" id="email_r" required>
                                        </div>

                                        <label for="phone_r">{{$L->__('Phone (*)')}}</label>
                                        <div class="wrap_in phone">
                                            <input class="tel_reg" type="tel" name="phone_r" id="phone_r" required
                                                   pattern="^[ 0-9\s\+\-]+$">
                                        </div>

                                        <?($L->lang == 'en') ? $lang = 'gb' : $lang = $L->lang?>
                                        <div class="form_group country_select_r">
                                            <label for="country_r" class="shipping_form_label">{{$L->__('country_999')}}
                                                (*)</label>
                                            <div class="wrap_country country">
                                                <select class="country_reg" name="country_r" id="country_r"
                                                        class="shipping_form_input form-control country_select">
                                                    @foreach($countries as $country)
                                                        @if($country->nicename!='Australia')
                                                            <option value="{{$country->iso}}"
                                                                    <?if(session()->has('customer')){?>
                                                                    @if($country->iso==$customer->bill_country) selected
                                                                    @endif
                                                                    <?}else{?>
                                                                    @if(strtolower($country->iso)==$lang) selected
                                                                    @endif
                                                                    <?}?>
                                                                    data-id="{{$country->id}}">
                                                                {{$country->nicename}}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form_group states states_select state_reg"></div>

                                        <input type="submit" class="registry submit_btn" name="registry_btn"
                                               id="submit_btn" value="{{$L->__('Submit1')}}" onclick="statistic1();">
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <div class="login_form form shipping__form">
                                    <div class="shipping_auth_email_error">{{$L->__('email_is_incorrect')}}</div>
                                    <div class="shipping_auth_email_pass_error">{{$L->__('email_or_pass_is_incorrect')}}</div>
                                    <div class="shipping_pass_recover">{{$L->__('your_pass_was_sent_to_email')}}</div>
                                    <form action="/admin/customer_auth_shipping" method="post" class="shipping_auth">
                                        <label for="email_l">{{$L->__('Email address (*)')}}</label>
                                        <div class="wrap_in email shipping_auth_email"><input type="email" name="email" id="email_l"
                                                                          required></div>
                                        <input type="hidden" name="lang" class="lang_auth" value="{{$L->lang}}">
                                        <label for="password_l">{{$L->__('Password (*)')}}</label>
                                        <div class="wrap_in password"><input type="password" name="password"
                                                                             id="password_l" required></div>
                                        <input type="submit" class="login" name="login_btn" value="{{$L->__('Login')}}">
                                    </form>
                                    <form action="#" method="post" id="forget_pass_form">
                                        {!! csrf_field() !!}
                                        <input class="hidden_email" type="hidden" name="email">
                                        <input type="submit" class="forget_pass_sub"
                                               value="<?=$L->__('Forgot password?')?>">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--order form--}}
                    <div class="col-xs-12 shipping__order">
                        <div class="row">
                            <div class="shipping__order-title">
                                <div class="col-sm-6 col-xs-12">
                                    <div class="form_title">
                                        {{$L->__('SHIP TO')}}
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-12 shipping__bill-title">
                                    <div class="form_title">
                                        {{$L->__('BILL TO')}}
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form_reload">
                                <form action="/finish_order" method="post" id="shipping_form" class="proceed_order_form">
                                    {{csrf_field()}}
                                    <div class="col-sm-6 col-xs-12 form_ship_to">
                                        <div class="form-group email_form_group">
                                            <label for="ship_email" class="shipping_form_label">{{$L->__('EMAIL')}} *
                                                <input type="text" id="ship_email" name="email"
                                                       class="take_val form-control shipping_form_input email"
                                                       placeholder="{{$L->__('example@gmail.com')}}"
                                                       value="{{$customer->email or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group name_form_group">
                                            <label for="ship_full_name" class="shipping_form_label">{{$L->__('FULL NAME')}}
                                                *
                                                <input type="text" id="ship_full_name" name="fname"
                                                       class="take_val form-control shipping_form_input req"
                                                       placeholder="{{$L->__('first name1')}}"
                                                       value="{{$customer->bill_first_name or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_last_name" class="shipping_form_label">
                                                <input type="text" id="ship_last_name" name="lname"
                                                       class="take_val form-control shipping_form_input req"
                                                       placeholder="{{$L->__('last name1')}}"
                                                       value="{{$customer->bill_last_name or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_address" class="shipping_form_label">{{$L->__('ADDRESS_1111')}} *
                                                <input type="text" id="ship_address" name="address"
                                                       class="take_val form-control shipping_form_input req"
                                                       placeholder="{{$L->__('street, house')}}"
                                                       value="{{$customer->bill_address or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_zip"
                                                   class="shipping_form_label">{{$L->__('ZIP / POSTAL CODE')}} *
                                                <input type="text" id="ship_zip" name="zip"
                                                       class="take_val form-control shipping_form_input req "
                                                       placeholder="{{$L->__('postal code')}}"
                                                       value="{{$customer->bill_zip or ''}}" required >
                                                {{--pattern="^[ 0-9]+$"--}}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_city" class="shipping_form_label">{{$L->__('TOWN / CITY')}} *
                                                <input type="text" id="ship_city" name="city"
                                                       class="take_val form-control shipping_form_input req"
                                                       placeholder="{{$L->__('Capital')}}"
                                                       value="{{$customer->bill_city or ''}}" required>
                                            </label>
                                        </div>
                                        <?($L->lang == 'en') ? $lang = 'gb' : $lang = $L->lang?>
                                        <div class="form-group country_select">
                                            <label for="ship_country" class="shipping_form_label">{{$L->__('COUNTRY')}} *
                                                <select name="country" id="ship_country"
                                                        class="take_val shipping_form_input form-control">
                                                    @foreach($countries as $country)
                                                        {{--                                                    @if($country->nicename!='Australia')--}}
                                                        <option value="{{$country->iso}}"
                                                                <?if(session()->has('customer')){?>
                                                                @if($country->iso==$customer->ship_country) selected
                                                                @endif
                                                                <?}else{?>
                                                                @if(strtolower($country->iso)==$lang) selected @endif
                                                                <?}?>
                                                                data-id="{{$country->id}}">
                                                            {{$country->nicename}}
                                                        </option>
                                                        {{--@endif--}}
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="ship_states_select states_select_mob states_select"></div>
                                        <div class="form-group">
                                            <label for="ship_phone" class="shipping_form_label">{{$L->__('PHONE')}} *
                                                <input type="tel" id="ship_phone" name="phone"
                                                       class="take_val form-control shipping_form_input num"
                                                       placeholder="{{$L->__('phone1')}}"
                                                       value="{{$customer->bill_phone or ''}}" reqiured
                                                       pattern="^[ 0-9\s\+\-]+$">
                                            </label>
                                        </div>
                                        <div class="form-group checkbox checkbox_mob">
                                            <input type="checkbox" name="checkbox" id="checkbox_same_data">
                                            <label for="checkbox_same_data">{{$L->__('Different data for bill to')}}</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 shipping__bill-title_mob">
                                        <div class="form_title">
                                            {{$L->__('BILL TO')}}
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 form_bill_to">
                                        <div class="form-group name_form_group" id="bill_full_name_section">
                                            <label for="bill_full_name" class="shipping_form_label">{{$L->__('FULL NAME')}}
                                                <input type="text" id="bill_full_name" name="fname_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('first name2')}}"
                                                       value="{{$customer->ship_first_name or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group" id="bill_full_name_section">
                                            <label for="bill_last_name" class="shipping_form_label">
                                                <input type="text" id="bill_last_name" name="lname_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('last name2')}}"
                                                       value="{{$customer->ship_last_name or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="bill_address" class="shipping_form_label">{{$L->__('ADDRESS_1111')}}
                                                <input type="text" id="bill_address" name="address_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('street, house')}}"
                                                       value="{{$customer->ship_address or ''}}" required>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="bill_zip"
                                                   class="shipping_form_label">{{$L->__('ZIP / POSTAL CODE')}}
                                                <input type="text" id="bill_zip" name="zip_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('postal code')}}"
                                                       value="{{$customer->ship_zip or ''}}" required >
                                                {{--pattern="^[ 0-9]+$"--}}
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="bill_city" class="shipping_form_label">{{$L->__('TOWN / CITY')}}
                                                <input type="text" id="bill_city" name="city_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('Capital')}}"
                                                       value="{{$customer->ship_city or ''}}" required>
                                            </label>
                                        </div>
                                        <?($L->lang == 'en') ? $lang = 'gb' : $lang = $L->lang?>
                                        <div class="form-group country_select">
                                            <label for="bill_country" class="shipping_form_label">{{$L->__('COUNTRY')}}
                                                <select name="country_billing" id="bill_country"
                                                        class="take_val shipping_form_input form-control">
                                                    @foreach($countries as $country)
                                                        {{--@if($country->nicename!='Australia')--}}
                                                        <option value="{{$country->iso}}"
                                                                <?if(session()->has('customer')){?>
                                                                @if($country->iso==$customer->bill_country) selected
                                                                @endif
                                                                <?}else{?>
                                                                @if(strtolower($country->iso)==$lang) selected @endif
                                                                <?}?>
                                                                data-id="{{$country->id}}">
                                                            {{$country->nicename}}
                                                        </option>
                                                        {{--@endif--}}
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group states_select states_select_mob bill_states_select"></div>
                                        <div class="form-group">
                                            <label for="bill_phone" class="shipping_form_label">{{$L->__('PHONE')}}
                                                <input type="tel" id="bill_phone" name="phone_billing"
                                                       class="take_val shipping_form_input form-control"
                                                       placeholder="{{$L->__('phone2')}}"
                                                       value="{{$customer->ship_phone or ''}}" required
                                                       pattern="^[ 0-9\s\+\-]+$">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 shipping__submit form_order form">
                                        <input type="submit" class="submit_order submit_btn" name="registry_btn"
                                               id="submit_btn" value="{{$L->__('Submit2')}}">
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>

                        </div>
                    </div>
                    {{--payment--}}
                    <form action="/finish_order" method="post" id="shipping_form_last"
                          class="proceed_order_form col-xs-12">
                        {{csrf_field()}}
                        <div class="row">
                            <input type="hidden" name="lang" value="{{$L->lang}}">
                            @foreach(session('updated_cart')['prod_id'] as $prod_id=>$quantity)
                                <input type="hidden" name="quantity[{{$prod_id}}]" value="{{$quantity}}">
                            @endforeach
                            <div class="hidden_inputs"></div>
                            <div class="col-xs-12 shipping__payment">
                                <div id="terms_of_service">{{$L->__('Payment methods')}}</div>
                                <?$prodId = session()->all()['updated_cart']['prod_id'];?>
                                <div class="row">
                                    <div class="col-sm-6 col-xs-12">
                                        <div id="shipment_information">{{$L->__('SHIPMENT INFORMATION')}}</div>
                                        <div class="shipment_radio_rwm relative">
                                            <input type="radio" name="shipment" id="rwm" value="rww" checked>
                                            <label for="rwm" class="radio-inline">
                                                @if(count($prodId)==1 && isset($prodId["'2002'"]))
                                                    {{$L->__('Registered Worldwide registered mail. Delivery time is 5-21 business days. Delivery is free')}}
                                                @else
                                                    {{$L->__('Registered Worldwide registered mail. Delivery time is 5-21 business days. Free for orders of €99.00 and above. (Discount/Fee: €10.00)')}}
                                                @endif
                                            </label>
                                        </div>
                                        @if(count($prodId)==1 && isset($prodId["'2002'"]))
                                        @else
                                            <div class="shipment_radio_ems relative">
                                                <input type="radio" name="shipment" id="ems" value="ems">
                                                <label for="ems" class="radio-inline">
                                                    {{$L->__('EMS WorldwideEMS - EXPRESS shipping available for an additional charge. DELIVERY TIMES (excludes customs delays) AMERICA - 3 BUSINESS DAYS EUROPE - 3 BUSINESS DAYS ASIA - 3 BUSINESS DAYS AUSTRALIA - 5 BUSINESS DAYS (Discount/Fee: €45.00) ')}}
                                                </label>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div id="payment">{{$L->__('PAYMENT')}}</div>
                                        <div class="cards_sec">
                                            <input type="radio" id="cards" value="credit_cart" name="payment" checked>
                                            <label for="cards"
                                                   class="checkbox-inline">{!!$img->__('cards.jpg')!!}</label>
                                        </div>
                                        <div class="paypal_sec">
                                            <input type="radio" id="paypal" value="paypal" name="payment">
                                            <label for="paypal"
                                                   class="checkbox-inline paypal_label">{!!$img->__('paypal.jpg')!!}</label>
                                        </div>

                                    </div>
                                    <div class="col-xs-12">
                                        <div id="notes">{{$L->__('NOTES AND SPECIAL REQUESTS')}}</div>
                                        <textarea name="notes" id="notes_textarea"></textarea>
                                    </div>
                                    <div class="col-sm-6 col-xs-12 checkbox_padding">
                                        <div class="form-group checkbox form-group_terms-of-use">
                                            <input type="checkbox" name="terms" id="terms_check" class="terms">
                                            <label for="terms_check" class="terms_text">
                                                {{$L->__('I agree to the Terms of Service')}} (<a
                                                        href="{{url($L->lang.'/'.$L->__('terms-of-use'))}}">{{$L->__('Terms of Service_a')}}</a>)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div id="submit_shipping_form">
                                            <div class="flex">
                                                <div class="margin_auto">
                                                    <div class="relative">
                                                        {!!$img->__('purchase.png')!!}
                                                        <div onclick="analitics();
                                                            if($('#terms_check').is(':checked')){
                                                                fbq('track', 'Lead', {
                                                                value: '{{$order_cost}}',
                                                                currency: '{{($L->currency=="&euro;")?"€":$L->currency}}'
                                                                });
                                                            }
                                                        " id="submit_shipping_form_text">

                                                            {{$L->__('CONFIRM PURCHASE')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{--BOTTOM BANER--}}
            <div class="col-xs-12 bottom_banner">
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 col-xs-12 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                @if ($L->lang == 'ru')
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
                            <div class="clearfix"></div>
                        </a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item result_section col-lg-3 col-sm-6 col-xs-12 relative">
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
                    <div class="prod_prefooter_item contact_section col-lg-3 col-sm-6 col-xs-12 relative">
                        <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="prod_prefooter_item local_store_section col-lg-3 col-sm-6 col-xs-12 relative">
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
    </div>


@endsection

@section('footer')



    {{--<script src="/js/validator.js"></script>--}}
    <script>
        $('.modal_email_used').modal('show');
    </script>
    <script src="/js/shipping.js"></script>

    <script>
        function getTotalCost() {
                    <?if(session()->has('discount') && session('discount') != 'false'){?>
            var rate = <?=session('discount')->rate?>;
            var unit = '%';
                    <?}elseif(session()->has('discount_api')){?>
            var rate = <?=session('discount_api')->value?>;
            var unit = '<?=session('discount_api')->unit?>';
                    <?}else{?>
            var rate = 0;
            var unit = '%';
                    <?}?>

            var a = 0;
            var b;

            if (unit != '%') {

                $('.sub_total').each(function () {
                    a += parseFloat($(this).text());
                });
                if (a > 49) {
                    a = a - rate;
                } else {
                    $('.modal_low_price_2').modal('show');
                }

            } else {
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
        $(window).on('resize load', function () {
            if ($(document).height() <= $(window).height()) {
                $("footer").addClass("navbar-fixed-bottom");
                $('.first_time').css('z-index', '2000');
                $('.prod_prefooter').addClass("navbar-fixed-bottom").css({
                    'bottom': '130px',
                    'left': 'auto',
                    'right': 'auto'
                });
            } else {
                $("footer").removeClass('navbar-fixed-bottom');
                $('.prod_prefooter').removeClass("navbar-fixed-bottom").css({
                    'bottom': 'auto',
                    'left': 'auto',
                    'right': 'auto'
                });
            }
        });
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
                data: {key: key}
            })
        }
        function removeOneTo(key) {
            $.ajax({
                method: "POST",
                url: "/admin/removeOneTo",
                data: {key: key}
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

    @if(session()->has('customer'))
        <script>
            $('.shipping__first-stage').removeClass('active');
            $('.shipping__first-stage').addClass('old-active');
            $('.shipping__second-stage').addClass('active');
            $('.shipping__registry').hide();
            $('.shipping__order').show();

            if( $('.form_bill_to').css('display') == 'none') {
                var columnHeight = $('.form_ship_to').height();
                $('.form_order').css('height', columnHeight).addClass('bottom_btn');
            }
        </script>
    @endif



    <script type="text/javascript">
        /* <![CDATA[ */
        goog_snippet_vars_2 = function() {
            var w = window;
            w.google_conversion_id = 989755504;
            w.google_conversion_label = "nBTPCOatrnIQ8PD51wM";
            w.google_remarketing_only = false;
        };
        goog_snippet_vars_1 = function() {
            var w = window;
            w.google_conversion_id = 989755504;
            w.google_conversion_label = "Ry4SCKDTumgQ8PD51wM";
            w.google_remarketing_only = false;
        };
        // DO NOT CHANGE THE CODE BELOW.
        goog_report_conversion = function(url, num) {
            if(num==1){
                goog_snippet_vars_1();
            }if(num==2){
                goog_snippet_vars_2();
            }
            window.google_conversion_format = "3";
            var opt = new Object();
            opt.onload_callback = function() {
                if (typeof(url) != 'undefined') {
                    //window.location = url;
                }
            };
            var conv_handler = window['google_trackConversion'];
            if (typeof(conv_handler) == 'function') {
                conv_handler(opt);
            }
        };

        /* ]]> */
    </script>
    <script type="text/javascript"
            src="//www.googleadservices.com/pagead/conversion_async.js">
    </script>

    <script>
        function analitics(){
            if($('#terms_check').is(':checked')){
                goog_report_conversion('https://www.psoeasy.com/{{$page->lang}}/{{$page->seo_url}}',2);
            }
        }
    </script>
    <script>
        function statistic1() {
            var i = 0;//counter
            $('.reg_form_desk .wrap_in').each(function () {
                var value = $(this).children('input').is(':valid');
                if (value == false){
                    i++;
                }
            });
            if(i == 0){
                goog_report_conversion('https://www.psoeasy.com/{{$page->lang}}/{{$page->seo_url}}',1);
            }
        }
    </script>

    <script>

        $('.paypal_label').click(function () {
            $('.paypal_modal').modal('show');
        });
        $('#paypal').click(function () {
            $('.paypal_modal').modal('show');
        });

    </script>

@endsection
