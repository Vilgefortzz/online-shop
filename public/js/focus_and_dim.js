$('.expose').hover(function(e){
    $(this).css('z-index','99999');
    $('#overlay').fadeIn(400);
});

$('#overlay').hover(function(e){
    $('#overlay').fadeOut(400, function(){
        $('.expose').css('z-index','1');
    });
});
