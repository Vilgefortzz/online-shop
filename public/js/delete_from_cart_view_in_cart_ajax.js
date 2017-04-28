$(document).ready(function() {

    $('.remove_from_cart').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr("href");

        $.ajax({
            type: 'DELETE',
            url: url,

            success: function(data) {
                $('#added_to_cart').hide();
                $('#removed_from_cart').show();
                $('#removed_from_cart').delay(7000).fadeOut('slow');

                var $badge = $('.badge'),
                    count = Number($badge.text());

                $badge.text(count - 1);

                $('#cart_product_' + data.id).slideUp();

                var totalMoney = parseFloat($('#money').text());
                var newTotalMoney = parseFloat(totalMoney - data.price).toFixed(2);

                $('#money').hide();
                $('#money').text(newTotalMoney + '$').delay(500).fadeIn();

                localStorage.removeItem('product_' + data.id);
            }
        })
    });
});
