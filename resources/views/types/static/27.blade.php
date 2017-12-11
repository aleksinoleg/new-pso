<?php header("X-Frame-Options:sameorigin"); ?>

<!DOCTYPE html>
<html lang="{{$page->lang or $L->lang}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="google-site-verification" content="xWGJhLWxECZ7t3ssvhPgkoD5LN0kjwHQSMUTf6DU3xo" />

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="{{$page->meta_key or ""}}" />
    <meta name="description" content="{{$page->meta_desc or ""}}" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>

    <title>{{$page->meta_title or ""}}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/font-awesome.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/styl/unsubscribe.css">

</head>

<body>

<div class="wrapper">
    @if(Session::has('info'))
        <div style="background: rgba(255,0,0,0.2); font-size: 18px; color: #ff0000; font-weight: bold" class="alert alert-info" role="alert">
            {{$L->__(Session::get('info'))}}
        </div>
    @endif
    <div class="header">
        <div class="pull-left logo">
            {!! $img->__('psoeasy_bl.jpg') !!}
        </div>
        <div class="pull-left header_text">
            {{$L->__('subscribers')}}
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="unsub_form">
        <div class="l0">{{$L->__('unsubscribe_title')}}</div>
        <div class="l1">{{$L->__('unsubscribe_line_1')}}</div>
        <div class="l2">{{$L->__('unsubscribe_line_2')}}</div>
        <form action="/admin/unsubscribe" method="post">
            {{csrf_field()}}
            <input type="hidden" name="email" value="{{$email or ''}}">
            <input type="hidden" name="subject" value="{{$subject or ''}}">
            <input type="hidden" name="lang" value="{{$L->lang}}">
            <div class="form-group">
                <input class="radio_1" id="no_longer_want" type="radio" name="reason" value="no_longer_want" checked>
                <label for="no_longer_want">
                    {{$L->__('no_longer_want')}}
                </label>
            </div>
            <div class="form-group">
                <input class="radio_1" id="never_signed" type="radio" name="reason" value="never_signed">
                <label for="never_signed">
                     {{$L->__('never_signed')}}
                </label>
            </div>
            <div class="form-group">
                <input class="radio_1" id="email_not_important" type="radio" name="reason" value="email_not_important">
                <label for="email_not_important">
                     {{$L->__('email_not_important')}}
                </label>
            </div>
            <div class="form-group">
                <input class="radio_1" id="spam" type="radio" name="reason" value="spam">
                <label for="spam">
                     {{$L->__('it_is_spam')}}
                </label>
            </div>
            <div class="form-group">
                <input class="radio_1 textarea_reason_on" id="other" type="radio" name="reason" value="other">
                <label for="other">
                     {{$L->__('other')}}
                </label>
            </div>

            <div class="form-group">
                <textarea name="reason_other" class="textarea_reason"></textarea>
            </div>

            <div class="end_form">
                <div class="pull-left">
                    <button type="submit" class="unsub_submit">
                        {{$L->__('unsub_submit')}}
                    </button>
                </div>
                <div class="pull-right">
                    <a href="/{{$L->lang!='en'?$L->lang.'/':''}}"><< {{$L->__('return_to_site')}}</a>
                </div>
                <div class="clearfix"></div>
            </div>


        </form>
    </div>
</div>


<!-- JavaScripts -->
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
    $('.textarea_reason').click(function () {
        $('.textarea_reason_on').prop('checked',true);
    })
</script>


</body>
</html>
