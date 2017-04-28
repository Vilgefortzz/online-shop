$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('.group_div').removeClass('col-xs-12');$('#list').addClass('active');$('#grid').removeClass('active');$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('.group_div').addClass('col-xs-12');$('#grid').addClass('active');$('#list').removeClass('active');$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});
