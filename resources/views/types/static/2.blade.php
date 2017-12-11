@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/about_us.css">
    <link rel="stylesheet" href="/css/category.min.css">
    <style>
        h1{
            font-size: 36px;
            text-align: center !important;
            color: #305c07 !important;
            font-family: "Century Gothic Regular Bold" !important;
        }
        .short_desc, .long_desc{
            padding: 0 0 40px 20px;
        }
        .aylin_banner p{
            color: #6f7a7e;
        }
        @media screen and (max-width: 600px) {
            h1{
                font-size: 24px;
            }
            .short_desc{
                padding: 0;
            }
            .long_desc{
                padding: 10px;
            }
            .left_part, .right_sidebar{
                float: none;
                width: 100%;
            }
            .left_part{
                padding-right: 0;
            }
            .social_block, .aylin_banner{
                text-align: center!important;
            }
            .aylin_banner img{
                float: none!important;
            }
            .aylin_banner p{
              text-align: left;
            }
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
            </div>
            <div class="left_part float_left">
                <h1>{{$page->title}}</h1>
                <div class="short_desc">
                    {{$page->short_desc}}
                </div>
                <div class="long_desc" style="font-size: 16px;">
                    {!! $page->long_desc !!}
                </div>
            </div>
            <div class="right_sidebar right_sidebar_1">
                <div class="social_block">
                    <a href="{{$L->__('link_soc_1')}}" target="_blank">{!!$img->__('google.jpg')!!}</a>
                    <a href="{{$L->__('link_soc_2')}}" target="_blank">{!!$img->__('facebook.jpg')!!}</a>
                    <a href="{{$L->__('link_soc_3')}}" target="_blank">{!!$img->__('youtube.jpg')!!}</a>
                    <a href="{{$L->__('link_soc_4')}}" target="_blank">{!!$img->__('twitter_small.jpg')!!}</a>
                </div>
                <div class="aylin_banner">
                    {!!$img->__('aylin.jpg', 'pull-right')!!}
                    <div class="clearfix"></div>
                    <p class="l1">{{$L->__('AYLIN SHAKED')}}</p>
                    <p class="l2">{{$L->__('Owner and founder Of DSP Natural Health Products.')}}</p>
                    <p class="l3">
                        {!! $pages->where('real_url', '/'.$L->lang.'/article/60')->first()->short_desc !!}
                    </p>
                    <p class="pull-right l4">
                        <a href="{{url($L->lang.'/'.$L->__('info-about-aylin'))}}">
                            {{$L->__('Read More1')}} >>
                        </a>
                    </p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>

        </div>
    </div>

@endsection

@section('footer')

@endsection
