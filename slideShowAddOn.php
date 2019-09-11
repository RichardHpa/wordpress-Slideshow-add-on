<?php
/**
    * Plugin Name: Slideshow Add On
    * Description: A customizable slideshow Plugin
    * Version: 1.0.0
    * Author: Richard Hpa
**/

function custom_customize_enqueue() {
	wp_enqueue_script( 'rh_slideshow_customizer_script', plugin_dir_url(__FILE__) . 'assets/js/customizer.min.js', array( 'jquery', 'customize-controls' ), false, true );

	wp_localize_script('rh_slideshow_customizer_script', 'post_counts', array(
		'count'=> get_theme_mod('rh_slide_count_setting', 5)
	));
}
add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue' );

function rh_plugin_style_enqueue(){
    wp_enqueue_style('rh_slideshow_style', plugin_dir_url(__FILE__) . '/assets/css/style.min.css', array(), '1.0.0', 'all');
    wp_enqueue_script('rh_slideshow_script', plugin_dir_url(__FILE__) . '/assets/js/script.min.js', array('jquery'), false, true);

	wp_localize_script('rh_slideshow_script', 'post_counts', array(
		'count'=> get_theme_mod('rh_slide_count_setting', 5)
	));
}
add_action('wp_enqueue_scripts', 'rh_plugin_style_enqueue');

require( plugin_dir_path( __FILE__ ) . 'includes/slideshow_customizer.php');

function rh_slideshow_plugin( $args ) {
    ob_start();
    include(plugin_dir_path( __FILE__ ) . '/includes/slideshow_template.php');
    return ob_get_clean();
}
add_shortcode('rh_slideshow', 'rh_slideshow_plugin');
// make sure to use [rh_slideshow]
