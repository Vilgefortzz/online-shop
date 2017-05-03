
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});

/**
 * Load my scripts
 */

require('./hover_menu');
require('./hide_flash_messages');
require('./active_links');
require('./ajax_config');

/**
 * Active tooltip - show etc.
 */
$('[data-toggle="tooltip"]').tooltip();

$(document).ready(function() {

    var orig_height = $('#review_text_area').height();
    var new_height = 150;

    $('#review_text_area').on('focus', function(){

        $(this).animate({height: new_height + 'px'});
    });

    $('#review_text_area').on('blur', function(){

        $(this).animate({height: orig_height + 'px'});
    });

    $('#give_review_this_page').on('click', function() {

        if($('#write_review').length != 0) {
            $('html, body').animate({
                scrollTop: $('#write_review').offset().top - 170
            }, 800);

            $('#review_text_area').focus();
        }
        else{
            $('html, body').animate({
                scrollTop: $('#review_given').offset().top - 170
            }, 800);
        }
    });

    $('.give_review').on('click', function () {

        sessionStorage.setItem('hash', 'write_review');
    });

    if (sessionStorage.length > 0){

        if($('#write_review').length != 0) {
            $('html, body').animate({
                scrollTop: $('#write_review').offset().top - 170
            }, 800);

            $('#review_text_area').focus();
        }
        else{
            $('html, body').animate({
                scrollTop: $('#review_given').offset().top - 170
            }, 800);
        }

        sessionStorage.clear();
    }
});