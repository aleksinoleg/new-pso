<?
/* get orders for customer */
if(session()->has('customer')){
    $post = [
        'id'=>session()->get('customer')->id,
        'site_url'=>$_SERVER['SERVER_NAME']
    ];

    $str = http_build_query($post, '', '&');
    $cc = new \App\Http\Controllers\CustomerController();
    $res = $cc->api_curl_send(env('ORDERS_URL').'/get_customer_orders', $str);

    $orders = unserialize($res);
//            dd($data['orders']);
    foreach($orders as $order){
        if(isset($order)){
            foreach($order->prod as $prod){
                if(isset($prod)){
                    $prod->page = App\Page::find($prod->prod_id);
                }
            }
        }
    }
}
$countries = \App\Country::all();
?>



    <style>
        .mar_10{
            margin-bottom: 10px;
        }
        .shipping_id{
            background: #FFC758;
            margin: 50px 20px 0 20px;
            line-height: 30px
        }
        .shipping_id_mob{
            background: #FFC758;
            margin: 0 10px 0 0;
            line-height: 30px;
            font-size: 12px;
        }
        .tip_question{
            position: absolute;
            top:0;
            right: 0;
            width: 310px;
            background: #FFC758;
            color: #333;
            text-align: left;
            padding: 0 10px;
            height: 82px;
            line-height: 1.5;
            display: none;
        }
        @media only screen and (max-width: 992px) and (min-width: 768px){
            .account_tab ul li{
                width: 12%;
            }
            .shipping_id{
                margin: 50px 0 0 0;
                font-size: 13px;
            }

        }
        @media only screen and (max-width: 767px){
            .tip_question{
                position: absolute;
                top:0;
                right: 0;
                width: calc(100vw - 70px);
                background: #FFC758;
                color: #333;
                text-align: left;
                padding: 0 10px;
                height: 82px;
                display: none;
            }
        }


    </style>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="account_logo">
                    {{$L->__('My account')}}
                </div>
                <div class="account_login">
                    <a href="/admin/customer_logout">{{$L->__('Logout')}}</a>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                </div>
            </div>

            <div class="col-xs-12 account_content">
                <div class="account_tab">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#orders" aria-controls="home" role="tab" data-toggle="tab">{{$L->__('Home_tab')}}</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{$L->__('Profile_tab')}}</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="orders">
                            <div class="orders_menu">
                                <ul>
                                    <li class="order">{{$L->__('Order id')}}</li>
                                    <li class="product_name">{{$L->__('Product name1')}}</li>
                                    <li>{{$L->__('Order status')}}</li>
                                    <li>{{$L->__('Total cost')}}</li>
                                    <li>{{$L->__('Shipping id')}}</li>
                                    <div class="clearfix"></div>
                                </ul>
                            </div>
                            <div class="orders_product">
                                @foreach($orders as $key=>$item)

                                    <ul class="desktop_nav" style="height: auto">
                                        <?$h = 130*count($item->prod)?>
                                        <li class="order" style="line-height: 130px">{{$item->order_id}}</li>
                                            <div class="product_name_wrap">
                                            @foreach($item->prod as $product)
                                                <li class="product_name">
                                                    {!!$img->__($product->SKU.'_basket.jpg', 'order_prod_img')!!}
                                                    <div class="prod_title">
                                                        {{$product->prod_name}}
                                                    </div>
                                                    <div class="prod_desc">
                                                        {{$L->__($product->SKU.' product short description')}}
                                                    </div>
                                                </li>
                                            @endforeach
                                            </div>
                                        <li class="payment">
                                            <div class="pending flex" style="padding: 0; @if($item->order_status == 'pending') line-height: 1.5; @endif">
                                                    <div class="margin_auto">

                                                        <div style="display: inline-block; margin-bottom: 5px; @if($item->order_status == 'pending') margin-top: 15px; @endif">
                                                            {{$item->order_status}}
                                                            @if($item->order_status == 'shipped')
                                                                <div style="position: absolute; line-height: 1.2; bottom: 80px; left: 45px">{{$item->updated_at->format('d-m-Y')}}</div>
                                                            @endif
                                                        </div>
                                                        @if($item->order_status == 'pending')
                                                            <div class="pending_wrap">
                                                                    <a href="/admin/pay-order/cart/{{$item->id}}">
                                                                        <span class="pay">{{$L->__('pay cart')}}</span>
                                                                    </a>
                                                                    <a href="/admin/pay-order/paypal/{{$item->id}}">
                                                                        <span class="pay">{{$L->__('pay pal')}}</span>
                                                                    </a>
                                                            </div>
                                                        @endif

                                                    </div>
                                            </div>
                                            <span class="paid" style="display: none">{{$item->order_status}}</span>
                                        </li>
                                        <li style="line-height: 130px">
                                            {{$L->currency}}. <span class="unit_price">{{sprintf("%01.2f",$item->total_cost)}}</span>
                                        </li>
                                        <li style="line-height: 130px; font-size: 14px">
                                            @if(strlen($item->shipping_id)>0)

                                                <div style="" class="relative shipping_id">
                                                    <a style="color: #333; text-decoration: underline" href="https://www.17track.net/en/track?nums={{$item->shipping_id}}" target="_blank" rel="nofollow">
                                                        {{$item->shipping_id}}
                                                    </a>
                                                    <div style="position: absolute; top: -18px; right: -12px;cursor: pointer" class="question_btn">
                                                        <img src="/img/question_account.png" alt="question_account">
                                                    </div>
                                                    <div class="tip_question" style="position: absolute; top:0; right: 0; width: 310px; background: #FFC758; color: #333; text-align: left; padding: 0 10px; height: 82px;">
                                                        {{$L->__('tip_question_text')}}
                                                        <div style="position: absolute; top: -18px; right: -12px;cursor: pointer" class="close_btn">
                                                            <img src="/img/close_account.png" alt="question_account">
                                                        </div>
                                                    </div>
                                                </div>

                                            @endif
                                        </li>
                                        <div class="clearfix"></div>
                                    </ul>
                                    <ul class="mob_nav">
                                        <div class="top_section">
                                            <li class="order"><span>{{$item->order_id}}</span></li>
                                            @if($item->order_status == 'pending')
                                                <div class="pending pending_wrap">
                                                    <a href="/admin/pay-order/cart/{{$item->id}}">
                                                        <span class="pay">{{$L->__('pay cart')}}</span>
                                                    </a>
                                                    <a href="/admin/pay-order/paypal/{{$item->id}}">
                                                        <span class="pay">{{$L->__('pay pal')}}</span>
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="clearfix"></div>
                                            <div class="bottom_section">
                                                <li><span class="title">{{$L->__('Bestellstatus')}}</span>
                                                    <span class="pending"><span style="font-size: 13px">{{$item->order_status}}</span></span>
                                                    @if($item->order_status == 'shipped')
                                                        <div style="font-size: 13px">{{$item->updated_at->format('d-m-Y')}}</div>
                                                    @endif
                                                    <span class="paid" style="font-size: 13px;display: none">{{$item->order_status}}</span>
                                                </li>
                                                <li>
                                                    <span class="title">{{$L->__('Gersamtbetrag')}}</span>{{$L->currency}}. <span class="unit_price" style="font-size: 13px">{{sprintf("%01.2f",$item->total_cost)}}</span>
                                                </li>
                                                <li>
                                                    <span class="title" style="text-align: left">{{$L->__('Versand id')}}</span>
                                                    @if(strlen($item->shipping_id)>0)
                                                        <div style="" class="relative shipping_id_mob">
                                                            <a style="color: #333; text-decoration: underline" href="https://www.17track.net/en/track?nums={{$item->shipping_id}}" target="_blank" rel="nofollow">
                                                                {{$item->shipping_id}}
                                                            </a>
                                                            <div style="position: absolute; top: -18px; right: -12px;cursor: pointer" class="question_btn">
                                                                <img src="/img/question_account.png" alt="question_account">
                                                            </div>
                                                            <div class="tip_question" style="">
                                                                {{$L->__('tip_question_text')}}
                                                                <div style="position: absolute; top: -18px; right: -12px;cursor: pointer" class="close_btn">
                                                                    <img src="/img/close_account.png" alt="question_account">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </li>
                                                <div class="clearfix"></div>
                                            </div>
                                            @foreach($item->prod as $product)
                                                <li class="product_name">
                                                    {!!$img->__($product->SKU.'_basket.jpg', 'order_prod_img')!!}
                                                    <div class="prod_title">
                                                        {{$product->prod_name}}
                                                    </div>
                                                    <div class="prod_desc">
                                                        {{$L->__($product->SKU.' product short description')}}
                                                    </div>
                                                </li>
                                             @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        {{--{{dd(session('customer'))}}--}}
                        <div role="tabpanel" class="tab-pane fade" id="profile">
                            <form action="{{url('/admin/update-customer/'.session('customer')->id)}}" method="post">
                                {{csrf_field()}}
                            <div class="row">
                                <div class="passport">
                                    <div class="col-xs-12">
                                        <div class="form-group" id="form-title">
                                            <label for="passport_id">{{$L->__('New password_1')}}</label>
                                            <input type="password" name="password" id="passport_id" placeholder="{{$L->__('new password_2')}}">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="my_profile">
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form_title">
                                            {{$L->__('BILL TO')}}
                                        </div>
                                        <div class="form-group" id="ship_full_name_section">
                                            <label for="ship_full_name" class="shipping_form_label">{{$L->__('FULL NAME')}}
                                                <input type="text" id="ship_full_name" name="fname" class="shipping_form_input"
                                                       placeholder="{{$L->__('first name one')}}" value="{{session('customer')->bill_first_name}}">
                                                <input type="text" name="lname" class="shipping_form_input"
                                                       placeholder="{{$L->__('last name')}}" value="{{session('customer')->bill_last_name}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_address" class="shipping_form_label">{{$L->__('ADDRESS')}}
                                                <input type="text" id="ship_address" name="address" class="shipping_form_input"
                                                       placeholder="{{$L->__('street, house')}}" value="{{session('customer')->bill_address}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_zip" class="shipping_form_label">{{$L->__('ZIP / POSTAL CODE')}}
                                                <input type="text" id="ship_zip" name="zip" class="shipping_form_input"
                                                       placeholder="{{$L->__('postal code')}}" value="{{session('customer')->bill_zip}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_city" class="shipping_form_label">{{$L->__('TOWN / CITY')}}
                                                <input type="text" id="ship_city" name="city" class="shipping_form_input"
                                                       placeholder="{{$L->__('Capital')}}" value="{{session('customer')->bill_city}}">
                                            </label>
                                        </div>
                                        <?($L->lang=='en')?$lang = 'gb':$lang = $L->lang?>
                                        <div class="form-group">
                                            <label for="ship_country" class="shipping_form_label">{{$L->__('COUNTRY')}}
                                                <select name="country" id="ship_country" class="shipping_form_input">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->iso}}"
                                                                @if($country->iso==session('customer')->bill_country) selected @endif
                                                                data-id="{{$country->id}}">
                                                            {{$country->nicename}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group ship_states_select"></div>
                                        <div class="form-group">
                                            <label for="ship_phone" class="shipping_form_label">{{$L->__('PHONE')}}
                                                <input type="text" id="ship_phone" name="phone" class="shipping_form_input"
                                                       placeholder="{{$L->__('phone one')}}" value="{{session('customer')->bill_phone}}">
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-xs-12">
                                        <div class="form_title" style="
                                            background: #D4EEFB;
                                            margin-left: -20px;
                                            margin-right: -20px;
                                            font-size: 18px;
                                            font-weight: bold;
                                            text-align: center;
                                            ">
                                            {{$L->__('SHIP TO')}}
                                        </div>
                                        <div class="form-group" id="ship_full_name_section">
                                            <label for="ship_full_name" class="shipping_form_label">{{$L->__('FULL NAME')}}
                                                <input type="text" id="ship_full_name" name="fname_shipping" class="shipping_form_input"
                                                       placeholder="{{$L->__('first name one')}}" value="{{session('customer')->ship_first_name}}">
                                                <input type="text" name="lname_shipping" class="shipping_form_input"
                                                       placeholder="{{$L->__('last name')}}" value="{{session('customer')->ship_last_name}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_address" class="shipping_form_label">{{$L->__('ADDRESS')}}
                                                <input type="text" id="ship_address" name="address_shipping" class="shipping_form_input"
                                                       placeholder="{{$L->__('street, house')}}" value="{{session('customer')->ship_address}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_zip" class="shipping_form_label">{{$L->__('ZIP / POSTAL CODE')}}
                                                <input type="text" id="ship_zip" name="zip_shipping" class="shipping_form_input"
                                                       placeholder="{{$L->__('postal code')}}" value="{{session('customer')->ship_zip}}">
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <label for="ship_city" class="shipping_form_label">{{$L->__('TOWN / CITY')}}
                                                <input type="text" id="ship_city" name="city_shipping" class="shipping_form_input"
                                                       placeholder="{{$L->__('Capital')}}" value="{{session('customer')->ship_city}}">
                                            </label>
                                        </div>
                                        <?($L->lang=='en')?$lang = 'gb':$lang = $L->lang?>
                                        <div class="form-group">
                                            <label for="ship_country_2" class="shipping_form_label">{{$L->__('COUNTRY')}}
                                                <select name="country_shipping" id="ship_country_2" class="shipping_form_input">
                                                    @foreach($countries as $country)
                                                        <option value="{{$country->iso}}"
                                                                @if($country->iso==session('customer')->ship_country) selected @endif
                                                                data-id="{{$country->id}}">
                                                            {{$country->nicename}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                        </div>
                                        <div class="form-group ship_states_select_2"></div>
                                        <div class="form-group">
                                            <label for="ship_phone" class="shipping_form_label">{{$L->__('PHONE')}}
                                                <input type="text" id="ship_phone" name="ship_phone" class="shipping_form_input"
                                                       placeholder="{{$L->__('phone one')}}" value="{{session('customer')->ship_phone}}">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 button_save">
                                        <div class="form-group">
                                            <input type="submit" name="save" value="{{$L->__('save1')}}">
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            {{--BOTTOM BANER--}}
            <div class="col-xs-12 bottom_banner">
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                <div class="free_delivery_text_l1">
                                    {{$L->__('FREE DELIVERY')}}
                                </div>
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
                        @if ($L->lang == 'cz')
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}"  style="max-width: 100%;"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>
                                <div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">
                                    <div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>
                                    <div class="local_store_text_l2" style="font-size: 16px;">{{$L->__('STORE FINDER')}}</div>
                                </div>
                                <div class="clearfix"></div></a>
                        @else
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>
                                <div class="local_store_text float_left">
                                    <div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>
                                    <div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>
                                </div>
                                <div class="clearfix"></div></a>
                        @endif
                        <div class="prod_prefooter_item_hover"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


