$(document).ready(function() {

    $('.remove_from_cart').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'DELETE',
            url: url,

            success: function(data) {
                var badge = $('.badge'),
                    count = Number(badge.text());

                badge.text(count - 1);

                $('#cart_product_' + data.product.id).slideUp();

                var newTotalMoney = data.newTotalPrice.toFixed(2);

                $('#money').hide();
                $('#money').text(newTotalMoney + '$').delay(500).fadeIn();
            }
        })
    });
});
