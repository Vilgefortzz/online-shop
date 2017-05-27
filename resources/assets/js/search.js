$(function() {

    $('#search_link').on('click', function(e) {
        e.preventDefault();

        $('#search_input').val('');
        setTimeout(function(){$('#search_input').focus();}, 10);
        $('#searched_products').empty();
    });

    $('#search_input').on('keyup', function () {

        var value = $(this).val();
        var url = $(this).attr('href');

        if (value !== ''){
            $.ajax({
                type: 'GET',
                url: url,
                data: {value : value},

                success: function (data) {
                    $('#searched_products').html(data);
                }
            });
        }
        else
            $('#searched_products').empty();
    })
});