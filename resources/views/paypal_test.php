<?
$amount = $order->total_cost - $order->shipment_cost;
$shipping = ($amount==0)?0:$order->shipment_cost;
$amount = ($amount==0)?$order->shipment_cost:$amount;
?>

<form method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr" class="paypal-button" target="_top"
      style="opacity: 1;">
    <div class="hide" id="errorBox"></div>
    <input type="hidden" name="button" value="buynow">
    <input type="hidden" name="business" value="aleksin.oleg-facilitator@gmail.com">
    <input type="hidden" name="item_name" value="<?=$order->order_id?>">
    <input type="hidden" name="quantity" value="1">
    <input type="hidden" name="amount" value="<?=$amount?>">
    <input type="hidden" name="currency_code" value="EUR">
    <input type="hidden" name="shipping" value="<?=$shipping?>">
    <input type="hidden" name="tax" value="">
    <input type="hidden" name="notify_url" value="https://www.psoeasy.com/paypal-payment">
    <input type="hidden" name="cmd" value="_xclick">
    <input type="hidden" name="bn" value="PP-BuyNowBF">
    <input type="hidden" name="lc" value="EU">
    <input type="hidden" name="return" value="https://www.psoeasy.com/payment-success">

</form>


<script src="/js/jquery-1.8.2.js"></script>
     
<script>
    $(document).ready(function(){
        $('.paypal-button').trigger('submit');
    });

</script>