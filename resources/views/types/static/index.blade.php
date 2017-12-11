@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/static.css">
    <style>
        .local_top_logo h1{
            font-size: 12px;
        }

        .local_top_logo{
            padding-top: 8px;
            margin-bottom: 2px;
        }

        .long_desc h2{
            margin-top: 0px;
        }

        .long_desc p:last-of-type{
            margin-bottom: 30px;
        }

        @media screen and (max-width: 767px) {
           .long_desc h2 strong span, .long_desc h2 strong {
                font-size: 22px!important;
            }
            .long_desc h3 strong span, .long_desc h3 strong {
                font-size: 22px!important;
            }
            .long_desc h4 strong span, .long_desc h4 strong {
                font-size: 22px!important;
            }
            .long_desc h5 strong span, .long_desc h5 strong {
                font-size: 22px!important;
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
            @if ($L->lang=='fr' || $L->lang == 'ru')
                <div class="local_top_logo" style="padding-left: 10px;">
                    <h1>{{$page->title}}</h1>
                </div>
            @elseif ($L->lang=='it')
                <div class="local_top_logo" style="padding-left: 8px;">
                    <h1>{{$page->title}}</h1>
                </div>
            @else
                <div class="local_top_logo">
                    <h1>{{$page->title}}</h1>
                </div>
            @endif

            <div class="short_desc">
                {{$page->short_desc}}
            </div>
            <div class="long_desc">
                {!! $page->long_desc !!}
            </div>
        </div>
    </div>

@endsection

@section('footer')

@endsection
