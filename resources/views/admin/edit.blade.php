<?
$relatedProds = $page->getRelatedProds($page->prod_id, $L->lang);

$prods = $pages->where('active',1)
    ->where('type','product')
    ->all();

?>
@extends('layouts.admin_wrapper')

@section('header')
    <script src="/ckeditor/ckeditor.js"></script>
    <script src="/ckeditor/samples/js/sample.js"></script>
    <script src="/ckeditor/styles.js"></script>
@endsection

@section('footer')
    <script src="/js/createPageValidator.js"></script>
    <script>
        initSample();
    </script>

    <script>
        function countVal(val) {
            var len = val.value.length;
            $(val).parent('div').parent('.form-group').children('label').children('#count').text(len);
        }
    </script>

    <script>
        $('.add_price_section').on('click', function () {
            $('.additional_price_section').append('<div class="price_section"><div class="col-lg-2 text-right"></div><div class="col-lg-10"><div class="form-group"><div class="col-lg-4"><label for="dosage" class="col-md-4 control-label">Dosage</label><div class="col-md-8"><input id="dosage" type="text" class="form-control" name="dosage[]"></div></div><div class="col-lg-4"><label for="amount" class="col-md-4 control-label">Amount</label><div class="col-md-8"><input id="amount" type="text" class="form-control" name="amount[]"></div></div><div class="col-lg-4"><label for="price" class="col-md-6 control-label">Price *</label><div class="col-md-6"><input id="price" type="text" class="form-control req num" name="price[]"></div></div><div class="clearfix"></div></div></div><div class="clearfix"></div></div>');
        });
        $('.remove_last_price_section').on('click', function () {
            $('.additional_price_section .price_section:last').remove();
        });

        $('.add_attribute').on('click', function () {
            $('.attributes').append('<div class="col-lg-10 col-lg-offset-2 attribute"><div class="form-group"><div class="col-lg-6"><label for="name" class="col-md-2 control-label">Name</label><div class="col-md-10"><input id="name" type="text" class="form-control" name="name[]"></div></div><div class="col-lg-6"><label for="value" class="col-md-2 control-label">Value</label><div class="col-md-10"><input id="value" type="text" class="form-control" name="value[]"></div></div><div class="clearfix"></div></div></div>');
        });
        $('.remove_attribute').on('click', function () {
            $('.attributes .attribute:last').remove();
        });
        $('.add_related_prod').on('click', function () {
            $('.related_prods').append('<div class="form-group col-lg-6 col-lg-push-3" ><select class="form-control" name="related_prod[]" id="related_prod">@foreach($prods as $prod) @if($prod->prod_id!=$page->prod_id)<option value="{{$prod->prod_id}}">{{$prod->page_name}}</option>@endif @endforeach</select></div><div class="clearfix"></div>');
        });
        $('.remove_related_prod').on('click', function () {
            $('.related_prods .form-group:last').remove();
        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(isset($error_categories))
                    <div class="error">
                        {{$error_categories}}
                    </div>
                @elseif(isset($error_products))
                    <div class="error">
                        {{$error_products}}
                    </div>
                @else
                    <div class="panel panel-default">
                        <div class="panel-heading text-center">Edit {{$page->page_name}}</div>
                        <div class="panel-body">
                            <form class="form-horizontal valid" role="form" method="POST"
                                  action="{{route('admin.post',['action'=>'edit','target'=>'page','lang'=>$lang])}}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="active" value="1"
                                                @if($page->active == 1) checked @endif> Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="lang" value="{{$lang}}">
                                <input type="hidden" name="id" value="{{$page->id}}">
                                <input type="hidden" name="type" value="{{$page->type}}">

                                @if($page->type == 'product')
                                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="category_id" class="col-md-2 control-label">Category</label>

                                        <div class="col-md-10">
                                            <select name="category_id" id="category_id" class="form-control ">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"
                                                    @if($category->id == $page->category_id) selected @endif
                                                    >{{$category->page_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if($page->type == 'review')
                                    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                        <label for="parent_id" class="col-md-2 control-label">Product</label>

                                        <div class="col-md-10">
                                            <select name="parent_id" id="parent_id" class="form-control ">
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}"
                                                    @if($product->id == $page->parent_id) selected @endif
                                                    >{{$product->page_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if($type == 'blog')

                                    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }} blog_cat">
                                        <label for="parent_id" class="col-md-2 control-label">Blog Category</label>

                                        <div class="col-md-10">
                                            <select name="parent_id" id="parent_id" class="form-control ">
                                                @if(!$blog_categories->isEmpty())
                                                    @foreach($blog_categories as $blog_category)
                                                        <option value="{{$blog_category->id}}">{{$blog_category->page_name}}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group{{ $errors->has('page_name') ? ' has-error' : '' }}">
                                    <label for="page_name" class="col-md-2 control-label">Page Name *</label>

                                    <div class="col-md-10">
                                        <input id="page_name" type="text" class="form-control req" name="page_name"
                                               value="{{ $page->page_name }}">

                                        @if ($errors->has('page_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('page_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('link_name') ? ' has-error' : '' }}">
                                    <label for="link_name" class="col-md-2 control-label">Link Name *</label>

                                    <div class="col-md-10">
                                        <input id="link_name" type="text" class="form-control req" name="link_name"
                                               value="{{ $page->link_name }}">

                                        @if ($errors->has('link_name'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('link_name') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('seo_url') ? ' has-error' : '' }}">
                                    <label for="seo_url" class="col-md-2 control-label">Seo Url *</label>

                                    <div class="col-md-10">
                                        <input id="seo_url" type="text" class="form-control req" name="seo_url"
                                               value="{{ $page->seo_url }}" @if($page->seo_url == '/') readonly @endif>

                                        @if ($errors->has('seo_url'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('seo_url') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                    <label for="title" class="col-md-2 control-label">Title *</label>

                                    <div class="col-md-10">
                                        <input id="title" type="text" class="form-control req" name="title"
                                               value="{{ $page->title }}">

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('meta_title') ? ' has-error' : '' }}">
                                    <label for="meta_title" class="col-md-2 control-label">
                                        Meta Title *
                                        <span class="btn btn-xs btn-success" id="count">{{strlen($page->meta_title)}}</span>
                                    </label>

                                    <div class="col-md-10">
                                        <input id="meta_title" type="text" class="form-control req" name="meta_title"
                                               value="{{ $page->meta_title }}" onkeyup="countVal(this)">

                                        @if ($errors->has('meta_title'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('meta_title') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('meta_key') ? ' has-error' : '' }}">
                                    <label for="meta_key" class="col-md-2 control-label">
                                        Meta Keywords *
                                        <span class="btn btn-xs btn-success" id="count">
                                            {{strlen($page->meta_key)}}
                                        </span>
                                    </label>

                                    <div class="col-md-10">
                                    <textarea id="meta_key" class="form-control req" name="meta_key"
                                              onkeyup="countVal(this)">{{$page->meta_key}}</textarea>

                                        @if ($errors->has('meta_key'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('meta_desc') ? ' has-error' : '' }}">
                                    <label for="meta_desc" class="col-md-2 control-label">
                                        Meta Description *
                                        <span class="btn btn-xs btn-success" id="count">
                                            {{strlen($page->meta_desc)}}
                                        </span>
                                    </label>

                                    <div class="col-md-10">
                                    <textarea id="meta_desc" class="form-control req" name="meta_desc"
                                              onkeyup="countVal(this)">{{$page->meta_desc}}</textarea>
                                        @if ($errors->has('meta_desc'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                @if($page->type == 'product')
                                    <div class="form-group{{ $errors->has('prod_id') ? ' has-error' : '' }}">
                                        <label for="prod_id" class="col-md-2 control-label">Product ID *</label>

                                        <div class="col-md-10">
                                            <input id="prod_id" type="text" class="form-control req num" name="prod_id"
                                                   value="{{ $page->prod_id }}">

                                            @if ($errors->has('prod_id'))
                                                <span class="help-block">
                                            <strong>{{ $errors->first('prod_id') }}</strong>
                                        </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="price_section">
                                        <div class="col-lg-2 text-right">
                                            <div class="btn btn-success add_price_section">+</div>
                                            <div class="btn btn-danger remove_last_price_section">-</div>
                                        </div>

                                        <div class="col-lg-10">
                                            <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                                <div class="col-lg-4">
                                                    <label for="dosage" class="col-md-4 control-label">Dosage</label>
                                                    <div class="col-md-8">
                                                        <input id="dosage" type="text" class="form-control" name="dosage[]"
                                                        value="{{($page->dosages->isEmpty())?'':$page->dosages[0]->dosage}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="amount" class="col-md-4 control-label">Amount</label>
                                                    <div class="col-md-8">
                                                        <input id="amount" type="text" class="form-control" name="amount[]"
                                                               value="{{($page->dosages->isEmpty())?'':$page->dosages[0]->amount}}">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="price" class="col-md-6 control-label">Price *</label>
                                                    <div class="col-md-6">
                                                        <input id="price" type="text" class="form-control req num" name="price[]"
                                                               value="{{($page->dosages->isEmpty())?'':$page->dosages[0]->price}}">
                                                    </div>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="additional_price_section">
                                        @if(count($page->dosages)>1)
                                            @foreach($page->dosages as $key=>$dosage)
                                                @if($key>0)
                                                    <div class="price_section">
                                                        <div class="col-lg-2 text-right"></div>
                                                        <div class="col-lg-10"><div class="form-group">
                                                                <div class="col-lg-4">
                                                                    <label for="dosage" class="col-md-4 control-label">Dosage</label>
                                                                    <div class="col-md-8">
                                                                        <input id="dosage" type="text" class="form-control" name="dosage[]"
                                                                        value="{{$dosage->dosage}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="amount" class="col-md-4 control-label">Amount</label>
                                                                    <div class="col-md-8">
                                                                        <input id="amount" type="text" class="form-control" name="amount[]"
                                                                        value="{{$dosage->amount}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <label for="price" class="col-md-6 control-label">Price *</label>
                                                                    <div class="col-md-6">
                                                                        <input id="price" type="text" class="form-control req num" name="price[]"
                                                                        value="{{$dosage->price}}">
                                                                    </div>
                                                                </div>
                                                                {{--<div class="col-lg-3">--}}
                                                                    {{--<label for="aff_3_id" class="col-md-6 control-label">Aff-3 ID *</label>--}}
                                                                    {{--<div class="col-md-6">--}}
                                                                        {{--<input id="aff_3_id" type="text" class="form-control req num" name="affProdId[]"--}}
                                                                               {{--value="{{$dosage->affProdId}}">--}}
                                                                    {{--</div>--}}
                                                                {{--</div>--}}
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>

                                    <div class="attribute_section text-center">
                                        <b>Additional attributes</b>
                                        <div class="btn btn-success add_attribute">+</div>
                                        <div class="btn btn-danger remove_attribute">-</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="attributes">
                                        @if(count($page->attributes)>0)
                                            @foreach($page->attributes as $key=>$attribute)
                                                <div class="col-lg-10 col-lg-offset-2 attribute">
                                                    <div class="form-group">
                                                        <div class="col-lg-6">
                                                            <label for="name" class="col-md-2 control-label">Name</label>
                                                            <div class="col-md-10">
                                                                <input id="name" type="text" class="form-control" name="name[]"
                                                                value="{{$attribute->name}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <label for="value" class="col-md-2 control-label">Value</label>
                                                            <div class="col-md-10">
                                                                <input id="value" type="text" class="form-control" name="value[]"
                                                               value="{{$attribute->value}}">
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>

                                    {{--related products--}}

                                <div class="related_prods_sec text-center">
                                    <b>Related Products</b>
                                    <div class="btn btn-success add_related_prod">+</div>
                                    <div class="btn btn-danger remove_related_prod">-</div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="related_prods" style="margin: 10px 0">
                                    @foreach($relatedProds as $relatedProd)
                                        @if($relatedProd)
                                        <div class="form-group col-lg-6 col-lg-push-3" >
                                            <select class="form-control" name="related_prod[]" id="related_prod">
                                                @foreach($prods as $prod)
                                                    @if($prod->prod_id!=$page->prod_id)
                                                        <option value="{{$prod->prod_id}}" @if($prod->prod_id==$relatedProd->prod_id) selected  @endif>{{$prod->page_name}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="clearfix"></div>
                                        @endif
                                    @endforeach
                                </div>

                                    {{--end related products--}}


                                @endif
                                <div class="form-group{{ $errors->has('short_desc') ? ' has-error' : '' }}">
                                    <label for="short_desc" class="col-md-2 control-label">Short Description</label>

                                    <div class="col-md-10">
                                        <textarea id="short_desc" class="form-control" name="short_desc">{{$page->short_desc}}</textarea>

                                        @if ($errors->has('short_desc'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('short_desc') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('long_desc') ? ' has-error' : '' }}">
                                    <label for="editor" class="col-md-12 control-label text_center">Long
                                        Description</label>

                                    <div class="col-md-12">
                                        <textarea id="editor" class="form-control" name="long_desc">{{$page->long_desc}}</textarea>

                                        @if ($errors->has('long_desc'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('long_desc') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fa fa-btn fa-save"></i> Save
                                        </button>

                                    </div>
                                </div>
                            </form>
                            <div class="image_section">
                                <div class="text-center">Available Images</div>
                                @foreach($images as $key=>$image)
                                    <div class="images">
                                        <img src="{{substr($image,1)}}" class="">
                                        <form action="{{route('admin.post',['action'=>'dell','target'=>'image','lang'=>$lang])}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="type" value="{{$type}}">
                                            <input type="hidden" name="key" value="{{$key}}">
                                            <button type="submit" class="btn btn-danger pull-right dell_image">&times;</button>
                                        </form>

                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                                <form class="form-inline flex" action="{{url('/admin/save/image/'.$L->lang)}}"
                                      method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="{{$page->type}}">
                                    <div class="margin_auto">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="file" accept="image/*"
                                                       name="articleImage">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text_center">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-save"></i> Add Image
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
