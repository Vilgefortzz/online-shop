
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

    if ($('#is_session').val() == ('1')){
        if (localStorage.length > 0){
            for (var i = 0; i < localStorage.length; i++){

                var id = localStorage.getItem(localStorage.key(i));
                $('#add_' + id).hide();
                $('#remove_' + id).show();
            }
        }
        else
            localStorage.clear();
    }
    else {
        localStorage.clear();
    }
});