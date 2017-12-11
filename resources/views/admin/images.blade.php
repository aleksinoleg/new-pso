@extends('layouts.admin_wrapper')

@section('content')
    <div class="container" style="margin-bottom: 30px">

            <div class="form_image_header row">
                <div class="col-lg-3 btn btn-primary">Old Name</div>
                <div class="col-lg-3 btn btn-primary">New Name</div>
                <div class="col-lg-3 btn btn-primary">Alt Name</div>
                <div class="col-lg-3 btn btn-primary">Preview</div>
                <div class="clearfix"></div>
            </div>

            @foreach($img->instance as $key=>$item)
            <form action="{{route('admin.post',['action'=>'update','target'=>'image','lang'=>$lang])}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <input type="hidden" name="key" value="{{$key}}">
                <div class="form-group">
                    <label style="padding: 7px 0;{{($item->old_name == $item->new_name)?'color: red;':''}}"
                           class="col-lg-2 text-right" for="{{$key}}">{{$item->old_name}}</label>
                    <div class="col-lg-3">
                        <input style="{{($item->old_name == $item->new_name)?'color: red;':''}}" id="{{$key}}"
                               type="text" class="form-control" name="new_name[{{$item->id}}]"
                               value="{{ substr($item->new_name, 0, -4)}}">
                        <input type="hidden" name="ext[{{$item->id}}]" value="{{ substr($item->old_name, -4)}}">
                    </div>

                    <div class="col-lg-3">
                        <input style="{{($item->old_name == $item->new_name)?'color: red;':''}}" id="{{$key}}"
                               type="text" class="form-control" name="alt[{{$item->id}}]" value="{{$item->alt}}">
                    </div>
                    <div class="col-lg-1 relative">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                    <div class="col-lg-3 relative">
                        <a href="{{route('admin',['id'=>$item->id,'lang'=>$lang, 'method'=>'delete','type'=>'image'])}}" class="btn btn-danger dell_image">&times;</a>
                        <img style="max-width: 100%" src="/img/{{$lang}}/{{$item->new_name}}" alt="{{$item->alt}}">
                    </div>

                    <div class="clearfix"></div>
                </div>
            </form>
            @endforeach


    </div>
@endsection