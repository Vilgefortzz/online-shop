$(document).ready(function() {

    $('.remove_from_cart').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'DELETE',
            url: url,

            success: function(data) {
                $('#added_to_cart').hide();
                $('#removed_from_cart').show();
                $('#removed_from_cart').delay(7000).fadeOut('slow');

                var badge = $('.badge'),
                    count = Number(badge.text());

                badge.text(count - 1);

                $('#remove_' + data.product.id).hide();
                $('#add_' + data.product.id).show();
            }
        })
    });
});
