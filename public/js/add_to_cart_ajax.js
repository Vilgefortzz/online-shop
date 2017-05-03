$(document).ready(function() {

    $('.add_to_cart').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'POST',
            url: url,

            success: function(data) {
                $('#removed_from_cart').hide();
                $('#added_to_cart').show();
                $('#added_to_cart').delay(7000).fadeOut('slow');

                var badge = $('.badge'),
                    count = Number(badge.text());

                badge.text(count + 1);

                $('#add_' + data.id).hide();
                $('#remove_' + data.id).show();
            }
        })
    });
});
