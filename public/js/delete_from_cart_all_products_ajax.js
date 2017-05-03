$(document).ready(function() {

    $('.remove_all').on('click', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');

        $.ajax({
            type: 'DELETE',
            url: url,

            success: function() {
                var badge = $('.badge');
                badge.text(0);

                $('#main_list').slideUp(1000);

                $('#money').hide();
                $('#money').text(0 + '$').delay(500).fadeIn();
            }
        })
    });
});
