var url = window.location;

// Will also work for relative and absolute hrefs
$('td a').filter(function() {
    return this.href == url;
}).parent().addClass('active').css('backgroundColor', '#b4b37a');