<?php
/**
 * Plugin Name: Hogan Module: People
 * Plugin URI: https://github.com/dekodeinteraktiv/hogan-people
 * GitHub Plugin URI: https://github.com/dekodeinteraktiv/hogan-people
 * Description: People Module for Hogan
 * Version: 1.0.2
 * Author: Dekode
 * Author URI: https://dekode.no
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.en.html
 *
 * Text Domain: hogan-people
 * Domain Path: /languages/
 *
 * @package Hogan
 * @author Dekode
 */

declare( strict_types = 1 );
namespace Dekode\Hogan\People;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\hogan_load_textdomain' );
add_action( 'hogan/include_modules', __NAMESPACE__ . '\\hogan_register_module' );

/**
 * Register module text domain
 */
function hogan_load_textdomain() {
	\load_plugin_textdomain( 'hogan-people', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

/**
 * Register module in Hogan
 */
function hogan_register_module() {
	// Include people and register module class.
	require_once 'class-people.php';
	\hogan_register_module( new \Dekode\Hogan\People() );
}
