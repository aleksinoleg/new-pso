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
                            Answer Question
                            <form action="{{route('admin.post',['action'=>'dellToAdmin','target'=>'question','lang'=>$lang])}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$question->id}}">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST"
                                  action="{{route('admin.post',['action'=>'answer','target'=>'question','lang'=>$lang])}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$question->id}}">
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="published" value="1"
                                                       @if($question->published == 1) checked @endif> Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <label>Name
                                            <input type="text" name="name" class="form-control" value="{{$question->name}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <label>Email
                                            <input type="email" name="email" class="form-control" value="{{$question->email}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <label>Age
                                            <select name="age" id="" class="form-control">
                                                @for($i=18;$i<99;$i++)
                                                    <option value="{{$i}}" @if($i==$question->age) selected @endif>{{$i}}</option>
                                                @endfor
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <label>Title
                                            <input type="text" name="title" class="form-control" value="{{$question->title}}">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <label>Question
                                            <input type="text" name="question" class="form-control" value="{{$question->question}}">
                                        </label>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <div class="checkbox">
                                             <p>Answer</p>
                                                <textarea name="answer" id="comment" cols="70" rows="6">{{$question->answer or ''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text_center">
                                        <div class="checkbox">
                                            <p>Created at</p>
                                            <input type="text" name="created_at" class="datepicker form-control" value="{{$question->created_at->toDateString()}}">
                                        </div>
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


                        </div>
                    </div>

            </div>
        </div>
    </div>
@endsection
