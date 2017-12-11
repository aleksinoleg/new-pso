@extends('layouts.default_wrapper')

@section('header')
   <link rel="stylesheet" href="/css/styl/payment.css">
   <link rel="stylesheet" href="/css/payment.css">
   <script>
      fbq('track', 'ViewContent');
   </script>
@endsection

@section('content')
   <div class="container flex">
      <div class="payment failed">
         <div class="l1">{!!$img->__('failed.png')!!}</div>
         <div class="l2">{{$L->__('your_payment')}}</div>
         <div class="l2 l2-1">{{$L->__('failed')}}</div>
         <div class="l3">{{$L->__('failed_text_1')}}</div>
         <div class="l4">{{$L->__('failed_text_2')}}</div>
      </div>
   </div>

@endsection

@section('footer')
@endsection