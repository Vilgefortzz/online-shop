$(document).ready(function() {

    if (sessionStorage.length > 0){
        for (var i = 0; i < sessionStorage.length; i++){

            $('#' + sessionStorage.getItem(sessionStorage.key(i))).removeClass('add_to_cart').addClass('remove_from_cart');
            $('#' + sessionStorage.getItem(sessionStorage.key(i))).empty();
            $('#' + sessionStorage.getItem(sessionStorage.key(i))).append('<div id="remove_from_cart_btn' + sessionStorage.getItem(sessionStorage.key(i)) + '">' + '<span class="glyphicon glyphicon-remove"></span><b>Added to cart</b>' + '</div>');
            $('#' + sessionStorage.getItem(sessionStorage.key(i))).attr('href', '/cart/delete/' + sessionStorage.getItem(sessionStorage.key(i)));
        }
    }

    $('.add_to_cart').on('click', function (e) {
        e.preventDefault();

        var base_url = 'http://127.0.0.1:8000';
        var url = $(this).attr("href");

        $.ajax({
            type: 'POST',
            url: url,

            success: function(data) {
                $('#added_to_cart').show();
                $('#added_to_cart').delay(7000).fadeOut('slow');

                var $badge = $('.badge'),
                    count = Number($badge.text());

                $badge.text(count + 1);

                var added_btn= $('<div id="remove_from_cart_btn' + data.id + '">' + '<span class="glyphicon glyphicon-remove"></span><b>Added to cart</b>' + '</div>');

                $('#' + data.id).removeClass('add_to_cart').addClass('remove_from_cart');
                $('#' + data.id).empty();
                $('#' + data.id).append(added_btn).hide().fadeIn(1000);
                $('#' + data.id).attr('href', base_url + '/cart/delete/' + data.id);

                // Add listener

                $('#' + data.id).one('click', function (e) {
                    e.preventDefault();

                    var base_url = 'http://127.0.0.1:8000';
                    var url = $(this).attr("href");

                    $.ajax({
                        type: 'DELETE',
                        url: url,

                        success: function(data) {
                            $('#removed_from_cart').show();
                            $('#removed_from_cart').delay(7000).fadeOut('slow');

                            var $badge = $('.badge'),
                                count = Number($badge.text());

                            $badge.text(count - 1);

                            var removed_btn= $('<div id="add_to_cart_btn' + data.id + '">' + '<span class="glyphicon glyphicon-shopping-cart"></span><b>Add to cart</b>' + '</div>');

                            $('#' + data.id).removeClass('remove_from_cart').addClass('add_to_cart');
                            $('#' + data.id).empty();
                            $('#' + data.id).append(removed_btn).hide().fadeIn(1000);
                            $('#' + data.id).attr('href', base_url + '/cart/add/' + data.id);

                            sessionStorage.removeItem('product_' + data.id);
                        }
                    })
                });

                sessionStorage.setItem('product_' + data.id, data.id);
            }
        })
    });
});
