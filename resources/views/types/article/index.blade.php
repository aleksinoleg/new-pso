<?
    $realUrl = explode('/', $page->real_url);
    if(end($realUrl) == '37'){
        $page->long_desc = explode('***', $page->long_desc);
    }
?>

@extends('layouts.default_wrapper')

@section('header')
    <link href="/css/styl/home_page.css" rel="stylesheet">
    <link href="/css/styl/home_page_992-1199.css" rel="stylesheet">
    <link href="/css/styl/home_page_768-991.css" rel="stylesheet">
    <link href="/css/styl/article.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/media_home.min.css">
    <link rel="stylesheet" href="/css/media_article.min.css">

@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="left_side_mask"></div>
            <div class="left_side float_left relative" style="z-index: 99;">
                <div class="left_side_close">&times;</div>
                <div class="right_side_close">&times;</div>
                <div class="skin_complains_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','skin_complains_img')!!}
                        <div class="absolute skin_complains_title_1">
                            {{$L->__('Our formula answers to')}}
                        </div>
                        @if ($L->lang == 'ru')
                            <div class="absolute skin_complains_title_2 skin_complains_title_2_ru">
                                {{$L->__('Skin Complaints')}}
                            </div>
                        @else
                            <div class="absolute skin_complains_title_2">
                                {{$L->__('Skin Complaints')}}
                            </div>
                        @endif
                    </div>
                    <div class="skin_complains_articles left_side_articles">
                        <p><a href="{{url($L->lang.'/'.$L->__('psoriasis'))}}">{{$L->__('Psoriasis_1')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('eczema'))}}">{{$L->__('Eczema_1')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('atopic-dermatitis'))}}">{{$L->__('Atopic')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('seborrhea'))}}">{{$L->__('Seborrhea_1')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('scalp-psoriasis'))}}">{{$L->__('Scalp psoriasis')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('dry-skin'))}}">{{$L->__('Dry skin')}}</a></p>
                    </div>
                </div>
                <div class="how_do_you_like_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','how_do_you_like_img')!!}
                        @if($L->lang == 'ru')
                            <div class="absolute how_do_you_like_title_1 how_do_you_like_title_1_ru">
                                {{$L->__('How Du You Like')}}
                            </div>
                        @else
                            <div class="absolute how_do_you_like_title_1">
                                {{$L->__('How Du You Like')}}
                            </div>
                        @endif
                        @if($L->lang == 'ru')
                            <div class="absolute how_do_you_like_title_2 how_do_you_like_title_2_ru">
                                {{$L->__('To use our Formula?')}}
                            </div>
                        @else
                            <div class="absolute how_do_you_like_title_2">
                                {{$L->__('To use our Formula?')}}
                            </div>
                        @endif
                    </div>
                    <div class="how_do_you_like_articles left_side_articles">
                        <p><a href="{{url($L->lang.'/'.$L->__('oil'))}}">{{$L->__('Oil_article')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('cream'))}}">{{$L->__('Cream_article')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('soap'))}}">{{$L->__('Soap Bar_article')}}</a></p>
                        {{--<p><a href="{{url($L->lang.'/'.$L->__('liquid-soap'))}}">{{$L->__('Liquid Soap')}}</a></p>--}}
                        <p><a href="{{url($L->lang.'/'.$L->__('lotion'))}}">{{$L->__('Lotion_article')}}</a></p>
                        <p><a href="{{url($L->lang.'/'.$L->__('shampoo'))}}">{{$L->__('Shampoo_article')}}</a></p>
                    </div>
                </div>
                <div class="bay_with_confidence_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','bay_with_confidence_img')!!}
                        <div class="absolute bay_with_confidence_title">
                            {{$L->__('BAY WITH CONFIDENCE')}}
                        </div>
                    </div>
                    <div class="bay_with_confidence_banner">
                        <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/30')->first()->seo_url)}}">
                            {!!$img->__($L->lang.'_money-back-new.jpg', 'bay_with_confidence_img')!!}
                        </a>
                    </div>
                </div>
                <div class="you_may_like_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','you_may_like_img')!!}
                        @if ($L->lang == 'de')
                            <div class="absolute you_may_like_title" style="padding-right: 22px; top: 20px;">
                                {{$L->__('YOU MAY LIKE...')}}
                            </div>
                        @else
                            <div class="absolute you_may_like_title">
                                {!!$L->__('YOU MAY LIKE...')!!}
                            </div>
                        @endif
                    </div>
                    <div class="you_may_like_sub_section">
                        <div class="you_may_like_sub_title">
                            {{$L->__('PSORIASIS SHAMPOO')}}
                        </div>
                        <div class="you_may_like_sub_stars">
                            {!!$img->__('product-star-white.png', 'you_may_like_star')!!}
                            {!!$img->__('product-star-white.png', 'you_may_like_star')!!}
                            {!!$img->__('product-star-white.png', 'you_may_like_star')!!}
                            {!!$img->__('product-star-white.png', 'you_may_like_star')!!}
                            {!!$img->__('product-star-half-white.png', 'you_may_like_star')!!}
                            (45)
                        </div>
                        <div class="flex">
                            <div class="margin_auto">
                                {!!$img->__('prod-shampoo.jpg', 'you_may_like_img')!!}
                            </div>
                        </div>
                        <div class="you_may_like_btn relative">
                            {!!$img->__('product-button.png', 'you_may_like_btn_img')!!}
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/product/4')->first()->seo_url)}}">
                                <div class="absolute you_may_like_btn_details">{{$L->__('More Details')}}</div>
                            </a>

<div class="absolute you_may_like_btn_add_to_basket" style="cursor: pointer" onclick="document.location.href='{{url('admin/addProdToCart/'.$pages->where('real_url', '/'.$L->lang.'/product/4')->first()->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'">{{$L->__('ADD TO BASKET')}}</div>

                        </div>
                    </div>
                </div>
                <div class="ingredients_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','skin_complains_img')!!}
                        <div class="absolute ingredients_title_1">
                            <span>{{$L->__('Over')}}</span>
                            @if($L->lang == 'ru')
                                <span style="font-size: 19px"> 20 {{$L->__('Ingredients')}}</span>
                           @else
                                <span style="font-size: 22px"> 20 {{$L->__('Ingredients')}}</span>
                            @endif
                        </div>
                        <div class="absolute ingredients_title_2">
                            {{$L->__('in our formula')}}
                        </div>
                    </div>
                    <div class="ingredients_sub_section">
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('mahonia_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 1 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 1 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('mahonia-for-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('calendula_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 2 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 2 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('calendula-for-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('smilax_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 3 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 3 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('smilax-effect-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('tea_tree_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 4 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 4 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('tea-tree-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('nettle_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 5 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 5 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('nettle-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('wheat_germ_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 6 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 6 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('wheat-germ-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('chamomile_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 7 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 7 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('chamomile-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('rosemary_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 8 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 8 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('rosemary-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('golden_seal_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 9 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 9 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('golden-seal-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('chickweed_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 10 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 10 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('chickweed-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('sea_buckthorns_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 11 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 11 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('sea-buckthorns-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('arnika_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 12 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 12 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('arnica-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('lavandula_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 13 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 13 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('lavandula-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('aloe_vera_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 14 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 14 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('aloe-vera-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('african_palm_tree_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 15 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 15 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('african-palm-tree-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('shea_butter_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 16 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 16 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('shea-butter-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('grapeseed_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 17 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 17 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('grape-seed-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('camphor_oil_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 18 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 18 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('camphor-oil-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('minerals_from_the_dead_sea_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 19 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 19 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('dead-sea-salt-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('vitamin_d_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Ingredient 20 title')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 20 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('vitamin-D-psoriasis'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="dead_sea_minerals_section left_section">
                    <div class="relative">
                        {!!$img->__('title-menu.png','how_do_you_like_img')!!}
                        <div class="absolute dead_sea_minerals_title_1">
                            {{$L->__('DEAD SEA MINERALS')}}
                        </div>
                        <div class="absolute dead_sea_minerals_title_2">
                            {{$L->__('in our formula')}}
                        </div>
                    </div>
                    <div class="dead_sea_minerals_articles">

                        <div class="ingredient">
                            <div class="float_left ingredient_img">
                                {!!$img->__('dead_sea_minerals_homepage.jpg')!!}
                            </div>
                            <div class="float_left ingredient_title">
                                {{$L->__('Dead sea mineral 1')}}
                            </div>
                            <div class="float_left ingredient_desc">
                                {{$L->__('Ingredient 21 description')}}
                            </div>
                            <div class="float_left ingredient_read">
                                <a href="{{url($L->lang.'/'.$L->__('dead-sea-minerals'))}}">{{$L->__('Read more >>')}}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                </div>


            </div>
            <div class="right_side float_left">
                <div class="article_section">
                    <div class="article_title">
                        <h1>{{$page->title}}</h1>
                    </div>
                    <div class="article_content">
                        @if (end($realUrl) == '37')
                            {!! $page->long_desc[0] !!}
                            @if (isset($page->long_desc[20]))
                                <div class="ingridients_wrap">
                                    <div class="row">
                                        @for ($i = 1; $i < 21; $i++)
                                            <div class="col-sm-6 col-xs-12">
                                                {!! $page->long_desc[$i] !!}
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            @endif
                        @else
                            {!! $page->long_desc !!}
                        @endif
                    </div>
                </div>
                @if ($L->lang == 'de')
                <div class="home_page_title" style="font-size: 28px;">
                    <div class="flex">
                        <div class="margin_auto">
                            <span>{{$L->__('PSOEASY')}}</span>
                            {{$L->__('IS UNIQUE NATURAL FORMULA')}}
                        </div>
                    </div>
                </div>
                @else
                <div class="home_page_title">
                    <div class="flex">
                        <div class="margin_auto">
                            <span>{{$L->__('PSOEASY')}}</span>
                            {{$L->__('IS UNIQUE NATURAL FORMULA')}}
                        </div>
                    </div>
                </div>
                @endif
                <div class="modal_icons_section col-lg-12 no_padding">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 no_padding">
                        <div class="modal_icon_wrap components">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('components.png', 'hide_on_hover')!!}
                                    {!!$img->__('components-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('over 20 natural active ingredients')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="modal_icon_wrap minerals">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/6')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('minerals.png', 'hide_on_hover')!!}
                                    {!!$img->__('minerals-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('Dead sea mineral 1')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="modal_icon_wrap steroids steroids_mob">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('no-steroid.png', 'hide_on_hover')!!}
                                    {!!$img->__('no-steroid-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('no_steroids_or_tars')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 no_padding tab_hidden">
                        <div class="modal_icon_wrap steroids">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('no-steroid.png', 'hide_on_hover')!!}
                                    {!!$img->__('no-steroid-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('no_steroids_or_tars')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="modal_icon_wrap tested">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('tested.png', 'hide_on_hover')!!}
                                    {!!$img->__('tested-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('clinically tested')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 no_padding">
                        <div class="modal_icon_wrap tested tested_mob">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('tested.png', 'hide_on_hover')!!}
                                    {!!$img->__('tested-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('clinically tested')}}
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="clearfix"></div>
                        </div>
                        <div class="modal_icon_wrap results">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/30')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('results.png', 'hide_on_hover')!!}
                                    {!!$img->__('results-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('results in 30 days')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                        <div class="modal_icon_wrap proofing">
                            <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/11')->first()->seo_url)}}">
                                <div class="float_left modal_icon_img">
                                    {!!$img->__('proofing.png', 'hide_on_hover')!!}
                                    {!!$img->__('proofing-on-mouse.png', 'show_on_hover')!!}
                                </div>
                                <div class="float_left modal_icon_text">
                                    <div class="flex h_100 w_100">
                                        <div class="margin_auto w_100">
                                            {{$L->__('10 years of proofing')}}
                                        </div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                    <div class="article_l3">
                        <div class="article_slider float_left">
                            <div id="before_after_carousel" class="carousel slide before_after_carousel"
                                 data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#before_after_carousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#before_after_carousel" data-slide-to="1"></li>
                                    <li data-target="#before_after_carousel" data-slide-to="2"></li>
                                    <li data-target="#before_after_carousel" data-slide-to="3"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active relative">
                                        {!!$img->__('1001_3_before_after.jpg')!!}
                                        <div class="before_after_carousel_item_text">
                                            {!!$L->__('before_after_carousel_item_text_1')!!}
                                        </div>
                                    </div>
                                    <div class="item relative">
                                        {!!$img->__('1002_3_before_after.jpg')!!}
                                        <div class="before_after_carousel_item_text">
                                            {!!$L->__('before_after_carousel_item_text_2')!!}
                                        </div>
                                    </div>
                                    <div class="item relative">
                                        {!!$img->__('1003_3_before_after.jpg')!!}
                                        <div class="before_after_carousel_item_text">
                                            {!!$L->__('before_after_carousel_item_text_3')!!}
                                        </div>
                                    </div>
                                    <div class="item relative">
                                        {!!$img->__('1004_3_before_after.jpg')!!}
                                        <div class="before_after_carousel_item_text">
                                            {!!$L->__('before_after_carousel_item_text_4')!!}
                                        </div>
                                    </div>
                                </div>

                                <a class="before_after_carousel_left" href="#before_after_carousel" data-slide="prev">
                                    {!!$img->__('gallery-left.png')!!}
                                </a>
                                <a class="before_after_carousel_right" href="#before_after_carousel" data-slide="next">
                                    {!!$img->__('gallery-right.png')!!}
                                </a>
                            </div>
                        </div>
                        <div class="article_banners_1 float_left">
                            <div class="banner_section_2">
                                <div class="wrap_section_2">
                                    <div class="free_delivery_section no_padding">
                                        <a href="{{url($L->lang.'/'.$L->__('delivery'))}}" style="color: #333">
                                        <div class="free_delivery_img float_left">
                                            {!!$img->__('delivery.png')!!}
                                        </div>
                                        <div class="free_delivery_text float_left">
                                            @if($L->lang == 'ru')
                                                <div class="free_delivery_text_l1" style="font-size: 13px;">
                                                    {{$L->__('FREE DELIVERY')}}
                                                </div>
                                            @elseif($L->lang == 'ua')
                                                <div class="free_delivery_text_l1" style="font-size: 12px;">
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
                                    </div>
                                </div>
                                <div class="wrap_section_2">
                                    <div class="result_section">
                                        <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}" style="color: #333">
                                        <div class="result_img float_left">
                                            {!!$img->__('back-money.png')!!}
                                        </div>
                                        <div class="result_text float_left" @if($L->lang=='ua') style="font-size: 15px"  @endif>
                                            <div class="result_text_l1">
                                                {{$L->__('result in')}} <span>{{$L->__('30 DAYS')}}</span>
                                            </div>
                                            <div class="result_text_l2">
                                                {{$L->__('or_your money back')}}
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        </a>
                                    </div>
                                </div>
                                <div class="wrap_section_2">
                                    <div class="contact_section">
                                        <a href="{{url($L->lang.'/'.$L->__('contact'))}}">{!!$img->__($L->lang.'_contact.png')!!}</a>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <div class="home_page_articles_section">
                    <div class="home_page_articles float_left">
                        <div class="home_page_article">
                            {!!$img->__('psoriasis_and_stress_homepage.jpg')!!}
                            <h3 class="home_page_article_text_title">{{$L->__('article 1 title')}}</h3>
                            <p class="home_page_article_text_content">{{$L->__('article 1 text')}}</p>
                            <div class="home_page_article_text_read_more">
                                <a href="{{url($L->lang.'/'.$L->__('psoriasis-and-stress'))}}">{{$L->__('Read1 More >>')}}</a>
                            </div>
                        </div>
                        <div class="home_page_article">
                            {!!$img->__('weather_and_psoriasis_homepage.jpg')!!}
                            <h3 class="home_page_article_text_title">{{$L->__('article 2 title')}}</h3>
                            <p class="home_page_article_text_content">{{$L->__('article 2 text')}}</p>
                            <div class="home_page_article_text_read_more">
                                <a href="{{url($L->lang.'/'.$L->__('weather-and-psoriasis'))}}">{{$L->__('Read1 More >>')}}</a>
                            </div>
                        </div>
                        <div class="home_page_article">
                            {!!$img->__('combined_psoeasy_with_any_medication_homepage.jpg')!!}
                            <h3 class="home_page_article_text_title">{{$L->__('article 3 title')}}</h3>
                            <p class="home_page_article_text_content">{{$L->__('article 3 text')}}</p>
                            <div class="home_page_article_text_read_more">
                                <a href="{{url($L->lang.'/'.$L->__('combined-psoeasy-products-with-other-medications'))}}">{{$L->__('Read1 More >>')}}</a>
                            </div>
                        </div>
                        <div class="home_page_article">
                            {!!$img->__('treat_when_you_sleep_homepage.jpg')!!}
                            <h3 class="home_page_article_text_title">{{$L->__('article 4 title')}}</h3>
                            <p class="home_page_article_text_content">{{$L->__('article 4 text')}}</p>
                            <div class="home_page_article_text_read_more">
                                <a href="{{url($L->lang.'/'.$L->__('treat-when-you-sleep'))}}">{{$L->__('Read1 More >>')}}</a>
                            </div>
                        </div>
                        <div class="home_page_article">
                            {!!$img->__('psoriasis_otc_homepage.jpg')!!}
                            <h3 class="home_page_article_text_title">{{$L->__('article 5 title')}}</h3>
                            <p class="home_page_article_text_content">{{$L->__('article 5 text')}}</p>
                            <div class="home_page_article_text_read_more">
                                <a href="{{url($L->lang.'/'.$L->__('psoriasis-otc'))}}">{{$L->__('Read1 More >>')}}</a>
                            </div>
                        </div>
                    </div>
                    <div class="home_page_sellers float_left relative">

                        @if($L->lang == 'it' || $L->lang == 'es' || $L->lang == 'cz')
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}">
                                <div class="store_finder_section store_finder_section_mob relative" style="margin-top: 20px">
                                    {!!$img->__('localsrore-button-old.png')!!}
                                    @if($L->lang == 'it')
                                        <div class="store_finder_l1 absolute  store_finder_l1_it">
                                            {{$L->__('Where to bay locally?')}}
                                        </div>
                                        <div class="store_finder_l2 absolute store_finder_l2_it">
                                            {{$L->__('STORE FINDER')}}
                                        </div>
                                    @else
                                        <div class="store_finder_l1 absolute">
                                            {{$L->__('Where to bay locally?')}}
                                        </div>
                                        <div class="store_finder_l2 absolute">
                                            {{$L->__('STORE FINDER')}}
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @else
                            <a href="{{url($L->lang.'/'.$L->__('blog'))}}" class="store_finder_section_link">
                                <div class="store_finder_section store_finder_section_mob_blog relative" style="margin-top: 20px">
                                    {!!$img->__('localsrore-button.png')!!}
                                    @if($L->lang == 'ru')
                                        <div class="store_finder_l1 absolute  store_finder_l1_ru">
                                            {{$L->__('blog_btn top')}}
                                        </div>
                                        <div class="store_finder_l2 absolute store_finder_l2_ru">
                                            {{$L->__('blog_btn bottom')}}
                                        </div>
                                    @else
                                        <div class="store_finder_l1 absolute">
                                            {{$L->__('blog_btn top')}}
                                        </div>
                                        <div class="store_finder_l2 absolute">
                                            {{$L->__('blog_btn bottom')}}
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endif
                        <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                            <div class="online_store_btn online_store_btn_mob relative">
                                {{--                                {!!$img->__('online-button.png')!!}--}}
                                @if ($L->lang == 'en')
                                    <div class="online_store_text to_the_store_btn">{{$L->__('Online')}}<span>{{$L->__('Store')}}</span></div>
                                @elseif ($L->lang == 'ru')
                                    <div class="online_store_text online_store_text_ru to_the_store_btn">{{$L->__('Online')}}<span>{{$L->__('Store')}}</span></div>
                                @else
                                    <div class="online_store_text online_store_text_lang to_the_store_btn to_the_store_btn_lang">{{$L->__('Online')}}<br /><span>{{$L->__('Store')}}</span></div>
                                @endif
                            </div>
                        </a>

                        <div class="banner_section_1_right_1">
                            {{--<a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}">--}}
                                {{--{!!$img->__($L->lang.'_client.jpg')!!}--}}
                                {{--{!!$img->__($L->lang.'_client_mob.jpg', 'client_banner_mob')!!}--}}
                            {{--</a>--}}
                            <a href="{{url($L->lang.'/'.$L->__('over-20-natural-active-ingredients'))}}">
                                {!!$img->__($L->lang.'_psoriasis_treatment.jpg')!!}
                                {!!$img->__($L->lang.'_psoriasis_treatment_mob.jpg', 'client_banner_mob')!!}
                            </a>
                        </div>
                        <div class="banner_section_1_right_2">
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        </div>
                        <a href="{{url($L->lang.'/'.$L->__('vote'))}}" class="home_bottom_btn">
                            <div class="consumer_btn" style="margin-top: 20px">
                                <span>{{$L->__('Consumer Survey1')}}</span>
                            </div>
                        </a>
                        <a href="{{url($L->lang.'/'.$L->__('questionnaire'))}}" class="home_bottom_btn">
                            <div class="quiz_btn">
                                <span>{{$L->__('Qestionnarie for sceptical_art')}}</span>
                            </div>
                        </a>
                        <div class="left_side_to_the_store">
                            <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                <div class="relative">
                                    {!!$img->__('online-button.png', 'to_the_store_img')!!}
                                    @if($L->lang == 'en' || $L->lang == 'de')
                                        <div class="absolute to_the_store_btn">
                                            {{$L->__('To the')}} <span>{{$L->__('STORE_art')}}</span>
                                        </div>
                                    @elseif($L->lang == 'it')
                                        <div class="absolute to_the_store_btn to_the_store_btn_lang to_the_store_btn_lang_it">
                                            {{$L->__('To the')}}<br/><span>{{$L->__('STORE_art')}}</span>
                                        </div>
                                    @elseif($L->lang == 'ru')
                                        <div class="absolute to_the_store_btn to_the_store_btn_lang to_the_store_btn_lang_ru">
                                            {{$L->__('To the')}}<br/><span>{{$L->__('STORE1')}}</span>
                                        </div>
                                    @else
                                        <div class="absolute to_the_store_btn to_the_store_btn_lang">
                                            {{$L->__('To the')}}<br/><span>{{$L->__('STORE_art')}}</span>
                                        </div>
                                    @endif
                                </div>
                            </a>
                        </div>

                        @if($L->lang == 'it' || $L->lang == 'es' || $L->lang == 'cz')
                            <a href="{{url($L->lang.'/'.$L->__('localstores'))}}">
                                <div class="store_finder_section relative" style="margin-top: 20px">
                                    {!!$img->__('localsrore-button-old.png')!!}
                                    @if($L->lang == 'it')
                                        <div class="store_finder_l1 absolute  store_finder_l1_it">
                                            {{$L->__('Where to bay locally?')}}
                                        </div>
                                        <div class="store_finder_l2 absolute store_finder_l2_it">
                                            {{$L->__('STORE FINDER')}}
                                        </div>
                                    @else
                                        <div class="store_finder_l1 absolute">
                                            {{$L->__('Where to bay locally?')}}
                                        </div>
                                        <div class="store_finder_l2 absolute">
                                            {{$L->__('STORE FINDER')}}
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @else
                            <a href="{{url($L->lang.'/'.$L->__('blog'))}}" class="store_finder_section_link">
                                <div class="store_finder_section relative" style="margin-top: 20px">
                                    {!!$img->__('localsrore-button.png')!!}
                                    @if($L->lang == 'ru')
                                        <div class="store_finder_l1 absolute  store_finder_l1_ru">
                                            {{$L->__('blog_btn top')}}
                                        </div>
                                        <div class="store_finder_l2 absolute store_finder_l2_ru">
                                            {{$L->__('blog_btn bottom')}}
                                        </div>
                                    @else
                                        <div class="store_finder_l1 absolute">
                                            {{$L->__('blog_btn top')}}
                                        </div>
                                        <div class="store_finder_l2 absolute">
                                            {{$L->__('blog_btn bottom')}}
                                        </div>
                                    @endif
                                </div>
                            </a>
                        @endif

                        @if($L->lang == 'en')
                            <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                <div class="online_store_btn relative">
                                    {!!$img->__('online-button.png')!!}
                                    <div class="online_store_text">{{$L->__('Online')}}<span>{{$L->__('Store')}}</span></div>
                                </div>
                            </a>
                        @else
                            <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                                <div class="online_store_btn relative">
                                    {!!$img->__('online-button.png')!!}
                                    <div class="online_store_text online_store_text_lang">{{$L->__('Online')}}<br/><span>{{$L->__('Store')}}</span></div>
                                </div>
                            </a>
                        @endif
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="left_side_btn">{{$L->__('articles')}}</div>
@endsection

@section('footer')
    <script src="/js/home.js"></script>
    <script>
        //For articles
        $(window).on("resize load", function () {
            $('.home_page_article:first-of-type').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('psoriasis-and-stress'))}}";
            });

            $('.home_page_article:nth-child(2)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('weather-and-psoriasis'))}}";
            });

            $('.home_page_article:nth-child(3)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('combined-psoeasy-products-with-other-medications'))}}";
            });

            $('.home_page_article:nth-child(4)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('treat-when-you-sleep'))}}";
            });

            $('.home_page_article:last-of-type').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('psoriasis-otc'))}}";
            });
        });

        //For ingridients
        $(window).on("resize load", function () {
            $('.ingredients_sub_section .ingredient:first-of-type').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('mahonia-for-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(2)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('calendula-for-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(3)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('smilax-effect-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(4)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('tea-tree-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(5)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('nettle-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(6)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('wheat-germ-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(7)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('chamomile-psoriasis'))}}";
            });
            $('.ingredients_sub_section .ingredient:nth-of-type(8)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('rosemary-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(9)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('golden-seal-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(10)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('chickweed-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(11)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('sea-buckthorns-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(12)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('arnica-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(13)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('lavandula-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(14)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('aloe-vera-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(15)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('african-palm-tree-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(16)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('shea-butter-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(17)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('grape-seed-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(18)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('camphor-oil-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(19)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('dead-sea-salt-psoriasis'))}}";
            });

            $('.ingredients_sub_section .ingredient:nth-of-type(20)').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('vitamin-D-psoriasis'))}}";
            });


            $('.dead_sea_minerals_articles .ingredient').click(function () {
                window.location.href = "{{url($L->lang.'/'.$L->__('dead-sea-minerals'))}}";
            });
        });

    </script>

@endsection