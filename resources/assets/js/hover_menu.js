$('.dropdown-dynamic').hover(
    function() {
        $(this).find('.dropdown-menu-dynamic').stop(true, true).delay(200).fadeIn();
    },
    function() {
        $(this).find('.dropdown-menu-dynamic').stop(true, true).delay(200).fadeOut();
    }
);

$('.dropdown-menu-dynamic').hover(
    function() {
        $(this).stop(true, true);
    },
    function() {
        $(this).stop(true, true).delay(200).fadeOut();
    }
);
