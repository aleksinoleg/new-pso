@extends('layouts.admin_wrapper')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add language</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('admin.post',['action'=>'add','target'=>'language','lang'=>$lang])}}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('lang_name') ? ' has-error' : '' }}">
                                <label for="lang_name" class="col-md-4 control-label">Language name</label>

                                <div class="col-md-6">
                                    <input id="lang_name" type="text" class="form-control" name="lang_name"
                                           value="{{ old('lang_name') }}">

                                    @if ($errors->has('lang_name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lang_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lang_id') ? ' has-error' : '' }}">
                                <label for="lang_id" class="col-md-4 control-label">Language id</label>

                                <div class="col-md-6">
                                    <input id="lang_id" type="text" class="form-control" name="lang_id"
                                           value="{{ old('lang_id') }}">

                                    @if ($errors->has('lang_id'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lang_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('currency') ? ' has-error' : '' }}">
                                <label for="currency" class="col-md-4 control-label">Currency</label>

                                <div class="col-md-6">
                                    <input id="currency" type="text" class="form-control" name="currency"
                                           value="{{ old('currency') }}">

                                    @if ($errors->has('currency'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('currency') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="active" value="1"> Active
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-sign-in"></i> Save
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