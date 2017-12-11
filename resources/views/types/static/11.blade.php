@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/home_page.css">
    <link rel="stylesheet" href="/css/styl/article.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <link rel="stylesheet" href="/css/vote.min.css">
    <link rel="stylesheet" href="/css/media_home.min.css">
    <link rel="stylesheet" href="/css/media_article.css">
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
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->short_desc}}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/37')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_minerals">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('dead_sea_minerals_icon.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('MINERALS_TITLE')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/6')->first()->short_desc}}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/6')->first()->seo_url)}}"
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
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/8')->first()->short_desc}}</p>
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
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/10')->first()->short_desc}}</p>
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
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/30')->first()->short_desc}}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/30')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal_proofing">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body relative">
                    <button type="button" class="absolute close_modal" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <div class="float_left modal_left">
                        <div class="">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                        <div class="popup_icon">{!!$img->__('16_years_of_proofing_icon.jpg')!!}</div>
                    </div>
                    <div class="float_left modal_right">
                        <div class="flex w_100">
                            <div class="margin_auto">
                                <div class="modal_title">
                                    <div class="modal_title_l1">{{$L->__('PROOFING_TITLE')}}</div>
                                </div>
                            </div>
                        </div>
                        <div style="padding: 0 10px">
                            <p>{{$pages->where('real_url', '/'.$L->lang.'/article/11')->first()->short_desc}}</p>
                        </div>
                    </div>
                    <a href="{{url($L->lang.'/'.$pages->where('real_url', '/'.$L->lang.'/article/11')->first()->seo_url)}}"
                       class="absolute modal_read_more">{{$L->__('Read more_modal')}}</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7">
                <div class="breadcrumbs">
                    <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
                </div>
                <div class="vote_logo">
                    {{$L->__('Psoriasis Quiz')}}
                </div>
                <div style="font-size: 18px; font-weight: bold; margin: 0 0 20px 0; color: #0a5a8b;">
                    {!! $page->short_desc !!}
                </div>
                <div class="wrap_q">
                    <div class="social_block social_block_hidden">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                <div class="q_1_section q_section">
                    <div class="q_1 q">{{$L->__('question 1')}}</div>
                    <div class="ans ans_1">
                        <input class="q_1" id="ans_1_1" type="radio" name="q_1_1" value="ans_1_1" onclick="sendAnswer('q_1','ans_1_1')">
                        <label class="radio_button" for="ans_1_1">{{$L->__('ans_1_1')}}</label>

                        <input class="q_1" id="ans_1_2" type="radio" name="q_1_1" value="ans_1_2" onclick="sendAnswer('q_1','ans_1_2')">
                        <label class="radio_button" for="ans_1_2">{{$L->__('ans_1_2')}}</label>

                        <input class="q_1" id="ans_1_3" type="radio" name="q_1_1" value="ans_1_3" onclick="sendAnswer('q_1','ans_1_3')">
                        <label class="radio_button" for="ans_1_3">{{$L->__('ans_1_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_2_section q_section">
                    <div class="q_2 q">{{$L->__('question 2')}}</div>
                    <div class="ans ans_2">
                        <input class="q_2" id="ans_2_1" type="radio" name="q_2_1" value="ans_2_1" onclick="sendAnswer('q_2','ans_2_1')">
                        <label class="radio_button" for="ans_2_1">{{$L->__('ans_2_1')}}</label>

                        <input class="q_2" id="ans_2_2" type="radio" name="q_2_1" value="ans_2_2" onclick="sendAnswer('q_2','ans_2_2')">
                        <label class="radio_button" for="ans_2_2">{{$L->__('ans_2_2')}}</label>

                        <input class="q_2" id="ans_2_3" type="radio" name="q_2_1" value="ans_2_3" onclick="sendAnswer('q_2','ans_2_3')">
                        <label class="radio_button" for="ans_2_3">{{$L->__('ans_2_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_3_section q_section">
                    <div class="q_3 q">{{$L->__('question 3')}}</div>
                    <div class="ans ans_3">
                        <input class="q_3" id="ans_3_1" type="radio" name="q_3_1" value="ans_3_1" onclick="sendAnswer('q_3','ans_3_1')">
                        <label class="radio_button" for="ans_3_1">{{$L->__('ans_3_1')}}</label>

                        <input class="q_3" id="ans_3_2" type="radio" name="q_3_1" value="ans_3_2" onclick="sendAnswer('q_3','ans_3_2')">
                        <label class="radio_button" for="ans_3_2">{{$L->__('ans_3_2')}}</label>

                        <input class="q_3" id="ans_3_3" type="radio" name="q_3_1" value="ans_3_3" onclick="sendAnswer('q_3','ans_3_3')">
                        <label class="radio_button" for="ans_3_3">{{$L->__('ans_3_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_4_section q_section">
                    <div class="q_4 q">{{$L->__('question 4')}}</div>
                    <div class="ans ans_4">
                        <input class="q_4" id="ans_4_1" type="radio" name="q_4_1" value="ans_4_1" onclick="sendAnswer('q_4','ans_4_1')">
                        <label class="radio_button" for="ans_4_1">{{$L->__('ans_4_1')}}</label>

                        <input class="q_4" id="ans_4_2" type="radio" name="q_4_1" value="ans_4_2" onclick="sendAnswer('q_4','ans_4_2')">
                        <label class="radio_button" for="ans_4_2">{{$L->__('ans_4_2')}}</label>

                        <input class="q_4" id="ans_4_3" type="radio" name="q_4_1" value="ans_4_3" onclick="sendAnswer('q_4','ans_4_3')">
                        <label class="radio_button" for="ans_4_3">{{$L->__('ans_4_3')}}</label>

                        <input class="q_4" id="ans_4_4" type="radio" name="q_4_1" value="ans_4_4" onclick="sendAnswer('q_4','ans_4_4')">
                        <label class="radio_button" for="ans_4_4">{{$L->__('ans_4_4')}}</label>

                        <input class="q_4" id="ans_4_5" type="radio" name="q_4_1" value="ans_4_5" onclick="sendAnswer('q_4','ans_4_5')">
                        <label class="radio_button" for="ans_4_5">{{$L->__('ans_4_5')}}</label>

                        <input class="q_4" id="ans_4_6" type="radio" name="q_4_1" value="ans_4_6" onclick="sendAnswer('q_4','ans_4_6')">
                        <label class="radio_button" for="ans_4_6">{{$L->__('ans_4_6')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_5_section q_section">
                    <div class="q_5 q">{{$L->__('question 5')}}</div>
                    <div class="ans ans_5">
                        <input class="q_5" id="ans_5_1" type="radio" name="q_5_1" value="ans_5_1" onclick="sendAnswer('q_5','ans_5_1')">
                        <label class="radio_button" for="ans_5_1">{{$L->__('ans_5_1')}}</label>

                        <input class="q_5" id="ans_5_2" type="radio" name="q_5_1" value="ans_5_2" onclick="sendAnswer('q_5','ans_5_2')">
                        <label class="radio_button" for="ans_5_2">{{$L->__('ans_5_2')}}</label>

                        <input class="q_5" id="ans_5_3" type="radio" name="q_5_1" value="ans_5_3" onclick="sendAnswer('q_5','ans_5_3')">
                        <label class="radio_button" for="ans_5_3">{{$L->__('ans_5_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_6_section q_section">
                    <div class="q_6 q">{{$L->__('question 6')}}</div>
                    <div class="ans ans_6">
                        <input class="q_6" id="ans_6_1" type="radio" name="q_6_1" value="ans_6_1" onclick="sendAnswer('q_6','ans_6_1')">
                        <label class="radio_button" for="ans_6_1">{{$L->__('ans_6_1')}}</label>

                        <input class="q_6" id="ans_6_2" type="radio" name="q_6_1" value="ans_6_2" onclick="sendAnswer('q_6','ans_6_2')">
                        <label class="radio_button" for="ans_6_2">{{$L->__('ans_6_2')}}</label>

                        <input class="q_6" id="ans_6_3" type="radio" name="q_6_1" value="ans_6_3" onclick="sendAnswer('q_6','ans_6_3')">
                        <label class="radio_button" for="ans_6_3">{{$L->__('ans_6_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_7_section q_section">
                    <div class="q_7 q">{{$L->__('question 7')}}</div>
                    <div class="ans ans_7">
                        <input class="q_7" id="ans_7_1" type="radio" name="q_7_1" value="ans_7_1" onclick="sendAnswer('q_7','ans_7_1')">
                        <label class="radio_button" for="ans_7_1">{{$L->__('ans_7_1')}}</label>

                        <input class="q_7" id="ans_7_2" type="radio" name="q_7_1" value="ans_7_2" onclick="sendAnswer('q_7','ans_7_2')">
                        <label class="radio_button" for="ans_7_2">{{$L->__('ans_7_2')}}</label>

                        <input class="q_7" id="ans_7_3" type="radio" name="q_7_1" value="ans_7_3" onclick="sendAnswer('q_7','ans_7_3')">
                        <label class="radio_button" for="ans_7_3">{{$L->__('ans_7_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_8_section q_section">
                        <div class="q_8 q">{{$L->__('question 8')}}</div>
                        <div class="ans ans_8">
                            <input class="q_8" id="ans_8_1" type="radio" name="q_8_1" value="ans_8_1" onclick="sendAnswer('q_8','ans_8_1')">
                            <label class="radio_button" for="ans_8_1">{{$L->__('ans_8_1')}}</label>

                            <input class="q_8" id="ans_8_2" type="radio" name="q_8_1" value="ans_8_2" onclick="sendAnswer('q_8','ans_8_2')">
                            <label class="radio_button" for="ans_8_2">{{$L->__('ans_8_2')}}</label>

                            <input class="q_8" id="ans_8_3" type="radio" name="q_8_1" value="ans_8_3" onclick="sendAnswer('q_8','ans_8_3')">
                            <label class="radio_button" for="ans_8_3">{{$L->__('ans_8_3')}}</label>
                        </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_9_section q_section">
                    <div class="q_9 q">{{$L->__('question 9')}}</div>
                    <div class="ans ans_9">
                        <input class="q_9" id="ans_9_1" type="radio" name="q_9_1" value="ans_9_1" onclick="sendAnswer('q_9','ans_9_1')">
                        <label class="radio_button" for="ans_9_1">{{$L->__('ans_9_1')}}</label>

                        <input class="q_9" id="ans_9_2" type="radio" name="q_9_1" value="ans_9_2" onclick="sendAnswer('q_9','ans_9_2')">
                        <label class="radio_button" for="ans_9_2">{{$L->__('ans_9_2')}}</label>

                        <input class="q_9" id="ans_9_3" type="radio" name="q_9_1" value="ans_9_3" onclick="sendAnswer('q_9','ans_9_3')">
                        <label class="radio_button" for="ans_9_3">{{$L->__('ans_9_3')}}</label>

                        <input class="q_9" id="ans_9_4" type="radio" name="q_9_1" value="ans_9_4" onclick="sendAnswer('q_9','ans_9_4')">
                        <label class="radio_button" for="ans_9_4">{{$L->__('ans_9_4')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_10_section q_section">
                    <div class="q_10 q">{{$L->__('question 10')}}</div>
                    <div class="ans ans_10">
                        <input class="q_10" id="ans_10_1" type="radio" name="q_10_1" value="ans_10_1" onclick="sendAnswer('q_10','ans_10_1')">
                        <label class="radio_button" for="ans_10_1">{{$L->__('ans_10_1')}}</label>

                        <input class="q_10" id="ans_10_2" type="radio" name="q_10_1" value="ans_10_2" onclick="sendAnswer('q_10','ans_10_2')">
                        <label class="radio_button" for="ans_10_2">{{$L->__('ans_10_2')}}</label>

                        <input class="q_10" id="ans_10_3" type="radio" name="q_10_1" value="ans_10_3" onclick="sendAnswer('q_10','ans_10_3')">
                        <label class="radio_button" for="ans_10_3">{{$L->__('ans_10_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_11_section q_section">
                    <div class="q_11 q">{{$L->__('question 11')}}</div>
                    <div class="ans ans_11">
                        <input class="q_11" id="ans_11_1" type="radio" name="q_11_1" value="ans_11_1" onclick="sendAnswer('q_11','ans_11_1')">
                        <label class="radio_button" for="ans_11_1">{{$L->__('ans_11_1')}}</label>

                        <input class="q_11" id="ans_11_2" type="radio" name="q_11_1" value="ans_11_2" onclick="sendAnswer('q_11','ans_11_2')">
                        <label class="radio_button" for="ans_11_2">{{$L->__('ans_11_2')}}</label>

                        <input class="q_11" id="ans_11_3" type="radio" name="q_11_1" value="ans_11_3" onclick="sendAnswer('q_11','ans_11_3')">
                        <label class="radio_button" for="ans_11_3">{{$L->__('ans_11_3')}}</label>
                    </div>
                    <div class="statistic"></div>
                    <div class="clearfix"></div>
                </div>
                <div class="q_positive_section q_bottom_section">
                    {!! $img->__($L->lang.'_popup-logo.jpg') !!}
                    <div class="q_bottom_section__content">
                        {{$L->__('q_bottom_section__content_1')}}
                    </div>
                    <a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}" class="quiz_discount_vote_link">
                        <div class="quiz_discount quiz_discount_vote">{{$L->__('Get your')}}<span>{{$L->__('50% Discount')}}</span></div>
                    </a>
                </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-5 right_wrap">
                <div class="right_sidebar">
                    <div class="social_block">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="online-store__bottom-banner">
                        <a href="{{url($L->__('cat_2_link'))}}">{!!$img->__($L->lang.'_shampoo_lotion_banner.jpg')!!}</a>
                    </div>
                    <div class="trust-banner">
                        <div class="trust-banner__background">
                            {!!$img->__('background_trust_banner.png')!!}
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
                    <div class="dsp_video">
                        <iframe src="https://www.youtube.com/embed/AORmwHN8e_8"
                                frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                    <a href="{{url($L->lang.'/'.$L->__('results-in-30-days'))}}">
                        <div class="money_back">
                            {!!$img->__($L->lang.'_money-back-new.jpg')!!}
                            {!!$img->__($L->lang.'_money-back-new_mob.jpg', 'money-back-new-mob')!!}
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 right_side right_side_vote">
                <div class="home_page_title">
                    <div class="flex">
                        <div class="margin_auto">
                            <span>{{$L->__('PSOEASY')}}</span>
                            {{$L->__('IS UNIQUE NATURAL FORMULA')}}
                        </div>
                    </div>
                </div>
                <div class="modal_icons_section col-lg-12 no_padding">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 no_padding">
                        <div class="modal_icon_wrap components">
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
                        </div>
                        <div class="modal_icon_wrap minerals">
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
                        </div>
                        <div class="modal_icon_wrap steroids steroids_mob">
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
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 no_padding tab_hidden">
                        <div class="modal_icon_wrap steroids">
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
                        </div>
                        <div class="modal_icon_wrap tested">
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
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 no_padding">
                        <div class="modal_icon_wrap tested tested_mob">
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
                        </div>
                        <div class="modal_icon_wrap results">
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
                        </div>
                        <div class="modal_icon_wrap proofing">
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
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
                <div class="article_l3">
                    <div class="article_slider article_slider_vote float_left">
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
                            <div class="home_page_article_img float_left">{!!$img->__('psoriasis_and_stress_homepage.jpg')!!}</div>
                            <div class="home_page_article_text float_left">
                                <div class="home_page_article_text_title">
                                    <h3 style="font-size: inherit; margin: 0; font-weight: inherit">{{$L->__('article 1 title')}}</h3>
                                </div>
                                <div class="home_page_article_text_content">
                                    {!!$img->__('psoriasis_and_stress_homepage.jpg', 'article_img_mob')!!}
                                    <p>
                                        {!!$img->__('psoriasis_and_stress_homepage.jpg', 'article_img_mob article_img_mob_small')!!}
                                        <span class="home_page_article_text_title_mob">{{$L->__('article 1 title')}}</span>
                                        {{$L->__('article 1 text')}}
                                    </p>
                                </div>
                                <div class="home_page_article_text_read_more">
                                    <a href="{{url($L->lang.'/'.$L->__('psoriasis-and-stress'))}}">{{$L->__('Read More1 >>')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="home_page_article">
                            <div class="home_page_article_img float_left">{!!$img->__('weather_and_psoriasis_homepage.jpg')!!}</div>
                            <div class="home_page_article_text float_left">
                                <div class="home_page_article_text_title">
                                    <h3 style="font-size: inherit; margin: 0; font-weight: inherit">{{$L->__('article 2 title')}}</h3>
                                </div>
                                <div class="home_page_article_text_content">
                                    {!!$img->__('weather_and_psoriasis_homepage.jpg', 'article_img_mob')!!}
                                    <p>
                                        {!!$img->__('weather_and_psoriasis_homepage.jpg', 'article_img_mob article_img_mob_small')!!}
                                        <span class="home_page_article_text_title_mob">{{$L->__('article 2 title')}}</span>
                                        {{$L->__('article 2 text')}}
                                    </p>
                                </div>
                                <div class="home_page_article_text_read_more">
                                    <a href="{{url($L->lang.'/'.$L->__('weather-and-psoriasis'))}}">{{$L->__('Read More1 >>')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="home_page_article">
                            <div class="home_page_article_img float_left">{!!$img->__('combined_psoeasy_with_any_medication_homepage.jpg')!!}</div>
                            <div class="home_page_article_text float_left">
                                <div class="home_page_article_text_title">
                                    <h3 style="font-size: inherit; margin: 0; font-weight: inherit">{{$L->__('article 3 title')}}</h3>
                                </div>
                                <div class="home_page_article_text_content">
                                    {!!$img->__('combined_psoeasy_with_any_medication_homepage.jpg', 'article_img_mob')!!}
                                    <p>
                                        {!!$img->__('combined_psoeasy_with_any_medication_homepage.jpg', 'article_img_mob article_img_mob_small')!!}
                                        <span class="home_page_article_text_title_mob">{{$L->__('article 3 title')}}</span>
                                        {{$L->__('article 3 text')}}
                                    </p>
                                </div>
                                <div class="home_page_article_text_read_more">
                                    <a href="{{url($L->lang.'/'.$L->__('combined-psoeasy-products-with-other-medications'))}}">{{$L->__('Read1 More >>')}}</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="home_page_sellers float_left relative">
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
                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('footer')
    <script>
        function sendAnswer(q, a) {
            $.ajax({
                type: "post",
                url: "/saveAnswer",
                data: {"question":q,"answer":a},
                cache: false,
                success: function(html){
                    $('#'+a).parent().parent().children('.statistic').html(html);
                    console.log($(this).parent());

                }
            });
            $("."+q).prop("disabled", true );
        }
    </script>

    <script>
        var mass = [], i, t;

        $('.ans').click(function () {
            //to zero counter and mass
            mass.splice(0,mass.length);
            i = 0;

            var that = $(this), that_class = $(this).parent();

                $('.q_section').each(function () {
                    if ($('.q_section').hasClass('q_active')) {
                        $(this).removeClass('q_active');
                    }
                });

                $(that_class).addClass('q_active');

                that.find('input').each(function () {
                    mass[i] = $(this).is(':checked');

                    if (mass[i] == true) {
                        t = i;
                    }
                    i++;
                });

            setTimeout(statistic, 500);
        });

        function statistic() {
            document.getElementsByClassName('q_active')[0].getElementsByClassName('bar_statistic')[t].childNodes[0].style.backgroundColor = 'rgb(10, 90, 139)';
        }
    </script>

    <script>
        var countQuestion = $('.q_section').length;
        $('.ans_' + countQuestion).click(function(){
            $('.q_positive_section').show();
        });
    </script>

@endsection
