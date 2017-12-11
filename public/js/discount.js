$('.submit_check_promo_code').click(function () {
    var code = $('.promo_code').val();
    var price = $('.cart_order_total').children('#value').text();
    
    // console.log(price);
    $.ajax({
        method: "POST",
        url: "/checkDiscount",
        data: { promo_code: code, price: price }
    }).done(function () {
        // console.log(a);
        location.reload();
    })
});