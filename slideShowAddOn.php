<?php
    /**
        * Plugin Name: Slideshow Add On
        * Description: A customizable slideshow Plugin
        * Version: 1.0.0
        * Author: Richard Hpa
    **/
    function custom_customize_enqueue() {
        // echo plugin_dir_url(__FILE__) . 'assets/js/script.js';
        // die();
    	wp_enqueue_script( 'custom-customize', plugin_dir_url(__FILE__) . 'assets/js/script.js', array( 'jquery', 'customize-controls' ), false, true );
    }
    add_action( 'customize_controls_enqueue_scripts', 'custom_customize_enqueue' );


    require( plugin_dir_path( __FILE__ ) . 'includes/slideshow_customizer.php');

    function tbare_wordpress_plugin_demo( $args ) {
        ob_start();
        include(plugin_dir_path( __FILE__ ) . '/includes/slideshow_template.php');
        return ob_get_clean();
    }
    add_shortcode('tbare-plugin-demo', 'tbare_wordpress_plugin_demo');
    // make sure to use [tbare-plugin-demo]
