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
            $('.additional_price_section').append('<div class="price_section"><div class="col-lg-2 text-right"></div><div class="col-lg-10"><div class="form-group"><div class="col-lg-4"><label for="dosage" class="col-md-4 control-label">Dosage</label><div class="col-md-8"><input id="dosage" type="text" class="form-control" name="dosage[]"></div></div><div class="col-lg-4"><label for="amount" class="col-md-4 control-label">Amount</label><div class="col-md-8"><input id="amount" type="text" class="form-control" name="amount[]"></div></div><div class="col-lg-4"><label for="price" class="col-md-4 control-label">Price *</label><div class="col-md-8"><input id="price" type="text" class="form-control req num" name="price[]"></div></div><div class="clearfix"></div></div></div><div class="clearfix"></div></div>');
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
                        <div class="panel-heading text-center">Create {{$type}}</div>
                        <div class="panel-body">
                            <form class="form-horizontal valid" role="form" method="POST"
                                  action="{{ route('admin.post',['action'=>'create','target'=>'page','lang'=>$lang]) }}">
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="active" value="1"> Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="lang" value="{{$lang}}">
                                <input type="hidden" name="type" value="{{$type}}">

                                @if($type == 'product')
                                    <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                        <label for="category_id" class="col-md-2 control-label">Category</label>

                                        <div class="col-md-10">
                                            <select name="category_id" id="category_id" class="form-control ">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->page_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if($type == 'review')
                                    <div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
                                        <label for="parent_id" class="col-md-2 control-label">Product</label>

                                        <div class="col-md-10">
                                            <select name="parent_id" id="parent_id" class="form-control ">
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">{{$product->page_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                @if($type == 'blog')
                                    <div class="form-group">
                                        <div class="col-md-12 text_center">
                                            <div class="checkbox">
                                                <label>
                                                    <input class="its_blog_cat" type="checkbox" name="its_blog_cat" value="1"> It's blog category
                                                </label>
                                            </div>
                                        </div>
                                    </div>
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
                                               value="{{ old('page_name') }}">

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
                                               value="{{ old('link_name') }}">

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
                                               value="{{ old('seo_url') }}">

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
                                               value="{{ old('title') }}">

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
                                        <span class="btn btn-xs btn-success" id="count">0</span>
                                    </label>

                                    <div class="col-md-10">
                                        <input id="meta_title" type="text" class="form-control req" name="meta_title"
                                               value="{{ old('meta_title') }}" onkeyup="countVal(this)">

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
                                        <span class="btn btn-xs btn-success" id="count">0</span>
                                    </label>

                                    <div class="col-md-10">
                                    <textarea id="meta_key" class="form-control req" name="meta_key"
                                              onkeyup="countVal(this)"></textarea>

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
                                        <span class="btn btn-xs btn-success" id="count">0</span>
                                    </label>

                                    <div class="col-md-10">
                                    <textarea id="meta_desc" class="form-control req" name="meta_desc"
                                              onkeyup="countVal(this)"></textarea>
                                        @if ($errors->has('meta_desc'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                @if($type == 'product')
                                    <div class="form-group{{ $errors->has('prod_id') ? ' has-error' : '' }}">
                                        <label for="prod_id" class="col-md-2 control-label">Product ID *</label>

                                        <div class="col-md-10">
                                            <input id="prod_id" type="text" class="form-control req num" name="prod_id"
                                                   value="{{ old('prod_id') }}">

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
                                                        <input id="dosage" type="text" class="form-control" name="dosage[]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="amount" class="col-md-4 control-label">Amount</label>
                                                    <div class="col-md-8">
                                                        <input id="amount" type="text" class="form-control" name="amount[]">
                                                    </div>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="price" class="col-md-4 control-label">Price *</label>
                                                    <div class="col-md-8">
                                                        <input id="price" type="text" class="form-control req num" name="price[]">
                                                    </div>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="additional_price_section"></div>

                                    <div class="attribute_section text-center">
                                        <b>Additional attributes</b>
                                        <div class="btn btn-success add_attribute">+</div>
                                        <div class="btn btn-danger remove_attribute">-</div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="attributes"></div>

                                @endif
                                <div class="form-group{{ $errors->has('short_desc') ? ' has-error' : '' }}">
                                    <label for="short_desc" class="col-md-2 control-label">Short Description</label>

                                    <div class="col-md-10">
                                        <textarea id="short_desc" class="form-control" name="short_desc"></textarea>

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
                                        <textarea id="editor" class="form-control" name="long_desc"></textarea>

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
                                    <div class="images relative">
                                        <img src="{{substr($image,1)}}" class="">
                                        <form action="{{route('admin.post',['action'=>'dell','target'=>'image','lang'=>$lang])}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="type" value="{{$type}}">
                                            <input type="hidden" name="key" value="{{$key}}">
                                            <button type="submit" class="btn btn-danger pull-right dell_image">&times;</button>
                                        </form>

                                        <div class="clearfix"></div>
                                    </div>
                                @endforeach
                                <div class="clearfix"></div>
                                <form class="form-inline flex" action="{{route('admin.post',['action'=>'save','target'=>'image','lang'=>$lang])}}"
                                      method="post"
                                      enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <input type="hidden" name="type" value="{{$type}}">
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
