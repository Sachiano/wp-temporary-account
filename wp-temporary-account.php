<?php
/**
 * Plugin Name: WP Temporary Account
 * Plugin URI: http://wordpress.org/plugins/wp-temporary-account
 * Description: Allows a user administrator account to be created which will automatically be destroyed after a set period of time
 * Version: 0.0.1
 * Author: Sacha Corazzi
 * Author URI: http:/imsacha.co.uk
 * License: MIT
 */
defined( 'ABSPATH' ) or die( "Naughty naughty, you'll get caughty" );

require("functions.php");

/**
* Add the temporary account field to the edit profile page
*/
add_action("edit_user_profile", "addTemporaryField");

/**
* Update the user meta when profiles are updated
*/
add_action("edit_user_profile_update", "updateTemporaryField");