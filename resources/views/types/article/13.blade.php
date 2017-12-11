<?
$page->long_desc = explode('***', $page->long_desc);

$prodsForPageIds = [
    '1006',
    '1001',
    '1003',
    '1002',
];

$prodsForPage = $pages->whereIn('prod_id',$prodsForPageIds)->all();
$ids = [];
foreach ($prodsForPage as $item){
    $ids[] = $item->id;
}
$reviewsAll = \App\Review::where('lang',$L->lang)
    ->where('published',1)
    ->whereIn('parent_id', $ids)
    ->latest()
    ->get();
$reviews = $reviewsAll->take(6)->all();




?>
@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <link rel="stylesheet" href="/css/diseases.min.css">
@endsection

@section('content')
    <div class="modal fade modal_components">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('20_igridients_icon_2.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('OVER 20 NATURAL')}}</div>
                                    <div class="modal_title_l2">{{$L->__('components')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{!!$L->__('OVER_20_NATURAL_content')!!}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_no_steroids">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('no_steroid_icon.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('NO_STEROIDS_TITLE')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{!!$L->__('NO_STEROIDS_content')!!}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_tested">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('clinically_tested_icon.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('CLINICALLY_TESTED_TITLE')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{!!$L->__('CLINICALLY_TESTED_content')!!}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_results">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('results_in_30_days_icon.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('RESULTS_TITLE')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{!!$L->__('RESULTS_content')!!}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/30')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
            </div>
        </div>
    </div>
    <section class="section__top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 top__title">
                    <h1>{{$L->__('How_psorias_?')}}</h1>
                </div>
                <div class="top__content col-xs-12">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-xs-12">
                            <div class="short_desc">
                                {!!$page->short_desc or ''!!}
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-xs-12">
                            <div class="flip__box">
                                <div class="front">
                                    <div class="flip__item flip__item1"><span>{{$L->__('Learn_more_about')}}</span></div>
                                    <div class="flip__item flip__item2"><span>{{$L->__('Our_service')}}</span></div>
                                    <a href="#products" class="flip__item flip__item3"><span>{{$L->__('Find_treatment')}}</span></a>
                                    <div class="flip__item flip__item4"><span>{{$L->__('Another_diseases')}}</span></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="back back1">
                                    <div class="back__top"><span>{{$L->__('Learn_more_about_back')}}</span></div>
                                    <ul>
                                        <a href="#symptoms"><li>{{$L->__('Learn_more_about_back_item1')}}</li></a>
                                        <a href="#reason"><li>{{$L->__('Learn_more_about_back_item2')}}</li></a>
                                        <a href="#kinds"><li>{{$L->__('Learn_more_about_back_item3')}}</li></a>
                                        <a href="#places"><li>{{$L->__('Learn_more_about_back_item4')}}</li></a>
                                        <a href="#treatment"><li>{{$L->__('Learn_more_about_back_item5')}}</li></a>
                                        <a href="#natural_treatment"><li>{{$L->__('Learn_more_about_back_item6')}}</li></a>
                                        <a href="#advice"><li>{{$L->__('Learn_more_about_back_item7')}}</li></a>
                                        <a href="#food"><li>{{$L->__('Learn_more_about_back_item8')}}</li></a>
                                    </ul>
                                </div>
                                <div class="back back2">
                                    <div class="back__top"><span>{{$L->__('Our_service_back')}}</span></div>
                                    <div class="squares"></div>
                                    <div class="back2__item item__select">
                                        <span>{{$L->__('select_description')}}</span>
                                    </div>
                                    <div class="back2__item item__fill">
                                        <span>{{$L->__('fill_description')}}</span>
                                    </div>
                                    <div class="back2__item item__pay">
                                        <span>{{$L->__('pay_description')}}</span>
                                    </div>
                                    <div class="back2__item item__delivery">
                                        <span>{{$L->__('delivery_description')}}</span>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="back back4">
                                    <div class="back__top"><span>{{$L->__('Another_diseases_back')}}</span></div>
                                    <p>{{$L->__('Diseases_back_title1')}}</p>
                                    <ul>
                                        <a href="{{$L->__('link_dis_back_item1')}}" target="_blank"><li>{{$L->__('Dis_back_item1')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item2')}}" target="_blank"><li>{{$L->__('Dis_back_item2')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item3')}}" target="_blank"><li>{{$L->__('Dis_back_item3')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item4')}}" target="_blank"><li>{{$L->__('Dis_b_item4')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item5')}}" target="_blank"><li>{{$L->__('Dis_b_item5')}}</li></a>
                                    </ul>
                                    <p>{{$L->__('Diseases_back_title2')}}</p>
                                    <ul>
                                        <a href="{{$L->__('link_dis_back_item6')}}" target="_blank"><li>{{$L->__('Diseases_back_item6')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item7')}}" target="_blank"><li>{{$L->__('Diseases_back_item7')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item8')}}" target="_blank"><li>{{$L->__('Diseases_back_item8')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item9')}}" target="_blank"><li>{{$L->__('Diseases_back_item9')}}</li></a>
                                        <a href="{{$L->__('link_dis_back_item10')}}" target="_blank"><li>{{$L->__('Diseases_back_item10')}}</li></a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="prod_prefooter col-xs-12">
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
                        <div class="clearfix"></div>
                    </a>
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
                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                        <div class="l2_3_2">
                            <div class="float_left">{!! $img->__('online.png', 'l2_3_2_img') !!}{!! $img->__('online_mob.png', 'l2_3_2_img_mob') !!}</div>
                            <div class="float_left l2_3_2_text">
                                <span class="l2_3_2_text_1">{{$L->__('Online')}}</span>
                                <span class="l2_3_2_text_2">{{$L->__('STORE_1')}}</span>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="clearfix"></div>
            </div>

            <div id="products" class="col-xs-12 diseases__product">
                {!!$L->__('Psoriasis1')!!}

                @foreach($prodsForPage as $prod)

                    <?
                    $reviewsProd = $reviewsAll->where('parent_id',$prod->id)->all();
                    $rate = 0;
                    foreach ($reviewsProd as $r){
                        $rate += $r->rate;
                    }
                    if(count($reviewsProd) != 0){
                        $rate = round($rate/count($reviewsProd),1);
                    }
                        $price = \App\Dosage::where('lang',$L->lang)
                        ->where('prod_id',$prod->prod_id)
                        ->first()->price;
                    ?>

                    <div class="diseases__product-box">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-2 col-xs-5">
                                {!! $img->__($prod->prod_id.'_1.jpg', 'diseases__product-img') !!}
                            </div>
                            <div class="col-lg-6 col-md-5 col-sm-5 col-xs-7">
                                <p class="diseases__product-name">{{$prod->link_name}}</p>
                                <p class="diseases__product-description">{{$L->__('Diseases_product_description')}}</p>
                                <ul>
                                    <li>{{$L->__($prod->prod_id.'_diseases_product_item1')}}</li>
                                    <li>{{$L->__($prod->prod_id.'_diseases_product_item2')}}</li>
                                    <li>{{$L->__($prod->prod_id.'_diseases_product_item3')}}</li>
                                    <li>{{$L->__($prod->prod_id.'_diseases_product_item4')}}</li>
                                    <li>{{$L->__($prod->prod_id.'_diseases_product_item5')}}</li>
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-5 col-xs-12">
                                <div class="diseases__product-wrap">
                                    <div class="diseases__product-stars">
                                        @for($i=0;$i<5;$i++)
                                            @if($rate>=1)
                                                <img src="/img/star_review.png" alt="{{$L->__('star_product_full')}}">
                                            @endif
                                            @if($rate<1&&$rate>0.4)
                                                <img src="/img/star_review_half.png" alt="{{$L->__('star_product_half')}}">
                                            @endif
                                            @if($rate<0.5)
                                                <img src="/img/star_review_empty.png" alt="{{$L->__('star_product_empty')}}">
                                            @endif
                                            <?$rate--?>
                                        @endfor
                                    </div>
                                    <div class="diseases__product-price">
                                        <span>{{$L->__('Price:')}}<span>{{sprintf('%01.2f' ,$price)}} €</span></span>
                                    </div>
                                    <div onclick="document.location.href='{{url('admin/addProdToCart/'.$prod->prod_id.'/'.$L->__('link_cart').'/'.$L->lang)}}'" class="diseases__product-add-to-basket"><span>{{$L->__('Add_to_basket')}}</span></div>
                                    <a href="{{url($L->lang.'/'.$prod->seo_url)}}"><div class="diseases__product-more-info"><span>{{$L->__('More_info')}}</span></div></a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-9 col-sm-8 col-xs-12">
                <a class="diseases__tab-mob symptoms"><span>{{$L->__('Symptoms_psorias')}}</span></a>
                <div id="symptoms" class="long_desc long_desc1">
                    {!!$page->long_desc[0] or ''!!}
                    {!! $img->__('line_title.jpg') !!}
                    <div class="long_desc1__wrap-img long_desc__wrap-img">
                        {!! $img->__($L->lang.'_symptoms_1.jpg') !!}
                        {!! $img->__($L->lang.'_symptoms_2.jpg') !!}
                        <div class="clearfix"></div>
                    </div>
                    {!! $img->__('line_footer.jpg') !!}
                    {!!$page->long_desc[1] or ''!!}
                </div>
                <a class="diseases__tab-mob reason"><span>{{$L->__('Reason_psorias')}}</span></a>
                <div id="reason" class="long_desc long_desc2">
                    {!!$page->long_desc[2] or ''!!}
                    {!! $img->__('line_title.jpg') !!}
                    <div class="long_desc2__wrap-img long_desc__wrap-img">
                        {!! $img->__('reason.png') !!}
                        {!! $img->__($L->lang.'_reason.png') !!}
                        <div class="clearfix"></div>
                    </div>
                    {!! $img->__('line_footer.jpg') !!}
                    {!!$page->long_desc[3] or ''!!}
                </div>
                <a class="diseases__tab-mob kinds"><span>{{$L->__('Kinds_psorias')}}</span></a>
                <div id="kinds" class="long_desc long_desc3">
                    {!!$page->long_desc[4] or ''!!}
                    {!! $img->__('line_title.jpg') !!}
                    <div class="long_desc3__wrap-img">
                        {!! $img->__($L->lang.'_kinds_1.jpg', 'long_desc_img-center long_desc3_img-mob') !!}
                        {!! $img->__($L->lang.'_kinds_2.jpg', 'long_desc_img-center long_desc3_img-mob') !!}
                    </div>
                    {!! $img->__('line_footer.jpg') !!}
                    {!!$page->long_desc[5] or ''!!}
                </div>
                <a class="diseases__tab-mob places"><span>{{$L->__('Places_psorias')}}</span></a>
                <div id="places" class="long_desc long_desc4">
                    {!!$page->long_desc[6] or ''!!}
                    {!! $img->__($L->lang.'_places.jpg', 'long_desc4_img') !!}
                    {!! $img->__($L->lang.'_pic_1.jpg', 'long_desc4_img-mob') !!}
                    {!!$page->long_desc[7] or ''!!}
                    {!! $img->__($L->lang.'_who.jpg', 'long_desc4_img') !!}
                    {!! $img->__('who.png', 'long_desc4_img-mob long_desc4_img-mob1') !!}
                </div>
                <a class="diseases__tab-mob treatment"><span>{{$L->__('Treatment_psorias')}}</span></a>
                <div id="treatment" class="long_desc long_desc5">
                    {!!$page->long_desc[8] or ''!!}
                </div>
                <a class="diseases__tab-mob natural_treatment"><span>{{$L->__('Natural_treatment_psorias')}}</span></a>
                <div id="natural_treatment" class="long_desc long_desc6">
                    {!!$page->long_desc[9] or ''!!}
                    {!! $img->__('line_title.jpg', 'no-margin') !!}
                    {!! $img->__('3001_1_cat_d.jpg', 'no-margin long_desc_img') !!}
                    {!! $img->__('3001_1.jpg', 'no-margin long_desc_img-mob') !!}
                    {!! $img->__('line_footer.jpg') !!}
                    {!!$page->long_desc[10] or ''!!}
                </div>
                <div class="long_desc long_desc7">
                    {!! $img->__('line_title.jpg') !!}
                    {!!$L->__('The_triple')!!}
                    <ol>
                        <li>{{$L->__('List_psoeasy_item1')}}</li>
                        <li>{{$L->__('List_psoeasy_item2')}}</li>
                        <li>{{$L->__('List_psoeasy_item3')}}</li>
                    </ol>
                    <span>{{$L->__('Pre_list_psoeasy')}}</span>
                    <ul>
                        <li><span>{{$L->__('pre_list_psoeasy_item4')}}</span>{{$L->__('List_psoeasy_item4')}}</li>
                        <li><span>{{$L->__('pre_list_psoeasy_item5')}}</span>{{$L->__('List_psoeasy_item5')}}</li>
                        <li><span>{{$L->__('pre_list_psoeasy_item6')}}</span>{{$L->__('List_psoeasy_item6')}}</li>
                    </ul>
                </div>
                <div class="long_desc long_desc8">
                    {!! $img->__('line_title.jpg') !!}
                    {!!$L->__('The_natural_answer')!!}
                    <div class="diseases__modal">
                        <div class="row">
                            <div class="col-xs-3">
                                <div class="diseases__modal-item diseases__modal-item1">
                                    <div class="diseases__modal-img">{!! $img->__('1_answer.png') !!}</div>
                                    <span>{{$L->__('over 20 natural active ingredients')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="diseases__modal-item diseases__modal-item2">
                                    <div class="diseases__modal-img">{!! $img->__('2_answer.png') !!}</div>
                                    <span>{{$L->__('no_steroids_or_tars')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="diseases__modal-item diseases__modal-item3">
                                    <div class="diseases__modal-img">{!! $img->__('3_answer.png') !!}</div>
                                    <span>{{$L->__('clinically tested')}}</span>
                                </div>
                            </div>
                            <div class="col-xs-3">
                                <div class="diseases__modal-item diseases__modal-item4">
                                    <div class="diseases__modal-img">{!! $img->__('4_answer.png') !!}</div>
                                    <span>{{$L->__('results in 30 days')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <a class="diseases__tab-mob advice"><span>{{$L->__('Advice_psorias')}}</span></a>
                <div id="advice" class="long_desc long_desc9">
                    {!!$page->long_desc[11] or ''!!}
                </div>
                <a class="diseases__tab-mob food"><span>{{$L->__('Food_psorias')}}</span></a>
                <div id="food" class="long_desc long_desc10">
                    {!!$page->long_desc[12] or ''!!}
                    {!! $img->__($L->lang.'_food_1.jpg', 'long_desc_img-center long_desc10_img') !!}
                    {!! $img->__($L->lang.'_food_2.jpg', 'long_desc_img-center long_desc10_img') !!}
                    {!!$page->long_desc[13] or ''!!}
                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                <div class="information_fixed">
                    <span>{{$L->__('Information_title_text')}}</span>
                    <ul>
                        <a href="#symptoms"><li>{{$L->__('Information_item1')}}</li></a>
                        <a href="#reason"><li>{{$L->__('Information_item2')}}</li></a>
                        <a href="#kinds"><li>{{$L->__('Information_item3')}}</li></a>
                        <a href="#places"><li>{{$L->__('Information_item4')}}</li></a>
                        <a href="#treatment"><li>{{$L->__('Information_item5')}}</li></a>
                        <a href="#natural_treatment"><li>{{$L->__('Information_item6')}}</li></a>
                        <a href="#advice"><li>{{$L->__('Information_item7')}}</li></a>
                        <a href="#food"><li>{{$L->__('Information_item8')}}</li></a>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="diseases__reviews">
                    <div class="row">
                        <div class="numbers__wrap">
                            <div class="col-md-4">
                                <div class="diseases__numbers">6933</div>
                                <span>{{$L->__('Service_is_outstanding')}}</span>
                                <div class="numbers-rate">
                                    {!!$img->__('star_review.png')!!}
                                    {!!$img->__('star_review.png')!!}
                                    {!!$img->__('star_review.png')!!}
                                    {!!$img->__('star_review.png')!!}
                                    {!!$img->__('star_review.png')!!}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="numbers__title">{{$L->__('Our_patients')}}</div>
                                {{--<span>{!!$L->__('Quick_and_district_delivery')!!}</span>--}}
                                <ul>
                                    <li>{{$L->__('Quick_and_district_delivery1')}}</li>
                                    <li>{{$L->__('Quick_and_district_delivery2')}}</li>
                                    <li>{{$L->__('Quick_and_district_delivery3')}}</li>
                                    <li>{{$L->__('Quick_and_district_delivery4')}}</li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                {!!$img->__('icon_comments.png', 'icon_comments')!!}
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <div class="row">
                                    @for($j=0;$j<3;$j++)
                                        <?$rate = $reviews[$j]->rate;?>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="review-wrap">
                                                <div class="review-rate">

                                                    @for($i=0;$i<5;$i++)
                                                        @if($rate>=1)
                                                            {!!$img->__('star_product_full.png')!!}
                                                        @endif
                                                        @if($rate<1&&$rate>0.4)
                                                                {!!$img->__('star_product_half.png')!!}
                                                        @endif
                                                        @if($rate<0.5)
                                                                {!!$img->__('star_product_empty.png')!!}
                                                        @endif
                                                        <?$rate--?>
                                                    @endfor

                                                </div>
                                                <div class="review-title">
                                                    <span>{{$reviews[$j]->title}}</span>
                                                </div>
                                                <div class="review-comment">{{$reviews[$j]->comment}}</div>
                                                <div class="review-author">
                                                    <span>{{$reviews[$j]->name}}</span>
                                                    <span>{{$reviews[$j]->created_at->format('d/m/Y')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor

                                </div>
                            </div>
                            <div class="item">
                                <div class="row">
                                    @for($j=3;$j<6;$j++)
                                        <?$rate = $reviews[$j]->rate;?>
                                        <div class="col-sm-4 col-xs-12">
                                            <div class="review-wrap">
                                                <div class="review-rate">

                                                    @for($i=0;$i<5;$i++)
                                                        @if($rate>=1)
                                                            {!!$img->__('star_product_full.png')!!}
                                                        @endif
                                                        @if($rate<1&&$rate>0.4)
                                                            {!!$img->__('star_product_half.png')!!}
                                                        @endif
                                                        @if($rate<0.5)
                                                            {!!$img->__('star_product_empty.png')!!}
                                                        @endif
                                                        <?$rate--?>
                                                    @endfor

                                                </div>
                                                <div class="review-title">
                                                    <span>{{$reviews[$j]->title}}</span>
                                                </div>
                                                <div class="review-comment">{{$reviews[$j]->comment}}</div>
                                                <div class="review-author">
                                                    <span>{{$reviews[$j]->name}}</span>
                                                    <span>{{$reviews[$j]->created_at->format('d/m/Y')}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>

                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        </ol>
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="header-links diseases__header-links">
                    <span class="">{{$L->__('Can_we_help?')}}</span>
                    <span class="">{{$L->__('Oyr_service_available')}}</span>
                    <div class="header-icon header-phone">
                        {{--@if($c=='US')--}}
                        {{--<a href="{{$L->__('tel:+442036702190_usa')}}">{!! $img->__('usa_contact_blue.png') !!}</a>--}}
                        {{--@else--}}
                        <a href="{{$L->__('tel:+442036702190')}}">{!! $img->__($L->lang.'_icon_header.png') !!}</a>
                        {{--@endif--}}
                    </div>
                    <div class="header-icon header-icon-bg header-faq"><a href="{{url($L->lang.'/'.$L->__('FAQ'))}}">{{$L->__('FAQs')}}</a></div>
                    <div class="header-icon header-icon-bg header-contact"><a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('Contact Us')}}</a></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="our_services" class="diseases__how-work">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="how-work__title">{{$L->__('This_is_How_we_work')}}</div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="diseases__how-work-step diseases__select">
                        <div class="diseases__how-work-img">{!! $img->__('select.png') !!}</div>
                        <span>{{$L->__('how_work_step1')}}</span>
                        <div class="diseases__how-work-square">1</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="diseases__how-work-step diseases__fill">
                        <div class="diseases__how-work-img">{!! $img->__('fill.png') !!}</div>
                        <span>{{$L->__('how_work_step2')}}</span>
                        <div class="diseases__how-work-square">2</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="diseases__how-work-step diseases__pay">
                        <div class="diseases__how-work-img">{!! $img->__('pay-diseases.png') !!}</div>
                        <span>{{$L->__('how_work_step3')}}</span>
                        <div class="diseases__how-work-square">3</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="diseases__get">
                        <div class="diseases__how-work-square diseases__how-work-square4">4</div>
                        <div class="diseases__how-work-img4">{!! $img->__('get.png') !!}</div>
                        <span>{{$L->__('how_work_step4')}}</span>
                        <div class="diseases__how-work-square diseases__how-work-square-mob">4</div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="information_bottom">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="information_bottom-title">
                                <span>{{$L->__('Information_bottom_title')}}</span>
                            </div>
                        </div>
                        <div class="information_bottom-wrap">
                            <div class="bottom__tab-mob col-xs-12"><span>{{$L->__('Title_tab1')}}</span></div>
                            <div class="col-sm-4 col-xs-12">
                                <ul>
                                    <span class="information_bottom-list-title">{{$L->__('Information_bottom_title1')}}</span>
                                    {{--<a href="{{$L->__('link_information_bottom_item1')}}"><li>{{$L->__('Information_bottom_item1')}}</li></a>--}}
                                    <a href="{{$L->__('link_information_bottom_item2')}}"><li>{{$L->__('Information_bottom_item2')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item3')}}"><li>{{$L->__('Information_bottom_item3')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item4')}}"><li>{{$L->__('Information_bottom_item4')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item5')}}"><li>{{$L->__('Information_bottom_item5')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item6')}}"><li>{{$L->__('Information_bottom_item6')}}</li></a>
                                </ul>
                            </div>
                            <div class="bottom__tab-mob col-xs-12"><span>{{$L->__('Title_tab2')}}</span></div>
                            <div class="col-sm-4 col-xs-12">
                                <ul>
                                    <span class="information_bottom-list-title">{{$L->__('Information_bottom_title2')}}</span>
                                    <a href="{{$L->__('link_information_bottom_item7')}}"><li>{{$L->__('Information_bottom_item7')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item8')}}"><li>{{$L->__('Information_bottom_item8')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item9')}}"><li>{{$L->__('Information_bottom_item9')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item10')}}"><li>{{$L->__('Information_bottom_item10')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item11')}}"><li>{{$L->__('Information_bottom_item11')}}</li></a>
                                </ul>
                            </div>
                            <div class="bottom__tab-mob col-xs-12"><span>{{$L->__('Title_tab3')}}</span></div>
                            <div class="col-sm-4 col-xs-12">
                                <ul>
                                    <span class="information_bottom-list-title">{{$L->__('Information_bottom_title3')}}</span>
                                    <a href="{{$L->__('link_information_bottom_item12')}}"><li>{{$L->__('Information_bottom_item12')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item13')}}"><li>{{$L->__('Information_bottom_item13')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item14')}}"><li>{{$L->__('Information_bottom_item14')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item15')}}"><li>{{$L->__('Information_bottom_item15')}}</li></a>
                                    <a href="{{$L->__('link_information_bottom_item16')}}"><li>{{$L->__('Information_bottom_item16')}}</li></a>
                                </ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    <script src="/js/diseases.js"></script>
    <script>
        $(function () {

            //Cut reviews
            cutReviews($('.item:first-of-type .col-sm-4'), 314);
            cutReviews($('.item:last-of-type .col-sm-4'), 314);

            //Functions
            function cutReviews(selector, countSymbol) {
                var reviews = [];
                var reviewsCut = [];
                var i = 0;
                selector.each(function () {
                    reviews[i] = $(this).children().children('.review-comment').attr('data-num', i).html();
                    if(reviews[i].length > countSymbol) {
                        reviewsCut[i] = reviews[i].substr(0, countSymbol);
                        $(this).children().children('.review-comment').html(reviewsCut[i]).append('...<span class="review__read-more">' + '<?=$L->__('Read more')?>' + '</span>');
                    }
                    i++;
                });

                $('.review__read-more').click(function () {
                    var dataNum = Number($(this).parent().attr('data-num'));
                    $(this).parent().html(reviews[dataNum]);
                });
            }

        });
    </script>

@endsection
