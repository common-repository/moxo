<?php
/*
* Plugin Name:       	Moxo
* Plugin URI:        	
* Description:       	The Moxo plugin adds sections functionality to the Moxo theme and Others Moxo Market. This plugin for only Moxo Market themes. Moxo is a plugin build to enhance the functionality of WordPress Theme made by Moxo Market.
* Version:           	1.0.5
* Author: 				moxo market
* Author URI: 			
* Tested up to: 		5.2.2
* Requires: 			4.6 or higher
* License: 				GPLv3 or later
* License URI: 			http://www.gnu.org/licenses/gpl-3.0.html
* Requires PHP: 		5.6
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // don't access directly
};

define( 'MOXO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'MOXO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

if(!function_exists('moxo_activate')){
	function moxo_activate() {
		
		/**
		 * Load Custom control in Customizer
		 */
		if ( class_exists( 'WP_Customize_Control' ) ) {
			require_once('inc/custom-controls/range-validator/range-control.php');	
			require_once('inc/custom-controls/Tabs/class/moxo-kit-customize-control-tabs.php');
		}
		
		$theme = wp_get_theme(); // gets the current theme
			if ( 'Moxo' == $theme->name){	
				 require_once('inc/moxo/features/moxo-slider-section.php');
				 require_once('inc/moxo/features/moxo-service-section.php');
				 require_once('inc/moxo/features/moxo-testimonial.php');
				 require_once('inc/moxo/features/moxo-navigation.php');
				 require_once('inc/moxo/sections/section-service.php');
				 require_once('inc/moxo/sections/section-slider.php');
				 require_once('inc/moxo/sections/section-testimonial.php');
			}
		}
	add_action( 'init', 'moxo_activate' );
}
$theme = wp_get_theme();

//Moxo 
if ( 'Moxo' == $theme->name){	
	register_activation_hook( __FILE__, 'moxo_install_function');
	if(!function_exists('moxo_install_function')){
		function moxo_install_function()
		{	
			$item_details_page = get_option('item_details_page'); 
			if(!$item_details_page){
				require_once('inc/moxo/default-pages/upload-media.php');
				require_once('inc/moxo/default-pages/home-page.php');
				require_once('inc/moxo/default-widgets/default-widget.php');
				update_option( 'item_details_page', 'Done' );
			}
		}
	}
}

//Moxo Sainitize text
if(!function_exists('moxo_home_page_sanitize_text')){
	function moxo_home_page_sanitize_text( $input ) {
			return wp_kses_post( force_balance_tags( $input ) );
		}
}	
?>