<!DOCTYPE html>
<html lang="{{$page->lang or $L->lang}}" xmlns="http://www.w3.org/1999/html">
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
    <link rel="stylesheet" href="/css/blog.min.css">
    <link rel="stylesheet" href="/css/default_blog.min.css">
</head>

<body>
    <div class="home_page_header_section">
        <div class="header_section_l1">
            <div class="container">
                <div class="row">
                    <div class="l1_1">
                        <div class="pull-right">
                            <div class="blog__header-icon header-icon header-icon-bg header-faq"><a href="{{url($L->lang.'/'.$L->__('FAQ'))}}">{{$L->__('FAQs')}}</a></div>
                            <div class="blog__header-icon header-icon header-icon-bg header-contact"><a href="{{url($L->lang.'/'.$L->__('contact'))}}">{{$L->__('Contact Us')}}</a></div>
                            <div class="blog__header-icon header-icon header-icon-bg header-about-us"><a href="{{url($L->lang.'/'.$L->__('about-us'))}}">{{$L->__('About us blog')}}</a></div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="l1_2">
                        <div class="float_left">
                            {!! $img->__($L->lang.'.png', 'l1_2_lang') !!}
                        </div>
                        <div class="float_left l1_2_text">
                            {{$L->__('Language')}}
                            <span class="caret"></span>
                        </div>
                        <div class="clearfix"></div>
                        <div class="lang_menu" style="z-index: 99;">
                            @if($page->seo_url=='/')
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
                                {!!$img->__($L->lang.'_logo_blog.jpg', 'logo')!!}
                            </a>
                            {{--<a href="@if(session('def_lang')==$L->lang)/@else/{{$L->lang}}/@endif">--}}
                                {{--{!!$img->__($L->lang.'_logo_tab.png', 'logo_tab')!!}--}}
                            {{--</a>--}}
                        </div>
                    </div>
                    <div class="l2_2 flex float_left">
                        <div class="margin_auto">
                            {!!$img->__($L->lang.'_slogan_blog.png', 'slogan')!!}
                            {!!$img->__($L->lang.'_slogan_blog_tab.png', 'slogan_tab')!!}
                            {!!$img->__($L->lang.'_slogan_blog_mob.png', 'slogan_mob')!!}
                        </div>
                    </div>
                    <div class="clearfix visible-sm"></div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="home_page_menu_section">
        <div class="menu-mobile">{!!$img->__('menu_1_tab.png', 'menu-open')!!}</div>
        <div class="menu-mobile">{!!$img->__('menu_1_tab_activ.png', 'menu-close')!!}</div>
        <div class="menu-mobile right_menu">
            {!!$img->__('menu_2_tab.png', 'menu-leaf menu-leaf_close')!!}{!!$img->__('menu_2_tab_activ.png', 'menu-leaf menu-leaf_activ')!!}
            {!!$img->__('menu_bag.png', 'menu-box menu-box_close')!!}{!!$img->__('menu_bag_activ.png', 'menu-box menu-box_activ')!!}
        </div>
        <div class="menu_line_1"></div>
        <div class="menu_line_2"></div>
        <div class="container relative">
            <div class="absolute menu">
                <?$i = 1?>
                @foreach($b_categories as $b_category)
                    <div class="float_left menu_hover menu_btn blog__menu-btn blog__menu-btn_<?=$i?>" data-id="id_<?=$i?>">
                        <a href="{{url($L->lang.'/'.$b_category->seo_url)}}">{{$b_category->page_name}}</a>
                        <a href="{{url($L->lang.'/'.$b_category->seo_url)}}">{!!$img->__('arrow_menu_h.png', 'arrow_h')!!}
                            {!!$img->__('arrow_menu_v.png', 'arrow_v')!!}
                        </a>
                    </div>
                    <?$i++?>
                @endforeach
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    @yield('content')

    <footer>
        <div class="footer_l1">
            <div class="container no_padding">
                <div class="footer_l1_3 float_left blog__footer blog__footer_l1_3">
                    <a href="{{url($L->lang.'/'.$L->__('privacy'))}}">{{$L->__('Privacy1')}}</a>
                </div>
                <div class="footer_l1_1 float_left blog__footer blog__footer_l1_1">
                    {!!$img->__($L->lang.'_logo-footer.png', 'dsp-big')!!}
                    {!!$img->__($L->lang.'_logo_footer_tab.png', 'dsp-small')!!}
                    {!!$img->__($L->lang.'_logo_footer_mob.png', 'dsp-xsmall')!!}
                </div>
                <div class="footer_l1_3 float_left blog__footer blog__footer_l1_3">
                    @if($L->lang == 'it')
                        <a href="{{url($L->lang.'/'.$L->__('terms-of-use'))}}">{{$L->__('Term of use')}}</a>
                    @else
                        <a href="{{url($L->lang.'/'.$L->__('terms-of-use'))}}">{{$L->__('Term of use')}}</a>
                    @endif
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
        $('.modal_free_soap_expired').modal('show');
    </script>
    @yield('footer')
</body>
</html>
