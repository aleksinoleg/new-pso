<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Admin</title>

    <!-- Fonts -->
    <script src="https://use.fontawesome.com/1e1080ee6c.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    @yield('header')
</head>
<body>
<div class="container">
    <div class="panel">
        <a href="{{route('admin',['method'=>'index','lang'=>$lang])}}" class="btn btn-success btn-sm pull-left"><i class="glyphicon glyphicon-home"></i></a>
        <a href="{{route('admin',['method'=>'languages','lang'=>$lang])}}" class="btn btn-sm btn-success pull-left"><i class="glyphicon glyphicon-flag"></i></a>
        <a href="{{route('admin',['method'=>'translator','lang'=>$lang])}}" class="btn btn-sm btn-success pull-left"><i class="glyphicon glyphicon-globe"></i></a>
        <a href="{{route('admin',['method'=>'images','lang'=>$lang])}}" class="btn btn-sm btn-success pull-left"><i class="glyphicon glyphicon-picture"></i></a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'static','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Static Page</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'article','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Article</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'category','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Category</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'product','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Product</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'review','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Review</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'blog','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Blog</a>
        <a href="{{route('admin',['method'=>'create','lang'=>$lang,'type'=>'quiz','id'=>'new'])}}" class="btn btn-sm btn-info pull-left">New Quiz</a>
        <a href="/logout" class="btn btn-sm btn-warning pull-right">Logout</a>
        <div class="pull-right relative">
            <div class="btn btn-info btn-sm language_select">{{$languages_all->where('lang_id',$lang)->first()->lang_name}}</div>
            <div class="languages">
                @foreach($languages as $language)
                    <div><a href="{{route('admin',['method'=>'index','lang'=>$language->lang_id])}}">{{$language->lang_name}}</a></div>
                @endforeach
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
    @yield('content')


<p id="back-top">
    <a href="#top"><span></span></a>
</p>

    <!-- JavaScripts -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="{{ asset('js/jquery-ui.js') }}"></script>

{{--back-top--}}
<script>
    $("#back-top").hide();
    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });
        $('#back-top a').click(function () {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });
</script>

<script>

    $('.its_blog_cat').change(function () {
        $('.blog_cat').toggle();
    });
</script>

<script>
    $('.language_select').click(function () {
        $('.languages').toggle();
    })
</script>

    @yield('footer')
</body>
</html>
