<?
$b_categories = $pages->where('type','b_cat')->all();
$b_articles = $pages->where('type','blog')->where('parent_id', $page->id)->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->sortBy('created_at')->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->take(4);

//category icon
$arr_icon = explode('/', $page->real_url);
$cat_icon = end($arr_icon).'_category_icon'.'.png';
?>

@extends('layouts.default_wrapper_blog')

@section('header')
    <link rel="stylesheet" href="/css/blog.css">
@endsection
{{--{{dd($page)}}--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a> > {{$page->link_name}}
            </div>
            <div class="col-xs-12">
                <div class="blog-category__title">
                    <h1>{{$page->page_name}}</h1>
                </div>
            </div>
            <div class="row">
            <div class="blog-category__articles">
            @foreach($b_articles as $b_article)
                <?
                //article image
                $arr_photo = explode('/', $b_article->real_url);
                $art_photo = end($arr_photo).'_article'.'.jpg';
                ?>
                <div class="col-sm-6 col-xs-12">
                    <div class="article-category__block" onclick="window.location.href = '<?=url($L->lang.'/'.$b_article->seo_url)?>'">
                        <div class="article-category__top-section">
                            {!!$img->__(!empty($art_photo)?$art_photo:'image_zaglushka.jpg', 'article-category__photo')!!}
                            <div class="article-category__icon">
                                {!!$img->__($cat_icon)!!}
                            </div>
                        </div>
                        <div class="article-category__title">{{$page->page_name}}</div>
                        <div class="article-category__desc">{{$b_article->title}}</div>
                        <div class="article-category__date">
                            {{--{{$b_article->updated_at->format("d".'/'.'m'.'/'.'Y')}}--}}
                            {{$L->__($b_article->id.'_article_date')}}
                        </div>
                        <div class="article-category__btn">
                            <a href="{{url($L->lang.'/'.$b_article->seo_url)}}">{{$L->__('Read more')}}</a>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
            </div>
        </div>

    </div>

@endsection

@section('footer')

    <script>
        function Before(){
            $('.blog-category__articles').append('<div class="col-xs-12 blog-category__load"><span></span></div>');
        }
        function Success(str){
            $('.blog-category__load').remove();
            $('.blog-category__articles').append(str);
        }

        $(window).scroll(function()
        {
            var count = $('.article-category__block').length;
            if  ( ($(window).scrollTop() == $(document).height() - $(window).height()) && count >= 4)
            {
                $.ajax({
                    url:'/admin/get_article/<?=$page->id?>/'+count,
                    type: 'get',
                    beforeSend: Before,
                    success: Success
                });
            }
        });

    </script>

@endsection

