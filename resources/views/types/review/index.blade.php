<?

$parentPage = $pages->where('id', $page->parent_id)->first();
$reviews = $parentPage->reviews;
$rate = $reviews->avg('rate');

?>
@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/product.css">
    <link rel="stylesheet" href="/css/review.min.css">
    <link rel="stylesheet" href="/css/jquery.rateyo.css">
    <link rel="stylesheet" href="/css/jquery.fancybox.css">

    <link rel="stylesheet" href="/css/styl/review.css">
    <style>
        h1 {
            font-size: 36px;
            text-align: center !important;
            color: #305c07 !important;
            font-family: "Century Gothic Regular Bold" !important;
        }

        .form_rating {
            height: 35px !important;
            line-height: 35px !important;
            margin: 0 !important;
        }

        .form_rating p {
            margin: 0 !important;
        }

        .review-form .form_review-star .rateyo {
            padding: 0 5px;
        }
        .captcha_sec{
            z-index: 100;
            padding: 0;
            width: 303px;
            float: right;
        }


    </style>
    <style>
        @media screen and (max-width: 400px) {
            #rc-imageselect, .g-recaptcha {
                transform: scale(0.77);
                -webkit-transform: scale(0.77);
                transform-origin: 0 0;
                -webkit-transform-origin: 0 0;
            }
            .captcha_sec{
                width: 232px;
            }
        }
        @media screen and (max-width: 992px) {
            .captcha_sec{
                float: none;
                margin: auto;
            }
        }
        @media screen and (max-width: 767px) {
            .gift_banner_mob{
                display: none;
            }
        }
    </style>

    <script src='https://www.google.com/recaptcha/api.js'></script>

@endsection

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
    @if(session('success') == 1)
        <div class="container">
            <div class="modal fade modal_review_sent">
                <div class="modal-dialog">
                    <div class="modal-content" style="width: 100%; max-width: 767px">
                        <div class="modal-body relative">
                            <button type="button" class="absolute close_modal" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <div class="modal_review_logo">{!! $img->__($L->lang.'_popup-logo.jpg') !!}</div>
                            <div class="thx_rev">
                                <div class="margin_auto">
                                    <p>{{$L->__('Thank You')}}</p>
                                    <p>{{$L->__('For sharing your experiences with us!')}}</p>
                                    {{$L->__('Your comment will be visible after approval')}}
                                </div>
                            </div>
                            <div class="flex">
                                <div class="margin_auto">
                                    <p class="leave_email_title">{{$L->__('leave_email_text')}}</p>
                                    <form action="/admin/leave_email_review" class="leave_email_review" method="post">
                                        {{csrf_field()}}
                                        <input type="hidden" name="review" value="{{old('comment')}}">
                                        <input type="hidden" name="name" value="{{old('name')}}">
                                        <input type="hidden" name="title" value="{{old('title')}}">
                                        <div class="form-group">
                                            <input type="email" class="leave_email form-control" name="email" required placeholder="{{$L->__('email')}}">
                                        </div>
                                        <div class="form-group flex">
                                            <input type="submit" class="btn btn-info submit-leave-email" name="submit" value="{{$L->__('send')}}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?
        session(['success' => 0])
        ?>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 left_warp">
                <div class="review">
                    <div class="breadcrumbs">
                        <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a>
                        > <a href="{{url($L->lang.'/'.$parentPage->seo_url)}}">{{$parentPage->link_name}}</a>
                        > {{$page->link_name}}
                    </div>
                    <div class="social_block social_block_hidden">
                        <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="reviews_title">{{$L->__('Reviews_top')}}</div>
                    <h1>{{$page->title}}</h1>
                    <div class="long_desc">{!! $page->long_desc !!}</div>
                    <div class="prod_tabs_section_left float_left">
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
                                            @if ($L->lang == 'ru')
                                                <div class="tab_reviews_header_3_1_2 tab_reviews_header_3_1_2_ru">{{$L->__('what you think?')}}</div>
                                            @else
                                                <div class="tab_reviews_header_3_1_2">{{$L->__('what you think?')}}</div>
                                            @endif
                                        </div>
                                        <div class="tab_reviews_header_3_2 float_left">
                                            <a href="#{{$L->__('leave_review_form')}}">{!!$img->__('tell_us.png')!!}</a>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @foreach($reviews as $review)
                                    <div class="tab_review">
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
                                                <p>{!!($review->comment)!!}</p>
                                                </div>

                                                <div style="width: 100px;float: left">
                                                    @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_before.jpg'))

                                                        <a data-fancybox="images-single-{{$review->id}}"
                                                           href="{{asset('storage/img/reviews/rev_'.$review->id.'_before.jpg')}}">
                                                            <p style="text-align: center; color: #074E78"
                                                               class="figcaption">{{$L->__('before_1')}}</p>
                                                            <img style="width: 100%"
                                                                 src="{{asset('storage/img/reviews/rev_'.$review->id.'_before.jpg')}}"
                                                                 alt="{{$L->__('rev_'.$review->id.'_before_alt')}}"></a>
                                                    @endif
                                                    @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_after.jpg'))

                                                        <a data-fancybox="images-single-{{$review->id}}"
                                                           href="{{asset('storage/img/reviews/rev_'.$review->id.'_after.jpg')}}">
                                                            <p style="text-align: center; color: #074E78"
                                                               class="figcaption">{{$L->__('after_1')}}</p>
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
                                                {!!$img->__('user.png')!!} {{$L->__('by')}}
                                                <span>{{$review->name}}</span>
                                            </div>
                                            <div class="pull-right review_prod_date">
                                                {{$review->created_at->toDateString()}}
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                            </div>


                        </div>
                    </div>

                    <a name="{{$L->__('leave_review_form')}}"></a>
                    <div class="review-form">
                        <div class="form_title">{{$L->__('Leave a Comment')}}</div>
                        <form action="{{url('/admin/save_review')}}" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <input type="hidden" name="lang" value="{{$L->lang}}">
                            <input type="hidden" name="parent_id" value="{{$page->parent_id}}">
                            <div class="row">
                                <div class="form_left-col col-lg-7 col-md-5">
                                    <label for=""><input required="required" type="text" name="name"
                                                         placeholder="{{$L->__('Name_r')}}"
                                                         value="{{old('name')}}">
                                        <span class="bg_input">{!!$img->__('login_review.png')!!}</span></label>
                                    <label for=""><input required="required" type="text" name="title"
                                                         placeholder="{{$L->__('Title_r')}}"
                                                         value="{{old('title')}}"
                                        >
                                        <span class="bg_input">{!!$img->__('titlel_review.png')!!}</span></label>
                                    <textarea name="comment" id="message_mob"
                                              placeholder="{{$L->__('Message_r')}}">{{old('comment')}}</textarea>
                                </div>
                                <div class="form_right-col col-lg-5 col-md-7">
                                    <div class="form_rating">
                                        <p>{{$L->__('Rating:')}}</p>
                                        <div class="form_review-star">
                                            <div class="rateyo"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div class="captcha_sec col-xs-12">
                                        <div class="g-recaptcha" data-size="normal"
                                             data-sitekey="6LcDciYUAAAAAFQQjSzK9vNU4Sspx-4373cRnYOD"></div>
                                    </div>
                                    <div class="clearfix"></div>

                                </div>
                                <div class="form_bottom-col col-md-12">
                                    <textarea name="comment" id="message"
                                              placeholder="{{$L->__('Message_r')}}">{{old('comment')}}</textarea>
                                    <input type="hidden" name="rate" class="rev_rate">

                                    <div class="form_files_sec_title">{{$L->__('files')}}</div>
                                    <div class="form_files_sec">
                                        <div class="file_upload_title">
                                            {{$L->__('before1')}}
                                            <span class="file_name_before"></span>
                                            <span class="del_file_sec_b">
                                                <span class="del_file_b">{!!$img->__('del_photo.png')!!}</span>
                                                <span class="del_file_b_hover">{!!$img->__('del_photo_hover.png')!!}</span>
                                            </span>
                                        </div>
                                        <label class="file_upload_before file_upload">
                                            <span class="button" style="padding-left: 25px;">
                                                {{$L->__('select_file')}}
                                                {!!$img->__('download.png', 'download_pic')!!}
                                            </span>
                                            <mark>
                                                {{$L->__('file_not_chosen')}}
                                                <span>{{$L->__('(max_size_5mb)')}}</span>
                                            </mark>
                                            <input class="select_file select_file_b" type="file" name="f_before"
                                                   accept="image/jpeg">
                                        </label>
                                        <div class="file_upload_title">
                                            {{$L->__('after1')}}
                                            <span class="file_name_after"></span>
                                            <span class="del_file_sec_a">
                                                <span class="del_file_a">{!!$img->__('del_photo.png')!!}</span>
                                                <span class="del_file_a_hover">{!!$img->__('del_photo_hover.png')!!}</span>
                                            </span>

                                        </div>
                                        <label class="file_upload_after file_upload">
                                            <span class="button" style="padding-left: 25px;">
                                                {{$L->__('select_file')}}
                                                {!!$img->__('download.png', 'download_pic')!!}
                                            </span>
                                            <mark>
                                                {{$L->__('file_not_chosen')}}
                                                <span>{{$L->__('(max_size_5mb)')}}</span>
                                            </mark>
                                            <input class="select_file select_file_a" type="file" name="f_after"
                                                   accept="image/jpeg">
                                        </label>

                                    </div>
                                    @if ($L->lang == 'ru')
                                        <input class="send_btn" type="submit" name="send_btn"
                                               value="{{$L->__('send message_r')}}" style="font-size: 14px;">
                                    @else
                                        <input class="send_btn" type="submit" name="send_btn"
                                               value="{{$L->__('send message_r')}}">
                                    @endif
                                </div>
                                <div class="clearfix"></div>

                            </div>
                        </form>
                    </div>
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
                    <?
                    $prodId = \App\Page::find($page->parent_id)->prod_id;
//                    dd($prodId);
                    ?>
                    <div class="banner_right_1">
                        @if($prodId == '1001')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_100'))}}">
                                {!!$img->__($L->lang.'_100_natural_mob.jpg')!!}
                            </a>
                        @else
                            <a href="{{$L->__('link_review_banner_100_1')}}">
                                {!!$img->__($L->lang.'_100_natural_mob1.jpg')!!}
                            </a>
                        @endif
                    </div>
                    <div class="banner_right_1 banner_right_2">
                            @if($prodId == '1001'){{--cream250--}}
                                <a href="{{url($L->__('cat_1_link'))}}">
                                    {!!$img->__('gif_'.$L->lang.'_mob.gif')!!}
                                </a>
                            @elseif($prodId == '1002') {{--soap--}}
                                <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_soap'))}}">
                                    {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                                </a>
                            @elseif($prodId == '1006') {{--cream100--}}
                                <a href="{{url($L->__('cat_5_link'))}}">
                                    {!!$img->__($L->lang.'_it_works_better_together_foot.jpg')!!}
                                </a>
                            @elseif($prodId == '1004' || $prodId == '1005') {{--shampoo lotion--}}
                                <a href="{{url($L->__('cat_2_link'))}}">
                                    {!!$img->__($L->lang.'_shampoo_lotion_banner.jpg')!!}
                                </a>
                            @elseif($prodId == '1003') {{--oil--}}
                                <a href="{{url($L->__('cat_1_link'))}}">
                                    {!!$img->__($L->lang.'_gift.jpg')!!}
                                    {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                                </a>
                            @elseif($prodId == '1007')
                                <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem'))}}">
                                    {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                                </a>
                            @endif
                    </div>
                    <div class="banner_right_1 banner_right_3">
                        @if($prodId == '1002') {{--soap--}}
                            <a href="{{url($L->__('cat_1_link'))}}">
                                {!!$img->__($L->lang.'_gift.jpg')!!}
                                {!!$img->__($L->lang.'_gift_mob.jpg', 'gift_banner_mob')!!}
                            </a>
                        @elseif($prodId == '1001')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_cream250'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @elseif($prodId == '1003')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_oil'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @elseif($prodId == '1004')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_shampoo'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @elseif($prodId == '1005')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_lotion'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @elseif($prodId == '1006')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_cream100'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @elseif($prodId == '1007')
                            <a href="{{url($L->lang.'/'.$L->__('link_review_banner_no_problem_7'))}}">
                                {!!$img->__($L->lang.'_no_problems_mob.jpg')!!}
                            </a>
                        @endif
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
                                <div class="free_delivery_text_l1" style="font-size: 16px;">
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
                    <a href="{{url($L->lang.'/'.$L->__('localstores'))}}">
                        <div class="local_store_img float_left">{!!$img->__('lokal-store.jpg')!!}</div>
                        <div class="local_store_text float_left">
                            <div class="local_store_text_l1">{{$L->__('Where to buy locally?')}}</div>
                            <div class="local_store_text_l2">{{$L->__('STORE FINDER')}}</div>
                        </div>
                        <div class="clearfix"></div>
                    </a>
                    <div class="prod_prefooter_item_hover"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    {{--Rating stars--}}
    <script src="/js/jquery.rateyo.min.js"></script>
    <script src="/js/review.js"></script>
    <script>
        $(function () {
            $(".rateyo").rateYo({
                halfStar: true
            });
            $('.rateyo').click(function () {
                var rate = $(".rateyo").rateYo('rating');
//                console.log(rate);
                $('.rev_rate').val(rate);
            });
        });
    </script>
    <script>
        $('.modal_review_sent').modal();
    </script>

    <script src="/js/jquery.fancybox.js"></script>

    <script>
        $('[data-fancybox]').fancybox({
            caption: function (instance, item) {
                return $(this).find('.figcaption').html();
            }
        });
    </script>
    <script>
        $('.modal_captcha_error').modal('show');
    </script>
    {{--<script>--}}
    {{--$(window).on("resize load", function () {--}}
    {{--if($(window).width() > 410){--}}
    {{--$('.g-recaptcha').attr('data-size','normal');--}}
    {{--}else{--}}
    {{--console.log($('.g-recaptcha'));--}}
    {{--$('.g-recaptcha').attr('data-size','compact');--}}
    {{--}--}}
    {{--});--}}
    {{--</script>--}}
@endsection
