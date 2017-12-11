<?
$langs = [
    'en',
    'de',
    'es',
    'fr',
    'it',
    'cz',
    'ru',
    'ua',
    'he'
];
$lang = \App\Http\Controllers\PageController::getCurLang();
if(in_array($lang, $langs)){
    $L = new \App\Http\Controllers\Admin\TranslatorController($lang, '€');
    $img = new \App\Http\Controllers\Admin\ImageController($lang);
}else{
    $L = new \App\Http\Controllers\Admin\TranslatorController(env('DEFAULT_LANG'), '€');
    $img = new \App\Http\Controllers\Admin\ImageController(env('DEFAULT_LANG'));
}
?>
{{dd(env('DEFAULT_LANG'))}}

<?die();?>

@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/404.min.css">
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-8 col-sm-7 left_warp">
                @if($L->lang == 'ru')
                    <div class="top-logo" style="font-size: 16px;">
                        {{$L->__('Page not found')}}
                    </div>
                @else
                    <div class="top-logo">
                        {{$L->__('Page not found')}}
                    </div>
                @endif
                <div class="content404">
                    {!!$img->__('attention.png')!!}
                    {!!$img->__('404.png')!!}
                    <div class="top404">
                        <p>{{$L->__('Unfortunately, the page')}}</p>
                        <p>{{$L->__("You're looking for can't be found")}}</p>
                    </div>
                    <div class="border404"></div>
                    <div class="bottom404">
                        <p>{{$L->__('This may have happened if you:')}}</p>
                        <ul>
                            <li>{{$L->__('- Typed the url 404')}}</li>
                            <li>{{$L->__('- That page 404')}}</li>
                        </ul>
                        <p>{{$L->__('What can you do')}}</p>
                    </div>
                    <a href="@if(session('def_lang')==$L->lang)/ @else /{{$L->lang}}/ @endif">
                        <div class="buttons404 home404">
                            {{$L->__('Go Back')}}</br>
                            {{$L->__('to Home Page')}}
                        </div>
                    </a>
                    <a href="{{url($L->lang.'/'.$L->__('online-store'))}}">
                        <div class="buttons404 store404">
                            {{$L->__('Visit PsoEasy')}}</br>
                            {{$L->__('Online Store')}}
                        </div>
                    </a>
                    <a href="{{url($L->lang.'/'.$L->__('contact'))}}">
                        <div class="buttons404 support404">
                            {{$L->__('Contact our Customer')}}</br>
                            {{$L->__('Support Team')}}
                        </div>
                    </a>
                </div>
            </div>

            {{--RIGHT SIDE BAR--}}
            <div class="col-lg-3 col-md-4 col-sm-5 right_warp">
                <div class="right_sidebar right_sidebar_1">
                    <div class="social_block">
                        <a href="{{$L->__('link_soc_1')}}">{!!$img->__('google.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_2')}}">{!!$img->__('facebook.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_3')}}">{!!$img->__('youtube.jpg')!!}</a>
                        <a href="{{$L->__('link_soc_4')}}">{!!$img->__('twitter_small.jpg')!!}</a>
                    </div>
                    <div class="banner_right_1">
                        <a href="{{url($L->lang.'/'.$L->__('package-for-scepticals'))}}">
                            {!!$img->__($L->lang.'_sceptical.png')!!}
                        </a>
                    </div>
                    <div class="banner_right_2">
                        {{--<a href="{{url($L->lang.'/'.$L->__('new-clients-promo-50-off'))}}">--}}
                            {{--{!!$img->__($L->lang.'_client.jpg')!!}--}}
                        {{--</a>--}}
                        <a href="{{url($L->lang.'/'.$L->__('over-20-natural-active-ingredients'))}}">
                            {!!$img->__($L->lang.'_psoriasis_treatment.jpg')!!}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')

@endsection




