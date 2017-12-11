<?
$b_categories = $pages->where('type','b_cat')->all();

$b_articles = $pages->where('type','blog')->where('id', '!=', $page->id)->where('parent_id', $page->parent_id)->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->sortBy('created_at')->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->take(2);

foreach($b_categories as $b_category){

    if($b_category->id == $page->parent_id){
        $this_cat_name = $b_category->page_name;
        $this_cat_link = $b_category->seo_url;
        //category icon
        $arr_icon = explode('/',  $b_category->real_url);
        $cat_icon = end($arr_icon).'_category_icon'.'.png';
    }
}
?>

@extends('layouts.default_wrapper_blog')

@section('header')
    <link rel="stylesheet" href="/css/blog.css">
@endsection
{{--{{dd($b_articles)}}--}}
@section('content')
    <div class="container">
        <div class="row">
            <div class="breadcrumbs">
                <a href="{{$L->__('link_home')}}">{{$L->__('Home')}}</a>
                > <a href="{{url($L->lang.'/'.$this_cat_link)}}">{{$this_cat_name}}</a>
                > {{$page->link_name}}
            </div>
            <div class="col-xs-6 blog-article__category">
                <a href="{{url($L->lang.'/'.$this_cat_link)}}">{{$this_cat_name}}</a>
            </div>
            <div class="col-xs-6 blog-article__date">
                {{--<span>{{$page->updated_at->format('F j'.','.' Y')}}</span>--}}
                <span>{{$L->__($page->id.'_article_date')}}</span>
            </div>
            <div class="col-xs-12">
                <div class="blog-article__title">
                    <h1>{{$page->title}}</h1>
                </div>
                <div class="blog-article__content">
                    {!!$page->long_desc!!}
                </div>
                <div class="blog-article__btn">
                    <a href="{{url($L->lang.'/'.$this_cat_link)}}">{{$L->__('Other articles of this category >>')}}</a>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="blog-article__other-articles">
                        <div class="col-xs-12">
                            <div class="blog-article__category-title">{{$this_cat_name}}</div>
                        </div>
                        @foreach($b_articles as $b_article)
                            <?
                            //article image
                            $arr_photo = explode('/', $b_article->real_url);
                            $art_photo = end($arr_photo).'_article'.'.jpg';
                            ?>
                            <div class="col-sm-6 col-xs-12">
                                <div class="article-category__block" onclick="window.location.href = '{{url($L->lang.'/'.$b_article->seo_url)}}'">
                                    <div class="article-category__top-section">
                                        {!!$img->__(!empty($art_photo)?$art_photo:'image_zaglushka.jpg', 'article-category__photo')!!}
                                        <div class="article-category__icon">
                                            {!!$img->__($cat_icon)!!}
                                        </div>
                                    </div>
                                    <div class="article-category__title">{{$this_cat_name}}</div>
                                    <div class="article-category__desc">{{$b_article->title}}</div>
                                    <div class="article-category__date">
                                        {{--{{$b_article->updated_at->format("d".'/'.'m'.'/'.'Y')}}--}}
                                        {{$L->__($b_article->id.'_article_date')}}
                                    </div>
                                    <div class="article-category__btn">
                                        <a href="{{url($L->lang.'/'.$b_article->seo_url)}}">{{$L->__('Read more blog')}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

@endsection
