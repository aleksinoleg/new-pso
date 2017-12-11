<?
$page->long_desc = explode('***', $page->long_desc);
$i = 0;//counter

$b_categories = $pages->where('type','b_cat')->all();
$b_articles = $pages->where('type','blog')->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->sortBy('created_at')->all();
$b_articles = collect($b_articles);
$b_articles = $b_articles->take(8);

?>
@extends('layouts.default_wrapper_blog')

@section('header')

@endsection
{{--{{dd($b_articles)}}--}}
@section('content')
    <div class="container">
        <div class="row">
        @foreach($b_categories as $b_category)
            <?
                //category images
                $arr_icon = explode('/', $b_category->real_url);
                $cat_icon = end($arr_icon).'_category_icon'.'.png';
                $cat_photo =  end($arr_icon).'_category_photo'.'.jpg';
                $cat_photo_mob =  end($arr_icon).'_category_photo_mob'.'.jpg';
                $flag = 0;//counter
            ?>
            <div class="col-xs-12">
                <div class="blog-category__background" onclick="window.location.href = '{{url($L->lang.'/'.$b_category->seo_url)}}'">
                    {!!$img->__($cat_photo, 'blog-category__photo')!!}
                    {!!$img->__($cat_photo_mob, 'blog-category__photo blog-category__photo-mob')!!}
                    <div class="blog-category__slogan">{!!$page->long_desc[$i] or ''!!}</div>
                    <div class="blog-article__btn blog-category__btn">
                        <a href="{{url($L->lang.'/'.$b_category->seo_url)}}">{{$L->__('Other articles of this category >>')}}</a>
                    </div>
                </div>
            </div>
            @foreach($b_articles as $b_article)
                @if ($b_category->id == $b_article->parent_id && $flag < 2)
                    <?
                    //article image
                    $arr_photo = explode('/', $b_article->real_url);
                    $art_photo = end($arr_photo).'_article'.'.jpg';
                    ?>
                    <div class="col-sm-6 col-xs-12">
                        <div class="article-category__block blog-category__block" onclick="window.location.href = '{{url($L->lang.'/'.$b_article->seo_url)}}'">
                            <div class="article-category__top-section">
                                {!!$img->__(!empty($art_photo)?$art_photo:'image_zaglushka.jpg', 'article-category__photo')!!}
                                <div class="article-category__icon">
                                    {!!$img->__($cat_icon)!!}
                                </div>
                            </div>
                            <div class="article-category__title">{{$b_category->title}}</div>
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
                    <?$flag++?>
                @endif
            @endforeach
            <?$i++;?>
        @endforeach
        </div>
    </div>
@endsection

@section('footer')

@endsection
