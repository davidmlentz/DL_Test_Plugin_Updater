<?php
/*
Plugin Name: DL Test Plugin
Description: Testing plugin development
Plugin URI: https://davidmlentz.github.io
Version: 0.0.2
Author: David Lentz
Author URI: https://davidmlentz.github.io
*/

defined( 'ABSPATH' ) or die( 'No hackers' );

if( ! class_exists( 'DL_Test_Plugin_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}

$updater = new DL_Test_Plugin_Updater( __FILE__ );
$updater->set_username( 'davidmlentz' );
$updater->set_repository( 'DL_Test_Plugin_Updater' );
$updater->initialize();

function DL_test_plugin($content) {

	echo "hello, world";

}

add_shortcode('dl_test', 'DL_test_plugin');
