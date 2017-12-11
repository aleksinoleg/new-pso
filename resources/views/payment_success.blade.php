<?
$order_cost = 0;
$currency = '€';
if(session()->has('cart')){
    $cart = session('cart');
    foreach ($cart as $item){
        $order_cost += $item['price']*$item['quantity'];
        $currency = $item['currency'];
    }
}



?>

@extends('layouts.default_wrapper')

@section('header')
   <link rel="stylesheet" href="/css/styl/payment.css">
   <link rel="stylesheet" href="/css/payment.css">
   <!-- Facebook Pixel Code -->
   <script>
       !function(f,b,e,v,n,t,s)
       {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
               n.callMethod.apply(n,arguments):n.queue.push(arguments)};
           if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
           n.queue=[];t=b.createElement(e);t.async=!0;
           t.src=v;s=b.getElementsByTagName(e)[0];
           s.parentNode.insertBefore(t,s)}(window,document,'script',
               'https://connect.facebook.net/en_US/fbevents.js');
       fbq('set', 'autoConfig', false, 'FB_PIXEL_ID');
       fbq('init', '1417451905005848');
       fbq('track', 'Purchase', {currency: 'EUR', value: '{{$order_cost}}'});

   </script>
   <noscript>
       <img height="1" width="1"
            src="https://www.facebook.com/tr?id=1417451905005848&ev=PageView
&noscript=1"/>
   </noscript>
   <!-- End Facebook Pixel Code -->
@endsection

@section('content')

   <div class="container flex">
      <div class="payment success">
          <div class="l1">{{$L->__('thank_you')}}</div>
          <div class="l2">{!!$img->__('payment.png')!!}</div>
          <div class="l3">{{$L->__('for_your_payment')}}</div>
          <div class="l4">{{$L->__('thank_you_payment_text')}}</div>
          <div class="l4">{{$L->__('thank_you_payment_text_1')}}</div>
      </div>
   </div>

@endsection

@section('footer')
    <!-- Google Code for Thank you page Conversion Page -->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 989755504;
        var google_conversion_language = "en";
        var google_conversion_format = "3";
        var google_conversion_color = "ffffff";
        var google_conversion_label = "OUk5CMG_r3MQ8PD51wM";
        var google_remarketing_only = false;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
    </script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/989755504/?label=OUk5CMG_r3MQ8PD51wM&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>
@endsection
