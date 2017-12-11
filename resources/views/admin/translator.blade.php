@extends('layouts.admin_wrapper')

@section('content')
    <div class="container" style="margin-bottom: 30px">


            @foreach($L->instance as $key=>$item)
            <form action="{{route('admin.post',['action'=>'update','target'=>'translator','lang'=>$lang])}}" method="post" class="form-horizontal">
                {{csrf_field()}}
                <div class="form-group">
                    <label style="padding: 7px 0;{{($item->phrase == $item->value)?'color: red;':''}}"
                           class="col-lg-3 text-right" for="{{$key}}">{{$item->phrase}}</label>
                    <div class="col-lg-7">
                        <input style="{{($item->phrase == $item->value)?'color: red;':''}}" id="{{$key}}"
                               type="text" class="form-control" name="value[{{$item->id}}]" value="{{$item->value}}">
                    </div>

                    <div class="col-lg-1">
                        <a href="{{route('admin',['id'=>$item->id,'lang'=>$lang, 'method'=>'delete','type'=>'translator'])}}" class="btn btn-danger">&times;</a>
                    </div>

                    <div class="col-lg-1">
                        <button type="submit" class="btn btn-primary margin_auto">
                            <i class="fa fa-btn fa-save"></i> Save
                        </button>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
            @endforeach
                {{--<div class="navbar-fixed-bottom">--}}
                    {{--<div class="container flex">--}}
                        {{--<button type="submit" class="btn btn-primary margin_auto wide_btn">--}}
                            {{--<i class="fa fa-btn fa-save"></i> Save--}}
                        {{--</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

    </div>
@endsection