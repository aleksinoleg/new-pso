@extends('layouts.default_wrapper')

@section('header')
    <link rel="stylesheet" href="/css/styl/static.css">
    <style>
        h1{
            font-size: 18px;
            text-transform: capitalize;
        }
        .local_top_logo{
            margin-left: 20px;
        }
        .long_desc{
            margin-left: 10px;
        }
        .long_desc p:last-child{
            margin-bottom: 30px;
        }

        @media screen and (max-width: 500px){
            .long_desc img{
                float: left!important;
                max-width: 100px;
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
            <div class="local_top_logo">
                @if ($L->lang=="it")
                    <h1 style="font-size: 16px;">{{$page->title}}</h1>
                @else
                    <h1>{{$page->title}}</h1>
                @endif
            </div>

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
