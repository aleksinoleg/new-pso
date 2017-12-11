@extends('layouts.admin_wrapper')

@section('content')
    <div class="container">
        <div class="flex">
            <div class="margin_auto">
                <a href="{{route('admin',['method'=>'addLanguage','lang'=>$lang])}}" class="btn btn-info">Add new Language</a>
            </div>
        </div>
        <div class="col-lg-6 col-lg-offset-3">
            <form class="form_lang" action="{{route('admin.post',['action'=>'update','target'=>'languages','lang'=>$lang])}}" method="post" role="form">
                {{csrf_field()}}

                @foreach($languages_all as $key=>$language)
                    <div class="@if($language->lang_id==env('DEFAULT_LANG')) default_lang @endif">
                        <div class="col-lg-7">
                            <input class="form-control" type="text" name="lang_name[{{$language->id}}]"
                                   value="{{$language->lang_name}}">
                        </div>

                        <div class="col-lg-2">
                            <input class="form-control" type="text" name="lang_id[{{$language->id}}]"
                                   value="{{$language->lang_id}}" @if($language->lang_id==env('DEFAULT_LANG')) readonly @endif>
                        </div>
                        <div class="col-lg-2">
                            <input class="form-control" type="text" name="currency[{{$language->id}}]"
                                   value="{{$language->currency}}">
                        </div>

                        <div class="col-lg-1">
                            <input class=" form-control no_border " type="checkbox" name="active[{{$language->id}}]"
                                   @if($language->active == 1) checked @endif value="1"
                            >
                        </div>

                        <div class="clearfix"></div>
                    </div>

                @endforeach
                <div class="flex">
                    <div class="margin_auto">
                        <input type="submit" class="btn btn-success" value="Save">
                    </div>
                </div>
            </form>

        </div>

    </div>
@endsection