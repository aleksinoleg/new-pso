<?
$reviews_all = $page->reviews;
$rate = $page->reviews->avg('rate');
$reviews = $reviews_all->take(3);
$page->long_desc = explode('***',$page->long_desc);

?>

@extends('layouts.default_wrapper')

@section('header')
    <link href="/css/styl/product.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/media_product.min.css">
    <link href="/css/styl/product2.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection
{{--{{dd ($page)}}--}}
@section('content')

    @if(session()->has('captcha_error'))
        <div class="container">
            <div class="modal fade modal_captcha_error">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 100%; max-width: 767px">
                        <div class="modal-body relative">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="modal_review_logo">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="thx_rev">
                                <div class="margin_auto">
                                    <p>{{$L->__('captcha_error_text')}}</p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(session('question') == 1)
        <div class="container">
            <div class="modal fade modal_question_asked">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 100%; max-width: 767px; height: auto">
                        <div class="modal-body relative" style="height: auto">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="modal_review_logo" style="text-align: center">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="thx_rev" style="width:100%; height:auto;">
                                <div class="margin_auto">
                                    <p style="color: #016F92;
                                    text-align: center;
                                    font-size: 24px;
                                    font-weight: bold;
                                    ">{{$L->__('thanks_for_question_text_1')}}</p>
                                    <p style="
                                    text-align: center;
                                    font-size: 18px;
                                    font-weight: bold;
                                    ">{{$L->__('thanks_for_question_text_2')}}
                                    </p>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?
        session(['question' => 0])
        ?>
    @endif
    <div itemscope itemtype="http://schema.org/Product">
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
                        <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">{{$L->__('Home')}}</a>
                        > {{$page->link_name}}
                    </div>
                    <div class="prod_title prod_title_desc prod_review_head_section_tab">
                        <span itemprop="name" style="font-size: 28px; line-height: 1.2;">{{$page->title}}</span>
                    </div>
                    <div class="prod_review_head_section prod_review_head_section_tab">
                        <?php $rate_temp = $rate?>
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
                        <div class="prod_review_description">
                            <span class="prod_review_head_revs"> |  <a
                                        href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link'))}}">{{$L->__('Review')}} ({{count($reviews_all)}})</a></span>
                            <span class="prod_review_head_leave_review"> | <a
                                        href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link').'#'.$L->__('leave_review_form'))}}">{{$L->__('Leave a review')}}</a></span>
                        </div>
                    </div>

                    <div class="prod_slider">
                        <div id="carousel_prods" class="carousel slide carousel_prods" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="item active">
                                    {!!$img->__($page->prod_id.'_1.jpg', 'magnif', 'itemprop="image"')!!}
                                </div>
                                <div class="item">
                                    {!!$img->__($page->prod_id.'_2.jpg', 'magnif')!!}
                                </div>
                                <div class="item">
                                    {!!$img->__($page->prod_id.'_3.jpg', 'magnif')!!}
                                </div>

                            </div>
                            <div class="indicators relative">
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel_prods" data-slide-to="0"
                                        class="active">{!!$img->__($page->prod_id.'_1_small.jpg')!!}</li>
                                    <li data-target="#carousel_prods"
                                        data-slide-to="1">{!!$img->__($page->prod_id.'_2_small.jpg')!!}</li>
                                    <li data-target="#carousel_prods"
                                        data-slide-to="2">{!!$img->__($page->prod_id.'_3_small.jpg')!!}</li>
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
                            {{$L->__('Order total')}}: <span>{{$L->currency}}</span><span
                                    class="price"> {{$page->prices[0]->price}}</span>
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
                        <span itemprop="name"><h1 style="margin: 0">{{$page->title}}</h1> </span>
                    </div>
                    <div class="prod_review_head_section prod_review_head_section_desc">
                        <?php $rate_temp = $rate?>
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
                        <span class="prod_review_head_revs"> | <a
                                    href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link'))}}" style="color:#333;"> {{$L->__('Review')}} ({{count($reviews_all)}})</a></span>
                        <span class="prod_review_head_leave_review"> | <a
                                    href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link').'#'.$L->__('leave_review_form'))}}">{{$L->__('Leave a review')}}</a></span>
                    </div>
                    @if ($L->lang == 'ru')
                        <div class="clinically_tested clinically_tested_desc" style="margin-top: -5px;"><a href="{{$L->__('clinically-tested')}}">{!!$img->__($L->lang.'_tested.png')!!}</a></div>
                    @else
                        <div class="clinically_tested clinically_tested_desc" style="margin-top: -30px;"><a href="{{$L->__('clinically-tested')}}">{!!$img->__($L->lang.'_tested.png')!!}</a></div>
                    @endif
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
                        <a class="read_more_desc" href="#description" data-toggle="tab">{{$L->__('Read more_prod')}}</a>
                    </div>
                </div>
                <div class="column_3 float_left">
                    <div class="social_section pull-right">
                        <div class="float_left soc_item"><a
                                    href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg', 'hover_dark')!!}</a></div>
                        <div class="float_left soc_item"><a
                                    href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg', 'hover_dark')!!}</a>
                        </div>
                        <div class="float_left soc_item"><a
                                    href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg', 'hover_dark')!!}</a>
                        </div>
                        <div class="float_left soc_item"><a
                                    href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg', 'hover_dark')!!}</a>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="cart_section">
                        <div class="right_side_close">×</div>
                        <div class="clearfix"></div>
                        @if($L->lang == 'ru')
                            <div class="cart_title" style="font-size: 19px;">{{$L->__('REVIEW YOUR CART')}}</div>
                        @else
                            <div class="cart_title">{{$L->__('REVIEW YOUR CART')}}</div>
                        @endif
                        <form action="/cart" method="post" class="add_to_basket_form">
                            {{csrf_field()}}
                            <div class="cart_quantity">
                                <div class="quantity_title">{{$L->__('QUANTITY')}}</div>
                                <input type="hidden" value="{{$page->prod_id}}" name="prod_id">
                                <input type="hidden" value="{{$L->__('link_cart')}}" name="link">
                                <input type="hidden" value="{{$page->prices[0]->price}}" name="price">
                                <input type="hidden" value="{{$L->currency}}" name="currency">
                                <input type="hidden" value="{{$L->lang}}" name="lang">
                                <select name="quantity" id="cart_quantity">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>
                            </div>
                            <div class="order_total">
                                {{$L->__('Order total')}}: <span>{{$L->currency}}</span><span
                                        class="price"> {{$page->prices[0]->price}}</span>
                            </div>
                            <div class="flex">
                                <div class="margin_auto relative add_to_basket">
                                    {!!$img->__('button_buy.png')!!}
                                    @if ($L->lang == 'ru')
                                        <div class="button_buy_text absolute button_buy_text_ru">{{$L->__('ADD TO BASKET')}}</div>
                                    @else
                                        <div class="button_buy_text absolute">{{$L->__('ADD TO BASKET')}}</div>
                                    @endif
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
                                <div class="delivery_text_l3"><a
                                            href="{{url($L->lang.'/'.$L->__('delivery'))}}">{{$L->__('More details1')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="blue_icon">
                            <div class="blue_icon_img float_left">{!!$img->__('back_money_product.jpg')!!}</div>
                            <div class="blue_icon_text float_left">
                                <div class="result_text_l1">{{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span>
                                </div>
                                <div class="result_text_l2">{{$L->__('or_your money back')}}</div>
                                <div class="result_text_l3"><a
                                            href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">{{$L->__('More details1')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="blue_icon ">
                            <div class="blue_icon_img relative contact_blue">{!!$img->__($L->lang.'_contact_blue.png')!!}
                                <div class="absolute link_contact"><a
                                            href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('More details1')}}</a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="prod_youtube">
                        <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <div class="prod_right_banner">
                        <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">
{{--                            {!!$img->__($L->lang.'_money-back-new.jpg')!!}--}}
                            {!!$img->__($L->lang.'_money-back-new_mob.jpg', 'money-back-new-mob')!!}
                        </a>
                    </div>

                    <div id="carousel-example-generic" class="carousel slide package_slides" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @if ($page->prod_id == '1001')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_body.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_1_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_children.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_6_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @elseif ($page->prod_id == '1002')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_body.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_1_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_foot.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_5_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_elbow.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_4_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_nails.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_3_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @elseif ($page->prod_id == '1003')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_body.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_1_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_children.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_6_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_foot.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_5_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_elbow.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_4_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_nails.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_3_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @elseif ($page->prod_id == '1004')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_scalp.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_2_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @elseif ($page->prod_id == '1005')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_scalp.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_2_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @elseif ($page->prod_id == '1006')
                                <div class="item active">
                                    {!!$img->__($L->lang.'_it_works_better_together_foot.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_5_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                                <div class="item">
                                    {!!$img->__($L->lang.'_it_works_better_together_elbow.jpg', 'package_img')!!}
                                    <a href="{{url($L->__('cat_4_link'))}}" class="view_package">{{$L->__('View package >>')}}</a>
                                    <!-- Wrapper for controls -->
                                    <a class="left arrow" href="#carousel-example-generic" role="button" data-slide="prev"></a>
                                    <a class="right arrow" href="#carousel-example-generic" role="button" data-slide="next"></a>
                                </div>
                            @endif
                        </div>

                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="prod_tabs_section_left float_left">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#reviews" data-toggle="tab">{{$L->__('REVIEWS')}}</a></li>
                        <li class="desc_button">
                            <a href="#description" data-toggle="tab">{{$L->__('DESCRIPTION')}}</a>
                        </li>
                        <li><a href="#ingredients" data-toggle="tab">{{$L->__('INGREDIENTS_tab')}}</a></li>
                        <li><a href="#delivery" data-toggle="tab">{{$L->__('DELIVERY_tab')}}</a></li>
                        <li><a href="#questions" data-toggle="tab">{{$L->__('questions_tab')}}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tab_reviews active" id="reviews">
                            <div class="tab_reviews_header">
                                <div class="tab_reviews_header_1 float_left">
                                    <div class="tab_reviews_header_1_l1">
                                        {{$L->__('Customer Rating')}}
                                    </div>
                                    <div class="tab_reviews_header_1_l2">
                                        <?php $rate_temp = $rate?>
                                        <span>{{round($rate_temp,1)}}/5</span>
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
                                </div>
                                <div class="tab_reviews_header_2 float_left">
                                    <div class="flex">
                                        <div class="margin_auto">
                                            <div class="tab_reviews_header_2_1 float_left">90%</div>
                                            <div class="tab_reviews_header_2_2 float_left">
                                                <div>{{$L->__('would')}}</div>
                                                <div>{{$L->__('recommend')}}</div>
                                                <div>{{$L->__('to a friend')}}</div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab_reviews_header_3 float_left">
                                    <div class="tab_reviews_header_3_1 float_left">
                                        <div class="tab_reviews_header_3_1_1">{{$L->__('TELL US')}}</div>
                                        <div class="tab_reviews_header_3_1_2">{{$L->__('what you think?')}}</div>
                                    </div>
                                    <div class="tab_reviews_header_3_2 float_left">
                                        <a href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link').'#'.$L->__('leave_review_form'))}}">{!!$img->__('tell_us.png')!!}</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @foreach($reviews as $review)
                                <div class="tab_review" itemprop="review" itemscope itemtype="http://schema.org/Review">
                                    <div class="tab_review_l1">
                                        <div class="tab_review_l1_1 float_left">
                                            <? $rate_temp = $review->rate?>
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
                                        <div class="tab_review_l1_2 float_left">
                                            {{$review->title}}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tab_review_l2">
                                        @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_before.jpg')||
                                        file_exists('./storage/img/reviews/rev_'.$review->id.'_after.jpg'))

                                            <div style="width: calc(100% - 110px);float: left">
                                                <p>{!!$review->comment!!}</p>
                                            </div>

                                            <div style="width: 100px;float: left">
                                                @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_before.jpg'))

                                                    <a data-fancybox="images-single-{{$review->id}}"
                                                       href="{{asset('storage/img/reviews/rev_'.$review->id.'_before.jpg')}}">
                                                        <p style="text-align: center; color: #074E78" class="figcaption">{{$L->__('before_1')}}</p>
                                                        <img style="width: 100%"
                                                             src="{{asset('storage/img/reviews/rev_'.$review->id.'_before.jpg')}}"
                                                             alt="{{$L->__('rev_'.$review->id.'_before_alt')}}"></a>
                                                @endif
                                                @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_after.jpg'))

                                                    <a data-fancybox="images-single-{{$review->id}}"
                                                       href="{{asset('storage/img/reviews/rev_'.$review->id.'_after.jpg')}}">
                                                        <p style="text-align: center; color: #074E78" class="figcaption">{{$L->__('after')}}</p>
                                                        <img style="width: 100%"
                                                             src="{{asset('storage/img/reviews/rev_'.$review->id.'_after.jpg')}}"
                                                             alt="{{$L->__('rev_'.$review->id.'_after_alt')}}"></a>
                                                @endif
                                            </div>
                                            <div class="clearfix"></div>
                                        @else
                                            <p>{!!$review->comment!!}</p>
                                        @endif

                                        <div class="pull-left review_prod_author">
                                            {!!$img->__('user.png')!!} {{$L->__('by1')}}
                                            <span>{{$review->name}}</span>
                                        </div>
                                        <div class="pull-right review_prod_date">
                                            {{$review->created_at->toDateString()}}
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                    <span itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating">
                        <meta itemprop="ratingValue" content="<?=$review->rate?>" />
                        <meta itemprop="bestRating" content="5" />
                    </span>
                    <span itemprop="author" itemscope itemtype="http://schema.org/Person">
                        <meta itemprop="name" content="<?=$review->name?>" />
                    </span>
                                </div>
                            @endforeach
                            <div itemprop="aggregateRating" itemscope itemtype="http://schema.org/AggregateRating">
                                <meta itemprop="ratingValue" content="<?=$rate;?>" />
                                <meta itemprop="bestRating" content="5" />
                                <meta itemprop="ratingCount" content="<?=count($reviews);?>" />
                            </div>
                            <div class="leave_review_btn">
                                <a href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link').'#'.$L->__('leave_review_form'))}}"
                                   class="leave_review">{{$L->__('Leave a review')}}</a>
                                <a href="{{url($L->lang.'/'.$L->__($page->prod_id.'_review_link'))}}"
                                   class="leave_review">{{$L->__('View all reviews btn')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="tab-pane" id="description" style="padding: 10px">
                            {!! (isset($page->long_desc[1]))?$page->long_desc[1]:'' !!}
                        </div>
                        <div class="tab-pane" id="ingredients">

                            <div class="tab_ingredients">
                                <div class="ing_desc">

                                </div>
                                <div class="ing_img">
                                    <div class="item calendula">
                                        <div>
                                            {!!$img->__('en_calendula.jpg')!!}
                                            <div><span>{{$L->__('Calendula')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>
                                            {!!$img->__('en_green_tea.jpg')!!}
                                            <div><span>{{$L->__('Tea tree oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>
                                            {!!$img->__('en_smilax.jpg')!!}
                                            <div><span>{{$L->__('Sarsaparilla')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>
                                            {!!$img->__('en_mahonia.jpg')!!}
                                            <div><span>{{$L->__('Mahonia')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item african_palm_tree_oil">
                                        <div>
                                            {!!$img->__('en_african_palm_tree_oil.jpg')!!}
                                            <div><span>{{$L->__('African palm tree oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item rosemary smalldesktop">
                                        <div>
                                            {!!$img->__('en_rosemary.jpg')!!}
                                            <div><span>{{$L->__('Rosemary')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item item_title">
                                        <p>{{$L->__('Our')}}</p>
                                        <p>{{$L->__('Ingredients')}}</p>
                                    </div>
                                    <div class="item rosemary largedesktop">
                                        <div>
                                            {!!$img->__('en_rosemary.jpg')!!}
                                            <div><span>{{$L->__('Rosemary')}}</span></div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div> {!!$img->__('en_shea_butter.jpg')!!}
                                            <div><span>{{$L->__('Shea butter')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>
                                            {!!$img->__('en_wheat_germ_oil.jpg')!!}
                                            <div><span>{{$L->__('Wheat germ oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_grapeseed_oil.jpg')!!}
                                            <div><span>{{$L->__('Grapeseed oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_nettle.jpg')!!}
                                            <div><span>{{$L->__('Nettle')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item chamomile">
                                        <div>{!!$img->__('en_chamomile.jpg')!!}
                                            <div><span>{{$L->__('Chamomile')}}</span></div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div>{!!$img->__('en_golden_seal.jpg')!!}
                                            <div><span>{{$L->__('Golden seal')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_arnika.jpg')!!}
                                            <div><span>{{$L->__('Arnika')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_chickweed.jpg')!!}
                                            <div><span>{{$L->__('Chickweed')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item pso_logo">
                                        {!!$img->__('en_pso.jpg')!!}
                                    </div>
                                    <div class="item lavandula">
                                        <div>{!!$img->__('en_lavandula_oil.jpg')!!}
                                            <div><span>{{$L->__('Lavandula oil')}}</span></div>
                                        </div>
                                    </div>

                                    <div class="item">
                                        <div>{!!$img->__('en_vitamin_d.jpg')!!}
                                            <div><span>{{$L->__('Vitamin D')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_seabackthorn_oil.jpg')!!}
                                            <div><span>{{$L->__('Seabackthorn oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_aloe_vera.jpg')!!}
                                            <div><span>{{$L->__('Aloe vera')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div>{!!$img->__('en_camphor_oil.jpg')!!}
                                            <div><span>{{$L->__('Camphor oil')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="item minerals_1" style="margin: 0">
                                        <div>{!!$img->__('en_minerals_from_the_dead_sea.jpg')!!}
                                            <div><span>{{$L->__('Minerals from the dead sea')}}</span></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <ul class="ingredients_list_mob">
                                        <li>{{$L->__('Calendula')}}</li>
                                        <li>{{$L->__('Tea tree oil')}}</li>
                                        <li>{{$L->__('Sarsaparilla')}}</li>
                                        <li>{{$L->__('Mahonia')}}</li>
                                        <li>{{$L->__('African palm tree oil')}}</li>
                                        <li>{{$L->__('Rosemary')}}</li>
                                        <li>{{$L->__('Shea butter')}}</li>
                                        <li>{{$L->__('Wheat germ oil')}}</li>
                                        <li>{{$L->__('Grapeseed oil')}}</li>
                                        <li>{{$L->__('Nettle')}}</li>
                                        <li>{{$L->__('Chamomile')}}</li>
                                        <li>{{$L->__('Golden seal')}}</li>
                                        <li>{{$L->__('Arnika')}}</li>
                                        <li>{{$L->__('Chickweed')}}</li>
                                        <li>{{$L->__('Lavandula oil')}}</li>
                                        <li>{{$L->__('Vitamin D')}}</li>
                                        <li>{{$L->__('Seabackthorn oil')}}</li>
                                        <li>{{$L->__('Aloe vera')}}</li>
                                        <li>{{$L->__('Camphor oil')}}</li>
                                        <li>{{$L->__('Minerals from the dead sea')}}</li>
                                    </ul>
                                </div>
                                <div class="ing_desc">

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="delivery" style="padding: 10px">
                            {!! $pages->where('real_url','/'.$L->lang.'/article/39')->first()->long_desc !!}
                        </div>
                        <div class="tab-pane" id="questions">
                            @include('partials.questions_tab')
                        </div>
                    </div>
                </div>
                <div class="prod_tabs_section_right float_left"></div>
                <div class="clearfix"></div>
                <div class="prod_prefooter">
                    <div class="prod_prefooter_item free_delivery_section col-lg-3 col-sm-6 no_padding relative">
                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}">
                            <div class="free_delivery_img float_left">
                                {!!$img->__('delivery.png')!!}
                            </div>
                            <div class="free_delivery_text float_left">
                                @if ($L->lang == 'ru' || $L->lang == 'ua')
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
            {!!$img->__('button_buy_blue.png')!!}
            <div class="button_buy_text absolute">{{$L->__('ADD TO BASKET')}}</div>
        </div>
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
        }, function () {
            $(this).children('.static_pages_menu_hover').hide();
        });
        $('.carousel_prods').carousel({
            interval: false
        });
    </script>
    <script>
        $('#cart_quantity').change(function () {
            var price = $('#cart_quantity').val() * parseFloat({{$page->prices[0]->price}});
            $('.price').text(price.toFixed(2));
            //$('input[name="price"]').val(price.toFixed(2));
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
    <script src="/js/jquery.fancybox.js"></script>

    <script>
        $( '[data-fancybox]' ).fancybox({
            caption : function( instance, item ) {
                return $(this).find('.figcaption').html();
            }
        });
    </script>
    <script>
        $('.modal_question_asked').modal();
    </script>
    <script>
        $('.question_form_title_btn_pic').click(function () {
            $('.question_form_body').toggle();
        });
        $('.q_submit').click(function () {
            $('.question_form').submit();
        });
    </script>

    <script>
        $(window).scroll(function()
        {
            if  ($(window).scrollTop() == $(document).height() - $(window).height())
            {
                if($('#questions').hasClass('active')){
                    var count = $('.question_item').length;
                    $.ajax({
                        url:'/admin/get_question/<?=$page->prod_id?>/'+count,
                        success: function (str) {
                            $('#questions').append(str);
                            if(str.length>0){
                                $('.question_item').last().hide().show('normal');
                            }
                        }
                    })
                }
            }
        });
    </script>

    <script>
        var amountItem = $('.package_slides .carousel-inner .item').length;
        var column_2_height = $('.column_2').height();
        var columnDifference = -((1450 - column_2_height) - 35);
//        console.log(column_2_height);

        $(window).on("resize load", function () {
            if($(window).width() > 1184 && 1450 > column_2_height){
                $('.prod_tabs_section_left').css('margin-top', columnDifference);
            } else{
                $('.prod_tabs_section_left').css('margin-top', '10px');
            }
        });

        if (amountItem == 1){
            $('.package_slides .arrow').hide();
            $('.package_slides .view_package').css({
                'margin-right': '-140px',
                'width': '280px'
            });
        } else {
            $('.package_slides .arrow').show();
        }
    </script>
    <script>
        $('.modal_captcha_error').modal('show');
    </script>
@endsection