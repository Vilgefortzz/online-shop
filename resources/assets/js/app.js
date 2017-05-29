
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Load my scripts
 */

require('./hover_menu');
require('./hide_flash_messages');
require('./ajax_config');
require('./search');

/**
 * Active tooltip - show etc.
 */
$('[data-toggle="tooltip"]').tooltip();