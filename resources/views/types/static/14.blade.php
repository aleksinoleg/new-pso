<?
$prods = [1, 2, 3, 4, 5, 35];
$packs = [24, 25, 29, 30, 33, 34, 37];
$packs_urls = [
        24=>$L->__('body_cat_link'),
        25=>$L->__('scalp_cat_link'),
        29=>$L->__('nails_cat_link'),
        30=>$L->__('knee_cat_link'),
        33=>$L->__('hand_cat_link'),
        34=>$L->__('children_cat_link'),
        37=>$L->__('face_cat_link')
];
$products = $pages->where('type','product')->all();
?>

@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <link rel="stylesheet" href="/css/products.min.css">
    <style>
        h1{
            font-size: 36px !important;
            text-align: center !important;
            color: #305c07 !important;
            font-family: "Century Gothic Regular Bold" !important;
        }

        .prod_prefooter{
            margin-top: 28px;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 col-xs-12 left_warp">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="category">
                    <h1>{{$page->title}}</h1>

                    <p>{!! $page->short_desc or ''!!}</p>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="category_name">
                                {{$L->__('Products')}}
                            </div>
                        </div>
                        @foreach($products as $product)
                            <?$prod_id = explode('/', $product->real_url);?>
                            @if(in_array(end($prod_id), $prods))
                                <div class="col-xs-12 col-md-4">
                                    <div class="card_product">
                                        <div class="category_title">{{$product->link_name}}</div>
                                        <div class="product_stars">
                                            <?php $rate_temp = $product->reviews->avg('rate')?>
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
                                        <div class="product_img">
                                            {!!$img->__($product->prod_id.'_1.jpg')!!}
                                            <div class="description description_lang">
                                                {{$L->__($product->prod_id.' product short description')}}
                                            </div>
                                        </div>
                                        <div class="product_price">{{$L->__('Price:')}}<span>{{$L->currency}} {{sprintf("%01.2f",$product->prices[0]->price)}}</span>
                                        </div>
                                        <div class="product_button" style="width: 100%">
                                            <div class="flex" style="margin-bottom: 10px;">
                                                <div class="margin_auto">
                                                    <a href="{{url($L->lang.'/'.$L->__($product->seo_url))}}" style="color: #fff"><div class="more_info">{{$L->__('More info')}}</div></a>
                                                </div>
                                            </div>
                                            <div class="flex">
                                                <div class="margin_auto">
                                                    @if ($L->lang == 'ru')
                                                        <div class="add_to_basket add_to_basket_ru" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add to basket1')}}</div>
                                                    @else
                                                        <div class="add_to_basket" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add to basket1')}}</div>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <div class="online-store__bottom-banner_mob col-xs-12">
                            <a href="{{url($L->__('cat_2_link'))}}">{!!$img->__($L->lang.'_shampoo_lotion_banner_mob.jpg')!!}</a>
                        </div>
                        <?$long_desc = explode("***", $page->long_desc)?>
                        <p>{!! $long_desc[0] !!}</p>

                        <div class="col-xs-12">
                            <div class="category_name">
                                {{$L->__('Packages')}}
                            </div>
                        </div>
                        @foreach($products as $product)
                            <?$prod_id = explode('/', $product->real_url);?>
                            @if(in_array(end($prod_id), $packs))
                                <div class="col-xs-12 col-md-4">
                                    <div @if($L->lang=='cz') class="card_product card_product_cz" @else class="card_product" @endif>
                                        @if ($L->lang == 'es')
                                            <div class="category_title">{{$product->link_name}}</div>
                                        @elseif ($L->lang == 'ru')
                                            <div class="category_title category_title_ru">{{$product->link_name}}</div>
                                        @else
                                            <div @if($L->lang=='cz') class="category_title category_title_cz" @elseif ($L->lang=='de') class="category_title category_title_de" @else class="category_title" @endif>
                                                {{$product->link_name}}
                                            </div>
                                        @endif

                                            <div class="product_stars">
                                                <img class="" src="/img/star_product_full.png" alt="{{$L->__('star_product_empty')}}">
                                                <img class="" src="/img/star_product_full.png" alt="{{$L->__('star_product_empty')}}">
                                                <img class="" src="/img/star_product_full.png" alt="{{$L->__('star_product_empty')}}">
                                                <img class="" src="/img/star_product_full.png" alt="{{$L->__('star_product_empty')}}">
                                                <img class="" src="/img/star_product_half.png" alt="{{$L->__('star_product_empty')}}">
                                            </div>


                                        <div class="product_img">
                                            {!!$img->__($product->prod_id.'_1.jpg')!!}
                                            @if ($L->lang == 'ru')
                                                <div class="description description_ru">
                                                    {{$L->__($product->prod_id.' product short description')}}
                                                </div>
                                            @elseif($L->lang == 'it' || $L->lang == 'es')
                                                <div class="description description_it_es">
                                                    {{$L->__($product->prod_id.' product short description')}}
                                                </div>
                                            @else
                                                <div @if($L->lang=='de') class="description description_de" @elseif($L->lang=='cz') class="description description_cz" @else class="description" @endif>
                                                    {{$L->__($product->prod_id.' product short description')}}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="product_price">{{$L->__('Price:')}}
                                            <span class="old_price">{{$L->currency}} {{$L->__('Old_price_'.$product->id)}}</span>
                                            <span class="new_price">{{$L->currency}} {{sprintf("%01.2f",$product->prices[0]->price)}}</span>
                                        </div>
                                        <div class="product_button flex" style="width: 100%">
                                            <div class="margin_auto">
                                                <div style="margin-bottom: 10px; text-align: center;">
                                                    <a href="{{url($L->lang.'/'.$packs_urls[end($prod_id)])}}" style="color: #fff"><div class="more_info">{{$L->__('More info')}}</div></a>
                                                </div>
                                                @if ($L->lang == 'ru')
                                                    <div class="add_to_basket add_to_basket_ru" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add to basket1')}}</div>
                                                @else
                                                    <div class="add_to_basket" onclick="document.location.href='{{url('admin/addProdToCart/'.$product->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('Add to basket1')}}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                        <p>{!! $long_desc[1] or '' !!}</p>
                    </div>
                </div>
            </div>

            {{--RIGHT SIDE BAR--}}
            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12 right_warp right_warp_mobile">
                <div class="right_sidebar right_sidebar_1">
                    <div class="social_block" style="margin-bottom: 34px;">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="dsp_video" style="margin-top: 20px;">
                        <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <div class="trust-banner">
                        <div class="trust-banner__background">
                            {!!$img->__('background_trust_banner.png', 'trust-banner__background_img')!!}
                            {!!$img->__('background_trust_banner_mob.png', 'trust-banner__background_img_mob')!!}
                            <div class="trust-banner__images">
                                <a href="{{url($L->lang.'/'.$L->__('dead-sea-minerals'))}}" class="link_1">
                                    {!!$img->__("1.png", 'trust-banner__img')!!}
                                    <span class="hover-effect hover-effect__1">
                                        <object>
                                            <a href="{{url($L->lang.'/'.$L->__('dead-sea-minerals'))}}">{{$L->__('More_banner')}}</a>
                                        </object>
                                    </span>
                                </a>
                                <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->seo_url)}}"  class="link_2">
                                    {!!$img->__("2.png", 'trust-banner__img')!!}
                                    <span class="hover-effect hover-effect__2">
                                        <object>
                                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->seo_url)}}">{{$L->__('More_banner')}}</a>
                                        </object>
                                    </span>
                                </a>
                                <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->seo_url)}}"  class="link_3">
                                    {!!$img->__("3.png", 'trust-banner__img')!!}
                                    <span class="hover-effect hover-effect__3">
                                        <object>
                                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->seo_url)}}">{{$L->__('More_banner')}}</a>
                                        </object>
                                    </span>
                                </a>
                                <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->seo_url)}}"  class="link_4">
                                    {!!$img->__("4.png", 'trust-banner__img')!!}
                                    <span class="hover-effect hover-effect__4">
                                        <object>
                                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->seo_url)}}">{{$L->__('More_banner')}}</a>
                                        </object>
                                    </span>
                                </a>
                                <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/29')->first()->seo_url)}}" class="link_5">
                                    {!!$img->__("5.png", 'trust-banner__img')!!}
                                    <span class="hover-effect hover-effect__5">
                                        <object>
                                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/29')->first()->seo_url)}}">{{$L->__('More_banner')}}</a>
                                        </object>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="banner_section_1_right_2">
                        <a href="{{url($L->lang.'/'.$L->__('questionnaire'))}}">
                            {!!$img->__($L->lang.'_questions.jpg', 'questions_banner')!!}
                            {!!$img->__($L->lang.'_questions_mob.jpg', 'questions_banner_mob')!!}
                        </a>
                    </div>
                    {{--Carousel reviews--}}
                    @if($L->lang != 'es')
                    <div class="reviews_category right-block_category">
                        <div class="reviews_title cat_title">{{$L->__('Our customer reviews')}}</div>
                        <div class="reviews_content">

                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <div class="item_inner_wrap">
                                            <div class="img_wrap">
                                                {!!$img->__('1002_1_small.jpg')!!}
                                                <div class="prod_name">{{$L->__('Name Soap online-store')}}</div>
                                                <div class="review_stars">
                                                    @for($i=0;$i<5;$i++)
                                                            {!!$img->__('star_product_full.png')!!}
                                                    @endfor
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <p class="comment">{{$L->__('Comment Soap online-store')}}</p>
                                            <p class="author">{{$L->__('Author Soap online-store')}}</p>
                                        </div>
                                        <a class="view_all_reviews" href="{{url('/'.$L->lang.'/'.$L->__('view_all_reviews_btn_link_soap'))}}" target="_blank" title="{{$L->__('view all reviews btn_title')}}">
                                            <div>{{$L->__('view all reviews')}}</div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <div class="item_inner_wrap">
                                            <div class="img_wrap">
                                                {!!$img->__('1001_1_small.jpg')!!}
                                                <div class="prod_name">{{$L->__('Name Cream online-store')}}</div>
                                                <div class="review_stars">
                                                    @for($i=0;$i<5;$i++)
                                                        {!!$img->__('star_product_full.png')!!}
                                                    @endfor
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <p class="comment">{{$L->__('Comment Cream online-store')}}</p>
                                            <p class="author">{{$L->__('Author Cream online-store')}}</p>
                                        </div>
                                        <a class="view_all_reviews" href="{{url('/'.$L->lang.'/'.$L->__('view_all_reviews_btn_link_cream'))}}" target="_blank" title="{{$L->__('view all reviews btn_title')}}">
                                            <div>{{$L->__('view all reviews')}}</div>
                                        </a>
                                    </div>
                                    <div class="item">
                                        <div class="item_inner_wrap">
                                            <div class="img_wrap">
                                                {!!$img->__('1004_1_small.jpg')!!}
                                                <div class="prod_name">{{$L->__('Name Shampoo online-store')}}</div>
                                                <div class="review_stars">
                                                    @for($i=0;$i<5;$i++)
                                                        {!!$img->__('star_product_full.png')!!}
                                                    @endfor
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                            <p class="comment">{{$L->__('Comment Shampoo online-store')}}</p>
                                            <p class="author">{{$L->__('Author Shampoo online-store')}}</p>
                                        </div>
                                        <a class="view_all_reviews" href="{{url('/'.$L->lang.'/'.$L->__('view_all_reviews_btn_link_shampoo'))}}" target="_blank" title="{{$L->__('view all reviews btn_title')}}">
                                            <div>{{$L->__('view all reviews')}}</div>
                                        </a>
                                    </div>
                                </div>

                                <!-- Controls -->
                                <a class="left" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                <a class="right" href="#carousel-example-generic" role="button" data-slide="next"></a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="banner_right_2">
                        {{--<a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}">--}}
                        {{--{!!$img->__($L->lang.'_client.jpg')!!}--}}
                        {{--</a>--}}
                        <a href="{{url($L->lang.'/'.$L->__('over-20-natural-active-ingredients'))}}">
                            {!!$img->__($L->lang.'_psoriasis_treatment.jpg', 'psoriasis_treatment_banner')!!}
                            {!!$img->__($L->lang.'_psoriasis_treatment_mob.jpg', 'psoriasis_treatment_banner_mob')!!}
                        </a>
                    </div>
                    <div class="banner_section_1_right_2">
                        <a href="{{url($L->__('cat_1_link'))}}">
                            {!!$img->__($L->lang.'_gift.jpg', 'gift_banner')!!}
                            {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                        </a>
                    </div>

                    <div class="online-store__bottom-banner">
                        <a href="{{url($L->__('cat_2_link'))}}">{!!$img->__($L->lang.'_shampoo_lotion_banner.jpg')!!}</a>
                    </div>
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
                            @if ($L->lang == 'ru')
                                <div class="free_delivery_text_l1" style="font-size: 15px; padding-top: 8px;">
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
                        {{--<a href="{{url($L->lang.'/'.$L->__('localstores'))}}"  style="max-width: 100%;"><div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>--}}
                            {{--<div class="local_store_text float_left" style="padding-left: 10px; padding-top: 15px;">--}}
                                {{--<div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>--}}
                                {{--<div class="local_store_text_l2" style="font-size: 17px">{{$L->__('STORE FINDER')}}</div>--}}
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

@endsection

