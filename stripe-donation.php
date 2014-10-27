<?php

/*
Plugin Name: Stripe Donation Form
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: Stripe.com API Donation Form
Version: 1.0
Author: Arthur Dean
Author URI: http://www.spiresapps.com
License: GPL2
*/

/**********************************
 * constants and globals
 **********************************/

if(!defined('STRIPE_BASE_URL')) {
    define('STRIPE_BASE_URL', plugin_dir_url(__FILE__));
}
if(!defined('STRIPE_BASE_DIR')) {
    define('STRIPE_BASE_DIR', dirname(__FILE__));
}

$stripe_options = get_option('stripe_settings');

/*******************************************
 * plugin text domain for translations
 *******************************************/

load_plugin_textdomain( 'stripe_donation_form', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**********************************
 * includes
 **********************************/

if(is_admin()) {
    // load admin includes
    include(STRIPE_BASE_DIR . '/includes/settings.php');
} else {
    // load front-end includes
    include(STRIPE_BASE_DIR . '/includes/scripts.php');
    include(STRIPE_BASE_DIR . '/includes/shortcodes.php');
    include(STRIPE_BASE_DIR . '/includes/process-payment.php');
}