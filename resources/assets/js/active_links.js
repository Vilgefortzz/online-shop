var url = window.location;

$('td a').filter(function() {
    return this.href == url;
}).parent().addClass('active').css('backgroundColor', '#b4b37a');