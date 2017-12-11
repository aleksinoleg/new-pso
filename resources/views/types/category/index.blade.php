<?
$long_desc = explode('***', $page->long_desc);
$cat_id = explode('/',$page->real_url);
switch (end($cat_id)){
    case 1:
        $arr = [24,1,2,3];
        break;
    case 2:
        $arr = [25,4,5];
        break;
    case 3:
        $arr = [29,2,3];
        break;
    case 4:
        $arr = [30,2,35,3];
        break;
    case 5:
        $arr = [33,2,35,3];
        break;
    case 6:
        $arr = [34,1,3];
        break;
    case 24:
        $arr = [37,2,35,3];
        break;
    default:
        $arr = [1,2,3,4,5];
        break;
}
$cat_products = [];
foreach ($arr as $item) {
    $cat_products[] = $pages->where('real_url','/'.$L->lang.'/product/'.$item)->first();
}

?>

@extends('layouts.default_wrapper')
@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <style>
        h1{
            font-size: 36px;
            text-align: center !important;
            color: #305c07 !important;
            font-family: "Century Gothic Regular Bold" !important;
        }
        .col-md-4 .category_title{
            height: 82px;
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 left_warp">
                <div class="breadcrumbs">
                    <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="category">
                    <div class="social_block social_block_hidden">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <h1>{{$page->title}}</h1>
                    <p>{!! $page->short_desc !!}</p>
                    <div class="sub_title" style="
                    width: 100%;
                    background: #0A5A8B;
                    text-align: center;
                    color: #fff;
                    font-size: 16px;
                    padding: 5px;
                    ">{{$L->__($page->id.'_sub_title')}}</div>
                    <div class="row">
                        <?
                        //Prices
                        $flag = 0; $sum_prices = 0;
                        foreach($cat_products as $product)

                            if ($flag != 0)
                                $sum_prices = $sum_prices + $product->prices[0]->price;
                            else
                                $flag = 1;
                           $flag = 0;
                        ?>
                        @foreach($cat_products as $product)
                            <div class="{{($flag==0)?'col-xs-12 product_package':'col-md-4 col-xs-12'}}">

                                <div class="card_product">
                                    @if($product->prices[0]->price > 99)
                                        {!!$img->__('free_shipping.png', 'free_shipping_img')!!}
                                    @endif
                                    <div class="category_title"
                                         style="
                                         padding-left: 5px;
                                         padding-right: 5px
                                         ">{{$product->link_name}}</div>
                                    <div class="product_stars">
                                        {!!$img->__('star_product_full.png')!!}
                                        {!!$img->__('star_product_full.png')!!}
                                        {!!$img->__('star_product_full.png')!!}
                                        {!!$img->__('star_product_full.png')!!}
                                        {!!$img->__('star_product_full.png')!!}
                                    </div>
                                    <div style="text-align: center;">{{($flag==0)?$L->__($page->id.'_components'):''}}</div>
                                    <div class="product_img">
                                        {!!($flag==0)?$img->__($product->prod_id.'_1_cat.jpg'):$img->__($product->prod_id.'_1.jpg')!!}
                                        <div class="description">
                                            {{$L->__($product->prod_id.' product short description')}}
                                        </div>
                                    </div>
                                    @if($flag != 0)
                                        <div class="product_price">{{$L->__('Price:')}}
                                            <span>{{$L->currency}} {{sprintf("%01.2f",$product->prices[0]->price)}}</span>
                                        </div>
                                        <div class="product_button" style="width: 100%">
                                            <div class="flex" style="margin-bottom: 10px">
                                                <div class="margin_auto">
                                                    <a href="{{url($L->lang.'/'.$L->__($product->seo_url))}}" style="color: #fff"><div class="more_info">{{$L->__('More info')}}</div></a>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="margin_auto">
                                                    @if ($L->lang == 'ru')
                                                        <div class="add_to_basket add_to_basket_ru" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add_to_basket_cat')}}</div>
                                                    @else
                                                        <div class="add_to_basket" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add_to_basket_cat')}}</div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <div class="product_price">{{$L->__('Price:')}}
                                            <span class="old_price">{{$L->currency}} {{sprintf("%01.2f",$sum_prices)}}</span>
                                            <span class="new_price">{{$L->currency}} {{sprintf("%01.2f",$product->prices[0]->price)}}</span>
                                        </div>
                                        <div class="product_button flex" style="width: 100%">
                                            <div class="margin_auto">
                                                @if ($L->lang == 'ru')
                                                    <div class="add_to_basket add_to_basket_ru" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add_to_basket_cat')}}</div>
                                                @else
                                                    <div class="add_to_basket" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add_to_basket_cat')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @if ($flag==0) <div class="col-xs-12">{!! ($flag==0)? $long_desc[0] :''!!}</div> @endif
                            <? $flag = 1;?>
                        @endforeach
                    </div>
                    <p>{!! $long_desc[1] or '' !!}</p>
                </div>
            </div>

            {{--RIGHT SIDE BAR--}}
            <div class="col-lg-3 col-md-4 col-sm-5 right_warp">
                <div class="right_sidebar right_sidebar_1">
                    <div class="social_block">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <a href="{{url($L->lang.'/'.$L->__('over-20-natural-active-ingredients'))}}">
                        {!!$img->__($L->lang.'_psoriasis_treatment.jpg')!!}
                    </a>
                    {{--<div class="banner_right_2">--}}
                    {{--<a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}">--}}
                    {{--{!!$img->__($L->lang.'_client.jpg')!!}--}}
                    {{--</a>--}}
                    {{--</div>--}}
                    <div class="dsp_video" style="margin-top: 20px;">
                        <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <div class="faq_category right-block_category">
                        @if ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'1')
                            <div class="faq_title cat_title">{{$L->__('FAQs_1')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                            @if ($i == 1)
                                <div class="faq_cat_ans active">
                                    <span>{{$L->__('Question_body_'.$i)}}</span>
                                    <span class="plus">+</span>
                                    <span class="minus">-</span>
                                </div>
                                <div class="faq_cat_q first">
                                    <span>{{$L->__('Answer_body_'.$i)}}</span>
                                </div>
                            @else
                                <div class="faq_cat_ans">
                                    <span>{{$L->__('Question_body_'.$i)}}</span>
                                    <span class="plus">+</span>
                                    <span class="minus">-</span>
                                </div>
                                <div class="faq_cat_q">
                                    <span>{{$L->__('Answer_body_'.$i)}}</span>
                                </div>
                            @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'2')
                            <div class="faq_title cat_title">{{$L->__('FAQs_2')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_scalp_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_scalp_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_scalp_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_scalp_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'3')
                            <div class="faq_title cat_title">{{$L->__('FAQs_3')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_nails_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_nails_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_nails_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_nails_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'4')
                            <div class="faq_title cat_title">{{$L->__('FAQs_4')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_knee_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_knee_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_knee_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_knee_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'5')
                            <div class="faq_title cat_title">{{$L->__('FAQs_5')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_foot_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_foot_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_foot_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_foot_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'6')
                            <div class="faq_title cat_title">{{$L->__('FAQs_6')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_child_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_child_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_child_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_child_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @elseif ($page->real_url == '/'.$L->lang.'/'.'category'.'/'.'24')
                            <div class="faq_title cat_title">{{$L->__('FAQs_7')}}</div>
                            @for($i = 1; $i <= 5; $i++)
                                @if ($i == 1)
                                    <div class="faq_cat_ans active">
                                        <span>{{$L->__('Question_face_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q first">
                                        <span>{{$L->__('Answer_face_'.$i)}}</span>
                                    </div>
                                @else
                                    <div class="faq_cat_ans">
                                        <span>{{$L->__('Question_face_'.$i)}}</span>
                                        <span class="plus">+</span>
                                        <span class="minus">-</span>
                                    </div>
                                    <div class="faq_cat_q">
                                        <span>{{$L->__('Answer_face_'.$i)}}</span>
                                    </div>
                                @endif
                            @endfor
                        @endif
                    </div>
                    @if ( isset($product->reviews[0]) )
                    <div class="reviews_category right-block_category" style="margin-bottom: 0;">
                        <div class="reviews_title cat_title">{{$L->__('Our customer reviews')}}</div>
                        <div class="reviews_content">

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <? $flag = 0;?>
                                    @foreach($cat_products as $product)
                                        @if ($flag == 1 && isset($product->reviews[0]))
                                            <div class="item active">
                                                <?
                                                $comment_arr = explode(' ', $product->reviews[0]->comment);
                                                if(count($comment_arr) > 25){
                                                    $comment_arr = array_slice($comment_arr, 0, 25);
                                                }
                                                $text = implode(' ', $comment_arr);
                                                ?>
                                                <div class="item_inner_wrap">
                                                <div class="img_wrap">
                                                    {!!$img->__($product->prod_id.'_1_small.jpg')!!}
                                                    <div class="prod_name">{{$product->title}}</div>
                                                    <div class="review_stars">
                                                        <? $rate_temp = $product->reviews[0]->rate?>
                                                        @for($i=0;$i<5;$i++)
                                                            @if($rate_temp>=1)
                                                                {!!$img->__('star_product_full.png')!!}
                                                            @endif
                                                            @if($rate_temp<0.5)
                                                                {!!$img->__('star_product_empty.png')!!}
                                                            @endif
                                                            @if($rate_temp>=0.5&&$rate_temp<1)
                                                                {!!$img->__('star_product_half.png')!!}
                                                            @endif
                                                            <?php $rate_temp--?>
                                                        @endfor
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <p class="comment">{{$text}} . . .</p>
                                                <p class="author">{{$product->reviews[0]->name}}</p>
                                                </div>
                                                <a class="view_all_reviews" href="{{url($L->lang.'/'.$L->__($product->prod_id.'_review_link'))}}" target="_blank" title="{{$L->__('view all reviews btn_title')}}">
                                                    <div>{{$L->__('view all reviews')}}</div>
                                                </a>
                                            </div>
                                            <?$flag++;?>
                                        @elseif ($flag != 0 && isset($product->reviews[0]))
                                                <div class="item">
                                                    <?
                                                    $comment_arr = explode(' ', $product->reviews[0]->comment);
                                                    if(count($comment_arr) > 28){
                                                        $comment_arr = array_slice($comment_arr, 0, 28);
                                                    }
                                                    $text = implode(' ', $comment_arr);
                                                    ?>
                                                    <div class="item_inner_wrap">
                                                    <div class="img_wrap">
                                                        {!!$img->__($product->prod_id.'_1_small.jpg')!!}
                                                        <div class="prod_name">{{$product->title}}</div>
                                                        <div class="review_stars">
                                                            <? $rate_temp = $product->reviews[0]->rate?>
                                                            @for($i=0;$i<5;$i++)
                                                                @if($rate_temp>=1)
                                                                    {!!$img->__('star_product_full.png')!!}
                                                                @endif
                                                                @if($rate_temp<0.5)
                                                                    {!!$img->__('star_product_empty.png')!!}
                                                                @endif
                                                                @if($rate_temp>=0.5&&$rate_temp<1)
                                                                    {!!$img->__('star_product_half.png')!!}
                                                                @endif
                                                                <?php $rate_temp--?>
                                                            @endfor
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <p class="comment">{{$text}} . . .</p>
                                                    <p class="author">{{$product->reviews[0]->name}}</p>
                                                    </div>
                                                    <a class="view_all_reviews" href="{{url($L->lang.'/'.$L->__($product->prod_id.'_review_link'))}}" target="_blank" title="{{$L->__('view all reviews btn_title')}}">
                                                        <div>{{$L->__('view all reviews')}}</div>
                                                    </a>
                                                </div>
                                            @else
                                            <?$flag++;?>
                                        @endif
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="left" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                <a class="right" href="#carousel-example-generic" role="button" data-slide="next"></a>
                            </div>
                        </div>
                    </div>
                    @endif
                    {{--<div class="banner_right_1">--}}
                        {{--@if ($page->real_url == '/'.$L->lang.'/category/2')--}}
                            {{--<a href="{{url($L->lang.'/'.$L->__('package-for-scepticals_2'))}}">--}}
                                {{--{!!$img->__($L->lang.'_sceptical.png')!!}--}}
                            {{--</a>--}}
                        {{--@else--}}
                            {{--<a href="{{url($L->lang.'/'.$L->__('package-for-scepticals'))}}">--}}
                                {{--{!!$img->__($L->lang.'_sceptical.png')!!}--}}
                            {{--</a>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                </div>
            </div>
        </div>
    </div>
    {{--BOTTOM BANER--}}
    <div class="container">
        <div class="row">
            <div class="prod_prefooter">
                <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                    <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                        <div class="free_delivery_img float_left">
                            {!!$img->__('delivery.png')!!}
                        </div>
                        <div class="free_delivery_text float_left">
                            @if($L->lang == 'ru')
                                <div class="free_delivery_text_l1" style="font-size: 15px; padding-top: 8px;">
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

@endsection

@section('footer')
    <script>
        var free = $('.card_product img').hasClass('free_shipping_img');

            if (free == true) {
                $('.col-md-12 .product_stars').addClass('product_stars_free');
            }
    </script>

    <script>
        //how it works, column of the same height
        function setEqualHeight(columns)
        {
            var tallestcolumn = 0;
            columns.each(
                function()
                {
                    currentHeight = $(this).height();
                    if(currentHeight > tallestcolumn)
                    {
                        tallestcolumn = currentHeight;
                    }
                }
            );
            columns.height(tallestcolumn);
            tallestcolumn = 0;
        }

        $(window).on("resize load", function () {
                setEqualHeight($(".how_it_works_block .how_photo"));
        });
    </script>

    <script>
        //faq answer and questions
        $(document).ready(function() {

            $('.faq_cat_ans').click(function () {
                if ( !$(this).hasClass('active') ){
                    $('.faq_cat_ans').removeClass('active').next('div').slideUp(100);
                    $(this).addClass('active');
                    $(this).next('div').slideDown(200);
                } else{
                    $(this).removeClass('active').next('div').slideUp(100);
                }
            });
        });
    </script>

@endsection
