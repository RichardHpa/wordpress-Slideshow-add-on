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
