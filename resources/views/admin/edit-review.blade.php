@extends('layouts.admin_wrapper')

@section('header')
    <style>
        .ui-datepicker-month,.ui-datepicker-year{
            color: #000;
        }
        .datepicker{
            width: 250px;
            margin: auto;
        }
    </style>
@endsection

@section('footer')

    <script>
        $('.datepicker').datepicker({
            changeMonth: true,
            changeYear: true
        });
    </script>

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        Edit review
                        <form action="{{route('admin.post',['action'=>'dellToAdmin','target'=>'review','lang'=>$lang])}}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$review->id}}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{route('admin.post',['action'=>'edit','target'=>'review','lang'=>$lang])}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$review->id}}">

                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="published" value="1"
                                                   @if($review->published == 1) checked @endif> Publish
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <label for="name"> Name
                                            <input id="name" type="text" name="name" value="{{$review->name}}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12 text_center">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<label for="age">{{$L->__('age')}}</label>--}}
                                        {{--<select name="age" id="age">--}}
                                            {{--@for($i=18;$i<81;$i++)--}}
                                                {{--<option value="{{$i}}" @if($review->age==$i) selected @endif>{{$i}}</option>--}}
                                            {{--@endfor--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<div class="col-md-12 text_center">--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<input type="radio" id="genderChoice1"--}}
                                               {{--name="gender" value="male" @if($review->gender=='male') checked @endif>--}}
                                        {{--<label for="genderChoice1">Male</label>--}}
                                    {{--</div>--}}
                                    {{--<div class="checkbox">--}}
                                        {{--<input type="radio" id="genderChoice2"--}}
                                               {{--name="gender" value="female" @if($review->gender=='female') checked @endif>--}}
                                        {{--<label for="genderChoice2">Female</label>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <label for="title"> Title
                                            <input id="title" type="text" name="title" value="{{$review->title}}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <label for="rate"> Rate
                                            <input id="rate" type="text" name="rate" value="{{$review->rate}}">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <p>Comment</p>
                                        <textarea name="comment" id="comment" cols="30" rows="4">{{$review->comment}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <div class="checkbox">
                                        <p>Created at</p>
                                        <input type="text" name="created_at" class="datepicker form-control" value="{{$review->created_at->toDateString()}}">
                                    </div>
                                </div>
                            </div>

                            @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_before.jpg'))
                                Before
                                <img style="width: 100px" src="{{asset('storage/img/reviews/rev_'.$review->id.'_before.jpg')}}">
                            @endif

                            @if(file_exists('./storage/img/reviews/rev_'.$review->id.'_after.jpg'))
                                After
                                <img style="width: 100px" src="{{asset('storage/img/reviews/rev_'.$review->id.'_after.jpg')}}">
                            @endif


                            <div class="form-group">
                                <div class="col-md-12 text_center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-save"></i> Save
                                    </button>

                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
