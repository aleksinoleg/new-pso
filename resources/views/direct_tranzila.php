
<form class="tranzila" action="https://direct.tranzila.com/psoeasy/" method="post">
    <input type="hidden" name="expyear" value="2015">
    <input type="hidden" name="pdesc" value="Please enter your credit card details. Your order ID is <?=$order->order_id?>">
    <input type="hidden" name="sum" value="<?=$order->total_cost?>">
    <input type="hidden" name="ordernumber" value="<?=$order->order_id?>">
    <input type="hidden" name="cname" value="<?=$customer->bill_first_name?>">
    <input type="hidden" name="contact" value="<?=$customer->bill_first_name.' '.$customer->bill_last_name?>">
    <input type="hidden" name="company" value="">
    <input type="hidden" name="email" value="<?=$customer->email?>">
    <input type="hidden" name="phone" value="<?=$customer->bill_phone?>">
    <input type="hidden" name="transmode" value="a">
    <input type="hidden" name="remarks" value="<?=$order->order_id?>">
</form>


<script src="/js/jquery-1.8.2.js"></script>

<script>
    $(document).ready(function(){
        $('.tranzila').trigger('submit');
    });

</script>