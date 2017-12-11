@extends('layouts.admin_wrapper')

@section('footer')
    <script>
        $('.type_head').on('click', function () {
            $($(this).attr('data-toggle')).toggle(800);
        })
    </script>

    <script>
        $('.category').change(function () {
            if ($(this).prop('checked')) {
                $(this).parent().parent().parent().children('.product').children('.col-md-1').children('.form_publish').prop('checked', 'checked');
            } else {
                $(this).parent().parent().parent().children('.product').children('.col-md-1').children('.form_publish').removeAttr('checked');
            }
        });

        $('.form_publish').change(function () {
            if ($(this).prop('checked')) {
                $(this).parent().parent().parent().children('.category').children('.col-md-1').children('.form_publish').prop('checked', 'checked')
            }
        });
    </script>
@stop


@section('content')
    <div style="margin-bottom: 50px" class="container">
        <form action="{{route('admin.post',['action'=>'edit','target'=>'allPages','lang'=>$lang])}}" method="post" class="form-inline">
            {{csrf_field()}}
            <div class="type_section">
                <div class="admin_panel_head">
                    <div class="col-md-3">Page name</div>
                    <div class="col-md-2">Real URL</div>
                    <div class="col-md-6">SEO URL</div>
                    <div class="col-md-1">Publish</div>
                    <div class="clearfix"></div>
                </div>
                <div class="type_head btn btn-info" data-toggle="#static">
                    Static Pages
                </div>
                <div class="type_body" id="static">
                    @foreach($pages as $page)
                        @if($page->type == 'static')
                            <div class="">
                                <div class="col-md-3">
                                    <a href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a>
                                </div>
                                <div class="col-md-2 text-center">{{$page->real_url}}</div>
                                <div class="col-md-6 form-group">
                                    <input style="width:100%;" type="text" class="form-control"
                                           name="seo_url[{{$page->id}}]"
                                           value="{{$page->seo_url}}" @if($page->seo_url=='/') readonly @endif>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input class="form_publish" type="checkbox" value="1" name="active[{{$page->id}}]"
                                           @if($page->active==1) checked @endif>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="type_head btn btn-info" data-toggle="#article">
                    Articles
                </div>
                <div class="type_body" id="article">
                    @foreach($pages as $page)
                        @if($page->type == 'article')
                            <div class="">
                                <div class="col-md-3"><a href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a>
                                </div>
                                <div class="col-md-2 text-center">{{$page->real_url}}</div>
                                <div class="col-md-6 form-group">
                                    <input style="width:100%;" type="text" class="form-control"
                                           name="seo_url[{{$page->id}}]"
                                           value="{{$page->seo_url}}">
                                </div>
                                <div class="col-md-1 text-center">
                                    <input class="form_publish" type="checkbox" value="1" name="active[{{$page->id}}]"
                                           @if($page->active==1) checked @endif>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="type_head btn btn-info" data-toggle="#product">
                    Products
                </div>
                <div class="type_body" id="product">
                    @foreach($pages as $page)
                        <div>
                            @if($page->type == 'category')
                                <div class="category">
                                    <div class="col-md-3 mar_top_7px"><a
                                                href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a></div>
                                    <div class="col-md-2 mar_top_7px text-center">{{$page->real_url}}</div>
                                    <div class="col-md-6 form-group">
                                        <input style="width:100%;" type="text" class="form-control"
                                               name="seo_url[{{$page->id}}]"
                                               value="{{$page->seo_url}}">
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <input class="form_publish category" type="checkbox" value="1"
                                               name="active[{{$page->id}}]"
                                               @if($page->active==1) checked @endif>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                @foreach($pages as $product)
                                    @if($product->type == 'product' && $product->category_id == $page->id)
                                        <div class="product">
                                            <div class="col-md-3 mar_top_7px"><a
                                                        href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$product->type,'id'=>$product->id])}}">{{$product->page_name}}</a>
                                            </div>
                                            <div class="col-md-2 mar_top_7px text-center">{{$product->real_url}}</div>
                                            <div class="col-md-6 form-group">
                                                <input style="width:100%;" type="text" class="form-control"
                                                       name="seo_url[{{$product->id}}]"
                                                       value="{{$product->seo_url}}">
                                            </div>
                                            <div class="col-md-1 text-center">
                                                <input class="form_publish" type="checkbox" value="1"
                                                       name="active[{{$product->id}}]"
                                                       @if($product->active==1) checked @endif>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="type_head btn btn-info" data-toggle="#review">
                    Reviews
                </div>
                <div class="type_body" id="review">
                    @foreach($pages as $page)
                        @if($page->type == 'review')
                            <div class="">
                                <div class="col-md-3"><a href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a>
                                </div>
                                <div class="col-md-2 text-center">{{$page->real_url}}</div>
                                <div class="col-md-6 form-group">
                                    <input style="width:100%;" type="text" class="form-control"
                                           name="seo_url[{{$page->id}}]"
                                           value="{{$page->seo_url}}">
                                </div>
                                <div class="col-md-1 text-center">
                                    <input class="form_publish" type="checkbox" value="1" name="active[{{$page->id}}]"
                                           @if($page->active==1) checked @endif>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            @foreach($reviews as $review)
                                @if($page->parent_id == $review->parent_id)
                                    <div class="">
                                        <div class="col-md-3" style="text-align: right"><a
                                                    href="{{route('admin',['method'=>'edit-review','lang'=>$lang,'type'=>'review_item','id'=>$review->id])}}">{{$review->title}}</a>
                                        </div>
                                        <div class="col-md-1 text-center col-md-offset-8">
                                            <input class="form_publish" type="checkbox" value="1"
                                                   name="rev_publish[{{$review->id}}]"
                                                   @if($review->published==1) checked @endif>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                <div class="type_head btn btn-info" data-toggle="#blog">
                    Blog
                </div>
                <div class="type_body" id="blog">
                    @foreach($pages as $page)
                        @if($page->type == 'b_cat')
                            <div class="category">
                                <div class="col-md-3 mar_top_7px"><a
                                            href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a></div>
                                <div class="col-md-2 mar_top_7px text-center">{{$page->real_url}}</div>
                                <div class="col-md-6 form-group">
                                    <input style="width:100%;" type="text" class="form-control"
                                           name="seo_url[{{$page->id}}]"
                                           value="{{$page->seo_url}}">
                                </div>
                                <div class="col-md-1 text-center">
                                    <input class="form_publish category" type="checkbox" value="1"
                                           name="active[{{$page->id}}]"
                                           @if($page->active==1) checked @endif>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            @foreach($pages as $blog)
                                @if($blog->type == 'blog' && $blog->parent_id == $page->id)
                                    <div class="">
                                        <div class="col-md-3"><a
                                                    href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$blog->type,'id'=>$blog->id])}}">{{$blog->page_name}}</a></div>
                                        <div class="col-md-2 text-center">{{$blog->real_url}}</div>
                                        <div class="col-md-6 form-group">
                                            <input style="width:100%;" type="text" class="form-control"
                                                   name="seo_url[{{$blog->id}}]"
                                                   value="{{$blog->seo_url}}">
                                        </div>
                                        <div class="col-md-1 text-center">
                                            <input class="form_publish" type="checkbox" value="1"
                                                   name="active[{{$blog->id}}]"
                                                   @if($blog->active==1) checked @endif>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach


                </div>

                <div class="type_head btn btn-info" data-toggle="#question">
                    Questions
                </div>
                <div class="type_body" id="question">
                    <?$a = []; ?>
                    @foreach($questions as $product)
                        @if(!in_array($product->prod_id, $a))
                            <div class="q_prod">
                                {{$product->product->page_name}}
                            </div>
                            <?$a[] = $product->prod_id?>
                            @foreach($questions as $question)
                                @if($question->prod_id == $product->prod_id)
                                    <div class="text-center q_question">
                                        <a href="{{route('admin',['method'=>'answer-question','lang'=>$lang,'id'=>$question->id, 'type'=>'question'])}}">
                                            {{$question->created_at}} {{$question->name}} {{$question->title}}
                                        </a>
                                    </div>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>
                <div class="type_head btn btn-info" data-toggle="#quiz">
                    Quizzes
                </div>
                <div class="type_body" id="quiz">

                    @foreach($pages as $page)
                        @if($page->type == 'quiz')
                            <div class="">
                                <div class="col-md-3"><a href="{{route('admin',['method'=>'edit','lang'=>$lang,'type'=>$page->type,'id'=>$page->id])}}">{{$page->page_name}}</a>
                                </div>
                                <div class="col-md-2 text-center">{{$page->real_url}}</div>
                                <div class="col-md-6 form-group">
                                    <input style="width:100%;" type="text" class="form-control"
                                           name="seo_url[{{$page->id}}]"
                                           value="{{$page->seo_url}}" @if($page->seo_url=='/') readonly @endif>
                                </div>
                                <div class="col-md-1 text-center">
                                    <input class="form_publish" type="checkbox" value="1" name="active[{{$page->id}}]"
                                           @if($page->active==1) checked @endif>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <div class="navbar-fixed-bottom">
                    <div class="container flex">
                        <button type="submit" class="btn btn-primary margin_auto wide_btn">
                            <i class="fa fa-btn fa-save"></i> Save
                        </button>
                    </div>
                </div>

            </div>


        </form>
    </div>
@endsection