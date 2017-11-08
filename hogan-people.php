<?php
/**
 * Plugin Name: Hogan Module: People
 * Plugin URI: https://github.com/dekodeinteraktiv/hogan-people
 * Description: People Module for Hogan
 * Version: 1.0.0-dev
 * Author: Dekode
 * Author URI: https://dekode.no
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * * Text Domain: hogan-people
 * Domain Path: /languages/
 *
 * @package Hogan
 * @author Dekode
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require_once 'class-people.php';

add_action( 'plugins_loaded', function() {
	load_plugin_textdomain( 'hogan-people', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
} );

add_action( 'hogan/include_modules', function() {
	hogan_register_module( new \Dekode\Hogan\People() );
} );
