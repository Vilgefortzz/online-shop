$(function() {

    $('.pagination a').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getProducts(url);
    })

});

function getProducts(url) {

    $.ajax({
        type: 'GET',
        url: url,

        beforeSend: function() {
            $('#products').css('opacity', '0.1');
            $('#products').append('<img id="loading" style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');
        },
        complete: function(){
            $('#products').css('opacity', '1');
            $('#looading').remove();
        },
        success: function(data){

            $('#products').html(data);

            // Set active class to grid when go to another page with ajax calls
            $('#grid').addClass('active');
            $('#list').removeClass('active');

            // Add listeners

            // Again to animate when redirect to page with details

            $('.give_review').on('click', function () {

                sessionStorage.setItem('hash', 'write_review');
            });

            // Again to paginate

            $('.pagination a').on('click', function (e) {
                e.preventDefault();

                var url = $(this).attr('href');
                getProducts(url);
            });

            // Add to cart

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

            // Remove from cart

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
        }
    });
}